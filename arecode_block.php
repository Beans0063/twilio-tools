<?php
	$from = $_REQUEST['From'];
	$redirect = $_REQUEST['redirect'];
	$area_code = substr($from, 2,3);
	$blocked = $_REQUEST['block'];
	$blocked_arr = explode(",", $blocked);
	header('Content-Type: application/xml');
	if (in_array($area_code, $blocked_arr)) {
	    echo "<Response><Reject/></Response>";
	} else {
    echo "<Response><Redirect>" . $redirect . "</Redirect></Response>";
	}
?>