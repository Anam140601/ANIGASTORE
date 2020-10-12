@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-13">
            <h3 class="tulisan-putih font-weight-bold">Product Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Product List <a href="{{ route('add.product') }}" class="btn btn-sm btn-danger" style="float: right" title="Add New Product">Add New</a></h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">SKU</th>
                           <th class="th-sm">Name</th>
                           <th class="th-sm">Image</th>
                           <th class="th-sm">Category</th>
                           <th class="th-sm">Brand</th>
                           <th class="th-sm">Quantity</th>
                           <th class="th-sm">Status</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($product as $key=>$pro)
                        <tr>
                           <td>{{ $pro->code }}</td>
                           <td class="text-uppercase">{{ $pro->name }}</td>
                           <td><img src="{{ URL::to($pro->image_1) }}" alt="" width="50px;" title="Image of {{ $pro->name }}"></td>
                           <td class="text-uppercase">{{ $pro->category_name }}</td>
                           <td class="text-uppercase">{{ $pro->brand_name }}</td>
                           <td>{{ $pro->qty }}</td>
                           <td>
                              @if($pro->status == 1)
                                 <span class="badge badge-success" title="Product Active">Active</span> 
                              @else
                                 <span class="badge badge-danger" title="Product Inactive">Inactive</span>
                              @endif
                           </td>
                           <td class="row">
                              <a href="{{ URL::to('view/product/'.$pro->id) }}" class="btn btn-sm btn-success col-md-4" title="Show Product"><i class="fas fa-eye"></i></a>
                              @if($pro->status == 1)
                                 <a href="{{ URL::to('inactive/product/'.$pro->id) }}" class="btn btn-sm btn-info col-md-4" title="Make Product Inactive"><i class="fas fa-thumbs-down"></i></a>
                              @else
                                 <a href="{{ URL::to('active/product/'.$pro->id) }}" class="btn btn-sm btn-warning col-md-4" title="Make Product Active"><i class="fas fa-thumbs-up"></i></a>
                              @endif
                              <a href="{{ URL::to('edit/product/'.$pro->id) }}" class="btn btn-sm btn-primary col-md-4" title="Edit Product"><i class="fas fa-edit"></i></a>
                              <a href="{{ URL::to('delete/product/'.$pro->id) }}" class="btn btn-sm btn-danger col-md-12" id="delete" title="Delete Product"><i class="fas fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                     <tfoot>
                        <tr>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </section>
   </div>
</main>

@endsection

@push('js')
<script>
   $(document).ready(function () {
      $('#dt-filter-select').dataTable({
         initComplete: function () {
            this.api().columns().every( function () {
               var column = this;
               var select = $('<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>')
                  .appendTo( $(column.footer()).empty() )
                  .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                           $(this).val()
                        );

                        column
                           .search( val ? '^'+val+'$' : '', true, false )
                           .draw();
                  } );

               column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
               } );
            } );
         }
      });
   });
</script>
@endpush