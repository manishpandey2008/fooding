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
<body style="background-color: #abcdef;">
 <div >

   <div class="container">
     <div class="row">
        <div class="col-lg-8 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Cart Details</h3>
                <hr>
              </div>
          </div>
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody >
                  @php
                  $count=1;
                  $total=0;
                  @endphp
                  @foreach($cart_list as $cl)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$cl['product_name']}}</td>
                    <td>{{$cl['product_price']}}</td>
                    <td>{{$cl['restaurant_name']}}</td>
                    <td>
                      <a class="btn btn-danger" href="{{route('deleteFromCart',['id'=>$cl['cart_id']])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  @php
                  $count=$count+1;
                  $total=$total+$cl['product_price'];
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-4 text-center mx-auto py-2">
              <a href="{{route('index')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Home</a>
            </div>
            <div class="col-4 text-center mx-auto py-2">
              <input type="text" name="" value="{{$total}}" class="form-control" readonly="">
            </div>
            <div class="col-4 text-center mx-auto py-2">
              <a href="{{route('finalorder')}}" class="btn btn-primary">Final Order</a>
            </div>
          </div>
        </div>
     </div>
   </div>
 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
