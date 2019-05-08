<?php
$id=$_POST['Id'];
$value=$_POST['val'];
include('../php/connection.php');
$result=mysqli_query($con,"update users set paymentStatus='$value' where Id='$id'")or die(mysqli_error($con));
if($result)
{
    echo "success";
}
?>