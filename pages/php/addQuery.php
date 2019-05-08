<?php
include('connection.php');
$name=$_POST['Name'];
$email=$_POST['Email'];
$contact=$_POST['Contact'];
$subject=$_POST['Subject'];
$message=$_POST['Message'];

$result=mysqli_query($con,"insert into Query(name,email,contact,subject,message,status) values('$name','$email','$contact','$subject','$message','notresponded')");
if($result)
    echo 'success';
?>