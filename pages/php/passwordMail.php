<?php
include('connection.php');
//$a=$_POST['responseValue'];
$name=$_POST['name'];
$email=$_POST['email'];
// $name="krishna";
// $email="kb22880@gmail.com";
require("../php/class.phpmailer.php");
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$password=randomPassword();


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

$mail->Subject = 'Your Login Credentials | Heldon';
$mail->Body    = '<html>
<body>
<h4>Dear '.$name.'&nbsp;&nbsp;<strong>thanks for connecting with us.</strong><br>Your password is<br><br><strong>'.$password.'<br><strong>Your username is same as your email</strong>
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
