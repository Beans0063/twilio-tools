<?php
header('Content-Type: application/xml');
?>
<Response>
  <Sms to="<?=$_REQUEST['PhoneNumber']?>">
<?=htmlspecialchars(substr($_REQUEST['From'] . ": " . $_REQUEST['Body'], 0, 147))?>
  </Sms>
</Response>