<?php
session_start();
$myObj = new stdClass();
$id = $_POST['id'];
$numberOfChildren=0;
$children = [];
$data = '';

include('connection.php');
$sql="select * from users where referenceId='$id'";
$result = mysqli_query($con,$sql);
$numberOfChildren = mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{

$p0=$row["id"];
$p1=$row["name"];
$p2=$row["status"];
$children[]=$p0;
$data = $data.'<div class="hv-item-child" id="child'.$p0.'" ><div class="person" onclick="showChildren('.$p0.');"><img src="https://randomuser.me/api/portraits/women/68.jpg" alt=""><p class="name">'.$p1.' <span class="status'.$p2.'">&nbsp;<i class="fas fa-circle"></i></span></p></div></div>';

}
$myObj->numChildren = $numberOfChildren;
$myObj->children = $children;
$myObj->data = $data;
$myJSON = json_encode($myObj);

echo $myJSON;

?>
