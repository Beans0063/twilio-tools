<?php
if (isset($_REQUEST['Body']))
	$body = $_REQUEST['Body'];
else
	$body = "";

if (isset($_REQUEST['default']))
    $default = $_REQUEST['default'];
else
    $default = "Keyword not found";

if (isset($_REQUEST[$body]))
    $reply = $_REQUEST[$body];
else if (isset($_REQUEST[strtolower($body)]))
  $reply = $_REQUEST[strtolower($body)];
else if (isset($_REQUEST[strtoupper($body)]))
  $reply = $_REQUEST[strtoupper($body)];
else
    $reply = $default;

$chunks = explode("||||",wordwrap($reply,155,"||||"));
$total = count($chunks);

header('Content-Type: application/xml');
echo "<Response>";
foreach($chunks as $page => $chunk){
		echo "<Sms>";
	  if ($total > 1)
			echo sprintf("(%d/%d) ",$page+1,$total);
	  echo $chunk;
		echo "</Sms>";
	}
echo "</Response>";
?>