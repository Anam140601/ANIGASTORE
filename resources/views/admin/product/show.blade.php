@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-13">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Product Detaill <a href="{{ URL::to('edit/product/'.$product->id) }}" class="btn btn-sm btn-primary" style="float: right">Edit Product</a> <a href="{{ route('products') }}" class="btn btn-success btn-sm" style="float: right">Back</a></h5>
                  <div class="show">
                     <div class="form-row">
                        <div class="col-md-4 mt-3">
                           <label>Product Name <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->name }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>SKU <span class="text-danger">*</span></label><br>
                           <strong>{{ $product->code }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Quantity <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->qty }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Category <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->category_name }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Subcategory <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->subcategory_name }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Brand <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->brand_name }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Size <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->size }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Color <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->color }}</strong>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label>Price <span class="text-danger">*</span></label><br>
                           <strong class="text-uppercase">{{ $product->selling_price }}</strong>
                        </div>
                        <div class="col-md-12 mt-3">
                           <label>Video Link <span class="text-danger">*</span></label><br>
                           @if($product->video_link != null)
                              <strong>{{ $product->video_link }}</strong>
                           @else
                              <strong><p class="font-italic">Not Have Video Link</p></strong>
                           @endif
                        </div>
                        <div class="col-md-12 mt-3">
                           <label for="">Description <span class="text-danger">*</span></label><br>
                           {!! $product->detail !!}
                        </div>
                        <div class="col-md-4 text-center mt-3">
                           <label>Image One (Main Thumbnail) <span class="text-danger">*</span></label><br>
                           <img src="{{ URL::to($product->image_1) }}" alt="" width="200px;" title="Main Image of {{ $product->name }}">
                        </div>
                        <div class="col-md-4 text-center mt-3">
                           <label>Image Two <span class="text-danger">*</span></label><br>
                           <img src="{{ URL::to($product->image_2) }}" alt="" width="200px;" title="Second Image of {{ $product->name }}">
                        </div>
                        <div class="col-md-4 text-center mt-3">
                           <label>Image Three <span class="text-danger">*</span></label><br>
                           <img src="{{ URL::to($product->image_3) }}" alt="" width="200px;" title="Third Image of {{ $product->name }}">
                        </div>
                     </div>
                     <div class="row ml-3">
                        <div class="col-md-4 mt-3">
                           <label for="">
                              @if($product->main_slider == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Main SLider</span>
                        </label>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label for="">
                              @if($product->hot_deal == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Hot Deal</span>
                           </label>
                        </div>
                        <div class="col-md-4 mt-3">
                           <label for="">
                              @if($product->best_rated == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Best Rated</span>
                           </label>
                        </div>
                        <div class="col-md-4">
                           <label for="">
                              @if($product->trend == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Trend</span>
                           </label>
                        </div>
                        <div class="col-md-4">
                           <label for="">
                              @if($product->mid_slider == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Middle SLider</span>
                           </label>
                        </div>
                        <div class="col-md-4">
                           <label for="">
                              @if($product->hot_new == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Hot New</span>
                           </label>
                        </div>
                        <div class="col-md-4">
                           <label for="">
                              @if($product->buyone_getone == 1)
                                 <span class="badge badge-success">Active</span>
                              @else
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                              <span>Buy One Get One</span>
                           </label>
                        </div>
                     </div>
                  </div>
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