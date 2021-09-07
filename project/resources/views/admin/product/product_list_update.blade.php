<x-admin-master>


@section('content')


<form  method="post" action="{{route('product.update',$product->id)}}">
@csrf
@method('PATCH')
<div class="row">
<div class="col-sm-6">
    <div class="form-group" style="color:black;width:70%;">
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option value="{{$product->category_id}}">{{$product->category->name}}</option>
            @foreach($categories as $category)

            <option value="{{$category->id}}">{{$category->name}}</option>
            
           @endforeach
        </select>
    </div>
    <div class="form-group" style="color:black;">
        <label for="title"><b>Product Name</b></label>
        <input type="text" class="form-control" style="width:70%"  name="product_name" value="{{$product->product_name}}"  id="title" aria-describedby="" placeholder="enter product name">
    </div>
    

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">{{trans('content.update')}}</button>
    </div>
 </div>
</div> 
</div>   
</form>
@endsection
</x-admin-master>