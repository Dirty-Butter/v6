<?php
//SemperFi Hack from http://www.cubecartforums.org/index.php?showtopic=17937 STOP HACKERS
if(preg_match("/[a-z]/i", $_POST['phone'])) {
            $GLOBALS['gui']->setError($GLOBALS['language']->account['error_valid_phone']);
            $error['phone'] = true;
        }
        if($_POST['phone']=="123456") {
            $GLOBALS['gui']->setError($GLOBALS['language']->account['error_valid_phone']);
            $error['phone'] = true;
        }
        if(!empty($_POST['mobile']) && preg_match("/[a-z]/i", $_POST['mobile'])) {
            $GLOBALS['gui']->setError($GLOBALS['language']->account['error_valid_mobile_phone']);
            $error['phone'] = true;
        }

		if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
			$GLOBALS['gui']->setError($GLOBALS['language']->account['error_name_required']);
			$error['name'] = true;
		}

//SemperFi Hack from http://www.cubecartforums.org/index.php?showtopic=17937 STOP HACKERS
  if ($_POST['first_name']==$_POST['last_name']) {
           $GLOBALS['gui']->setError($GLOBALS['language']->account['error_names_same']);
            $error['names'] = true;
      }

//end SemperFi STOP HACKERS
?>