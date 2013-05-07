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

header('Content-Type: application/xml');
?>
<Response>
  <Sms><?php echo htmlspecialchars(substr($reply, 0, 160))?></Sms>
</Response>