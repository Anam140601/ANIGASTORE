@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Brand Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Brand List <a href="" class="btn btn-sm btn-danger" style="float: right" data-toggle="modal" data-target="#modalContactForm">Add New</a></h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">ID</th>
                           <th class="th-sm">Brand Logo</th>
                           <th class="th-sm">Brand Name</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($brand as $key=>$brand)
                        <tr>
                           <td>{{ $key +1 }}</td>
                           <td><img src="{{ URL::to($brand->brand_logo) }}" alt="" width="80px;"></td>
                           <td class="text-uppercase">{{ $brand->brand_name }}</td>
                           <td>
                              <a href="{{ URL::to('edit/brand/'.$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
                              <a href="{{ URL::to('delete/brand/'.$brand->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                     <tfoot>
                        <tr>
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


<!-- Modal: Contact form -->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog cascading-modal" role="document">
      <!-- Content -->
      <div class="modal-content">
         <!-- Header -->
         <div class="modal-header bg-danger darken-3 white-text">
            <h4 class=""><i class="fas fa-pencil-alt"></i>Add New Brand</h4>
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
            <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="md-form">
                  <div class="file-field">
                     <div class="btn btn-primary btn-sm float-left">
                        <span>Choose Logo</span>
                        <input type="file" name="brand_logo" onchange="readURL1(this);">
                     </div>
                     <div class="file-path-wrapper">
                        <input readonly class="file-path validate" type="text" placeholder="Upload Brand Logo" name="brand_logo">
                     </div>
                     <img src="#" id="one" alt="">
                  </div>
               </div>
               <div class="md-form md-outline">
                  <input type="text" id="brand" class="form-control" name="brand_name">
                  <label for="brand" class="">Brand Name</label>
               </div>
               <div class="text-center mt-1-half">
                  <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
               </div>
            </form>
         </div>
      </div>
   <!-- Content -->
   </div>
</div>
<!-- Modal: Contact form -->
@endsection

@push('js')
<script type="text/javascript">
   function readURL1(input){
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
         $('#one')
         .attr('src', e.target.result)
         .width(120)
         };
         reader.readAsDataURL(input.files[0]);
      }
   }
   </script>
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