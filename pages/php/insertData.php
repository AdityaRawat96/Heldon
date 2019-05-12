<?php
session_start();
//echo $name;
//echo $sex;echo $age;echo $dob;echo $fh;echo $nomineeName;echo $nomineeID;echo $relation;echo $occupation;echo $mailingAddress;echo $permanentAddress;echo $postOffice;echo $policeStation;echo $district;echo $state;echo $pin;echo $email;echo $contact1;echo $contact2;echo $amount;echo $mop;echo $rDate;echo $ddNo;echo $pan;echo $productDetails;echo $bankName;echo $accountNo;echo $ifsc;echo $maintainedAt;

include('connection.php');
require("../php/class.phpmailer.php");
$name=$_POST['name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$dob=$_POST['dob'];
$fh=$_POST['fh'];
//$nomineeID=$_POST['nomineeID'];
if(strcmp($fh,'father')==0)
{
  $fathername=$_POST['fname'];
  $husbandname="";
}
else
{
  $fathername="";
  $husbandname=$_POST['hname'];

}
$relation=$_POST['relation'];
$occupation=$_POST['occupation'];
$mailingAddress=$_POST['mailingAddress'];
$permanentAddress=$_POST['permanentAddress'];
$postOffice=$_POST['PO'];
$policeStation=$_POST['PS'];
$district=$_POST['district'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$email=$_POST['email'];
$senior=$_POST['senior'];
$contact1=$_POST['contact1'];
$contact2=$_POST['contact2'];
$amount=$_POST['amount'];
$mop=$_POST['mop'];
if($mop=='cash')
{
  $rDate="";
  $ddNo="";
}
else if($mop=='dd')
{
  $ddNo=$_POST['ddNo'];
  $rDate="";

}
else
{
  $rDate=$_POST['rDate'];
  $ddNo="";

}
$pan=$_POST['pan'];
$productDetails=$_POST['product'];
$bankName=$_POST['bankName'];
$accountNo=$_POST['accountNo'];
$ifsc=$_POST['ifsc'];
$maintainedAt=$_POST['maintainedAt'];
date_default_timezone_set("Asia/Calcutta");
$date=date("y-m-d");
$nomineeID=$_SESSION['id'];
$generator = "1abcd3efgh5yz7ijkl90mnop24qrst6uvwx8";


$res = "";

for ($i = 1; $i <= 8; $i++) {
  $res .= substr($generator, (rand()%(strlen($generator))), 1);
}
$password=$res;

$sql="select * from users where Id='$nomineeID'";

$result=mysqli_query($con,$sql) or die(mysqli_error($con));
//$result=($con,"select * from userinfo where Id='$nomineeID'")or die(mysqli_error($con));

if(mysqli_num_rows($result)>0)
{
  $row=mysqli_fetch_array($result);
  $nomineeEmployeeAdded=$row['noOfEmployeeAdded']+1;
  $hierarchy=$row['hierarchy']+1;
  $nomineeName=$row['name'];
  $generator = "9870634521";
  $adder = "";

  for ($i = 1; $i <= 3; $i++) {
    $adder .= substr($generator, (rand()%(strlen($generator))), 1);
  }

  if(isset($_POST['imagebase64'])){
    $data = $_POST['imagebase64'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    $path='../../assets/userImages/'.$contact1.$adder.'.png';
    file_put_contents($path, $data);
    $sql="INSERT INTO userinfo(noOfEmployeeAdded,password, age, sex, dateOfBirth, fatherName, husbandName, nomineeName, relationOfApplicant, occupation, mailingAddresss, permanentAddress, postOffice, policeStation, district, pincode, state, mobile1, mobile2, email,seniorName, amount, modeOfPayment, receiptDate, ddNo, PAN, productDetails, bankName, accountNo, IFSC, maintainedAt, dateOfFilling) VALUES ('0','$password','$age','$sex','$dob','$fathername','$husbandname','$nomineeName','$relation','$occupation','$mailingAddress','$permanentAddress','$postOffice','$policeStation','$district','$pin','$state','$contact1','$contact2','$email','$senior','$amount','$mop','$rDate','$ddNo','$pan','$productDetails','$bankName','$accountNo','$ifsc','$maintainedAt','$date')";

    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    if($result)
    {
      $result1=mysqli_query($con,"insert into users(name,referencedId,paymentStatus,hierarchy,image) values('$name','$nomineeID','0','$hierarchy','$path')") or die (mysqli_query($con));
      $result2=mysqli_query($con,"update userinfo set noOfEmployeeAdded = '$nomineeEmployeeAdded' where Id='$nomineeID'") or die(mysqli_error($con));
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
        echo "error ocuured!";
      }
      else{
        echo "data entered successfully";
      }
    }
    else
    {
      echo "employee addition failed";
    }
  }
}
else
{
  echo "Nominee Id Is not correct";
}

?>
