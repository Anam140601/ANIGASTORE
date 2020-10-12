@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-13">
         <h5 class="tulisan-putih card-body-title">Order Details</h5>
         <div class="row">
            <div class="col-md-6">
               <div class="card card-cascade cascading-admin-card">
                  @if($order->status == 0)
                  <div class="card-header bg-warning text-white"><strong>Order</strong> Details</div>
                  @elseif($order->status == 1)
                  <div class="card-header bg-info text-white"><strong>Order</strong> Details</div>
                  @elseif($order->status == 2)
                  <div class="card-header bg-primary text-white"><strong>Order</strong> Details</div>
                  @elseif($order->status == 3)
                  <div class="card-header bg-success text-white"><strong>Order</strong> Details</div>
                  @else
                  <div class="card-header bg-danger text-white"><strong>Order</strong> Details</div>
                  @endif
                  <div class="card-body">
                     <table class="table table-striped">
                        <tr>
                           <th>Name</th>
                           <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                           <th>Phone</th>
                           <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                           <th>Payment Type</th>
                           <th>{{ $order->payment_type }}</th>
                        </tr>
                        <tr>
                           <th>Payment Id</th>
                           <th>{{ $order->payment_id }}</th>
                        </tr>
                        <tr>
                           <th>Total</th>
                           <th>@rupiah($order->total)</th>
                        </tr>
                        <tr>
                           <th>Date</th>
                           <th>{{ $order->date }}</th>
                        </tr>
                        <tr>
                           <th>Month</th>
                           <th>{{ $order->month }}</th>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card card-cascade cascading-admin-card">
                  @if($order->status == 0)
                  <div class="card-header bg-warning text-white"><strong>Shipping</strong> Details</div>
                  @elseif($order->status == 1)
                  <div class="card-header bg-info text-white"><strong>Shipping</strong> Details</div>
                  @elseif($order->status == 2)
                  <div class="card-header bg-primary text-white"><strong>Shipping</strong> Details</div>
                  @elseif($order->status == 3)
                  <div class="card-header bg-success text-white"><strong>Shipping</strong> Details</div>
                  @else
                  <div class="card-header bg-danger text-white"><strong>Shipping</strong> Details</div>
                  @endif
                  <div class="card-body">
                     <table class="table table-striped">
                        <tr>
                           <th>Name</th>
                           <th>{{ $shipping->ship_name }}</th>
                        </tr>
                        <tr>
                           <th>Phone</th>
                           <th>{{ $shipping->ship_phone }}</th>
                        </tr>
                        <tr>
                           <th>Email</th>
                           <th>{{ $shipping->ship_email }}</th>
                        </tr>
                        <tr>
                           <th>City</th>
                           <th>{{ $shipping->ship_city }}</th>
                        </tr>
                        <tr>
                           <th>Address</th>
                           <th>{{ $shipping->ship_address }}</th>
                        </tr>
                        <tr>
                           <th>Status</th>
                           <th>
                              @if($order->status == 0)
                              <span class="badge badge-warning">Pending</span>
                              @elseif($order->status == 1)
                              <span class="badge badge-info">Payment Acepterd</span>
                              @elseif($order->status == 2)
                              <span class="badge badge-primary">Progres</span>
                              @elseif($order->status == 3)
                              <span class="badge badge-success">Delivered</span>
                              @else
                              <span class="badge badge-danger">Cancel</span>
                              @endif
                           </th>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-13 mt-5">
            <div class="card card-cascade cascading-admin-card">
               @if($order->status == 0)
               <div class="card-header bg-warning text-white"><strong>Product</strong> Details</div>
               @elseif($order->status == 1)
               <div class="card-header bg-info text-white"><strong>Product</strong> Details</div>
               @elseif($order->status == 2)
               <div class="card-header bg-primary text-white"><strong>Product</strong> Details</div>
               @elseif($order->status == 3)
               <div class="card-header bg-success text-white"><strong>Product</strong> Details</div>
               @else
               <div class="card-header bg-danger text-white"><strong>Product</strong> Details</div>
               @endif
               <div class="card-body">
                  <table id="dt-filter-select" class="table table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th class="th-sm">Images</th>
                           <th class="th-sm">SKU</th>
                           <th class="th-sm">Name</th>
                           <th class="th-sm">Color</th>
                           <th class="th-sm">Size</th>
                           <th class="th-sm">Quantity</th>
                           <th class="th-sm">Unit Price</th>
                           <th class="th-sm">Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($details as $row)
                        <tr>
                           <td><img src="{{ URL::to($row->image_1) }}" alt="" width="50px;" title="Image of {{ $row->name }}"></td>
                           <td>{{ $row->code }}</td>
                           <td class="text-uppercase">{{ $row->product_name }}</td>
                           <td class="text-uppercase">{{ $row->color }}</td>
                           <td class="text-uppercase">{{ $row->size }}</td>
                           <td>{{ $row->qty }}</td>
                           <td>{{ $row->singleprice }}</td>
                           <td>{{ $row->totalprice }}</td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div style="float: right" class="mt-3 mb-5">
            @if($order->status == 0)
            <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger">Cancel Order</a>
            <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">Payment Accept</a>
            @elseif($order->status == 1)
            <a href="{{ url('admin/delivery/process/'.$order->id) }}" class="btn btn-info">Process Delivery</a>
            @elseif($order->status == 2)
            <a href="{{ url('admin/delivery/done/'.$order->id) }}" class="btn btn-success">Delivery Done</a>
            @elseif($order->status == 3)
            <h4 class="text-success">This product are succesfully delivered!</h4>
            @else
            <h4 class="text-danger">This product has been canceled!</h4>
            @endif
         </div>
      </section>
   </div>
</main>

@endsection