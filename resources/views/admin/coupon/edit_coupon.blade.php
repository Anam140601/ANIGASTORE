@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Coupon Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Coupon Update</h5>
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
                     <form action="{{ url('update/coupons/'.$coupon->id) }}" method="post">
                        @csrf
                        <div class="md-form md-outline">
                           <input type="text" id="coupon" class="form-control" name="coupon" value="{{ $coupon->coupon }}">
                           <label for="coupon" class="">Coupon Code</label>
                        </div>
                        <div class="md-form md-outline">
                           <input type="number" id="discount" class="form-control" name="discount" value="{{ $coupon->discount }}">
                           <label for="discount" class="">Coupon Discount (%)</label>
                        </div>
                        <div class="text-center mt-1-half">
                           <button type="submit" class="btn btn-danger mb-2">Update <i class="fas fa-paper-plane ml-1"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
      </section>
   </div>
</main>
@endsection