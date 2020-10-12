@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Seo Setting</h5>
                  <form method="POST" action="{{ route('update.seo') }}">
                     @csrf
                     <div class="form-row">
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="meta_title" value="{{ $seo->meta_title }}" name="meta_title">
                              <label for="meta_title">Meta Title</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="meta_author" value="{{ $seo->meta_author }}" name="meta_author">
                              <label for="meta_author">Meta Author</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <input type="text" class="form-control" id="meta_tag" value="{{ $seo->meta_tag }}" name="meta_tag">
                              <label for="meta_tag">Meta Tag</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline"> 
                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5">{{ $seo->meta_description }}</textarea>
                              <label for="meta_description">Meta Description</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <textarea class="form-control" name="google_analytics" id="google_analytics" rows="5">{{ $seo->google_analytics }}</textarea>
                              <label for="google_analytics">Google Analytics</label>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="md-form form-group md-outline">
                              <textarea class="form-control" name="bing_analytics" id="bing_analytics" rows="5">{{ $seo->bing_analytics }}</textarea>
                              <label for="bing_analytics">Bing Analytics</label>
                           </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $seo->id }}">
                        
                     </div>
                     <div class="text-center mt-1-half mt-5">
                        <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
                     </div>
                  </form>
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
@endpush