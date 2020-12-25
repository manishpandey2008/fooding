<!DOCTYPE html >
<html>
<head>
<title>Wing the Air</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style type="text/css">
  .customer,.restorent{
    display: none;
  }
</style>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false" style="background-color: #abcdef;">
 <div>

   <div class="container">
     <div class="row">
        <div class="col-lg-6 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Profile</h3>
                <hr>
              </div>
          </div>
         <div class="row">
           <div class="col-12 text-center">
             <h4>{{$profile['name']}}</h4>
             <p>{{$profile['user_type']}}</p>
           </div>
           <div class="col-12 text-center">
             <table class="table">
               <tbody>
                 <tr>
                   <th>Food Type</th>
                    <td>
                      @if($profile['food_type']=='veg')
                      Vegetarian
                      @elseif($profile['food_type']=='nveg')
                      Non Vegetarian
                      @else
                      Vegetarian/Non Vegetarian
                      @endif
                    </td>
                 </tr>
                 <tr>
                   <th>Phone Number</th>
                   <td>{{$profile['phone_number']}}</td>
                 </tr>
                 <tr>
                   <th>Address</th>
                   <td>{{$profile['address']}}</td>
                 </tr>
                 <tr>
                   <th>User ID</th>
                   <td>{{$profile['user_id']}}</td>
                 </tr>
               </tbody>
             </table>
           </div>
           <div class="col-12 py-2">
             <a class="btn btn-primary" href="{{route('index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Home</a>
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
