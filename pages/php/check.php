<?php
session_unset();
session_destroy();
session_start();
$a=$_POST['Username'];
$b=$_POST['Password'];
$c=$_POST['Remember'];
session_start();
$_SESSION["id"] = "";
$counter=0;
include('connection.php');
$result= mysqli_query($con,"select * from userinfo where email='$a' or mobile1='$a' or mobile2='$a'")
or die('Uppss.. an Error accured...(unable to process this request)<br>Reason : &nbsp;'. mysqli_error($con));

if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_array($result))
  {
    $password=$row['password'];
    if(strcmp($b,$password)==0)
    {
        $id=$row['Id'];
        if($c=='1')
        {
            $exp=time()+31536000;
            setcookie("heldonid",$id,$exp,'/');
        }

        $_SESSION["id"]= $id;
        echo 'confirm';
    }
    else{
      echo 'failed'
    }
  }
}

?>
