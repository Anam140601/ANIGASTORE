@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Website Setting</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Company Setting</h5>
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
                     <form action="{{ route('update.site.setting') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $site->id }}">
                        <div class="row">
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="name" class="form-control" value="{{ $site->name }}" name="name">
                              <label for="name" class="ml-3">Name</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="address" class="form-control" value="{{ $site->address }}" name="address">
                              <label for="address" class="ml-3">Address</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="email" id="email" class="form-control" value="{{ $site->email }}" name="email">
                              <label for="email" class="ml-3">Email</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 md-form md-outline">
                              <input required type="number" id="phone_1" class="form-control" value="{{ $site->phone_1 }}" name="phone_1">
                              <label for="phone_1" class="ml-3">Phone 1</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="number" id="phone_2" class="form-control" value="{{ $site->phone_2 }}" name="phone_2">
                              <label for="phone_2" class="ml-3">Phone 2</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="facebook" class="form-control" value="{{ $site->facebook }}" name="facebook">
                              <label for="facebook" class="ml-3">Facebook Link</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="youtube" class="form-control" value="{{ $site->youtube }}" name="youtube">
                              <label for="youtube" class="ml-3">Youtube Link</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="instagram" class="form-control" value="{{ $site->instagram }}" name="instagram">
                              <label for="instagram" class="ml-3">Instagram Link</label>
                           </div>
                           <div class="col-md-4 md-form md-outline">
                              <input required type="text" id="twitter" class="form-control" value="{{ $site->twitter }}" name="twitter">
                              <label for="twitter" class="ml-3">Twitter Link</label>
                           </div>
                        </div>
                        <div class="text-center mt-1-half mt-1">
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