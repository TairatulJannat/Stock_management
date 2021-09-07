<x-admin-master>
@section('content')

<table class="table table-blue table-striped">
  <thead>
    <tr>

      
      <th scope="col">{{trans('content.serial_no')}}</th>
      <th scope="col">{{trans('content.category')}}</th>
      <th scope="col">{{trans('content.product_name')}}</th>
      <th scope="col">{{trans('content.quantity')}}</th>
      <th scope="col">{{trans('content.edit')}}</th>
      <th scope="col">{{trans('content.delete')}}</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $rows = 0 ;
  ?>
    @foreach( $stocks as $stock)
    <tr>
    <!-- @method('DELETE') -->
      
      <td>{{ ++$rows }}</td>
      <td>{{ $stock->category->name}}</td>
      <td>{{ $stock->product->product_name}}</td>
      <td>{{ $stock->quantity}}</td>
      <td><a href="{{route('stock.edit',$stock->id)}}" class="btn btn-success btn-sm">{{trans('content.edit')}}</a></td>
      <form method="post" action="{{route('stock.destroy',$stock->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="{{trans('content.delete')}}"></td>
        
      </form>
     
     
      

    </tr>
    @endforeach
   
</table>
@endsection
</x-admin-master>