<?php
// Here we get all the information from the fields sent over by the form.
$id = $_POST['id'];

include('connection.php');
$sql="select * from users where Id = '$id'";
$result = mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result))
{
$p0=$row["Id"];
$p1=$row["name"];
$p2=$row["paymentStatus"];
$p3=$row['image'];

echo '<div class="person" onclick="searchChildren('.$p0.')";><img src='.$p3.' alt=""><p class="name">'.$p1.'<span class="status'.$p2.'">&nbsp;<i class="fas fa-circle"></i></span></p></div>';

}

?>
