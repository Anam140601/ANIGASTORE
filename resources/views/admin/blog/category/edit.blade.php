@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Blog Category Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Blog Category Update <a href="{{ route('add.blog.categorylist') }}" class="btn btn-success btn-sm" style="float: right">All Blog Category</a></h5>
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
                     <form action="{{ url('update/blog/category/'.$cat->id) }}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="md-form md-outline">
                                 <input type="text" id="category_name_ina" class="form-control" name="category_name_ina" value="{{ $cat->category_name_ina }}">
                                 <label for="category_name_ina" class="">Blog Category Name Indonesia</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="md-form md-outline">
                                 <input type="text" id="category_name_en" class="form-control" name="category_name_en" value="{{ $cat->category_name_en }}">
                                 <label for="category_name_en" class="">Blog Category Name Indonesia</label>
                              </div>
                           </div>
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