<?php
	$from = $_REQUEST['From'];
	$redirect = $_REQUEST['redirect'];
	if (isset($_REQUEST['invert']))
		$invert=true;
	else
		$invert=false;
	$area_code = substr($from, 2,3);
	$blocked = $_REQUEST['block'];
	$blocked_arr = explode(",", $blocked);
	header('Content-Type: application/xml');
	if ( (!$invert && in_array($area_code, $blocked_arr)) || ($invert && !in_array($area_code, $blocked_arr)) ) {
	    echo "<Response reason=\"busy\"><Reject/></Response>";
	} else {
    echo "<Response><Redirect>" . $redirect . "</Redirect></Response>";
	}
?>