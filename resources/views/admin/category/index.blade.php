@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Category Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Category List <a href="" class="btn btn-sm btn-danger" style="float: right" data-toggle="modal" data-target="#modalContactForm">Add New</a></h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">ID</th>
                           <th class="th-sm">Category Name</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($category as $key=>$cat)
                        <tr>
                           <td>{{ $key +1 }}</td>
                           <td class="text-uppercase">{{ $cat->category_name }}</td>
                           <td>
                              <a href="{{ URL::to('edit/category/'.$cat->id) }}" class="btn btn-sm btn-info">Edit</a>
                              <a href="{{ URL::to('delete/category/'.$cat->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>ID</th>
                           <th>Category Name</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
      </section>
   </div>
</main>



{{-- <!-- Fixed button -->
<div class="fixed-action-btn clearfix d-none d-xl-block" style="top: 110px; right: 20px;">
   <a href="" class="btn-floating btn-lg red" data-toggle="modal" data-target="#modalContactForm">
      <i class="fas fa-pencil-alt"></i>
   </a>
</div>
<!-- Fixed button --> --}}

<!-- Modal: Contact form -->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog cascading-modal" role="document">
<!-- Content -->
<div class="modal-content">

   <!-- Header -->
   <div class="modal-header bg-danger darken-3 white-text">
      <h4 class=""><i class="fas fa-pencil-alt"></i>Add New Category</h4>
      <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <!-- Body -->
   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
   <div class="modal-body mb-0">
      <form action="{{ route('store.category') }}" method="post">
         @csrf
         <div class="md-form md-outline">
            <input type="text" id="category" class="form-control" name="category_name">
            <label for="category" class="">Category Name</label>
         </div>
         <div class="text-center mt-1-half">
            <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
         </div>
      </form>
   </div>
</div>
<!-- Content -->
</div>
<!-- Modal: Contact form -->
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