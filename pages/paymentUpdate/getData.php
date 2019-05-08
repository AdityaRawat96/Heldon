<?php
session_start();
$user=$_SESSION['id'];
showData($user);
?>


<?php
function showData($id)
{
include('../php/connection.php');
$result=mysqli_query($con,"select * from users where referencedId='$id'");
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        $newid=$row['Id'];
        
        showData($newid);
        ?>
            <li onclick="+<?php echo $_SESSION['lookingFor']=$row['Id']; ?>+update(<?php echo $row['Id'];?>);"><a href="#"><?php echo $row['name']; ?></a></li>
    <?php
    }
} 
}

?>

    
