<x-admin-master>


@section('content')


<form  method="post" action="{{route('product.store')}}">
@csrf

<div class="row">
<div class="col-sm-6">
    <div class="form-group" style="color:black;width:70%;">
    <label for="title"><b>{{trans('content.category_name')}}</b></label>
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option selected>{{trans('content.choose_category')}}</option>
            @foreach($categories as $category)

            <option value="{{$category->id}}">{{$category->name}}</option>
            
           @endforeach
        </select>
    </div>
    <div class="form-group" style="color:black;">
        <label for="title"><b>{{trans('content.product_name')}}</b></label>
        <input type="text" class="form-control" style="width:70%"  name="product_name" value=""  id="title" aria-describedby="" placeholder="enter product name">
    </div>
    

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">{{trans('content.add')}}</button>
    </div>
 </div>
</div> 
</div>   
</form>



        
        <table class="table table-blue table-striped">
  <thead>
    <tr>

      
      <th scope="col">{{trans('content.product_name')}}</th>
      <th scope="col">{{trans('content.category_name')}}</th>
      <th scope="col">{{trans('content.edit')}}</th>
      <th scope="col">{{trans('content.delete')}}</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach( $products as $product)
    <tr>
    <!-- @method('DELETE') -->
      
      <td>{{ $product->product_name }}</td>
      <td>{{ $product->category->name}}</td>
      <td> <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm">{{trans('content.edit')}}</a></td>
      <form method="post" action="{{route('product.destroy',$product->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"  value="{{trans('content.delete')}}"></td>
        
      </form>
     
      

    </tr>
    @endforeach
</table>
@endsection
</x-admin-master>