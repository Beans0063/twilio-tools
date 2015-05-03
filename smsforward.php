<?php
	header('Content-Type: application/xml');

	echo "<Response>";

	if (is_array ($_REQUEST['PhoneNumber'])){
		$forward_to = $_REQUEST['PhoneNumber'];
	} else {
		$forward_to = array($_REQUEST['PhoneNumber']);
	}

	foreach($forward_to as $number)
	{
		echo "<Message to=\"". $number . "\">";
		echo $_REQUEST['From'] . ": ";
		echo $_REQUEST['Body'];
		echo "</Message>";
	}
	echo "</Response>";
?>
