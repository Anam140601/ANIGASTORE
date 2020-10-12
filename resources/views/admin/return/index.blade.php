@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-13">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">
                     @if($title == 'Return Order List')
                     {{ $title }}
                     @elseif($title == 'Successed Return Order List')
                     {{ $title }}
                     @endif
                  </h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">Payment Type</th>
                           <th class="th-sm">Transaction ID</th>
                           <th class="th-sm">Subtotal</th>
                           {{-- <th class="th-sm">Shipping</th> --}}
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
                           {{-- <td>@rupiah($row->shipping)</td> --}}
                           <td>@rupiah($row->total)</td>
                           <td>{{ $row->date }}</td>
                           <td>
                              @if($row->return_order == 1)
                              <span class="badge badge-warning">Waiting Return Order</span>
                              @elseif($row->return_order == 2)
                              <span class="badge badge-success">Return Succesfully</span>
                              @endif
                           </td>
                           <td>
                              @if($row->return_order == 1)
                              <a href="{{ URL::to('admin/return/approve/'.$row->id) }}" id="approve" class="btn btn-sm btn-info btn-sm">Approve</a>
                              @elseif($row->return_order == 2)
                              {{-- <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-primary btn-sm">View</a> --}}
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
<script>  
   $(document).on("click", "#approve", function(e){
   e.preventDefault();
   var link = $(this).attr("href");
       swal({
           title: "Are you Want to Approve this Request Return?",
           text: "Once Approve, This Product will be return back to you!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
           if (willDelete) {
               window.location.href = link;
           } else {
           swal("Not Approved!");
           }
       });
   });
</script>
@endpush