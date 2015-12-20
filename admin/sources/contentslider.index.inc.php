<?php
/*
+------------------------------------------------------+
| Manage Content Slider                                |
| File : contentslider.index.inc.php                   |
| By SemperFi                                          | 
| http://www.semperfiwebservices.com                   |
+------------------------------------------------------+
*/
if (!defined('CC_INI_SET')) die('Access Denied');
Admin::getInstance()->permissions('settings', CC_PERM_READ, true);

global $lang;

###########################
## Update/Insert A Slide ##
###########################
if (isset($_POST['slide']) && is_array($_POST['slide']) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {
	$redirect		= true;
	$keys_remove	= null;
	$keys_add		= null;
	foreach ($_POST['slide'] as $key => $value) {
		if (!in_array($key, array('slide_title'))) continue;
		$_POST['slide'][$key]	= html_entity_decode($value);
	}
	$_POST['slide']['slide_content'] = $GLOBALS['RAW']['POST']['slide']['slide_content'];
	if (is_numeric($_POST['slide']['slide_id'])) {
		$slide_id = $_POST['slide']['slide_id'];
		if ((!empty($_POST['slide']['slide_title']) && $GLOBALS['db']->update('CubeCart_Content_Slider', $_POST['slide'], array('slide_id' => $_POST['slide']['slide_id']), true))) {
			$GLOBALS['main']->setACPNotify($lang['content_slider']['notify_update']);
			$keys_remove = array('action', 'slide_id');
		} else {
			$GLOBALS['main']->setACPWarning($lang['content_slider']['error_update']);
			$redirect = false;
		}
	} else {
		if (!empty($_POST['slide']['slide_title']) && $GLOBALS['db']->insert('CubeCart_Content_Slider', $_POST['slide'])) {
			$slide_id = $GLOBALS['db']->insertid();
			$GLOBALS['main']->setACPNotify($lang['content_slider']['notify_add']);
			$keys_remove = array('action', 'slide_id');
		} else {
			$GLOBALS['main']->setACPWarning($lang['content_slider']['error_add']);
			$redirect	= false;
		}
	}
	$GLOBALS['cache']->clear();
	if ($redirect) {
		httpredir(currentPage($keys_remove, $keys_add));
	}
}

####################
## Delete A Slide ##
####################
if (isset($_GET['delete']) && is_numeric($_GET['delete']) && Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {
	if ($GLOBALS['db']->delete('CubeCart_Content_Slider', array('slide_id' => $_GET['delete']))) {
		$GLOBALS['main']->setACPNotify($lang['content_slider']['notify_delete']);
	} else {
		$GLOBALS['main']->setACPWarning($lang['content_slider']['error_delete']);
	}
	$GLOBALS['cache']->clear();
	httpredir(currentPage(array('delete')));
}

###############################
## Update From The List Page ##
###############################
$update = array();
if (isset($_POST['slide_status']) && is_array($_POST['slide_status'])) {
	// Update slide status
	foreach ($_POST['slide_status'] as $slide_id => $slide_status) {
		$update[$slide_id]['slide_status'] = $slide_status;
	}
}
if (isset($_POST['slide_order']) && is_array($_POST['slide_order'])) {
	// Update slide order
	foreach ($_POST['slide_order'] as $key => $slide_id) {
		$update[$slide_id]['slide_order'] = $key+1;
	}
}
if (!empty($update) && is_array($update) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {
	// Put changes into the database
	$updated = false;
	foreach ($update as $slide_id => $array) {
		if ($GLOBALS['db']->update('CubeCart_Content_Slider', $array, array('slide_id' => $slide_id), true)) $updated = true;
	}
	if ($updated) {
		$GLOBALS['main']->setACPNotify($lang['content_slider']['notify_list']);
	} else {
		$GLOBALS['main']->setACPWarning($lang['content_slider']['error_list']);
	}
	$GLOBALS['cache']->clear();
	httpredir(currentPage());
}

######################
## Display The Page ##
######################
if (isset($_GET['action'])) {
	
	// Start Add/Edit Section
	if (in_array(strtolower($_GET['action']), array('edit', 'add'))) {
		// Display the add/edit slide page
		$GLOBALS['main']->addTabControl($lang['content_slider']['admin_addedit_page_tab_slide'], 'slide', null, 'G');
		if (isset($_GET['slide_id']) && is_numeric($_GET['slide_id'])) {
			// Load from db, and assign
			if (($slide = $GLOBALS['db']->select('CubeCart_Content_Slider', false, array('slide_id' => (int)$_GET['slide_id']))) !== false) {
				$slideData	= $slide[0];
				$GLOBALS['gui']->addBreadcrumb($slide[0]['slide_title']);
			}
		} 
		$slide_display_data = (isset($_POST['slide'])) ? $_POST['slide'] : (isset($slide[0])) ? $slide[0] : '';
		if (is_array($slide_display_data)) {
			foreach ($slide_display_data as $key => $value) {
				$slide_display_data[$key]	= htmlentities($value, ENT_COMPAT, 'UTF-8');
			}
			$GLOBALS['smarty']->assign('SLIDE', $slide_display_data);
		}
		$GLOBALS['smarty']->assign('MODE_ADDEDIT', true);
	}
	// End Add/Edit Section

} else {
	
	// Start List Section
	$GLOBALS['main']->addTabControl($lang['content_slider']['admin_list_page_tab_slides'], 'slides');
	$GLOBALS['main']->addTabControl($lang['content_slider']['admin_list_page_tab_add_slide'], null, currentPage(null, array('action' => 'add')));
	if (($slides = $GLOBALS['db']->select('CubeCart_Content_Slider', false, false, array('slide_order' => 'ASC'))) !== false) {
		$i = 1;
		foreach ($slides as $slide) {
			$slide['edit']	 = currentPage(null, array('action' => 'edit', 'slide_id' => $slide['slide_id']));
			$slide['delete'] = currentPage(null, array('delete' => $slide['slide_id']));
			$slide_list[]	 = $slide;
			++$i;
		}
	}
	$GLOBALS['smarty']->assign('LIST_SLIDES', true);
	$GLOBALS['smarty']->assign('SLIDES', $slide_list);
	// End List Section

}
$page_content = $GLOBALS['smarty']->fetch('templates/contentslider.index.php');