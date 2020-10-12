@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Brand Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Brand Update</h5>
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
                     <form action="{{ url('update/brand/'.$brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ URL::to($brand->brand_logo) }}" alt="" width="120px;" class="mb-3">
                        <div class="md-form">
                           <div class="file-field">
                              <div class="btn btn-primary btn-sm float-left">
                                 <span>Choose Logo</span>
                                 <input type="file" name="brand_logo">
                              </div>
                              <div class="file-path-wrapper">
                                 <input readonly class="file-path validate" id="old_logo" type="text" name="old_logo" value="{{ $brand->brand_logo }}">
                              </div>
                           </div>
                        </div>
                        <div class="md-form md-outline">
                           <input type="text" id="brand" class="form-control" name="brand_name" value="{{ $brand->brand_name }}">
                           <label for="brand" class="">Brand Name</label>
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