<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Turbo - Bootstrap Material Admin Dashboard Template</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="../../assets/css/turbo.css" rel="stylesheet" />

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="../../assets/css/demo.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="../../assets/vendors/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

  <link href="../../assets/vendors/dropzone/dropzone.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="../../assets/css/hierarchy-view.css">
  <link rel="stylesheet" href="../../assets/css/main.css">


</head>

<body>
  <div class="wrapper">

    <!--  Sidebar included     -->
    <?php include('../pageElements/sidebar.php'); ?>

    <div class="main-panel">

      <!--  Navbar included     -->
      <?php include('../pageElements/navbar.php'); ?>

      <div class="content">
        <div class="container-fluid">
            
            <div  id="dataContainer">

            </div>

        <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      
                <?php
                    include('connection.php');
                    $result=mysqli_query($con,'select * from Query')or die(mysqli_error($con));
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            $id=$row['id'];
                            $name=$row['name'];
                            $email=$row['email'];
                            $contact=$row['contact'];
                            $subject=$row['subject'];
                            $message=$row['message'];
                            $status=$row['status'];
                            ?>
                                <tr><td><?php echo $id; ?></td><td><?php echo $name; ?></td><td><?php echo $email; ?></td><td><?php echo $contact; ?></td><td><?php echo $subject; ?></td><td><?php echo $message; ?></td><td><?php echo $status; ?></td><td><i class="material-icons" title="Add Response" style="cursor:pointer" onclick="addResponse('<?php echo $id; ?>')">add</i></td></tr>
                            <?php

                        }
                    }
                    else
                    {
                        
                    }
                ?>
            </tbody>
        </table>



        </div>
      </div>

      <!--  Footer included     -->
      <?php include('../pageElements/footer.php'); ?>

    </div>



  </div>


</body>
<!--   Core JS Files   -->
<script src="../../assets/vendors/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/vendors/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/vendors/material.min.js" type="text/javascript"></script>
<script src="../../assets/vendors/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/vendors/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/vendors/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/vendors/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/vendors/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/vendors/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/vendors/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/vendors/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/vendors/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="../../assets/vendors/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/vendors/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/vendors/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/vendors/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/vendors/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/vendors/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/turbo.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

<script src="../../assets/vendors/dropzone/dropzone.min.js"></script>
<script>
    function addResponse(id)
  {
    var rowId=id;
    $.ajax({
      type: 'post',
      url: '../php/getQuery.php',
      data: {
        rowId: rowId
      },
      success: function( data ) {
        
        $("#dataContainer").html(data);
        $("#myButton").trigger( "click" );
      }
    });
  }
    
    
function responseSubmitted(){
    if($('#responseArea').val()=="")
    {
      alert('Please enter any response');
      return false;
    }
    $.ajax({
      type: 'POST',
      url: '../php/sendMailQuery.php',
      data: {responseValue:$('#responseArea').val(),email:$('#email').val(),name:$('#name').val()},

      beforeSend: function() {

      },
      success: function(response) {
        if(response.match(/error/)){
         alert('Error in sending mail.Please try again later');
        }
        else{
          alert("Mail send successfully");
        }
      }
    });
  }
</script>
</html>