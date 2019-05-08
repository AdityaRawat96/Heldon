<html>
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
<style>
* {
  box-sizing: border-box;
}

li
{
	display:none;
}

#myInput {
  background-image: url('../../assets/images/searchIcon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>
    
</head>
<body onload="myAJAXFunction();">   
    <div class="wrapper">

    <!--  Sidebar included     -->
    <?php include('../pageElements/sidebar.php'); ?>

    <div class="main-panel">

      <!--  Navbar included     -->
      <?php include('../pageElements/navbar.php'); ?>

      <div class="content">
        
          <div class="container-fluid">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" autocomplete="off">
                <ul id="myUL">
  
                </ul>
              <div class="row" id="optionRow" style="display:none;">
                  <button id="closingBtn" class="close" onclick="closingButton();"><i class="material-icons" style="color:black;font-size:20px;margin-right:20px;">cancel</i></button>
              <div id="updateDiv" class="col-md-10">
              <button id="ref" class="ref btn btn-primary" onclick="btnClick();">Update Payment Status of Applicant</button>
                <div id="paymentStatus">
                    <label>Current Payment Status</label>
                    <select id="mySelect">
                        <option value="1">Paid</option>
                        <option value="0">Unpaid</option>
                    </select>
                    <button onclick="changeFunction();" class="btn btn-success">Change</button>
                </div>
              </div>
            <div id="viewInfo" class="col-md-2" style="display:none;">
              <button class="btn btn-primary" id="viewInfoBtn" onclick="infoFunction();" style="margin-top:-10px;">View Info</button>
              </div>
             </div>
            <section class="management-hierarchy" id="sec" style="position:relative; min-height:750px;display:none;">
              <div class="hv-container">
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
              
        <section id="infoPage" style="position:relative; min-height:750px;display:none;">
            <?php
                include('../php/secondsection.php');
            ?>
        </section>
              
          </div>
          
        </div>
        
        <?php include('../pageElements/footer.php'); ?>
        
        </div>
    
    </div>



<script>
function myFunction() {
	if(document.getElementById("myInput").value=='')
    {
    	document.getElementById("myUL").style.display="none";
    }
    else
    {
    document.getElementById("myUL").style.display="block";
    var input, filter, ul, li, a, i, txtValue,testValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        testValue= txtValue.toUpperCase().substring(0,input.value.length);
        if ((filter).localeCompare(testValue)==0) {
            li[i].style.display = "block";
        }
        else {
            li[i].style.display = "none";
        }
    }
    }
}
</script>

</body>
    
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
      //alert(response);
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
    
    <script>
        var requser="";
         $(document).ready(function(){
               $("#down").hide();

            });
        function myAJAXFunction()
        {
            
            $.ajax({
                    type: 'POST',
                    url: 'getData.php',
                    data: { Username:$('#user').val()},

                        beforeSend: function() {

                    },
                success: function(response) {
                    $('#myUL').html(response);
                }
                });
            
        }
        
        function update(id)
        {
            
            searchParent(id);
            requser=id;
            $('#myUL').css('display','none');
            $('#sec').css('display','block');
            $('#ref').attr('id',id);
            $('#optionRow').css('display','block');
            $('#viewInfo').css('display','block');
            $('#paymentStatus').css('display','none');
        }
        
        function btnClick()
        {
            if($("#paymentStatus").is(":visible"))
                {
                    $('#paymentStatus').slideUp();
                }
            else{
                 $('#paymentStatus').slideDown();
                 var aid=$('.ref').attr('id');
             $.ajax({
                    type: 'POST',
                    url: 'payment.php',
                    data: { ID:aid},

                        beforeSend: function() {

                    },
                success: function(response) {
                    if(response.match(/0/))
                        {
                            $( "#mySelect" ).val("0");
                        }
                    else
                    {
                        $( "#mySelect" ).val("1");
                    }
                }
                });
            }
           
        }
        
        function changeFunction()
        {
            var aid=$('.ref').attr('id');
            $.ajax({
                    type: 'POST',
                    url: 'updatePaymentStatus.php',
                    data: { Id:aid,val:$("#mySelect").val()},

                        beforeSend: function() {

                    },
                success: function(response) {
                    if(response.match(/success/))
                        {
                            alert("Payment Status Sucessfully changed");
                            $('#paymentStatus').css('display','block');
                            update(aid);
                        }
                    else{
                        alert('Updation Failed');
                    }
                }
                });
            
        }
        
        function closingButton()
        {
            $('#optionRow').slideUp();
            $('#paymentStatus').css('display','none');
        }
        
        function infoFunction()
        {
            var aid=$('.ref').attr('id');
            if($('#viewInfoBtn').text()=="View Info")
            {
                $('#viewInfoBtn').text("Show Chart");
                $('#sec').css('display','none');
                $('#infoPage').css('display','block');
                $.ajax({
                    type: 'POST',
                    url: '../php/getEmployeeInfo.php',
                    data: { Id:aid},

                        beforeSend: function() {

                    },
                success: function(response) {
                    alert(response);
                    $('#name').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#email').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#gender').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#contact').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#dob').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#occupation').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    
                    $('#mailingAddress').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#permanentAddress').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#pin').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#district').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    $('#state').val(response.substring(0,response.indexOf('=')));
                    response=response.substring(response.indexOf('=')+1);
                    
                }
                });
            }
            else
            {
                $('#viewInfoBtn').text("View Info");
                $('#infoPage').css('display','none');
                $('#sec').css('display','block');     
            }
        }
        
        
        function advanceDetails()
        {
          if($('#show').text()=='Advance Details')
          {      
            $('#show').text("Show Less");
            $("#down").slideDown();
          }
          else
          {
            $('#show').text("Advance Details");
            $("#down").slideUp();
          }

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