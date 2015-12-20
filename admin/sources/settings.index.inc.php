<?php
/**  PLUSH
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */
if (!defined('CC_INI_SET')) die('Access Denied');

Admin::getInstance()->permissions('settings', CC_PERM_READ, true);

global $lang;

$cookie_domain 	= $GLOBALS['config']->get('config','cookie_domain');
if(empty($cookie_domain)) {
	$domain = parse_url(CC_STORE_URL);
	$cookie_domain = '.'.str_replace('www.','',$domain['host']);
	$GLOBALS['config']->set('config','cookie_domain',$cookie_domain);
}

if (isset($_POST['config']) && Admin::getInstance()->permissions('settings', CC_PERM_FULL)) {
	$config_old = $GLOBALS['config']->get('config');
	if (!empty($_FILES)) {
		## Do we already have a logo enabled?
		$existing_logo = $GLOBALS['db']->select('CubeCart_logo','logo_id', array('status' => 1));

		## New logos being uploaded
		foreach ($_FILES as $logo) {
			if (file_exists($logo['tmp_name']) && $logo['size'] > 0) {
				if(preg_match('/^.*\.(jpg|jpeg|png|gif)$/i',$logo['name'])) {
					switch ((int)$logo['error']) {
						case UPLOAD_ERR_OK:
							## Upload is okay, so move to the logo directory, and add a database reference
							$filename = preg_replace('#[^\w\d\.\-]#', '_', $logo['name']);
							$target  = CC_ROOT_DIR.'/images/logos/'.$filename;
							move_uploaded_file($logo['tmp_name'], $target);
							$image  = getimagesize($target, $image_info);
							$record  = array(
								'filename' => $filename,
								'mimetype' => $image['mime'],
								'width'  => $image[0],
								'height' => $image[1],
								'status' => (count($_FILES)==1 && !$existing_logo) ? '1' : '0'
							);

							$GLOBALS['db']->insert('CubeCart_logo', $record);
							if (!$logo_update) { // prevents x amount of notifications for same thing
								$GLOBALS['main']->setACPNotify($lang['settings']['notify_logo_upload']);
							}
							$logo_update = true;

						break;
						case UPLOAD_ERR_INI_SIZE:
						case UPLOAD_ERR_FORM_SIZE:
						case UPLOAD_ERR_PARTIAL:
						case UPLOAD_ERR_NO_FILE:
						case UPLOAD_ERR_NO_TMP_DIR:
						case UPLOAD_ERR_CANT_WRITE:
						case UPLOAD_ERR_EXTENSION:
						default:
							$GLOBALS['main']->setACPWarning($lang['settings']['error_logo_upload']);
							trigger_error('Upload Error! Logo not saved.');
						break;
					}
				} else {
					$GLOBALS['main']->setACPWarning($lang['settings']['error_logo_upload']);
				}
			}
		}
	}

	## Disable "mobile" skin if master skin is responsive
	if($_POST['config']['disable_mobile_skin']==0 && isset($_POST['config']['skin_folder']) && !empty($_POST['config']['skin_folder'])) {
		$skin_data = $GLOBALS['gui']->getSkinConfig('', $_POST['config']['skin_folder']);
		if((string)$skin_data->info->{'responsive'}=='true') {
			$_POST['config']['disable_mobile_skin'] = '1';
			$GLOBALS['main']->setACPWarning($lang['settings']['error_mobile_vs_responsive']);
		}
	}

	if (isset($_POST['logo']) && is_array($_POST['logo'])) {
		foreach ($_POST['logo'] as $logo_id => $logo) {
			if ($logo['status']) {
				## Disable all other logos for this skin/style combo
				$GLOBALS['db']->update('CubeCart_logo', array('status' => 0), array('skin' => $logo['skin'], 'style' => $logo['style']));
			}
			if ($GLOBALS['db']->update('CubeCart_logo', $logo, array('logo_id' => (int)$logo_id))) {
				$logo_update = true;
			}
		}
		$GLOBALS['gui']->rebuildLogos();
	}

	$config_new = $_POST['config'];
	$config_new['offline_content'] = $GLOBALS['RAW']['POST']['config']['offline_content'];
	$config_new['store_copyright'] = $GLOBALS['RAW']['POST']['config']['store_copyright'];

	$config_new['standard_url'] = preg_replace('#^https://#','http://',$config_new['standard_url']);
	if(substr($config_new['standard_url'],0,7) !=="http://") {
		$config_new['standard_url'] = 'http://'.$config_new['standard_url'];
	}
	if (!filter_var($config_new['standard_url'], FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
		$config_new['standard_url'] = CC_STORE_URL;
	}
	// Added for backward compatibility as these old values may be used in extensions
	$config_new['ssl_url'] = preg_replace('#^http://#','https://',$config_new['standard_url']);
	$domain_parts = parse_url($config_new['standard_url']);
	$config_new['ssl_path'] = $domain_parts['path'].'/';

	if (empty($config_new['time_format'])) {
		$config_new['time_format'] = '%Y-%m-%d %H:%M';
	}

	## Set default currency to have an exchange rate of 1
	$GLOBALS['db']->update('CubeCart_currency',array('value' => 1), array('code' => $_POST['config']['default_currency']));

	$updated = ($GLOBALS['config']->set('config', '', $config_new)) ? true : false;

	if ((isset($updated) && $updated) || isset($logo_update)) {
		$GLOBALS['main']->setACPNotify($lang['settings']['notify_settings_update']);
	} else {
		$GLOBALS['main']->setACPWarning($lang['settings']['error_settings_update']);
	}
	
	httpredir(currentPage());
}

if (isset($_GET['logo']) && isset($_GET['logo_id'])) {
	if (($logo = $GLOBALS['db']->select('CubeCart_logo', false, array('logo_id' => (int)$_GET['logo_id']))) !== false) {
		switch (strtolower($_GET['logo'])) {
		case 'delete':
			if (Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {
				$paths = array(
					'images/logos/'.$logo[0]['filename'],
					'images/logos/'.$logo[0]['skin'].'-'.$logo[0]['style'].'.php',
					'images/logos/'.$logo[0]['skin'].'.php'
				);
				foreach ($paths as $path) {
					if (file_exists($logo_path)) {
						unlink($logo_path);
					}
				}
				$GLOBALS['db']->delete('CubeCart_logo', array('logo_id' => $logo[0]['logo_id']));
				$GLOBALS['main']->setACPNotify('Logo removed');
			}
			break;
		}
	}
	
	$GLOBALS['gui']->rebuildLogos();
	httpredir(currentPage(array('logo', 'logo_id')), 'Logos');
}

###########################################

## Add content tabs
$GLOBALS['main']->addTabControl($lang['common']['general'], 'General');
$GLOBALS['main']->addTabControl($lang['settings']['tab_features'], 'Features');
$GLOBALS['main']->addTabControl($lang['settings']['tab_layout'], 'Layout');
$GLOBALS['main']->addTabControl($lang['settings']['tab_stock'], 'Stock');
$GLOBALS['main']->addTabControl($lang['settings']['tab_seo'], 'Search_Engines');
$GLOBALS['main']->addTabControl($lang['settings']['tab_ssl'], 'SSL');
$GLOBALS['main']->addTabControl($lang['settings']['tab_offline'], 'Offline');
$GLOBALS['main']->addTabControl($lang['settings']['tab_logos'], 'Logos');
$GLOBALS['main']->addTabControl($lang['settings']['tab_advanced'], 'Advanced_Settings');
$GLOBALS['main']->addTabControl($lang['settings']['tab_copyright'], 'Copyright');
$GLOBALS['main']->addTabControl($lang['settings']['tab_extra'], 'Extra');

## Get Front End skins
if (($skins = $GLOBALS['gui']->listSkins()) !== false) {

	$smarty_data['skins'] = $smarty_data['skins_mobile'] = $other_logo_array = array();

	foreach ($skins as $folder => $skin) {
		if ($skin['info']['mobile']) {
			$skin['info']['selected'] = ($skin['info']['name'] == $GLOBALS['config']->get('config', 'skin_folder_mobile')) ? ' selected="selected"' : '';
			$smarty_data['skins_mobile'][] = $skin['info'];
			## List of styles
			if (isset($skin['styles']) && is_array($skin['styles'])) {
				foreach ($skin['styles'] as $style) {
					$skin_style[$skin['info']['name']][$style['directory']] = $style['name'];
				}
			}
		} else {
			$skin['info']['selected'] = ($skin['info']['name'] == $GLOBALS['config']->get('config', 'skin_folder')) ? ' selected="selected"' : '';
			$smarty_data['skins'][] = $skin['info'];
			## List of styles
			if (isset($skin['styles']) && is_array($skin['styles'])) {
				foreach ($skin['styles'] as $style) {
					$skin_style[$skin['info']['name']][$style['directory']] = $style['name'];
				}
			}
		}
	}
	$GLOBALS['smarty']->assign('SKINS', $smarty_data['skins']);
	$GLOBALS['smarty']->assign('SKINS_MOBILE', $smarty_data['skins_mobile']);

	$other_logo_array = array(
		'0' => array('other_optgroup' => true, 'name' => 'invoices', 'display' => $lang['orders']['title_invoices']),
		'1' => array('name' => 'emails', 'display' => $lang['email']['title_email_templates'])
	);

	$GLOBALS['smarty']->assign('SKINS_ALL', array_merge($smarty_data['skins'], $smarty_data['skins_mobile'], $other_logo_array));

	if (isset($skin_style)) {
		$GLOBALS['smarty']->assign('JSON_STYLES', json_encode((array)$skin_style));
	}
}

## Get admin skins
$path = CC_ROOT_DIR.'/'.$GLOBALS['config']->get('config', 'adminFolder').'/'.'skins'.'/';
foreach (glob($path.'*', GLOB_MARK) as $folder) {
	if (is_dir($folder) && file_exists($folder.'images') && file_exists($folder.'styles') && file_exists($folder.'templates')) {
		$data['name']  = basename($folder);
		$data['selected']  = ($GLOBALS['config']->get('config', 'admin_skin') == $data['name']) ? 'selected="selected"' : '';
		$smarty_data['skins_admin'][] = $data;
	}
	$GLOBALS['smarty']->assign('SKINS_ADMIN', $smarty_data['skins_admin']);

}
## Get Logos
if (($logos = $GLOBALS['db']->select('CubeCart_logo')) !== false) {
	foreach ($logos as $logo) {
		$logo['delete'] = currentPage(null, array('logo' => 'delete', 'logo_id' => $logo['logo_id']));
		$smarty_data['logos'][] = $logo;
	}
	$GLOBALS['smarty']->assign('LOGOS', $smarty_data['logos']);
}
## Get Languages
if (($languages = $GLOBALS['language']->listLanguages()) !== false) {
	foreach ($languages as $code => $option) {
		$option['selected'] = ($code == $GLOBALS['config']->get('config', 'default_language')) ? ' selected="selected"' : '';
		$smarty_data['languages'][] = $option;
	}
	$GLOBALS['smarty']->assign('LANGUAGES', $smarty_data['languages']);
}

## Get countries
if (($countries = $GLOBALS['db']->select('CubeCart_geo_country', array('numcode', 'name'),false, array('name'=>'ASC'))) !== false) {
	$store_country = $GLOBALS['config']->get('config', 'store_country');
	foreach ($countries as $country) {
		$country['selected'] = ($country['numcode'] == $store_country) ? ' selected="selected"' : '';
		$smarty_data['countries'][] = $country;
	}
	$GLOBALS['smarty']->assign('COUNTRIES', $smarty_data['countries']);
	## Get counties
	$GLOBALS['smarty']->assign('VAL_JSON_COUNTY', state_json());
}


## Get Currencies
if (($currencies = $GLOBALS['db']->select('CubeCart_currency', array('name', 'code'), array('active' => '1'), array('name' => 'ASC'))) !== false) {
	foreach ($currencies as $currency) {
		$currency['selected'] = ($currency['code'] == $GLOBALS['config']->get('config', 'default_currency')) ? ' selected="selected"' : '';
		$smarty_data['currencies'][] = $currency;
	}
	$GLOBALS['smarty']->assign('CURRENCIES', $smarty_data['currencies']);
}

## Get supported timezones from PHP
if (class_exists('DateTimeZone')) {
	$tzabbr = DateTimeZone::listAbbreviations();
	foreach ($tzabbr as $abbr => $array) {
		foreach ($array as $details) {
			if (!empty($details['timezone_id']) && preg_match('#^([a-z\s_]+)/([a-z\s_]+)$|^UTC$#i', $details['timezone_id'])) {
				$timezones[$details['timezone_id']] = $details['timezone_id'];
			}
		}
	}
	if (isset($timezones)) {
		natsort($timezones);
		$current_timezone = $GLOBALS['config']->get('config', 'time_zone');
		if (empty($current_timezone)) {
			//Try to guess at the time zone
			$current_timezone = date_default_timezone_get();
		}
		foreach ($timezones as $timezone) {
			$smarty_data['timezones'][] = array(
				'zone'  => $timezone,
				'selected' => ($timezone == $current_timezone) ? ' selected="selected"' : '',
			);
		}
		$GLOBALS['smarty']->assign('TIMEZONES', $smarty_data['timezones']);
	}
}

## Default digital custom path
$GLOBALS['config']->get('config', 'dnLoadRootPath', rootHomePath());
$GLOBALS['config']->get('config', 'dnLoadCustomPath', ($GLOBALS['config']->isEmpty('config', 'dnLoadCustomPath')) ? 'files' : $GLOBALS['config']->get('config', 'dnLoadCustomPath'));

// Start SemperFi CONTENT SLIDER Modification
	## Content Slider - Display Location
	$sfws_content_slider_display_location_options = array("home", "global");
	$current_sfws_content_slider_display_location_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_display_location');
		foreach ($sfws_content_slider_display_location_options as $sfws_content_slider_display_location_option) {
			$smarty_data['sfws_content_slider_display_location_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_display_location_option),
				'value'		=> $sfws_content_slider_display_location_option,
				'selected'	=> ($sfws_content_slider_display_location_option == $current_sfws_content_slider_display_location_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DISPLAY_LOCATION_OPTIONS', $smarty_data['sfws_content_slider_display_location_options']);
	## Content Slider - Auto Slide
	$sfws_content_slider_auto_slide_options = array("true", "false");
	$current_sfws_content_slider_auto_slide_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_auto_slide');
		foreach ($sfws_content_slider_auto_slide_options as $sfws_content_slider_auto_slide_option) {
			$smarty_data['sfws_content_slider_auto_slide_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_auto_slide_option),
				'value'		=> $sfws_content_slider_auto_slide_option,
				'selected'	=> ($sfws_content_slider_auto_slide_option == $current_sfws_content_slider_auto_slide_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_AUTO_SLIDE_OPTIONS', $smarty_data['sfws_content_slider_auto_slide_options']);
	## Content Slider - Auto Slide Direction
	$sfws_content_slider_auto_slide_direction_options = array("left", "right");
	$current_sfws_content_slider_auto_slide_direction_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_auto_slide_direction');
		foreach ($sfws_content_slider_auto_slide_direction_options as $sfws_content_slider_auto_slide_direction_option) {
			$smarty_data['sfws_content_slider_auto_slide_direction_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_auto_slide_direction_option),
				'value'		=> $sfws_content_slider_auto_slide_direction_option,
				'selected'	=> ($sfws_content_slider_auto_slide_direction_option == $current_sfws_content_slider_auto_slide_direction_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_AUTO_SLIDE_DIRECTION_OPTIONS', $smarty_data['sfws_content_slider_auto_slide_direction_options']);
	## Content Slider - Force Auto Slide
	$sfws_content_slider_force_auto_slide_options = array("false", "true");
	$current_sfws_content_slider_force_auto_slide_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_force_auto_slide');
		foreach ($sfws_content_slider_force_auto_slide_options as $sfws_content_slider_force_auto_slide_option) {
			$smarty_data['sfws_content_slider_force_auto_slide_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_force_auto_slide_option),
				'value'		=> $sfws_content_slider_force_auto_slide_option,
				'selected'	=> ($sfws_content_slider_force_auto_slide_option == $current_sfws_content_slider_force_auto_slide_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_FORCE_AUTO_SLIDE_OPTIONS', $smarty_data['sfws_content_slider_force_auto_slide_options']);
	## Content Slider - Pause On Hover
	$sfws_content_slider_pause_on_hover_options = array("true", "false");
	$current_sfws_content_slider_pause_on_hover_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_pause_on_hover');
		foreach ($sfws_content_slider_pause_on_hover_options as $sfws_content_slider_pause_on_hover_option) {
			$smarty_data['sfws_content_slider_pause_on_hover_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_pause_on_hover_option),
				'value'		=> $sfws_content_slider_pause_on_hover_option,
				'selected'	=> ($sfws_content_slider_pause_on_hover_option == $current_sfws_content_slider_pause_on_hover_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_PAUSE_ON_HOVER_OPTIONS', $smarty_data['sfws_content_slider_pause_on_hover_options']);
	## Content Slider - Auto Height
	$sfws_content_slider_auto_height_options = array("false", "true");
	$current_sfws_content_slider_auto_height_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_auto_height');
		foreach ($sfws_content_slider_auto_height_options as $sfws_content_slider_auto_height_option) {
			$smarty_data['sfws_content_slider_auto_height_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_auto_height_option),
				'value'		=> $sfws_content_slider_auto_height_option,
				'selected'	=> ($sfws_content_slider_auto_height_option == $current_sfws_content_slider_auto_height_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_AUTO_HEIGHT_OPTIONS', $smarty_data['sfws_content_slider_auto_height_options']);
	## Content Slider - Height Ease Function
	$sfws_content_slider_height_ease_function_options = array("fade", "linear", "swing", "jswing", "easeOutCubic", "easeInOutCubic", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInBack", "easeOutBack", "easeInOutBack");
	$current_sfws_content_slider_height_ease_function_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_height_ease_function');
		foreach ($sfws_content_slider_height_ease_function_options as $sfws_content_slider_height_ease_function_option) {
			$smarty_data['sfws_content_slider_height_ease_function_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_height_ease_function_option),
				'value'		=> $sfws_content_slider_height_ease_function_option,
				'selected'	=> ($sfws_content_slider_height_ease_function_option == $current_sfws_content_slider_height_ease_function_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_HEIGHT_EASE_FUNCTION_OPTIONS', $smarty_data['sfws_content_slider_height_ease_function_options']);
	## Content Slider - Slide Ease Function
	$sfws_content_slider_slide_ease_function_options = array("fade", "linear", "swing", "jswing", "easeOutCubic", "easeInOutCubic", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSine", "easeOutSine", "easeInOutSine", "easeInBack", "easeOutBack", "easeInOutBack");
	$current_sfws_content_slider_slide_ease_function_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_slide_ease_function');
		foreach ($sfws_content_slider_slide_ease_function_options as $sfws_content_slider_slide_ease_function_option) {
			$smarty_data['sfws_content_slider_slide_ease_function_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_slide_ease_function_option),
				'value'		=> $sfws_content_slider_slide_ease_function_option,
				'selected'	=> ($sfws_content_slider_slide_ease_function_option == $current_sfws_content_slider_slide_ease_function_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_SLIDE_EASE_FUNCTION_OPTIONS', $smarty_data['sfws_content_slider_slide_ease_function_options']);
	## Content Slider - Dynamic Arrows
	$sfws_content_slider_dynamic_arrows_options = array("false", "true");
	$current_sfws_content_slider_dynamic_arrows_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_dynamic_arrows');
		foreach ($sfws_content_slider_dynamic_arrows_options as $sfws_content_slider_dynamic_arrows_option) {
			$smarty_data['sfws_content_slider_dynamic_arrows_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_dynamic_arrows_option),
				'value'		=> $sfws_content_slider_dynamic_arrows_option,
				'selected'	=> ($sfws_content_slider_dynamic_arrows_option == $current_sfws_content_slider_dynamic_arrows_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DYNAMIC_ARROWS_OPTIONS', $smarty_data['sfws_content_slider_dynamic_arrows_options']);
	## Content Slider - Dynamic Arrows Graphical
	$sfws_content_slider_dynamic_arrows_graphical_options = array("false", "true");
	$current_sfws_content_slider_dynamic_arrows_graphical_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_dynamic_arrows_graphical');
		foreach ($sfws_content_slider_dynamic_arrows_graphical_options as $sfws_content_slider_dynamic_arrows_graphical_option) {
			$smarty_data['sfws_content_slider_dynamic_arrows_graphical_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_dynamic_arrows_graphical_option),
				'value'		=> $sfws_content_slider_dynamic_arrows_graphical_option,
				'selected'	=> ($sfws_content_slider_dynamic_arrows_graphical_option == $current_sfws_content_slider_dynamic_arrows_graphical_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DYNAMIC_ARROWS_GRAPHICAL_OPTIONS', $smarty_data['sfws_content_slider_dynamic_arrows_graphical_options']);
	## Content Slider - Hide Side Arrows
	$sfws_content_slider_hide_side_arrows_options = array("false", "true");
	$current_sfws_content_slider_hide_side_arrows_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_hide_side_arrows');
		foreach ($sfws_content_slider_hide_side_arrows_options as $sfws_content_slider_hide_side_arrows_option) {
			$smarty_data['sfws_content_slider_hide_side_arrows_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_hide_side_arrows_option),
				'value'		=> $sfws_content_slider_hide_side_arrows_option,
				'selected'	=> ($sfws_content_slider_hide_side_arrows_option == $current_sfws_content_slider_hide_side_arrows_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_HIDE_SIDE_ARROWS_OPTIONS', $smarty_data['sfws_content_slider_hide_side_arrows_options']);
	## Content Slider - Hover Arrows
	$sfws_content_slider_hover_arrows_options = array("false", "true");
	$current_sfws_content_slider_hover_arrows_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_hover_arrows');
		foreach ($sfws_content_slider_hover_arrows_options as $sfws_content_slider_hover_arrows_option) {
			$smarty_data['sfws_content_slider_hover_arrows_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_hover_arrows_option),
				'value'		=> $sfws_content_slider_hover_arrows_option,
				'selected'	=> ($sfws_content_slider_hover_arrows_option == $current_sfws_content_slider_hover_arrows_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_HOVER_ARROWS_OPTIONS', $smarty_data['sfws_content_slider_hover_arrows_options']);
	## Content Slider - Dynamic Tabs
	$sfws_content_slider_dynamic_tabs_options = array("false", "true");
	$current_sfws_content_slider_dynamic_tabs_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_dynamic_tabs');
		foreach ($sfws_content_slider_dynamic_tabs_options as $sfws_content_slider_dynamic_tabs_option) {
			$smarty_data['sfws_content_slider_dynamic_tabs_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_dynamic_tabs_option),
				'value'		=> $sfws_content_slider_dynamic_tabs_option,
				'selected'	=> ($sfws_content_slider_dynamic_tabs_option == $current_sfws_content_slider_dynamic_tabs_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DYNAMIC_TABS_OPTIONS', $smarty_data['sfws_content_slider_dynamic_tabs_options']);
	## Content Slider - Dynamic Tabs Align
	$sfws_content_slider_dynamic_tabs_align_options = array("left", "center", "right");
	$current_sfws_content_slider_dynamic_tabs_align_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_dynamic_tabs_align');
		foreach ($sfws_content_slider_dynamic_tabs_align_options as $sfws_content_slider_dynamic_tabs_align_option) {
			$smarty_data['sfws_content_slider_dynamic_tabs_align_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_dynamic_tabs_align_option),
				'value'		=> $sfws_content_slider_dynamic_tabs_align_option,
				'selected'	=> ($sfws_content_slider_dynamic_tabs_align_option == $current_sfws_content_slider_dynamic_tabs_align_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DYNAMIC_TABS_ALIGN_OPTIONS', $smarty_data['sfws_content_slider_dynamic_tabs_align_options']);
	## Content Slider - Dynamic Tabs Position
	$sfws_content_slider_dynamic_tabs_position_options = array("top", "bottom");
	$current_sfws_content_slider_dynamic_tabs_position_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_dynamic_tabs_position');
		foreach ($sfws_content_slider_dynamic_tabs_position_options as $sfws_content_slider_dynamic_tabs_position_option) {
			$smarty_data['sfws_content_slider_dynamic_tabs_position_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_dynamic_tabs_position_option),
				'value'		=> $sfws_content_slider_dynamic_tabs_position_option,
				'selected'	=> ($sfws_content_slider_dynamic_tabs_position_option == $current_sfws_content_slider_dynamic_tabs_position_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_DYNAMIC_TABS_POSITION_OPTIONS', $smarty_data['sfws_content_slider_dynamic_tabs_position_options']);
	## Content Slider - Include Title
	$sfws_content_slider_include_title_options = array("true", "false");
	$current_sfws_content_slider_include_title_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_include_title');
		foreach ($sfws_content_slider_include_title_options as $sfws_content_slider_include_title_option) {
			$smarty_data['sfws_content_slider_include_title_options'][]	= array(
				'name'		=> ucwords($sfws_content_slider_include_title_option),
				'value'		=> $sfws_content_slider_include_title_option,
				'selected'	=> ($sfws_content_slider_include_title_option == $current_sfws_content_slider_include_title_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_INCLUDE_TITLE_OPTIONS', $smarty_data['sfws_content_slider_include_title_options']);
	## Content Slider - Responsive
	$sfws_content_slider_responsive_options = array("true", "false");
	$current_sfws_content_slider_responsive_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_responsive');
		foreach ($sfws_content_slider_responsive_options as $sfws_content_slider_responsive_option) {
			$smarty_data['sfws_content_slider_responsive_options'][] = array(
				'name'		=> ucwords($sfws_content_slider_responsive_option),
				'value'		=> $sfws_content_slider_responsive_option,
				'selected'	=> ($sfws_content_slider_responsive_option == $current_sfws_content_slider_responsive_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_RESPONSIVE_OPTIONS', $smarty_data['sfws_content_slider_responsive_options']);
	## Content Slider - Mobile Navigation
	$sfws_content_slider_mobile_navigation_options = array("true", "false");
	$current_sfws_content_slider_mobile_navigation_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_mobile_navigation');
		foreach ($sfws_content_slider_mobile_navigation_options as $sfws_content_slider_mobile_navigation_option) {
			$smarty_data['sfws_content_slider_mobile_navigation_options'][] = array(
				'name'		=> ucwords($sfws_content_slider_mobile_navigation_option),
				'value'		=> $sfws_content_slider_mobile_navigation_option,
				'selected'	=> ($sfws_content_slider_mobile_navigation_option == $current_sfws_content_slider_mobile_navigation_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_MOBILE_NAVIGATION_OPTIONS', $smarty_data['sfws_content_slider_mobile_navigation_options']);
	## Content Slider - Hide Arrows When Mobile
	$sfws_content_slider_hide_arrows_when_mobile_options = array("true", "false");
	$current_sfws_content_slider_hide_arrows_when_mobile_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_hide_arrows_when_mobile');
		foreach ($sfws_content_slider_hide_arrows_when_mobile_options as $sfws_content_slider_hide_arrows_when_mobile_option) {
			$smarty_data['sfws_content_slider_hide_arrows_when_mobile_options'][] = array(
				'name'		=> ucwords($sfws_content_slider_hide_arrows_when_mobile_option),
				'value'		=> $sfws_content_slider_hide_arrows_when_mobile_option,
				'selected'	=> ($sfws_content_slider_hide_arrows_when_mobile_option == $current_sfws_content_slider_hide_arrows_when_mobile_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_HIDE_ARROWS_WHEN_MOBILE_OPTIONS', $smarty_data['sfws_content_slider_hide_arrows_when_mobile_options']);
	## Content Slider - Swipe
	$sfws_content_slider_swipe_options = array("true", "false");
	$current_sfws_content_slider_swipe_option  = $GLOBALS['config']->get('config', 'sfws_content_slider_swipe');
		foreach ($sfws_content_slider_swipe_options as $sfws_content_slider_swipe_option) {
			$smarty_data['sfws_content_slider_swipe_options'][] = array(
				'name'		=> ucwords($sfws_content_slider_swipe_option),
				'value'		=> $sfws_content_slider_swipe_option,
				'selected'	=> ($sfws_content_slider_swipe_option == $current_sfws_content_slider_swipe_option) ? ' selected="selected"' : '',
			);
		}
	$GLOBALS['smarty']->assign('SFWS_CONTENT_SLIDER_SWIPE_OPTIONS', $smarty_data['sfws_content_slider_swipe_options']);
// End SemperFi CONTENT SLIDER Modification

## Auto assign config settings to {VAL_[KEYNAME]}
for( $i = 1; $i <= 6; ++$i ) {
	$a_n_s[(string)$i] = $lang['order_state']['name_' . (string)$i];
}

$select_options = array(
	'admin_notify_status'	=> $a_n_s,
	'basket_jump_to'  => null,
	'cache'					=> array('1' => $lang['common']['enabled'], '0' => $lang['common']['disabled']),
	'catalogue_expand_tree' => null,
	'skin_change'   => array($lang['common']['no'], $lang['settings']['all_skin_select'], $lang['settings']['admin_only_skin_select']),
	'debug'     => array($lang['common']['disabled'], $lang['common']['enabled']),
	'catalogue_hide_prices' => null,
	'email_method'			=> array('mail' => $lang['settings']['email_method_mail'], 'smtp' => $lang['settings']['email_method_smtp'], 'smtp_ssl' => $lang['settings']['email_method_smtp_ssl']),
	'offline'    => null,
	'basket_out_of_stock_purchase'  => null,
	'catalogue_popular_products_source' => array($lang['settings']['product_popular_views'], $lang['settings']['product_popular_sales']),
	'basket_tax_by_delivery'   => array($lang['address']['billing_address'], $lang['address']['delivery_address']),
	'proxy'     => null,
	'recaptcha'    => array($lang['common']['disabled'], $lang['common']['enabled']),
	'catalogue_sale_mode' => array($lang['common']['disabled'], $lang['settings']['sales_per_product'], $lang['settings']['sales_percentage']),
	'recaptcha' => array(0 => "Off", 1 => "reCAPTCHA", 2 => $lang['common']['new']." reCAPTCHA (".$lang['common']['recommended'].')'),
	'seo_metadata'   => array($lang['settings']['seo_meta_option_disable'], $lang['settings']['seo_meta_option_merge'], $lang['settings']['seo_meta_option_replace']),
	// Start SEMPERFI SCRIPTURES
	'sfws_scriptures_footer_status'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_scriptures_sidebox_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	// End SEMPERFI SCRIPTURES	
	// BEGINNING SEMPERFI TESTIMONIALS 
	'sfws_testimonials_add_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_testimonials_page_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_testimonials_page_pagination' => array($lang['testimonials']['admin_settings_field_page_pagination_option_0'], $lang['testimonials']['admin_settings_field_page_pagination_option_1']),
	'sfws_testimonials_sidebox_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	// END SEMPERFI TESTIMONIALS 
	// Start SemperFi ASKABOUT Modification
	'ask_about_a_product_departments' => array($lang['common']['disabled'], $lang['common']['enabled']),
	'ask_about_a_product_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	// End SemperFi ASKABOUT Modification
	// Start SemperFi CONTENT SLIDER Modification
	'sfws_content_slider_status' => array($lang['common']['disabled'], $lang['common']['enabled']),
	// End SemperFi CONTENT SLIDER Modification
	// Start SemperFi DOCUMENT MANAGER Modification
	'sfws_site_doc_manager_status'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_header'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_footer'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_sidebox1'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_sidebox2'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_products'	=> array($lang['common']['disabled'], $lang['common']['enabled']),
	'sfws_site_doc_manager_status_categories' => array($lang['common']['disabled'], $lang['common']['enabled']),
	// End SemperFi DOCUMENT MANAGER Modification
	'basket_allow_non_invoice_address' => null,
	'catalogue_latest_products'   => null,
	'catalogue_show_empty' => null,
	'email_smtp'   => null,
	'ssl'     => null,
	'stock_level'   => null,
	'stock_change_time'  => array(2 => $lang['settings']['stock_reduce_pending'], 1 => $lang['settings']['stock_reduce_process'], 0 => $lang['settings']['stock_reduce_complete']),
	'stock_warn_type'  => array($lang['settings']['stock_warning_method_global'], $lang['settings']['stock_warning_method_product']),
	'product_weight_unit' => array('Lb' => $lang['settings']['weight_unit_lb'], 'Kg' => $lang['settings']['weight_unit_kg']),
	'time_format'   => '%Y-%m-%d %H:%M',
	'product_sort_direction' => array('ASC' => 'ASC', 'DESC' => 'DESC'),
	'product_clone'      => array('0' => $lang['common']['disabled'], '2' => $lang['settings']['product_clone_hide'], '1' => $lang['common']['enabled']),
	'product_clone_code'    => array('1' => $lang['settings']['product_clone_new_code'], '2' => $lang['settings']['product_clone_old_code']),
	'seo_add_cats'      => array('0' => $lang['common']['no'], '1' => $lang['settings']['seo_add_cats_top'], '2' => $lang['settings']['seo_add_cats_all']),
	'seo_cat_add_cats'      => array('1' => $lang['common']['yes'], '0' => $lang['common']['no'])
);

if ($inventory_columns = $GLOBALS['db']->misc('SHOW FULL COLUMNS FROM '.$GLOBALS['config']->get('config', 'dbprefix').'CubeCart_inventory')) {
	$excluded = array('use_stock_level');
	$select_options[]['product_sort_column'] = array();
	foreach ($inventory_columns as $inventory_column) {
		if (!in_array($inventory_column['Field'], $excluded)) {
			$select_options['product_sort_column'][$inventory_column['Field']] = (empty($inventory_column['Comment'])) ? $inventory_column['Field'] : $inventory_column['Comment'];
		}
	}
	asort($select_options['product_sort_column']);
}

$smarty_data['config'] = $GLOBALS['config']->get('config');

$GLOBALS['smarty']->assign('CONFIG', $smarty_data['config']);

if (isset($select_options)) {
	foreach ($select_options as $field => $options) {
		if (!is_array($options) || empty($options)) {
			$options = array($lang['common']['no'], $lang['common']['yes']);
		}
		foreach ($options as $value => $title) {
			
			$selected = ($GLOBALS['config']->has('config', $field) && $GLOBALS['config']->get('config', $field) == $value) ? ' selected="selected"' : '';
			$smarty_data['options'][] = array('value' => $value, 'title' => $title, 'selected' => $selected);
		}
		$GLOBALS['smarty']->assign('OPT_'.strtoupper($field), $smarty_data['options']);
		unset($smarty_data['options']);
	}
}
$GLOBALS['smarty']->assign('HOOK_TAB_CONTENT', $GLOBALS['hook_tab_content']);
$page_content = $GLOBALS['smarty']->fetch('templates/settings.index.php');