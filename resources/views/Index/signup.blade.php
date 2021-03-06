<!DOCTYPE html>
<html>
<head>
<title>FoodShala</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
  .customer,.restorent{
    display: none;
  }
  .card{
    position: absolute;
    top: 40%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
  }
</style>
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false" style="background-color: #abcdef;">
 <div>
   <div class="container">
     <div class="row">
        <div class="col-lg-4 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>SignUp</h3>
                <hr>
              </div>
          </div>
          @if (session('msg'))
          <div class="row">
            <div class="col-12 text-center">
              <p style="color: red"><strong>{{ session('msg') }}</strong></p>
            </div>
          </div>
          @endif
          <form id="intialdata" method="post" action="{{route('final_signup',['id'=>'1'])}}">
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
              <div class="col-12 form-group ">
                <label>Enter Your Name <span style="color: red"><strong>*</strong></span></label>
                <input type="text" class="form-control" required="" placeholder="Enter Your Name" name="userName">
              </div>
              <div class="col-12 form-group">
                <label>Enter Phone Number <span style="color: red"><strong>*</strong></span></label>
                <input type="phone" class="form-control" required="" placeholder="Enter Phone Number" pattern="[0-9]{10}" title="Enter Only 10 Numeric Value" name="userPhone">
                <p id="msg" style="display: none;"></p>
              </div>
              <div class="col-12 form-group restorent">
                <label>Enter Restaurant Name <span style="color: red"><strong>*</strong></span></label>
                <input type="text" class="form-control" required="" placeholder="Enter Restaurant Name" name="restaurantName">
              </div>
              <div class="col-12 form-group customer">
                <label>Enter Your Location <span style="color: red"><strong>*</strong></span></label>
                <input type="text" class="form-control" required="" placeholder="Enter Your Location" name="customerLocation">
              </div>
              <div class="col-12 form-group restorent">
                <label>Enter Restaurant Location <span style="color: red"><strong>*</strong></span></label>
                <input type="text"  class="form-control" required="" placeholder="Enter Your Restaurant Location" name="restaurantLocation">
              </div>
              <div class="col-12 form-group customer">
                <label>Food Type </label>
                <select class="form-control" name="foodType">
                  <option value="">Select One</option>
                  <option value="veg">Veg</option>
                  <option value="nveg">Non Veg</option>
                  <option value="both">Both</option>
                </select>
              </div>
              <div class="col-12 form-group">
                <input type="submit" name="" class="form-control btn btn-primary" >
              </div>
            </div>
          </form>
          <div class="row py-2">
            <div class="col-6">
              <a class="btn btn-primary" href="{{route('index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Home</a>
            </div>
            <div class="col-6">
              <a class="btn btn-primary float-right" href="{{route('login')}}">Login <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
     </div>
   </div>
 </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#signUpSelection',function(){
        var val=$(this).val();
        console.log(val);
        if(val=='restaurant'){
          $('.customer').hide();
          $('.restorent').show();
          $('.customer :input').removeAttr('required');
          $('.restorent :input').attr('required',"");
        }else if(val=='customer'){
          $('.restorent').hide();
          $('.customer').show();
          $('.restorent :input').removeAttr('required');
          $('.customer :input').attr('required',"");
        }else{
          $('.restorent').hide();
          $('.customer').hide();
        }
    });
  });
</script>
</body>
</html>
