<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
    	.card{
    		box-shadow: 5px 5px 5px 5px #888888;
    	}
    </style>
  </head>
  <body style="background-color: #abcdef;">
  <section class="fixed-top">
  	<nav class="navbar navbar-expand-lg navbar-light bg-light" >
	  <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('image/logo.jpg')}}" style="width: 50px;height: 50px;border-radius: 50%"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	     </ul>
	     <a href="{{route('orderdetails')}}" class="btn btn-outline-success my-2 my-sm-0 mx-1" type="submit">Order Details</a>
	      <a href="{{route('index')}}" class="btn btn-outline-success my-2 my-sm-0 mx-1" type="submit">Home</a>
	      <a href="{{route('logout')}}" class="btn btn-outline-success my-2 my-sm-0 mx-1" type="submit">Logout</a>
	  </div>
	</nav>
  </section>
  <div  class="my-5">
  	<div class="container">
  		<div class="row ">
  			<div class="col-12">
  				<h2 class="text-center py-3"><strong>{{$rest_name}} Restaurant</strong></h2>
  				<hr>
  			</div>
  			@if($msg)
  			<div class="col-12 my-2" style="width: 100%;background-color:rgb(210,255,210);border-radius: 10px">
  				<h5 class="py-1 text-center"><strong>{{$msg}}</strong></h5>
  			</div>
  			@endif
  			<div class="col-lg-6 col-sm-10 mx-auto">
  				<select class="form-control" id="selectDiv">
  					<option value="allPro">ALL PRODUCTS</option>
  					<option value="addNew">ADD NEW PRODUCTS</option>
  				</select>
  			</div>
  		</div>
 		<div class="row" id="allTag">
 			<div class="col-12">
  				<h4 class="text-center my-3"><strong>All Products</strong></h4>
  			</div>
 		</div>
  		<div class="row" id="allProduct">
  			@foreach($all_pro as $al)
       
  			<div class="col-lg-4 col-sm-12 mx-auto py-2">
  				<div class="card" style="width: 18rem;">
		            <img class="card-img-top" style="height: 150px" src="{{asset("uploads/$al->photo")}}" alt="Card image cap" >
		            <div class="card-body">
		              <h5 class="card-title">{{$al['product_name']}}<span class="float-right">
		              	@if($al['product_type']=='veg')
		              	<i class="fa fa-circle" aria-hidden="true" style="color:green"></i>
		              	@elseif($al['product_type']=='nveg')
		              	<i class="fa fa-circle" aria-hidden="true" style="color:red"></i>
		              	@endif
		              </span></h5>
		              <p><strong>{{$rest_name}}</strong><br><strong class="text-center">{{$al['product_price']}}</strong></p>
		              <button class="btn btn-primary editPro" data-toggle="modal" data-target="#myModal" style="width: 100%" value="{{$al['product_id']}}">Edit</button>

                  <button class="btn btn-primary show my-2" style="width: 100%" value="{{$al['product_id']}}">
                    @if($al['stock_status']=='1')
                       Hide
                    @else
                      Show
                    @endif
                  </button>

		            </div>
		         </div>
  			</div>
  			@endforeach
  		</div>
  		<div class="row" id="addForm" style="display: none">
  			<div class="col-lg-4 col-sm-10 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
  			  <div class="row">
  			      <div class="col-12 py-2 text-center">
  			        <h3>Add Product</h3>
  			        <hr>
  			      </div>
  			  </div>
  			  <form method="post" action="{{route('addProduct')}}" enctype="multipart/form-data">
  			    @csrf
  			    <div class="row">
  			      <div class="col-12 form-group">
  			        <label>Product Name</label>
  			        <input type="text" name="productName" class="form-control" placeholder="Enter Product Name" required="" id="productName">
  			        <p id="proMsg" style="color: red"></p>
  			      </div>
  			      <div class="col-12 form-group">
  			        <label>Product Price</label>
  			        <input type="number" name="productPrice" class="form-control" placeholder="Enter Product Price" min="0" required="" id="productPrice">
  			      </div>
  			      <div class="col-12 form-group">
  			         <label>Product Type</label>
  			         <select class="form-control" name="productType" required="">
  			         	<option value="veg">Veg</option>
  			         	<option value="nveg">Non Veg</option>
  			         </select>
  			      </div>
  			      <div class="col-12 form-group">
  			        <label>Photo</label>
  			        <input type="file" name="photo" class="form-control" >
  			      </div>
  			      <div class="col-12 form-group">
  			        <input type="submit" name="" class="form-control btn btn-primary" >
  			      </div>
  			    </div>
  			  </form>
  			  <div class="row">
  			    <div class="col-12 pb-4">
  			      <button class="btn btn-info">Reset</button>
  			    </div>
  			  </div>
  			</div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$(document).on('change','#selectDiv',function(){
    			var val=$(this).val();
    			if (val=='allPro') {
    				$('#addForm').hide();
    				$('#allProduct').show();
    				$('#allTag').show();
    			}else if (val=='addNew') {
    				$('#allProduct').hide();
    				$('#allTag').hide();
    				$('#addForm').show();
    			}
    		});

    		$(document).on('click','#productPrice',function(){
    			var val=$('#productName').val();
    			  $.post('{{ route("proCheck")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
    			  	if(data!=='0'){
    			  		$('#proMsg').html(data);
    			  	}else{
    			  		$('#proMsg').html('');
    			  	}
          			});
    		});

        $(document).on('click','.editPro',function(){
            var val=$(this).val();

            $.post('{{ route("getproduct")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
                $('#proId').val(val);
                $('#proName').val(data['pro_name']);
                $('#proPrice').val(data['pro_price']);
              });
        });

        $(document).on('click','.show',function(){
            var text=$(this).text();
            var val=$(this).val();
            if (text.trim()==='Show') {
                $(this).text('Hide');
            }else if (text.trim()==='Hide'){
                  $(this).text('Show');
            }
            $.post('{{ route("stockContol")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
                
              });
        });
    	});
    </script>
  </body>
</html>