<?php
header('Content-Type: text/html');
?>
<Response>
  <Sms to="<?=$_REQUEST['PhoneNumber']?>">
<?=htmlspecialchars(substr($_REQUEST['From'] . ": " . $_REQUEST['Body'], 0, 160))?>
  </Sms>
</Response>