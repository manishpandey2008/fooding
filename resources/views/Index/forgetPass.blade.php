<!DOCTYPE html >
<html>
<head>
<title>FoodShala</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
 .card{ 
   position: absolute;
    top: 40%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);

}
}
</style>
</head><!--  -->
<body  style="background-color:#abcdef;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
 <div>
   <div class="container">
     <div class="row">
        <div class="col-lg-4 col-sm-10 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Password Forget</h3>
                <hr>
              </div>
          </div>
          <form method="post"  action="{{route('numberverification')}}">
            @csrf
            <div class="row">
              <div class="col-12 form-group">
                  <label>SignUp For <span style="color: red"><strong>*</strong></span> </label>
                  <select class="form-control" required="" id="signUpSelection" name="signUpFor">
                    <option value="">Select One</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="customer">Customer</option>
                  </select>
                </div>
                <div class="col-12 form-group">
                  <label>Enter Phone Number <span style="color: red"><strong>*</strong></span></label>
                  <input type="phone" class="form-control" required="" placeholder="Enter Phone Number" pattern="[0-9]{10}" title="Enter Only 10 Numeric Value" name="userPhone">
                </div>
              <div class="col-12 py-2">
                <button type="submit" id="sendData" class="btn btn-primary" >Send OTP</button>
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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">

</script>
</body>
</html>
