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



  <script type="text/javascript">

  function loadCroppie(){
    $('#image-3').croppie('bind');
  }
  function setImage(){
    $('#image-3').croppie('result', {
      type: 'canvas',
      size: 'viewport',
      circle: false
    }).then(function (resp) {
      $('#wizardPicturePreview').attr('src', resp).fadeIn('slow');
      $('#imagebase64').val(resp);
      $("#closeModal").trigger('click');
    });

  }

  </script>

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

          <!--  Page content goes here!    -->

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Crop Image</h4>
                </div>
                <div class="modal-body">
                  <div class="image-wrapper">
                    <img id="image-3" src="">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="setImage();">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <button id="imageModal" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="visibility:hidden"></button>


          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">
                  <form action="#" method="POST" id="uploadForm">
                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="wizard-header">
                      <h3 class="wizard-title">
                        Register new applicant
                      </h3>
                      <h5>Provide applicant details below.</h5>
                    </div>
                    <div class="wizard-navigation">
                      <ul class="trackPage">
                        <li>
                          <a href="#personalInfo" data-toggle="tab">PERSONAL</a>
                        </li>
                        <li>
                          <a href="#addressDetails" data-toggle="tab">ADDRESS</a>
                        </li>
                        <li>
                          <a href="#paymentDetails" data-toggle="tab">PAYMENT</a>
                        </li>
                        <li>
                          <a href="#productDetails" data-toggle="tab">PRODUCT</a>
                        </li>
                        <li>
                          <a href="#bankDetails" data-toggle="tab">BANK</a>
                        </li><li>
                          <a href="#confirm" data-toggle="tab">CONFIRM</a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane" id="personalInfo">
                        <div class="row">
                          <h4 class="info-text"> Enter applicant's Basic information.</h4>
                          <div class="col-sm-4 col-sm-offset-1">
                            <div class="picture-container">
                              <div class="picture">
                                <img src="../../assets/images/faces/avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                <input name="userImage" type="file" id="wizard-picture" required onclick="$('#picError').fadeOut();">
                                <input type="hidden" id="imagebase64" name="imagebase64">
                              </div>
                              <h6>Choose Picture</h6>
                              <small id="picError" style="display:none; color:red;">Please select a profile picture!</small>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="material-icons">face</i>
                              </span>
                              <div class="form-group label-floating">
                                <label class="control-label">Name
                                  <small>(required)</small>
                                </label>
                                <input name="name" type="text" class="form-control" id="name" required>
                              </div>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="fas fa-user-clock fa-lg"></i>
                              </span>
                              <div class="form-group label-floating">
                                <label class="control-label">Age
                                  <small>(required)</small>
                                </label>
                                <input name="age" type="text" class="form-control" id="age" required>
                              </div>
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="fas fa-venus-mars fa-lg"></i>
                              </span>
                              <div class="row">
                                <div class="form-group label-floating" for="age">
                                  <div class="col-sm-4"><label>Gender
                                    <small>(required)</small>
                                  </label></div>
                                  <div class="col-sm-8">
                                    <input name="sex" type="radio"  value='male' checked/>&nbsp;Male &nbsp;&nbsp;&nbsp;
                                    <input name="sex" type="radio"   value='female'/>&nbsp;Female &nbsp;&nbsp;&nbsp;
                                    <input name="sex" type="radio"   value='other'/>&nbsp;Other</div>
                                  </div>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">&nbsp;
                                  <i class="fas fa-calendar-alt fa-lg"></i>
                                </span>
                                <div class="form-group label-floating" id='divdib' onclick="$('#dateError').css('color','black');">
                                  <label class="control-label" id="dateError">Date of Birth
                                    <small>(required)</small>
                                  </label>
                                  <input type="text" id="dob" required class="datepicker form-control" onkeydown="return false;" name="dob" onblur="$('#divdib').removeClass('is-empty');" />
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-10 col-lg-offset-1">

                              <div class="input-group">
                                <span class="input-group-addon">
                                  <input name="fh" type="radio" value='father' checked/>&nbsp;
                                  <i class="fas fa-user-alt fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Father's Name
                                    <small>(required)</small>
                                  </label>
                                  <input name="fname" type="text" class="form-control" id="fname" required>
                                </div>
                              </div><br>
                              <center><span><strong>OR</strong></span></center>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <input name="fh" type="radio" value='husband'/>&nbsp;
                                  <i class="fas fa-user-alt fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Husband's Name
                                    <small>(required)</small>
                                  </label>
                                  <input name="hname" type="text" class="form-control" id="hname" disabled required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="far fa-heart fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Relation with Applicant
                                    <small>(required)</small>
                                  </label>
                                  <input name="relation" type="text" class="form-control" id="relation" required>
                                </div>
                              </div>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fas fa-user-graduate fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Occupation of Applicant
                                    <small>(required)</small>
                                  </label>
                                  <input name="occupation" type="text" class="form-control" id="occupation" required>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="addressDetails">
                          <h4 class="info-text"> Enter address details. </h4>
                          <div class="row">
                            <div class="col-lg-10">
                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Mailing Address
                                      <small>(required)</small>
                                    </label>
                                    <input name="mailingAddress" type="text" class="form-control" id="mailingAddress" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-marked-alt fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Permanent Address
                                      <small>(required)</small>
                                    </label>
                                    <input name="permanentAddress" type="text" class="form-control" id="permanentAddress" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-marker fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Post Office
                                      <small>(required)</small>
                                    </label>
                                    <input name="PO" type="text" class="form-control" id="PO" required>
                                  </div>
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-marker fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Police Station
                                      <small>(required)</small>
                                    </label>
                                    <input name="PS" type="text" class="form-control" id="PS" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-marker-alt fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">District
                                      <small>(required)</small>
                                    </label>
                                    <input name="district" type="text" class="form-control" id="district" required>
                                  </div>
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-marker-alt fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">State
                                      <small>(required)</small>
                                    </label>
                                    <input name="state" type="text" class="form-control" id="state" required>
                                  </div>
                                </div>
                              </div>


                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-map-pin fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">PIN code/Ward No.
                                      <small>(required)</small>
                                    </label>
                                    <input name="pin" type="text" class="form-control" id="pin" required>
                                  </div>
                                </div>
                              </div>


                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-at fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">E-mail
                                      <small>(required)</small>
                                    </label>
                                    <input name="email" type="email" class="form-control" id="email" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-phone-volume fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Contact 1
                                      <small>(required)</small>
                                    </label>
                                    <input name="contact1" type="text" class="form-control" id="contact1" required>
                                  </div>
                                  <span class="input-group-addon">
                                    <i class="fas fa-phone-volume fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Contact 2
                                      <small>(required)</small>
                                    </label>
                                    <input name="contact2" type="text" class="form-control" id="contact2" required>
                                  </div>
                                </div>
                              </div>


                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-user fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Senior Name
                                      <small></small>
                                    </label>
                                    <input name="senior" type="text" class="form-control" id="senior" required>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="paymentDetails">
                          <div class="row">
                            <div class="col-sm-12">
                              <h4 class="info-text">Enter payment details. </h4>
                            </div>

                            <div class="col-lg-10 col-lg-offset-1">
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fas fa-rupee-sign fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Amount
                                    <small>(required)</small>
                                  </label>
                                  <input name="amount" type="text" class="form-control" id="amount" required>
                                </div>
                              </div>

                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fas fa-rupee-sign fa-lg"></i>
                                </span>
                                <div class="form-group label-floating">
                                  <label class="control-label">Amount(in words)
                                    <small>(required)</small>
                                  </label>
                                  <input name="amountwords" type="text" class="form-control" id="amountwords" required>
                                </div>
                              </div>

                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">record_voice_over</i>
                                </span>
                                <div class="row">
                                  <div class="form-group label-floating" for="age">
                                    <div class="col-sm-4"><label>Mode Of Payment
                                      <small>(required)</small>
                                    </label></div>
                                    <div class="col-sm-8">
                                      <input name="mop" type="radio"  value='cash' checked/>&nbsp;Cash &nbsp;&nbsp;&nbsp;
                                      <input name="mop" type="radio"   value='dd'/>&nbsp;Demand Draft &nbsp;&nbsp;&nbsp;
                                      <input name="mop" type="radio"   value='cheque'/>&nbsp;Cheque</div>
                                    </div>
                                  </div>
                                </div>

                                <div class="input-group">
                                  <span class="input-group-addon">&nbsp;
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating" id='divdib1' onclick="$('#dateError1').css('color','black');">
                                    <label class="control-label" id="dateError1">Receipt Date
                                      <small>(required)</small>
                                    </label>
                                    <input type="text" id="rDate" required class="datepicker form-control" onkeydown="return false;" name="rDate" onblur="$('#divdib1').removeClass('is-empty');" disabled/>
                                  </div>
                                </div>

                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-list-ol fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Demand Draft No.
                                      <small>(required)</small>
                                    </label>
                                    <input name="ddNo" type="text" class="form-control" id="ddNo" disabled required/>
                                  </div>
                                </div>

                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-id-badge fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">PAN Number
                                      <small>(required)</small>
                                    </label>
                                    <input name="pan" type="text" class="form-control" id="pan" required>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="productDetails">
                            <div class="row">
                              <div class="col-sm-12">
                                <h4 class="info-text"> Enter product details. </h4>
                              </div>
                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-burn fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Product
                                      <small>(required)</small>
                                    </label>
                                    <input name="product" type="text" class="form-control" id="product" required>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="tab-pane" id="bankDetails">
                            <div class="row">
                              <div class="col-sm-12">
                                <h4 class="info-text"> Enter Bank details. </h4>
                              </div>
                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-university fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Bank Name
                                      <small>(required)</small>
                                    </label>
                                    <input name="bankName" type="text" class="form-control" id="bankName" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-money-check fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Account No.
                                      <small>(required)</small>
                                    </label>
                                    <input name="accountNo" type="text" class="form-control" id="accountNo" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-money-check fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">IFSC
                                      <small>(required)</small>
                                    </label>
                                    <input name="ifsc" type="text" class="form-control" id="ifsc" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-10 col-lg-offset-1">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fas fa-money-check fa-lg"></i>
                                  </span>
                                  <div class="form-group label-floating">
                                    <label class="control-label">Maintained At
                                      <small>(required)</small>
                                    </label>
                                    <input name="maintainedAt" type="text" class="form-control" id="maintainedAt" required>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="confirm">
                            <div class="row">
                              <div class="col-sm-12">
                                <h4 class="info-text"> Confirm Details! </h4>
                              </div>
                              <div class="col-sm-12">
                                <center>
                                  <table style="width:90%;">
                                    <tr>
                                      <td style="width:20%"><label>Name:</label></td>
                                      <td style="width:50%"><input id="cname" type="text" name="cname" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                      <td rowspan="3" style="width:30%">
                                        <div class="picture">
                                          <img src="../../assets/images/faces/avatar.png" class="picture-src" id="confirmwizardPicturePreview" title="" />
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Age:</label></td>
                                      <td style="width:50%"><input id="cage" type="text" name="cage" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Gender:</label></td>
                                      <td style="width:50%"><input id="csex" type="text" name="csex" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Date Of Birth:</label></td>
                                      <td><input id="cdob" type="text" name="cdob" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label id="cfh"></label></td>
                                      <td><input id="cfhname" type="text" name="cfhname" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Relation of Applicant:</label></td>
                                      <td><input id="crelation" type="text" name="crelation"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Occupation of Applicant:</label></td>
                                      <td><input id="coccupation" type="text" name="coccupation" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Mailing Address:</label></td>
                                      <td><input id="cmailing" type="text" name="cmailing" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Permanent Address:</label></td>
                                      <td><input id="cpermanent" type="text" name="cpermanent"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Post Office:</label></td>
                                      <td><input id="cpo" type="text" name="cpo"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Police Station:</label></td>
                                      <td><input id="cps" type="text" name="cps" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>District:</label></td>
                                      <td><input id="cdistrict" type="text" name="cdistrict" value="" class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>State:</label></td>
                                      <td><input id="cstate" type="text" name="cstate"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>

                                    <tr>
                                      <td style="width:20%"><label>Pincode/Ward No:</label></td>
                                      <td><input id="cpin" type="text" name="cpin"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>E-mail:</label></td>
                                      <td><input id="cemail" type="text" name="cemail"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Contact 1:</label></td>
                                      <td><input id="cc1" type="text" name="cc1"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Contact 2:</label></td>
                                      <td><input id="cc2" type="text" name="cc2"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Senior Name:</label></td>
                                      <td><input id="csenior" type="text" name="csenior"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Amount:</label></td>
                                      <td><input id="camount" type="text" name="camount"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Mode of Payment:</label></td>
                                      <td><input id="cmop" type="text" name="cmop"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr id="rowdate">
                                      <td style="width:20%"><label>Reciept Date:</label></td>
                                      <td><input id="crdate" type="text" name="crdate"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr id="rowdd">
                                      <td style="width:20%"><label>Demand Draft No.:</label></td>
                                      <td><input id="cddno" type="text" name="cddno"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <td style="width:20%"><label>Pan No.:</label></td>
                                      <td><input id="cpan" type="text" name="cpan"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                    </tr>
                                    <tr>
                                      <tr>
                                        <td style="width:20%"><label>Product Details:</label></td>
                                        <td><input id="cproduct" type="text" name="cproduct"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                      </tr>
                                      <tr>
                                        <tr>
                                          <td style="width:20%"><label>Bank Name:</label></td>
                                          <td><input id="cbn" type="text" name="cbn"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                        </tr>
                                        <tr>
                                          <tr>
                                            <td style="width:20%"><label>Account No:</label></td>
                                            <td><input id="caccount" type="text" name="caccount"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                          </tr>
                                          <tr>
                                            <td style="width:20%"><label>IFSC:</label></td>
                                            <td><input id="cifsc" type="text" name="cifsc"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                          </tr>
                                          <tr>
                                            <td style="width:20%"><label>Maintained At:</label></td>
                                            <td><input id="cmaintained" type="text" name="cmaintained"  class="form-control" disabled  style="margin-bottom:20px;"></td>
                                          </tr>
                                          <tr>
                                          </table>
                                        </center>
                                      </div>

                                    </div>
                                  </div>


                                </div>
                                <div class="wizard-footer">
                                  <div class="pull-right">
                                    <input type='button' id="nextButton" class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' id="submitbtn" name='finish' value='Finish' />
                                  </div>
                                  <div class="pull-left">
                                    <input type='button' id="prevButton" class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                          </div>

                        </div>

                      </div>



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

            <script src="../../assets/dist/croppie.js" ></script>
            <link href="../../assets/dist/croppie.css" media="screen" rel="stylesheet" type="text/css">


            <script>

            $(document).ready(function() {

              demo.initFormExtendedDatetimepickers();
              demo.initMaterialWizard();

              $('#ephone').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#ephone').val().length >= 10)
                {
                  return false;
                }
              });

              $('#age').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#age').val().length >= 3)
                {
                  return false;
                }
              });

              $('#pin').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#pin').val().length >= 6)
                {
                  return false;
                }
              });

              $('#contact1').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#contact1').val().length >= 10)
                {
                  return false;
                }
              });

              $('#contact2').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#contact2').val().length >= 10)
                {
                  return false;
                }
              });
              $('#amountwords').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57){
                  return true;
                }
                else{
                  return false;
                }
              });

              $('#amount').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
                else if($('#amount').val().length >= 10)
                {
                  return false;
                }
              });

              $('#accountNo').keypress(function(key) {
                if(key.charCode < 48 || key.charCode > 57) return false;
              });
            });

            function copyAddress(checkbox){
              if(checkbox.checked == true){
                $("#permanentAddress").val($("#currentAddress").val());
              }
              else{
                $("#permanentAddress").val('');
              }
            }

            function confirmResult(){
              $("#confirmwizardPicturePreview").attr("src",$('#wizardPicturePreview').attr("src"));

              $("#cname").val($("#name").val());
              $("#cage").val($("#age").val());
              var sex=$('input[name="sex"]:checked').val();
              $("#csex").val(sex);
              $("#cdob").val($("#dob").val());
              var flag=$('input[name="fh"]:checked').val();
              if(flag=='father')
              {
                $("#cfh").html("Father Name");
                $("#cfhname").val($("#fname").val());

              }
              else
              {
                $("#cfh").html("Husband Name");
                $("#cfhname").val($("#hname").val());


              }
              $("#crelation").val($("#relation").val());
              $("#coccupation").val($("#occupation").val());


              $("#cmailing").val($("#mailingAddress").val());
              $("#cpermanent").val($("#permanentAddress").val());
              $("#cpo").val($("#PO").val());
              $("#cps").val($("#PS").val());
              $("#cdistrict").val($("#district").val());
              $("#cstate").val($("#state").val());
              $("#cpin").val($("#pin").val());
              $("#cemail").val($("#email").val());
              $("#cc1").val($("#contact1").val());
              $("#cc2").val($("#contact2").val());
              $("#csenior").val($("#senior").val());
              $("#camount").val($("#amount").val());
              var mop=$('input[name="mop"]:checked').val();
              $("#cmop").val(mop);
              if(mop=="cheque")
              {
                $('#rowdd').css('display','none');
              }
              else if(mop=="dd")
              {
                $('#rowdate').css('display','none');
              }
              else
              {
                $('#rowdate').css('display','none');
                $('#rowdd').css('display','none');
              }
              $("#crdate").val($("#rDate").val());
              $("#cddno").val($("#ddNo").val());
              $("#cpan").val($("#pan").val());
              $("#cproduct").val($("#product").val());
              $("#cbn").val($("#bankName").val());
              $("#caccount").val($("#accountNo").val());
              $("#cifsc").val($("#ifsc").val());
              $("#cmaintained").val($("#maintainedAt").val());

            }

            $(document).ready(function(){
              $('input[type=radio][name=mop]').change(function() {
                if (this.value == 'cheque')
                {
                  $('#rDate').prop('disabled',false);
                  $('#ddNo').prop('disabled',true);
                }
                else if (this.value == 'dd')
                {
                  $('#rDate').val("");
                  $('#ddNo').prop('disabled',false);
                  $('#rDate').prop('disabled',true);
                }
                else
                {
                  $('#rDate').val("");
                  $('#rDate').prop('disabled',true);
                  $('#ddNo').prop('disabled',true);
                }
              });

              $('input[type=radio][name=fh]').change(function() {
                if (this.value == 'father')
                {
                  $('#fname').prop('disabled',false);
                  $('#hname').val('');
                  $('#hname').prop('disabled',true);
                }
                else
                {
                  $('#hname').prop('disabled',false);
                  $('#fname').val('');

                  $('#fname').prop('disabled',true);
                }
              });
            });

            $(document).ready(function(){
              $("#uploadForm").on("submit", function(e){
                e.preventDefault();

                $.ajax({
                  url:"../php/insertData.php",
                  type:"POST",
                  data: new FormData(this),
                  contentType:false,
                  cache:false,
                  processData:false,
                  beforeSend:function()
                  {

                  },
                  success: function(response)
                  {
                    alert(response);

                  }
                });
              });
            });

            </script>


            </html>
