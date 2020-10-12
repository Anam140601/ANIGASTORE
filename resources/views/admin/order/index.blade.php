@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-13">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">
                     @if($title == 'new')
                     New Order List
                     @elseif($title == 'accept')
                     Accepted Order List
                     @elseif($title == 'progres')
                     Progres Order List
                     @elseif($title == 'deliv')
                     Delivered Order List
                     @elseif($title == 'cancel')
                     Cancel Order List
                     @endif
                  </h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">Payment Type</th>
                           <th class="th-sm">Transaction ID</th>
                           <th class="th-sm">Subtotal</th>
                           <th class="th-sm">Shipping</th>
                           <th class="th-sm">Total</th>
                           <th class="th-sm">Date</th>
                           <th class="th-sm">Status</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($order as $row)
                        <tr>
                           <td>{{ $row->payment_type }}</td>
                           <td>{{ $row->blnc_transaction }}</td>
                           <td>@rupiah($row->subtotal)</td>
                           <td>@rupiah($row->shipping)</td>
                           <td>@rupiah($row->total)</td>
                           <td>{{ $row->date }}</td>
                           <td>
                              @if($row->status == 0)
                              <span class="badge badge-warning">Pending</span>
                              @elseif($row->status == 1)
                              <span class="badge badge-info">Payment Acepterd</span>
                              @elseif($row->status == 2)
                              <span class="badge badge-primary">Progres</span>
                              @elseif($row->status == 3)
                              <span class="badge badge-success">Delivered</span>
                              @else
                              <span class="badge badge-danger">Cancel</span>
                              @endif
                           </td>
                           <td>
                              @if($row->status == 0)
                              <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-warning btn-sm">View</a>
                              @elseif($row->status == 1)
                              <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-info btn-sm">View</a>
                              @elseif($row->status == 2)
                              <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-primary btn-sm">View</a>
                              @elseif($row->status == 3)
                              <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-success btn-sm">View</a>
                              @else
                              <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-danger btn-sm">View</a>
                              @endif
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