$('#queryemail').keypress(function(key) {
  $('#emailError').fadeOut(500);
});

$('#queryname').keypress(function(key) {
  $('#nameError').fadeOut(500);
});

$('#querysubject').keypress(function(key) {
  $('#subjectError').fadeOut(500);
});

$('#querymessage').keypress(function(key) {
  $('#messageError').fadeOut(500);
});

// $('#querycontact').keypress(function(key) {
//   $('#contactError').fadeOut(500);
//   if(key.charCode < 48 || key.charCode > 57) return false;
//   else if($('#querycontact').val().length >= 10)
//   {
//     return false;
//   }
// });

function loginFunction()
{
  var rem="";
  if($('#remember').is(":checked")){
    rem="1";
  }
  else{
    rem="0";
  }

  $.ajax({
    type: 'POST',
    url: 'pages/php/check.php',
    data: { Username:$('#user').val(),Password:$('#pwd').val(),Remember:rem},

    beforeSend: function() {
    },
    success: function(response) {
      if(response.match(/confirm/))
      {
        window.open('pages/dashboard/dashboard.php','_self');
      }
      else{
        $("#loginError").css('display','block');
      }
    }
  });
}



function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}


function queryInput()
{
  if($('#queryname').val()!='')
  {
    if($('#queryemail').val()!=''&&validateEmail($('#queryemail').val()))
    {
      if($('#querycontact').val()!=''&&$('#querycontact').val().length=='10')
      {
        if($('#querysubject').val()!='')
        {
          if($('#querymessage').val()!='')
          {
            $.ajax({
              type: 'POST',
              url: 'pages/php/addQuery.php',
              data: { Name:$('#queryname').val(),Email:$('#queryemail').val(),Contact:$('#querycontact').val(),Subject:$('#querysubject').val(),Message:$('#querymessage').val()},

              beforeSend: function() {
              },
              success: function(response) {
                if(response.match(/success/))
                {
                  alert('Query Successfully Placed');
                }
                else
                {
                  alert('Not able to place your Query at the moment.Please try again later.Sorry for inconvinience');
                }
              }
            });
          }
          else
          {
            $('#querymessage').focus();
            $('#messageError').css('display','block');
          }
        }
        else
        {
          $('#querysubject').focus();
          $('#subjectError').css('display','block');
        }
      }
      else
      {
        $('#querycontact').focus();
        $('#contactError').css('display','block');
      }
    }
    else
    {
      $('#queryemail').focus();
      $('#emailError').css('visibility','visible');
      $('#emailError').css('display','block');
    }
  }
  else
  {
    $('#queryname').focus();
    $('#emailError').css('display','block');
    $('#emailError').css('visibility','hidden');
    $('#nameError').css('display','block');
  }
}
