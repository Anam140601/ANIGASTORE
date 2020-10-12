@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">New Post Add</h5>
                  <form method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="title_ina" name="title_ina">
                              <label for="title_ina">Title (Indonesian)</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="title_en" name="title_en">
                              <label for="title_en">Title (English)</label>
                           </div>
                        </div>
                        <div class="col-md-4 mt-4">
                           <select class="browser-default custom-select custom-select-sm" name="category_id" id="category_id">
                              <option value="" selected disabled>Category</option>
                              @foreach ($category as $cat)
                                 <option value="{{ $cat->id }}">{{ $cat->category_name_ina }} ({{ $cat->category_name_en }})</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-12">
                           <label for="details_ina">Description Indonesian</label>
                           <div class="md-form form-group md-outline">
                              <input id="details_ina" type="hidden" name="details_ina">
                              <trix-editor input="details_ina"></trix-editor>
                           </div>
                        </div><div class="col-md-12">
                           <label for="details_en">Description English</label>
                           <div class="md-form form-group md-outline">
                              <input id="details_en" type="hidden" name="details_en">
                              <trix-editor input="details_en"></trix-editor>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="md-form">
                              <div class="file-field">
                                 <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image</span>
                                    <input type="file" name="image" onchange="readURL1(this);">
                                 </div>
                                 <div class="file-path-wrapper">
                                    <input readonly class="file-path validate" type="text" placeholder="Upload Image" name="image">
                                 </div>
                                 <img src="#" id="one" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-center mt-1-half mt-5">
                        <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
                        <a href="{{ route('blog.posts') }}" class="btn btn-success mb-2">All Post</a>
                     </div>
                  </form>
                  <!-- Extended material form grid -->
               </div>
            </div>
      </section>
   </div>
</main>
@endsection
@push('css')
   <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endpush
@push('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
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
@endpush