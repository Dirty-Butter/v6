<?php
/*
+------------------------------------------------------+
| Manage Scriptures                                    |
| File: scriptures.index.inc.php                       |
| By SemperFi                                          | 
| http://www.semperfiwebservices.com                   |
+------------------------------------------------------+
*/
if (!defined('CC_INI_SET')) die('Access Denied');
Admin::getInstance()->permissions('settings', CC_PERM_READ, true);

global $lang;

###############################
## Update/Insert A Scripture ##
###############################
if (isset($_POST['scripture']) && is_array($_POST['scripture']) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {

	$redirect		= true;
	$keys_remove	= null;
	$keys_add		= null;

	foreach ($_POST['scripture'] as $key => $value) {
		if (!in_array($key, array('scripture_verse'))) continue;
		$_POST['scripture'][$key] = html_entity_decode($value);
	}

	if (is_numeric($_POST['scripture']['scripture_id'])) {

		$record	= array(
			'scripture_verse' => $GLOBALS['RAW']['POST']['scripture']['scripture_verse'], 
		);

		if ((!empty($_POST['scripture']['scripture_verse']) && $GLOBALS['db']->update('CubeCart_scriptures', $record, array('scripture_id' => $_POST['scripture']['scripture_id']), true))) {
			$GLOBALS['main']->setACPNotify($lang['scriptures']['admin_notification_update']);
			$keys_remove = array('action', 'id');
		} else {
			$GLOBALS['main']->setACPWarning($lang['scriptures']['admin_error_update']);
			$redirect = false;
		}

	} else {

		$record	= array(
			'scripture_verse' => $GLOBALS['RAW']['POST']['scripture']['scripture_verse'], 
		);

		if (!empty($_POST['scripture']['scripture_verse']) && $GLOBALS['db']->insert('CubeCart_scriptures', $record)) {
			$id = $GLOBALS['db']->insertid();
			unset($record);
			$GLOBALS['main']->setACPNotify($lang['scriptures']['admin_notification_add']);
			$keys_remove = array('action', 'id');
		} else {
			$GLOBALS['main']->setACPWarning($lang['scriptures']['admin_error_add']);
			$redirect	= false;
		}

	}

	$GLOBALS['cache']->clear();
	if ($redirect) {
		httpredir(currentPage($keys_remove, $keys_add));
	}

}

########################
## Delete A Scripture ##
########################
if (isset($_GET['delete']) && is_numeric($_GET['delete']) && Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {
	if ($GLOBALS['db']->delete('CubeCart_scriptures', array('scripture_id' => $_GET['delete']))) {
		$GLOBALS['main']->setACPNotify($lang['scriptures']['admin_notification_delete']);
	} else {
		$GLOBALS['main']->setACPWarning($lang['scriptures']['admin_error_delete']);
	}
	$GLOBALS['cache']->clear();
	httpredir(currentPage(array('delete')));
}

################################
## Delete Multiple Quotations ##
################################
if (isset($_POST['action']) && $_POST['action']=='delete' && is_array($_POST['bulkdelete']) && Admin::getInstance()->permissions('settings', CC_PERM_DELETE)){
	$delete_array = $_POST['bulkdelete'];
	$bulkdelete  = false;
	foreach ($delete_array as $delete_id) {
		if ($GLOBALS['db']->delete('CubeCart_scriptures', array('id' => $delete_id))) {
			$bulkdelete = true;
		}
	}
	if(!$bulkdelete) {
		$GLOBALS['main']->setACPWarning($lang['scriptures']['admin_error_bulk_delete']);
	} else {
		$GLOBALS['main']->setACPNotify($lang['scriptures']['admin_notification_bulk_delete']);
	}
}

######################
## Display The Page ##
######################
if (isset($_GET['action'])) {
	
	// Start Add/Edit Section
	if (in_array(strtolower($_GET['action']), array('edit', 'add'))) {
		// Display the add/edit scripture entry page
		$GLOBALS['main']->addTabControl($lang['scriptures']['admin_addedit_tab_general'], 'scripture_general', null, 'G');

		if (isset($_GET['scripture_id']) && is_numeric($_GET['scripture_id'])) {
			// Load from db, and assign
			if (($scripture = $GLOBALS['db']->select('CubeCart_scriptures', false, array('scripture_id' => (int)$_GET['scripture_id']))) !== false) {
				$scriptureData	= $scripture[0];
			}
		} 

		$scripture_display_data = (isset($_POST['scripture'])) ? $_POST['scripture'] : (isset($scripture[0])) ? $scripture[0] : '';
		if (is_array($scripture_display_data)) {
			foreach ($scripture_display_data as $key => $value) {
				$scripture_display_data[$key]	= htmlentities($value, ENT_COMPAT, 'UTF-8');
			}
			$GLOBALS['smarty']->assign('SCRIPTURE', $scripture_display_data);
		} 

		$GLOBALS['smarty']->assign('MODE_ADDEDIT', true);

	}
	// End Add/Edit Section

} else {
	
	// Start List Section
	$GLOBALS['main']->addTabControl($lang['scriptures']['admin_list_tab_main'], 'scriptures');
	$GLOBALS['main']->addTabControl($lang['scriptures']['admin_list_tab_add'], null, currentPage(null, array('action' => 'add')));
	if (($scriptures = $GLOBALS['db']->select('CubeCart_scriptures', false, false, array('scripture_id' => 'DESC'))) !== false) {
		$i = 1;
		foreach ($scriptures as $scripture) {
			$scripture['edit']	 = currentPage(null, array('action' => 'edit', 'scripture_id' => $scripture['scripture_id']));
			$scripture['delete'] = currentPage(null, array('delete' => $scripture['scripture_id']));
			$scripture_list[]	 = $scripture;
			++$i;
		}
	}
	$GLOBALS['smarty']->assign('LIST_SCRIPTURES', true);
	$GLOBALS['smarty']->assign('SCRIPTURES', $scripture_list);
	// End List Section

}
$page_content = $GLOBALS['smarty']->fetch('templates/scriptures.index.php');