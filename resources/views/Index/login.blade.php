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
                <h3>Login</h3>
                <hr>
              </div>
          </div>
          @if($msg)
          <p class="text-center text-danger">User ID or Password Wrong</p>
          @endif
          <form method="post" action="{{route('final_login')}}">
            @csrf
            <div class="row">
              <div class="col-12 form-group">
                <label>User Id</label>
                <input type="text" name="userId" class="form-control" required="" placeholder="Enter Your User ID" >
              </div>
              <div class="col-12 form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required="" placeholder="Enter password">
              </div>
              <div class="col-12 form-group">
                <input type="submit" name="" class="form-control btn btn-primary" >
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12">
              <a href="{{route('forget')}}" class="text-danger float-right">Forget Password</a>
            </div>
            <div class="col-12">
              <p  class=""><strong>If You Are Not Registered <a href="{{route('Signup')}}">Click</a> Here</strong></p>
            </div>
            <div class="col-12 pb-4">
              <a href="{{route('index')}}" class="btn btn-info "><span><i class="fa fa-arrow-left" aria-hidden="true"></i></span> Home</a>
            </div>
          </div>
        </div>
     </div>
   </div>
 </div>
</body>
</html>
