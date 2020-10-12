@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Post Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Post List <a href="{{ route('add.posts') }}" class="btn btn-sm btn-danger" style="float: right" >Add New</a></h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">Image</th>
                           <th class="th-sm">Title</th>
                           <th class="th-sm">Category</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($post as $post)
                        <tr>
                           <td><img src="{{ URL::to($post->image) }}" alt="" width="80px;"></td>
                           <td>{{ $post->title_ina }}</td>
                           <td>{{ $post->category_name_ina }}</td>
                           <td>
                              <a href="{{ URL::to('edit/post/'.$post->id) }}" class="btn btn-sm btn-info">Edit</a>
                              <a href="{{ URL::to('delete/post/'.$post->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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