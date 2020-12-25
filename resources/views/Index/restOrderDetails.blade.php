<!DOCTYPE html >
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<style type="text/css">

  .card{
     box-shadow: 10px 10px 8px #888888;
  }
</style>
</head>
<body style="background-color: #abcdef;">
 <div>

   <div class="container-fluid">
     <div class="row">
        <div class="col-lg-8 col-sm-12 mx-auto my-5 card" style="border: 1px solid black;width: 100%;">
          <div class="row">
              <div class="col-12 py-2 text-center">
                <h3>Order Details</h3>
                <hr>
              </div>
          </div>
          <div class="row">
            <div class="col-12 my-1 text-center">
                <p><span style="color: rgb(242,240,189);"><i class="fa fa-circle" aria-hidden="true"></i></span> Order Pending  
                  <span style="color:  rgb(69,220,115);"><i class="fa fa-circle" aria-hidden="true"></i></span> Order Complete 
                </p>
            </div>
        </div>
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-bordered table-striped text-center" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Addres</th>
                  <th scope="col">Time</th>
                  <th scope="col">Confomation</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order_list as $ol)
                <tr>
                  <th>{{$ol->name}}</th>
                  <td>{{$ol->product_name}}</td>
                  <td>{{$ol->address}}</td>
                  <td>{{$ol->created_at}}</td>
                  <td>
                  @if(!$ol->receving_status)
                    <button class="btn btn-primary confBtn" value="{{$ol->cart_id}}" >OK</button>
                  @else
                    <p><strong>Conform</strong></p>
                  @endif
                  </td>
                  <td>
                    @if(!$ol->receving_status)
                    <span style="color: rgb(242,240,189);"><i class="fa fa-circle" aria-hidden="true"></i></span>
                    @else
                    <span style="color: rgb(69,220,115);"><i class="fa fa-circle" aria-hidden="true"></i></span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row py-2">
          <div class="col-6">
            <a href="{{route('index')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Home</a>
          </div>
          <div class="col-6">
            <a href="{{route('dashboard')}}" class="btn btn-primary float-right">Dashboard <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
     </div>
   </div>
 </div>
{{csrf_field()}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#myTable').DataTable();

      $(document).on('click','.confBtn',function(){
        var val=$(this).val();
        $.post('{{ route("orderconf")}}',{'data':val,'_token':$('input[name=_token]').val()},function(data){
                $(this).attr('disabled');
          });
      });
  } );

</script>
</body>
</html>
