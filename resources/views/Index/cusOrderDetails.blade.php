<!DOCTYPE html >
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style type="text/css">
  .card{
     box-shadow: 10px 10px 8px #888888;
  }
</style>
</head>
<body style="background-color: #abcdef;">
 <div >

   <div class="container">
     <div class="row">
        <div class="col-lg-8 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Order Details</h3>
                <hr>
              </div>
          </div>
          <div>
            <div class="col-12 my-1 text-center">
                <p><span style="color: rgb(242,240,189);"><i class="fa fa-circle" aria-hidden="true"></i></span> Order Pending  
                  <span style="color:  rgb(69,220,115);"><i class="fa fa-circle" aria-hidden="true"></i></span> Order Complete 
                </p>
            </div>
          </div>
        @foreach($order_list as $ol)
          @if(!$ol->receving_status)
          <div class="col-12 my-2 mx-auto card" style="width: 100%;height: 200px;background-color: rgb(242,240,189);">
          @else
           <div class="col-12 my-2 mx-auto card" style="width: 100%;height: 200px;background-color: rgb(69,220,115);">
          @endif
            <div class="row">
              <div class="col-12">
                <p class="text-center py-2"><strong>{{$ol->order_id}}</strong></p>
              </div>
              <div class="col-3">
                <p class="text-center py-2"><strong>{{$ol->product_name}}</strong></p>
              </div>
              <div class="col-3">
                <p class="text-center py-2"><strong>{{$ol->product_price}}</strong></p>
              </div>
              <div class="col-3">
                <p class="text-center py-2"><strong>{{$ol->restaurant_name}}</strong></p>
              </div>
              <div class="col-3">
                @if(!$ol->receving_status)
                <p class="text-center py-2"><strong><button class="btn btn-primary" disabled=""><i class="fa fa-download" aria-hidden="true"></i></button></strong></p>
                @else
                <a class="btn btn-primary" href="{{route('orderpdf',['id'=>$ol->cart_id])}}" ><i class="fa fa-download" aria-hidden="true"></i></a>
                @endif
            </div>
          </div>
        </div>
        @endforeach
     </div>
   </div>
 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
