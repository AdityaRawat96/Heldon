<?php
session_start();
error_reporting(0);
if(isset($_SESSION['id']))
{
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Turbo - Bootstrap Material Admin Dashboard Template</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0' name='viewport' />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/turbo.css" rel="stylesheet" />
    <!--Scroll Animations-->
    <link rel="../../stylesheet" href="assets/plugins/waypoints/animate.css">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/vendors/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <link href="../../assets/vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/css/hierarchy-view.css">
    <link rel="stylesheet" href="../../assets/css/main.css">

    <script type="text/javascript">
    $(document).ready(function(){
      $(document).ajaxComplete(function () {
            $('.loader').fadeOut();
       });
      $(".hv-container").perfectScrollbar();
    });

    </script>

  </head>

  <body onload="searchParent(<?php echo $_SESSION['id'] ?>);">

    <div class="loader" style="z-index:300; position:fixed; height:100%; width:100%; background-color:black; opacity: 0.8; padding-top:45vh;">
      <center>
        <img src="../../assets/images/preloader.svg" style="position:relative; height:50px; width:50px;">
      </center>
    </div>

    <div class="wrapper">

      <!--  Sidebar included     -->
      <?php include('../pageElements/sidebar.php'); ?>

      <div class="main-panel">

        <!--  Navbar included     -->
        <?php include('../pageElements/navbar.php'); ?>

        <div class="content">
          <div class="container-fluid">

            <!--  Page content goes here!    -->
            <section class="management-hierarchy" style="position:relative; min-height:750px;overflow:hidden;">
              <h1 style="font-size:20px;"> Management Hierarchy</h1>

              <div class="hv-container" style="position: relative; width:100%;">

                <div class="hv-wrapper">

                  <!-- Key component -->
                  <div class="hv-item">
                    <div class="hv-item-parent" id="mainParent">

                    </div>

                    <div class="hv-item-children" id="mainChildren">


                    </div>
                  </div>
                </div>
              </div>
            </section>
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

  <script type="text/javascript">
  var currentId;
  var myObj;
  function searchParent(id){
    $.ajax({
      type: 'POST',
      url: '../php/searchParent.php',
      data: { id : id },

      success: function(response) {
        $("#mainParent").html(response);
        searchChildren(id);
      }
    });
  }
  function searchChildren(id){
    $.ajax({
      type: 'POST',
      url: '../php/searchChildren.php',
      data: { id : id },

      success: function(response) {
        myObj = JSON.parse(response);
        $("#mainChildren").html(myObj.data);
        $('.hv-container').perfectScrollbar('update');
      }
    });
  }
  function showChildren(id){
    currentId = id;
    var array = myObj.children;
    var arrayLength=array.length;
    for(var i=0;i<arrayLength;i++){
      if(id!=array[i]){
        hideChildren(array[i]);
      }
    }
    showAllChildren(id);
  }

  function showAllChildren(id){
    var name = "child"+id;
    var parent = $("#"+name+"").html();
    var value = $("#"+name+"").val();
    $.ajax({
      type: 'POST',
      url: '../php/searchChildren.php',
      data: { id : id },

      success: function(response) {
        myObj = JSON.parse(response);
        if(value == 1){
          var name = "child"+id;
          var name1 = "parent"+id;
          var parent = $("#"+name1+"").html();
          $("#"+name+"").html('<div class="hv-item"><div class="hv-item-parent" id="parent'+id+'">'+parent+'</div><div class="hv-item-children">'+myObj.data+'</div></div>');
        }
        else{
          var name = "child"+id;
          var parent = $("#"+name+"").html();
          $("#"+name+"").html('<div class="hv-item"><div class="hv-item-parent" id="parent'+id+'">'+parent+'</div><div class="hv-item-children">'+myObj.data+'</div></div>');
          $("#"+name+"").val("1");
        }
        $('.hv-container').perfectScrollbar('update');
      }
    });
  }

  function hideChildren(child){
    var name = "child"+child;
    var current = "child"+currentId;
    $("#"+name+"").css("display", "none");
    $("#"+current+"").addClass("mainHide");
  }

</script>

<style media="screen">
.mainHide::after{
  visibility: hidden;
}

.status0{
  color: red;
}

.status1{
  color: green;
}
</style>
</html>
<?php
}
else
{
  ?>
  <script>window.open('../php/cookiesunset.php','_self');</script>
  <?php
}
