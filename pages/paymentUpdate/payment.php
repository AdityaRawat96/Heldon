<?php
$id=$_POST['ID'];
include('../php/connection.php');
$result=mysqli_query($con,"select paymentStatus from users where Id='$id'")or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
echo $row['paymentStatus'];
?>