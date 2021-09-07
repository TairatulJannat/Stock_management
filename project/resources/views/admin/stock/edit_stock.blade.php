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
      <form  id="add_name" method="post" action="{{route('stock.update',$stock->id)}}">
        @csrf
        @method('PATCH')
          
          <table class="table table-bordered" id="articles" style="width:800px" align="center">
            <tr>

             <td><input  type="text" id=""  value="{{$stock->category->name}}" class="form-control name_list" /></td>
              <td><input  type="text" id=""  value="{{$stock->product->product_name}}" class="form-control name_list" /></td>
              <td><input  type="number" id="" name="quantity" value="{{$stock->quantity}}"class="form-control name_list" /></td>
            </tr>
          </table>
          <button type="submit" name="submit"  class="btn btn-info" style="margin-left:100px">{{trans('content.update')}}</button>
        
      </form>
    </div>
  </div>

@endsection 

</x-admin-master>