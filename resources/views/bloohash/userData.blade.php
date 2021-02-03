
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Details</title>
    <!--css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <style>
            .banner-background{
              clip-path: polygon(30% 0%, 70% 0%, 100% 0, 100% 94%, 70% 100%, 31% 95%, 0 100%, 0 0);

            }
        </style>
    </head>
    <body>
<!--        navbar-->
<section>
    <nav class="navbar navbar-expand-lg navbar-dark primary-background">
        <a class="navbar-brand" href="{{route('b_index')}}">Bloohash</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
       <ul class="navbar-nav float-right">
           <li class="nav-item active">
               <a class="nav-link" href="{{route('b_index')}}"><span class="fa fa-institution"></span> Home <span class="sr-only">(current)</span></a>
           </li>
       </ul>
      </div>
    </nav>
</section>
<!--        navbar-->

<!--    banner-->
<div class="container-fluid p-0 m-0 banner-background">
    <div class="jumbotron primary-background text-white ">
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="card">
                <div class="card-header primary-background text-center">
                  <i class="fa fa-user"></i><br>
                  <p><strong>User Details</strong></p>
                </div>
                <div class="card-body text-secondary">
                  <form method="post" action="{{route('bp_user_data')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12 form-group">
                        <label>First Name</label>
                        <input type="text" name="fName" class="form-control" required="" placeholder="Enter Your First Name" >
                      </div>
                      <div class="col-12 form-group">
                        <label>Last Name</label>
                        <input type="text" name="lName" class="form-control" required="" placeholder="Enter Your Last Name" >
                        <p class="text-danger" style="display:none;font-size: 12px">Phone No Is Registerd</p>
                      </div>
                      <div class="col-12 form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="" placeholder="Enter Your Address" >
                      </div>
                      <div class="col-12 form-group">
                        <label>Zip Code</label>
                        <input type="text" name="zipCode" class="form-control" required="" placeholder="Enter Your Zip Code" >
                      </div>
                      <div class="col-12 form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control" required="" >
                      </div>
                      <div class="col-12 form-group">
                        <input type="submit" name="" class="form-control btn btn-primary" >
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-secondary">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--javascript-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/myjs.js" type="text/javascript"></script>
    </body>
</html>
