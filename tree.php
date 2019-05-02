<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hierarchy view component</title>

    <link rel="stylesheet" href="css/hierarchy-view.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>

</head>

<body onload="searchParent(<?php echo $_SESSION['id'] ?>);">

    <!--Management Hierarchy-->
    <section class="management-hierarchy">
        <a href="https://github.com/zikosichi/hierarchi-view" target="_blank" class="github-badge">
            <img src="images/github-blue.svg">
        </a>
        <h1> 1. Management Hierarchy</h1>
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

</body>
<script type="text/javascript">
var currentId;
var myObj;
function searchParent(id){
  $.ajax({
    type: 'POST',
    url: 'searchParent.php',
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
    url: 'searchChildren.php',
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
    url: 'searchChildren.php',
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
