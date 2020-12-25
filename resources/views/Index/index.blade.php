<!DOCTYPE html >
<html>
<head>
<title>Wing the Air</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
  .card{
     box-shadow: 5px 10px 0px 0px #888888;
  }
</style>
</head>
<body >
<section class="fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('image/logo.jpg')}}" style="width: 50px;height: 50px;border-radius: 50%"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
    </ul>
      <a href="{{route('index')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Home</a>
      @if($session_Status)
      @if($role==='customer')
      <a href="{{route('cart')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2"><i class="fa fa-shopping-cart" aria-hidden="true"><span class="badge badge-light" id="cartVal">{{$cartVal}}</span></i></a>
      <a href="{{route('orderlist')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Oreder Details</a>
      @else
      <a href="{{route('dashboard')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Dashboard</a>
      @endif
      <a href="{{route('logout')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Logout</a>
      <a href="{{route('profile')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Profile</a>
      @else
      <a href="{{route('login')}}" class="btn btn-outline-success my-2 my-sm-0 mx-2" >Login</a>
     @endif
  </div>
</nav>
</section>
<section style="padding:  70px;background-image:url('{{asset('image/bg2.jpg')}}');opacity: 0.9;" class="mt-5">
  <div class="row">
    <div class="col-lg-8 col-sm-12 mx-auto card" style="border-radius: 20px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{asset('image/slide1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('image/slide2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('image/slide3.jpg')}}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
  </div>
</section>


 <div style="background-color: #abcdef;min-height:1500px;">
   <div class="container">
    <div class="row py-4">
      <div class="col-lg-6 col-sm-10 mx-auto">
        <select class="form-control" id="typeSelection">
          @if($food==='veg')
          <option value="veg">Veg</option>
          @elseif($food==='nveg')
          <option value="nveg">Non Veg</option>
          @else
          <option value="veg">Veg</option>
          <option value="nveg">Non Veg</option>
          @endif
        </select>
      </div>
    </div>
     <div class="row" >
      <div class="col-12">
      
        <hr>
      </div>
      <div class="col-12 my-2 text-center" style="width: 100%;background-color: rgb(230,225,153);display: none;" id="addMsgDiv" >
        <h5><strong id="addMsg" class=""></strong></h5>
      </div>

    </div>
    <div class="row">
      <div class="col-6 my-3">
        <input type="text" name="" placeholder="Search......." class="form-control" id="searchBox">
      </div>
    </div>
    <div class="row" id="allProducts">
       @foreach($all_pro as $al)
        <div class="col-lg-4 col-sm-6 mx-auto py-2">
          <div class="card" style="width: 18rem;">
                <img class="card-img-top" style="height: 150px" src="{{asset("uploads/$al->photo")}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$al['product_name']}}<span class="float-right">
                    @if($al['product_type']=='veg')
                    <i class="fa fa-circle" aria-hidden="true" style="color:green"></i>
                    @elseif($al['product_type']=='nveg')
                    <i class="fa fa-circle" aria-hidden="true" style="color:red"></i>
                    @endif
                  </span></h5>
                  <p>
                    <strong>{{$al['restaurant_name']}}</strong><br>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$al['address']}}</span>
                    <span class="float-right"><i class="fa fa-inr" aria-hidden="true"></i> {{$al['product_price']}}</span>
                  </p>

                  @if($role==='restaurant')
                  <button class="btn btn-primary editPro" style="width: 100%" value="{{$al['product_id']}}" data-toggle="modal" data-target="#myModal">Edit</button>
                  @else
                  @if($session_Status)
                  <button class="btn btn-primary order" style="width: 100%" value="{{$al['product_id']}}">Order</button>
                  @else
                  <a class="btn btn-primary" style="width: 100%" href="{{route('login')}}" >Order</a>
                  @endif
                  @endif
                </div>
             </div>
        </div>
        @endforeach
        
     </div>
   </div>
 </div>
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-12 py-2">
            <h4 class="text-center"><strong>Edit Product</strong></h4>
            <hr>
          </div>
        </div>
        <form method="post" action="{{route('editproduct')}}">
          @csrf
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <label>Product ID</label>
              <input type="text" name="proId" id="proId" readonly="" class="form-control">
            </div>
            <div class="col-lg-6 col-sm-12">
              <label>Product Name</label>
              <input type="text" name="proName" id="proName"  class="form-control">
            </div>
            <div class="col-lg-6 col-sm-12">
              <label>Product Price</label>
              <input type="text" name="proPrice" id="proPrice"  class="form-control">
            </div>
            <div class="col-12 my-2">
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
 <!-- Modal -->
<div id="footer">

</div>
{{csrf_field()}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('click','.editPro',function(){
        var val=$(this).val();

        $.post('{{ route("getproduct")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
            $('#proId').val(val);
            $('#proName').val(data['pro_name']);
            $('#proPrice').val(data['pro_price']);
          });
    });
    $(document).on('click','.order',function(){
        var val=$(this).val();
        var cartVal=parseInt($('#cartVal').text());
        $.post('{{ route("addToCart")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
                  $('#addMsgDiv').show();
                  $('#addMsg').text(data['msg']);
                  if (data['stats']) {
                    $('#cartVal').text(cartVal+1);
                  }
          });
    });
    $(document).on('keyup','#searchBox',function(){
        var val=$(this).val();
        $.post('{{ route("liveSearch")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
              // console.log(data);
                 if(data['status']=='1')
                 {
                  $('#allProducts').html(data['data']);
                 }
          });
    });
  });
</script>
</body>
</html>
