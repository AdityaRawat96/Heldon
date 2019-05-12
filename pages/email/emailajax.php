<?php
session_start();
$uname=$_POST['Username'];
$password=$_POST['Password'];

include('../php/connection.php');
$result=mysqli_query($con,"update userinfo set password='$password' where email='$uname'") or die(mysqli_error($con));
if($result)
{
   
}
else
{
    echo "failure";
}

?>