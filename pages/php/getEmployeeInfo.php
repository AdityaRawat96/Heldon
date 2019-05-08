<?php
$a=$_POST['Id'];
session_start();

include('connection.php');
$result= mysqli_query($con,"select userinfo.*, users.* from userinfo INNER JOIN users on userinfo.Id=users.Id where users.Id='$a'")
or die('Uppss.. an Error accured...(unable to process this request)<br>Reason : &nbsp;'. mysqli_error($con));

if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_array($result);
    echo $row['name'].'='.$row['email'].'='.$row['sex'].'='.$row['mobile1'].'='.$row['dateOfBirth'].'='.$row['occupation'].'='.$row['mailingAddresss'].'='.$row['permanentAddress'].'='.$row['pincode'].'='.$row['district'].'='.$row['state'].'=';
}

?>
