<?php

$sendgrid = new SendGrid($_ENV["SENDGRID_USERNAME"], $_ENV["SENDGRID_PASSWORD"]);
$to = $_REQUEST['Email'];
$subject = "SMS from " . $_REQUEST['From'] . " to " . $_REQUEST['To'];
$body = $_REQUEST['Body'];
$mail = new SendGrid\Mail();
$mail->
   addTo($to)->
   setFrom('app11445063@heroku.com')->
   setSubject($subject)->
   setText($body)->
   setHtml($body);

$sendgrid->
  smtp->
   send($mail);

header('Content-Type: application/xml');
echo "<Response/>";
?>
