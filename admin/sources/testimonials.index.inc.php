<?php
/*
+------------------------------------------------------+
|	               Manage Testimonials                 |
|           File: testimonials.index.inc.php           |
|	                  By SemperFi                      | 
|         http://www.semperfiwebservices.com           |
+------------------------------------------------------+
*/
if (!defined('CC_INI_SET')) die('Access Denied');
Admin::getInstance()->permissions('settings', CC_PERM_READ, true);

global $lang;

######################################################
## Update/Insert A Testimonial  I ADDED TITLE BELOW ##
######################################################
if (isset($_POST['testimonial']) && is_array($_POST['testimonial']) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {

	$redirect		= true;
	$keys_remove	= null;
	$keys_add		= null;

	foreach ($_POST['testimonial'] as $key => $value) {
		if (!in_array($key, array('customer_name'))) continue;
		$_POST['testimonial'][$key]	= html_entity_decode($value);
	}

	if (is_numeric($_POST['testimonial']['testimonial_id'])) {

		$record	= array(
			'customer_name'			 => $_POST['testimonial']['customer_name'],
			'customer_email'		 => $_POST['testimonial']['customer_email'],
			'testimonial_title'		 => $_POST['testimonial']['testimonial_title'],
			'testimonial_long'         => $GLOBALS['RAW']['POST']['testimonial']['testimonial_long'],
            'testimonial_short'         => $GLOBALS['RAW']['POST']['testimonial']['testimonial_short'],

			'testimonial_status'	 => $_POST['testimonial']['testimonial_status'],
			'testimonial_date'		 => $_POST['testimonial']['testimonial_date'],
			'testimonial_ip_address' => $_POST['testimonial']['testimonial_ip_address'],
		);

		if ((!empty($_POST['testimonial']['customer_name']) && $GLOBALS['db']->update('CubeCart_Testimonials', $record, array('testimonial_id' => $_POST['testimonial']['testimonial_id']), true))) {
			$GLOBALS['main']->setACPNotify('Testimonial successfully updated.');
			$keys_remove = array('action', 'testimonial_id');
		} else {
			$GLOBALS['main']->setACPWarning('Failed to update testimonial.');
			$redirect = false;
		}

	} else {
		$record	= array(
			'customer_name'			 => $_POST['testimonial']['customer_name'],
			'customer_email'		 => $_POST['testimonial']['customer_email'],
			'testimonial_title'		 => $_POST['testimonial']['testimonial_title'], 
			'testimonial_long'         => $GLOBALS['RAW']['POST']['testimonial']['testimonial_long'],
            'testimonial_short'         => $GLOBALS['RAW']['POST']['testimonial']['testimonial_short'],
			'testimonial_status'	 => $_POST['testimonial']['testimonial_status'],
			'testimonial_date'		 => time(),
			'testimonial_ip_address' => $_POST['testimonial']['testimonial_ip_address'],
		);

		if (!empty($_POST['testimonial']['customer_name']) && $GLOBALS['db']->insert('CubeCart_Testimonials', $record)) {
			$testimonial_id = $GLOBALS['db']->insertid();
			unset($record);
			$GLOBALS['main']->setACPNotify('Testimonial successfully added.');
			$keys_remove = array('action', 'testimonial_id');
		} else {
			$GLOBALS['main']->setACPWarning('Failed to add testimonial.');
			$redirect	= false;
		}
	}

	$GLOBALS['cache']->clear();
	if ($redirect) {
		httpredir(currentPage($keys_remove, $keys_add));
	}

}

##########################
## Delete A Testimonial ##
##########################
if (isset($_GET['delete']) && is_numeric($_GET['delete']) && Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {
	if ($GLOBALS['db']->delete('CubeCart_Testimonials', array('testimonial_id' => $_GET['delete']))) {
		$GLOBALS['main']->setACPNotify('Testimonial successfully deleted.');
	} else {
		$GLOBALS['main']->setACPWarning('Failed to delete testimonial.');
	}
	$GLOBALS['cache']->clear();
	httpredir(currentPage(array('delete')));
}

###############################
## Update From The List Page ##
###############################
$update = array();
if (isset($_POST['testimonial_status']) && is_array($_POST['testimonial_status'])) {
	// Update testimonial status
	foreach ($_POST['testimonial_status'] as $testimonial_id => $testimonial_status) {
		$update[$testimonial_id]['testimonial_status'] = $testimonial_status;
	}
}
if (isset($_POST['testimonial_order']) && is_array($_POST['testimonial_order'])) {
	// Update testimonial order
	foreach ($_POST['testimonial_order'] as $key => $testimonial_id) {
		$update[$testimonial_id]['testimonial_order'] = $key+1;
	}
}
if (!empty($update) && is_array($update) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {
	// Put changes into the database
	$updated = false;
	foreach ($update as $testimonial_id => $array) {
		if ($GLOBALS['db']->update('CubeCart_Testimonials', $array, array('testimonial_id' => $testimonial_id), true)) $updated = true;
	}
	if ($updated) {
		$GLOBALS['main']->setACPNotify('Testimonial status and display order saved.');
	} else {
		$GLOBALS['main']->setACPWarning('No changes have been made to the testimonial status or display order.');
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
		// Display the add/edit testimonial page
		$GLOBALS['main']->addTabControl('General', 'testimonial_general', null, 'G');

		if (isset($_GET['testimonial_id']) && is_numeric($_GET['testimonial_id'])) {
			// Load from db, and assign
			if (($testimonial = $GLOBALS['db']->select('CubeCart_Testimonials', false, array('testimonial_id' => (int)$_GET['testimonial_id']))) !== false) {
				$testimonialData	= $testimonial[0];
				$GLOBALS['gui']->addBreadcrumb($testimonial[0]['customer_name']);
			}
		} 

		$testimonial_display_data = (isset($_POST['testimonial'])) ? $_POST['testimonial'] : (isset($testimonial[0])) ? $testimonial[0] : '';
		if (is_array($testimonial_display_data)) {
			foreach ($testimonial_display_data as $key => $value) {
				$testimonial_display_data[$key]	= htmlentities($value, ENT_COMPAT, 'UTF-8');
			}
			$GLOBALS['smarty']->assign('TESTIMONIAL', $testimonial_display_data);
		} 

		$GLOBALS['smarty']->assign('MODE_ADDEDIT', true);

	}
	// End Add/Edit Section

} else {
	
	// Start List Section
	$GLOBALS['main']->addTabControl('Testimonials', 'testimonials');
	$GLOBALS['main']->addTabControl('Add Testimonial', null, currentPage(null, array('action' => 'add')));
	if (($testimonials = $GLOBALS['db']->select('CubeCart_Testimonials', false, false, array('testimonial_order' => 'ASC'))) !== false) {
		$i = 1;
		foreach ($testimonials as $testimonial) {
			if ($testimonial['testimonial_order'] != $i) {
				// Automatically update the order
				$GLOBALS['db']->update('CubeCart_Testimonials', array('testimonial_order' => $i), array('testimonial_id' => $testimonial['testimonial_id']), true);
			}

			$testimonial['testimonial_date'] = formatTime($testimonial['testimonial_date'],false,true);

			$testimonial['edit']		= currentPage(null, array('action' => 'edit', 'testimonial_id' => $testimonial['testimonial_id']));
			$testimonial['delete']		= currentPage(null, array('delete' => $testimonial['testimonial_id']));
			$testimonial_list[]	= $testimonial;
			++$i;
		}
	}
	$GLOBALS['smarty']->assign('LIST_TESTIMONIALS', true);
	$GLOBALS['smarty']->assign('TESTIMONIALS', $testimonial_list);
	// End List Section

}
$page_content = $GLOBALS['smarty']->fetch('templates/testimonials.index.php');