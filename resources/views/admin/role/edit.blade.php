@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Admin Edit Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Admin Edit Update</h5>
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
                     <form action="{{ route('update.admin') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">
                           <div class="col-md-6 md-form md-outline">
                              <input required type="text" id="name" class="form-control" value="{{ $user->name }}" name="name">
                              <label for="name" class="ml-3">Name</label>
                           </div>
                           <div class="col-md-6 md-form md-outline">
                              <input required type="number" id="phone" class="form-control" value="{{ $user->phone }}" name="phone">
                              <label for="phone" class="ml-3">Phone</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 md-form md-outline">
                              <input required type="email" id="email" class="form-control" value="{{ $user->email }}" name="email">
                              <label for="email" class="ml-3">Email</label>
                           </div>
                        </div>
                        <div class="row ml-3">
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="category" name="category" value="1" <?php if($user->category == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="category">Category</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="coupon" name="coupon" value="1"  <?php if($user->coupon == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="coupon">Coupon</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="product" name="product" value="1"  <?php if($user->product == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="product">Product</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="blog" name="blog" value="1"  <?php if($user->blog == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="blog">Blog</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="order" name="order" value="1"  <?php if($user->order == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="order">Order</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="report" name="report" value="1"  <?php if($user->report == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="report">Report</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="role" name="role" value="1"  <?php if($user->role == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="role">Role</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="return" name="return" value="1"  <?php if($user->return == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="return">Return</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="contact" name="contact" value="1"  <?php if($user->contact == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="contact">Contact</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="comment" name="comment" value="1"  <?php if($user->comment == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="comment">Comment</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="other" name="other" value="1"  <?php if($user->other == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="other">Other</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="setting" name="setting" value="1"  <?php if($user->setting == 1){echo"checked";} ?>>
                                 <label class="custom-control-label" for="setting">Setting</label>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="md-form custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="stock" name="stock" value="1"  <?php if($user->stock == 1){echo"checked";} ?>>
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
            </div>
      </section>
   </div>
</main>
@endsection