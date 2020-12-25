<!DOCTYPE html >
<html>
<head>
<title>Wing the Air</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false" style="background-color: #abcdef;">
 <div >

   <div class="container">
     <div class="row">

        <div class="col-lg-4 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;" id="otpVerify">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Otp Verification</h3>
                <hr>
              </div>
          </div>
          <p class="text-center">Pls Enter Otp : 1234</p>
          <input type="text" name="" value="{{$id}}" id="userId" class="form-control text-center" readonly="">
          <form>
            <div class="row py-3">
              <div class="col-8">
                <input type="text"  pattern="[0-9]{4}" class="form-control" required="" id="otp">
                <p style="display:none;color: red" id="verifyMsg"><strong>Otp Not Verified , Enter Again</strong></p>
              </div>
              <div class="col-4"> 
                <button class="btn btn-primary" id="verifyBtn">Verify</button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-4 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%; display: none" id="setPassword">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Set Password</h3>
                <hr>
              </div>
          </div>
          <form id="intialdata" method="post" action="{{route('set_password')}}" onsubmit="return checkPassword(this)">
            @csrf
            <div class="row">
              <div class="col-12 form-group">
                <label>Enter Password</label>
                <input type="password" class="form-control " required="" placeholder="Enter Password" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                <p id="passMsg" style="color: red;display: none;">Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</p>
              </div>
              <div class="col-12 form-group">
                <label>Re-Enter Password</label>
                <input type="password" class="form-control"  placeholder="Re-Enter Password" name="rePassword" id="rePassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                <p class="text-success success" style="display: none;"><strong>Password Match</strong></p>
                <p class="text-danger danger" style="display: none;"><strong>Password Nat Match</strong></p>
              </div>
              <div class="col-12 form-group">
                <input type="submit" name="" class="form-control btn btn-primary" >
              </div>
            </div>
          </form>
        </div>
     </div>
   </div>
 </div>
 {{csrf_field()}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('keyup','#rePassword',function(){
        var pass1=$(this).val();
        var pass2=$('#password').val();
        if(pass1==pass2){
          $('.success').show();
          $('.danger').hide();
        }else{
          $('.danger').show();
          $('.success').hide();
        }
    });

    $(document).on('click','#verifyBtn',function(e){
      e.preventDefault();

      var val=$('#otp').val();
      var userId=$('#userId').val();
      var sendData='{"otp":"'+val+'","userId":"'+userId+'"}';

        obj = JSON.parse(sendData);
        $.post('{{ route("otpverification")}}',{'data':obj,'_token':$('input[name=_token]').val()},function(data){
                if(data=='1'){
                  $('#setPassword').show();
                  $('#otpVerify').hide();
                }else{
                  $('#verifyMsg').show();
                }
          });
    });

    $(document).on('click','#password',function(){
        $('#passMsg').show();
    })

  });
function checkPassword(form){
   var pass1 = form.password.value; 
   var pass2 = form.rePassword.value; 

   if(pass1!=pass2){
    alert ("\nPassword did not match: Please try again...") 
    return false; 
   }
   else{
    return true;
   }
  }
</script>
</body>
</html>
