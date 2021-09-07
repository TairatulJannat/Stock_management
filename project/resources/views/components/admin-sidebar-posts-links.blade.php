



<li class="nav-item">
  <a  href="{{route('admin.index')}}" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
   

  
   <a class="nav-link collapsed" href="{{route('admin.index')}}" data-toggle="collapse" data-target="#productdata" aria-expanded="true" aria-controls="collapseone">
   <i class="fas fa-luggage-cart"></i>
    <span>{{trans('content.product')}}</span>
  </a>
  <div id="productdata" class="collapse" aria-labelledby="headingdata" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{route('category.index')}}">{{trans('content.category')}}</a>
      <a class="collapse-item" href="{{route('product.index')}}">{{trans('content.product')}}</a>
      
    </div>
  </div>








   <a class="nav-link collapsed" href="{{route('admin.index')}}" data-toggle="collapse" data-target="#collapsedata" aria-expanded="true" aria-controls="collapseone">
   <i class="fas fa-warehouse"></i>
    <span>{{trans('content.stock')}}</span>
  </a>
  <div id="collapsedata" class="collapse" aria-labelledby="headingdata" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{route('stock.create')}}">{{trans('content.add_stock')}}</a>
      <a class="collapse-item" href="{{route('stock.index')}}">{{trans('content.view_stock')}}</a>
     
    </div>
  </div>
  </a>
 
</li>











