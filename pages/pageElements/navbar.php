<html>

    <head>
         <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <link rel="stylesheet" href="../../assets/css/style.css">
    </head>
<nav class="navbar navbar-default navbar-absolute" data-topbar-color="yellow">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
  <i class="material-icons visible-on-sidebar-regular f-26">keyboard_arrow_left</i>
                <i class="material-icons visible-on-sidebar-mini f-26">keyboard_arrow_right</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Dashboard </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

               <li onclick="logout();">
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-power-off fa-2x"></i>
                      <p class="hidden-lg hidden-md">Log Out</p>
                    </a>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
        </div>
    </div>
</nav>
</body>
<script>
    function logout(){


  swal({
    title: 'Are you sure?',
    text: 'You want to logout!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
    confirmButtonClass: "btn btn-success",
    cancelButtonClass: "btn btn-danger",
    buttonsStyling: false
  }).then(function() {
        window.open("../php/cookiesunset.php", "_self");
  }, function(dismiss) {
    if (dismiss === 'cancel') {

    }
  });
}
</script>
</html>
