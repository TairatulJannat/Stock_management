<x-admin-master>


@section('content')


        <!-- Blog Post -->
<form  method="post" action="{{route('category.store')}}">
@csrf

<div class="row">
  <div class="col-sm-6">
    <div class="form-group" style="color:black;">
        <label for="title"><b>{{trans('content.category_name')}}</b></label>
        <input type="text" class="form-control" style="width:70%"  name="name" value=""  id="title" aria-describedby="" placeholder="enter catrgory name">
    </div>

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">{{trans('content.add')}}</button>
    </div>
 </div>
 <div class="col-sm-6">
  

</div> 
</div>   
</form>



        
        <table class="table table-blue table-striped">
  <thead>
    <tr>

      
      <th scope="col">{{trans('content.name')}}</th>
      <th scope="col">{{trans('content.delete')}}</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach( $categories as $category)
    <tr>
    <!-- @method('DELETE') -->
      
      <td>{{ $category->name }}</td>
      <form method="post" action="{{route('category.destroy',$category->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"  value="{{trans('content.delete')}}"></td>
        
      </form>
     
      

    </tr>
    @endforeach
</table>
@endsection
</x-admin-master>