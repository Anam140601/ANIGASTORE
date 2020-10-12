@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Subscriber Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Subscriber List <a href="" class="btn btn-sm btn-danger" style="float: right" data-toggle="modal" data-target="#modaldeleteall">All Delete</a></h5>
                  <table id="dt-multi-checkbox" class="table" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th></th>
                           <th class="th-sm">ID</th>
                           <th class="th-sm">Subscriber Email</th>
                           <th class="th-sm">Subscribing Time</th>
                           <th class="th-sm">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($sub as $key=>$sb)
                        <tr>
                           <td></td>
                           <td>{{ $key +1 }}</td>
                           <td>{{ $sb->email }}</td>
                           <td>{{ \Carbon\Carbon::parse($sb->created_at)->diffforhumans() }}</td>
                           <td>
                              <a href="{{ URL::to('delete/sub/'.$sb->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
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
   $('#dt-multi-checkbox').dataTable({

      columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
      }],
      select: {
      style: 'multi',
      selector: 'td:first-child'
      }
   });
   });
</script>
@endpush