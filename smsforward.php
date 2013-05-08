<?php
$chunks = explode("||||",wordwrap($_REQUEST['Body'],141,"||||"));
$total = count($chunks);

header('Content-Type: application/xml');
echo "<Response>";
	foreach($chunks as $page => $chunk)
	{
		echo "<Sms to=\"". $_REQUEST['PhoneNumber'] . "\">";
		echo $_REQUEST['From'] . ": ";
	  if ($total > 1)
			echo sprintf("(%d/%d) ",$page+1,$total);
	  echo $chunk;
		echo "</Sms>";
	}
echo "</Response>";
	?>
