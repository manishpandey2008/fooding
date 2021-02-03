
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    <!--css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <style>
            .banner-background{
              clip-path: polygon(30% 0%, 70% 0%, 100% 0, 100% 94%, 70% 100%, 30% 93%, 0 100%, 0 0);
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
               <a class="nav-link" href="{{route('b_index')}}"> Home</a>
           </li>
           @if(!$msg)
           <li class="nav-item">
             <a class="nav-link" href="{{route('b_login')}}">Login</a>
           </li>
           @else
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  data-toggle="dropdown" >
                <i class="fa fa-user-circle" aria-hidden="true"></i>
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('b_profile',['id'=>$user['userName']])}}">Profile</a>
                  @if($user['role']=='admin')
                  <a class="dropdown-item" href="{{route('b_admin_home')}}">User Home</a>
                  @elseif($user['role']=='user')
                  <a class="dropdown-item" href="{{route('b_user_home')}}">User Home</a>
                  @endif
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('b_logout')}}">Logout</a>
            </li>
            @endif
       </ul>
      </div>
    </nav>
</section>
<!--        navbar-->

<!--    banner-->
<div class="container-fluid p-0 m-0 banner-background">
    <div class="jumbotron primary-background text-white ">
        <div class="container">
            <h3 class="disply-3">Welcome ,BLOOHASH </h3>
             <p>
                 Computer programming is the process of designing and building an executable computer program to accomplish a specific computing result or to perform a specific task
             </p>
             <p>
                 Programming involves tasks such as: analysis, generating algorithms, profiling algorithms' accuracy and resource consumption, and the implementation of unit.
             </p>
             @if(!$msg)
             <a href="{{route('b_signup')}}" class="btn btn-outline-light btn-lg"> Start ! its Free</a>
             <a href="{{route('b_login')}}" class="btn btn-outline-light btn-lg"><span class="	fa fa-user-circle-o fa-spin"></span> Login</a>
             @endif
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
