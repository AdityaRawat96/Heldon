<?php
include('connection.php');
$a=$_POST['responseValue'];
$name=$_POST['name'];
$email=$_POST['email'];

require("../php/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "wtsolutions.cc";

$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = "example@wtsolutions.cc";
$mail->Password = "Tiger@1995";

$mail->setFrom('example@wtsolutions.cc', 'Heldon');

$mail->addAddress($email, $name);
$mail->addReplyTo('example@wtsolutions.cc', 'Heldon');
$mail->isHTML(true);

$mail->Subject = 'Response to your Query';
$mail->Body    = '<html>
<body>
<h4>Dear '.$name.'<strong>,Thanku for sharing your concern with us.</strong>Response to your query is<br><br><strong>'.$a.'
</strong>
</h4>
<br>
This is a system generated email so do not reply.
</body>
</html>';

$mail->AltBody = 'Hi Thanks for contacting us we will reach out to you within 24 hours.';

if(!$mail->send()) {
  echo "error";
}
?>