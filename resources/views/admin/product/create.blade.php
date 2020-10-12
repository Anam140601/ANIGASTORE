@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">New Product Add <a href="{{ route('products') }}" class="btn btn-success btn-sm" style="float: right">All Product</a></h5>
                  <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="col-md-7">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="name" name="name">
                              <label for="name">Name</label>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="code" name="code">
                              <label for="code">SKU</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <select class="browser-default custom-select custom-select-sm" name="category_id" id="category_id">
                              <option value="" selected disabled>Category</option>
                              @foreach ($category as $cat)
                                 <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-4">
                           <select class="browser-default custom-select custom-select-sm" name="subcategory_id" id="subcategory_id">
                              <option value="" selected disabled>Subcategory</option>
                           </select>
                        </div>
                        <div class="col-md-4">
                           <select class="browser-default custom-select custom-select-sm" name="brand_id" id="brand_id">
                              <option value="" selected disabled>Brand</option>
                              @foreach ($brand as $br)
                                 <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-6">
                           <div class="md-form form-group md-outline">
                              <input type="number" class="form-control" id="selling_price" name="selling_price">
                              <label for="selling_price">Price</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="md-form form-group md-outline">
                              <input type="number" class="form-control" id="discount_price" name="discount_price">
                              <label for="discount_price">Discout Price</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="size" name="size" data-role="tagsinput" placeholder="Size">
                              <label for="size">Size</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="color" name="color" data-role="tagsinput" placeholder="Color">
                              <label for="Color">Color</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="number" class="form-control" id="qty" name="qty">
                              <label for="qty">Quantity</label>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <label for="detail">Description</label>
                           <div class="md-form form-group md-outline">
                              <input id="detail" type="hidden" name="detail">
                              <trix-editor input="detail"></trix-editor>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="md-form form-group md-outline">
                              <input id="video_link" type="text" name="video_link" class="form-control">
                              <label for="video_link">Video Link (Optional)</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form">
                              <div class="file-field">
                                 <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Main Image</span>
                                    <input type="file" name="image_1" onchange="readURL1(this);" required>
                                 </div>
                                 <div class="file-path-wrapper">
                                    <input readonly class="file-path validate" type="text" placeholder="Upload Main Image" name="image_1">
                                 </div>
                                 <img src="#" id="one" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form">
                              <div class="file-field">
                                 <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image 2</span>
                                    <input type="file" name="image_2" onchange="readURL2(this);" required>
                                 </div>
                                 <div class="file-path-wrapper">
                                    <input readonly class="file-path validate" type="text" placeholder="Upload Image 2" name="image_2">
                                 </div>
                                 <img src="#" id="two" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form">
                              <div class="file-field">
                                 <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image 3</span>
                                    <input type="file" name="image_3" onchange="readURL3(this);" required>
                                 </div>
                                 <div class="file-path-wrapper">
                                    <input readonly class="file-path validate" type="text" placeholder="Upload Image 3" name="image_3">
                                 </div>
                                 <img src="#" id="three" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row ml-3">
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="main_slider" name="main_slider" value="1">
                              <label class="custom-control-label" for="main_slider">Main Slider</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="hot_deal" name="hot_deal" value="1">
                              <label class="custom-control-label" for="hot_deal">Hod Deal</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="best_rated" name="best_rated" value="1">
                              <label class="custom-control-label" for="best_rated">Best Rated</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="trend" name="trend" value="1">
                              <label class="custom-control-label" for="trend">Trend</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="mid_slider" name="mid_slider" value="1">
                              <label class="custom-control-label" for="mid_slider">Middle Slider</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="hot_new" name="hot_new" value="1">
                              <label class="custom-control-label" for="hot_new">Hot New</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="md-form custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="buyone_getone" name="buyone_getone" value="1">
                              <label class="custom-control-label" for="buyone_getone">Buy One Get One</label>
                           </div>
                        </div>
                     </div>

                     <div class="text-center mt-1-half mt-5">
                        <button type="submit" class="btn btn-danger mb-2">Add <i class="fas fa-paper-plane ml-1"></i></button>
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
      $(document).ready(function(){
      $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {
               
               $.ajax({
               url: "{{ url('/get/subcategory/') }}/"+category_id,
               type:"GET",
               dataType:"json",
               success:function(data) { 
               var d =$('select[name="subcategory_id"]').empty();
               $.each(data, function(key, value){
               
               $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

               });
               },
               });

            }else{
               alert('danger');
            }

               });
         });

   </script>

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
   <script type="text/javascript">
      function readURL2(input){
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#two')
            .attr('src', e.target.result)
            .width(120)
            };
            reader.readAsDataURL(input.files[0]);
         }
      }
      </script>
      <script type="text/javascript">
         function readURL3(input){
            if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
               $('#three')
               .attr('src', e.target.result)
               .width(120)
               };
               reader.readAsDataURL(input.files[0]);
            }
         }
         </script>
@endpush