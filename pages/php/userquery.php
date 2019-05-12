<?php
include('connection.php');
//$sql="update Query set email='tmohit800@gmail.com' where ";
//$result=mysqli_query($con,$sql)or die(mysqli_error($con));


$sql = "SHOW COLUMNS FROM users";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
    echo $row['Field']."<br>";
}

?>
