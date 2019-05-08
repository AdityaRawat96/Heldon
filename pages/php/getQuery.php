<?php
$rid = $_POST['rowId'];

include('connection.php');

$result= mysqli_query($con,"select * from Query where id='$rid'")
or die('Uppss.. an Error accured...(unable to process this request)<br>Reason : &nbsp;'. mysqli_error($con));

$row=mysqli_fetch_array($result);
$p2=$row['name'];
$p3=$row['email'];
$p4=$row['contact'];
$p5=$row['subject'];
$p6=$row['message'];
$p7=$row['status'];

?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".example-modal-lg" id="myButton" style="visibility:hidden;"></button>
<div class="modal fade example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><strong>QUERY DETAILS:</strong>&nbsp;Id:&nbsp;<?php echo $rid; ?></h4>
      </div>
      <div class="modal-body">
          <input type="text" id="email" value="<?php echo $p3; ?>" hidden>
          <input type="text" id="name" value="<?php echo $p2; ?>" hidden>

        <table style="width:80%;">
          <tr>
            <td align="left" style="width:18%;"><strong>QUERY SUBJECT:</strong></td>
            <td  align="left">&nbsp;<?php echo $p5; ?></td>
          </tr>
          <tr style="height:40px;">
            <td align="left" style="width:18%;"><strong>QUERY MESSAGE:&nbsp;</strong></td>
            <td style="text-align:left;">&nbsp;<?php echo $p6; ?></td>
          </tr>
           <tr><td></td><td></td></tr>
          <tr>
<!--            <td align="right"><strong>ENTER YOUR RESPONSE:&nbsp;</strong></td>-->
            <td colspan="2"><textarea rows="2" placeholder="Enter Your Response" style="width:100%;" id="responseArea"></textarea></td>
          </tr>
          <tr>
            <td><br></td>
            <td><br></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="responseSubmitted()">Submit Response</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
