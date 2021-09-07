<x-admin-master>
@section('content')
<!-- <style>
#border{
    border-width: 10px;

}


</style> -->
  
<div class="container">
    <br />
    <br />
  
    
    <h2 align="center">{{trans('content.stock_item')}}</h2>
    <div class="form-group" id="border">
      <form  id="add_name" method="post" action="{{route('stock.store')}}">
        @csrf
          
          <table class="table table-bordered" id="articles" style="width:800px" align="center">
            <tr> 
              <td><select class="form-control" name="category_id[]" id="category_id-0"><option value="">{{trans('content.choose_category')}}</option>@foreach ($categories as $category)  <option value="{{$category->id}}">{{$category->name}}</option> @endforeach</select></td>
              <td><select class="form-control" id="product_id-0" name="product_id[]"><option value="">{{trans('content.choose_product')}}</option></select></td>
              <td><input  type="number" id="quantity-0" name="quantity[]" placeholder="{{trans('content.quantity')}}" class="form-control name_list" /></td>
              <td><button  id="previous_quantity-0" class="btn btn-warning btn-sm">0</button></td>
              <td><button type="button" name="add" id="add" class="btn btn-success">{{trans('content.add_stock')}}</button></td>
            </tr>
          </table>
          <button type="submit" name="submit"  class="btn btn-info" style="margin-left:160px">{{trans('content.submit')}}</button>
        
      </form>
    </div>
  </div>


<script>
  $(document).ready(function() {
  var i = 0;
  var array = [0];
  $("#category_id-" + i).click(function() {
    upd_art(i)
  });
  $("#product_id-" + i).click(function() {
    duplicate_product(i)
  });

   $("#quantity-" + i).change(function() {
    upd_art(i)
  });


  $('#add').click(function() {
    i++;
    $('#articles').append('<tr id="row' + i + '"><td> <select class="form-control" name="category_id[]" id="category_id-'+ i +'"><option value="">Choose Category</option>@foreach ($categories as $category)  <option value="{{$category->id}}">{{$category->name}}</option> @endforeach</select></td><td><select class="form-control" id="product_id-'+ i +'" name="product_id[]"><option value="">Chooose Product</option></select></td><td><input  type="number" id="quantity-'+ i +'" name="quantity[]" placeholder="Quantity" class="form-control name_list" /></td><td><button  id="previous_quantity-'+ i +'" class="btn btn-warning btn-sm">0</button></td> <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

    $("#category_id-" + i).click(function() {
      upd_art(i)
    });
    $("#product_id-" + i).click(function() {
      duplicate_product(i)
    });
    $("#quantity-" + i).change(function() {
      upd_art(i)
    });


  });


  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
  });




  
  function upd_art(i) {
    var cat_id = $('#category_id-' + i).val();
  //  console.log(cat_id);
            var _q= cat_id;
            if(_q.length>0){
                $.ajax({
                    url:"{{url('cat_product')}}",
                    data: {
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        
                    },
                    success:function(res){

                        console.log(res.products);


                        var _html='';
                        $.each(res.products, function(index,products){
                            _html+='<option value="'+ products.id+'">'+products.product_name+'</option>';
                           
                        });
                       $('#product_id-' + i).html(_html);
                    }
                })
            }
    
  }



  function duplicate_product(i){
    var product_id = $('#product_id-' + i).val();
    const found = array.find(element => element = product_id)
  
    if(found){
        alert("Duplicate Product Not Allowed");
    }
    else{
      array.push(product_id);
            var _p= product_id;
            if(_p.length>0){
                $.ajax({
                    url:"{{url('previous_product')}}",
                    data: {
                        p:_p
                    },
                    dataType:'json',
                    beforeSend:function(){
                        
                    },
                    success:function(res){

                        var _html= '<button class="btn btn-success btn-sm">' +res.stock.quantity +'</button>';
                     
                       $('#previous_quantity-' + i).html(_html);
                    }
                })
            }
            

        }

              

  }

});

</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


@endsection 

</x-admin-master>