@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Admin Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Admin List <a href="" class="btn btn-sm btn-danger" style="float: right" data-toggle="modal" data-target="#modalContactForm">Add New</a></h5>
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">Name</th>
                           <th class="th-sm">Phone Number</th>
                           <th class="th-sm">Access</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($user as $row)
                        <tr>
                           <td>{{ $row->name }}</td>
                           <td>{{ $row->phone }}</td>
                           <td>
                              @if($row->category == 1)
                              <span class="badge badge-primary">Category</span>
                              @else
                              @endif
                              @if($row->coupon == 1)
                              <span class="badge badge-secondary">Coupon</span>
                              @else
                              @endif
                              @if($row->product == 1)
                              <span class="badge badge-success">Product</span>
                              @else
                              @endif
                              @if($row->blog == 1)
                              <span class="badge badge-danger">Blog</span>
                              @else
                              @endif
                              @if($row->order == 1)
                              <span class="badge badge-info">Order</span>
                              @else
                              @endif
                              @if($row->report == 1)
                              <span class="badge badge-dark">Report</span>
                              @else
                              @endif
                              @if($row->role == 1)
                              <span class="badge badge-primary">Role</span>
                              @else
                              @endif
                              @if($row->return == 1)
                              <span class="badge badge-secondary">Return</span>
                              @else
                              @endif
                              @if($row->contact == 1)
                              <span class="badge badge-danger">Contact</span>
                              @else
                              @endif
                              @if($row->comment == 1)
                              <span class="badge badge-warning">Comment</span>
                              @else
                              @endif
                              @if($row->setting == 1)
                              <span class="badge badge-info">Setting</span>
                              @else
                              @endif
                              @if($row->other == 1)
                              <span class="badge badge-dark">Other</span>
                              @else
                              @endif
                              @if($row->stock == 1)
                              <span class="badge badge-primary">Stock</span>
                              @else
                              @endif
                           </td>
                           <td>
                              <a href="{{ URL::to('admin/edit/'.$row->id) }}" class="btn btn-sm btn-info btn-block">Edit</a>
                              <a href="{{ URL::to('admin/delete/'.$row->id) }}" class="btn btn-sm btn-danger btn-block" id="delete">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                     <tfoot>
                        <tr>
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
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog cascading-modal" role="document">
<!-- Content -->
<div class="modal-content">

   <!-- Header -->
   <div class="modal-header bg-danger darken-3 white-text">
      <h4 class=""><i class="fas fa-pencil-alt"></i>Add New Admin</h4>
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
      <form action="{{ route('store.admin') }}" method="post">
         @csrf
         <div class="row">
            <div class="col-md-6 md-form md-outline">
               <input required type="text" id="name" class="form-control" name="name">
               <label for="name" class="ml-3">Name</label>
            </div>
            <div class="col-md-6 md-form md-outline">
               <input required type="number" id="phone" class="form-control" name="phone">
               <label for="phone" class="ml-3">Phone</label>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 md-form md-outline">
               <input required type="email" id="email" class="form-control" name="email">
               <label for="email" class="ml-3">Email</label>
            </div>
            <div class="col-md-6 md-form md-outline">
               <input required type="password" id="password" class="form-control" name="password">
               <label for="password" class="ml-3">Password</label>
            </div>
         </div>
         <div class="row ml-3">
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="category" name="category" value="1">
                  <label class="custom-control-label" for="category">Category</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="coupon" name="coupon" value="1">
                  <label class="custom-control-label" for="coupon">Coupon</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="product" name="product" value="1">
                  <label class="custom-control-label" for="product">Product</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="blog" name="blog" value="1">
                  <label class="custom-control-label" for="blog">Blog</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="order" name="order" value="1">
                  <label class="custom-control-label" for="order">Order</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="report" name="report" value="1">
                  <label class="custom-control-label" for="report">Report</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="role" name="role" value="1">
                  <label class="custom-control-label" for="role">Role</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="return" name="return" value="1">
                  <label class="custom-control-label" for="return">Return</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="contact" name="contact" value="1">
                  <label class="custom-control-label" for="contact">Contact</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="comment" name="comment" value="1">
                  <label class="custom-control-label" for="comment">Comment</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="other" name="other" value="1">
                  <label class="custom-control-label" for="other">Other</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="setting" name="setting" value="1">
                  <label class="custom-control-label" for="setting">Setting</label>
               </div>
            </div>
            <div class="col-md-3">
               <div class="md-form custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="stock" name="stock" value="1">
                  <label class="custom-control-label" for="stock">Stock</label>
               </div>
            </div>
         </div>
         <div class="text-center mt-1-half mt-1">
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