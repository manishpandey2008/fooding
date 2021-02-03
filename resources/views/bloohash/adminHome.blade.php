
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Home</title>
    <!--css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
               <a class="nav-link" href="{{route('b_index')}}"><span class="fa fa-institution"></span> Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="{{route('b_logout')}}">Logout</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="{{route('b_profile',['id'=>$user['userName']])}}">Profile</a>
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
            <div class="col-md-12 text-center">
              <h2>  Welcome {{$user['firstName'].' '.$user['lastName']}}</h2>
            </div>
            <div class="col-md-12">
              <div class="table-responsive text-white text-center">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col">Name</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Phone No</th>
                      <th scope="col">Status</th>
                      <th>Profile</th>
                      <th>Update Status</th>
                    </tr>
                  </thead>
                  <tbody class="text-secondary">
                    @foreach($users as $u)
                    <tr>
                     <td>
                       <img src="{{asset('uploads/'.$u['photo'])}}" style="width: 40px;height: 40px;border-radius: 50%">
                     </td>
                      <td><a href="{{route('b_profile',['id'=>$u['userName']])}}" style="text-decoration: none; color: #7E8423">{{$u['firstName'].' '.$u['lastName']}}</a></td>
                      <td>{{$u['userName']}}</td>
                      <td>{{$u['phone']}}</td>
                      <td>
                        @if($u['activityStatus'])
                        <span class="badge badge-primary">Activate</span>
                        @else
                        <span class="badge badge-danger">DeActivate</span>
                        @endif
                      </td>
                      <td>
                          <a href="{{route('b_profile',['id'=>$u['userName']])}}" type="button" class="btn btn-secondary">Details</a>
                      </td>
                      <td>
                        <a href="{{route('bp_status_change',['id'=>$u['userName']])}}" type="button" class="btn btn-secondary">Change Status</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
          $(document).ready( function () {
              $('#myTable').DataTable();
          } );
        </script>
    </body>
</html>
