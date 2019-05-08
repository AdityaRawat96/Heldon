<?php
if(session_id()=='')
{
  session_start();  
}
$user=$_SESSION['id'];
include('../php/connection.php');
$result=mysqli_query($con,"select * from users where Id='$user'")or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row['hierarchy']=='1')
{
?>

<div class="sidebar" data-background-color="gray">
    <div class="logo">
        <a href="#" class="simple-text">
          <img src="../../assets/images/favicon.png" alt="" style="height:40px; width:40px;">&nbsp; Heldon
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            <img src="../../assets/images/logo.png" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="../dashboard/dashboard.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li>
                <a href="../addMember/addEmployee.php">
                    <i class="material-icons">account_circle</i>
                    <p>Add Applicant</p>
                </a>
            </li>

            <li>
                <a href="../paymentUpdate/updateStatus.php">
                    <i class="material-icons">update</i>
                    <p>Update Payment</p>
                </a>
            </li>
            <li>
                <a href="../php/viewQuery.php">
                    <i class="material-icons">update</i>
                    <p>View Query</p>
                </a>
            </li>
        </ul>

    </div>
</div>
<?php
}
else
{
    ?>
<div class="sidebar" data-background-color="gray">
    <div class="logo">
        <a href="#" class="simple-text">
          <img src="../../assets/images/favicon.png" alt="" style="height:40px; width:40px;">&nbsp; Heldon
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            <img src="../../assets/images/logo.png" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="../dashboard/dashboard.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li>
                <a href="../addMember/addEmployee.php">
                    <i class="material-icons">account_circle</i>
                    <p>Add Applicant</p>
                </a>
            </li>

            <li>
                <a href="../paymentUpdate/updateStatus.php">
                    <i class="material-icons">update</i>
                    <p>Update Payment</p>
                </a>
            </li>
        </ul>

    </div>
</div>
<?php
}
    ?>

