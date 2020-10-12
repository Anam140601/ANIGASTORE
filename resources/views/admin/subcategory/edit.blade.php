@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5"">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Subcategory Table</h3>
            <div class="card">
               <div class="card-body">
                  <h5 class="tulisan-putih card-body-title">Subcategory Update</h5>
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
                     <form action="{{ url('update/subcategory/'.$subcategory->id) }}" method="post">
                        @csrf
                        <label for="category_id">Category</label>
                        <select class="browser-default custom-select custom-select-sm" name="category_id" id="category_id">
                           @foreach ($category as $cat)
                           <option value="{{ $cat->id }}" <?php if ($cat->id === $subcategory->category_id) {echo "selected";}?> >{{ $cat->category_name }}</option>
                           @endforeach
                        </select>
                        <div class="md-form md-outline">
                           <input type="text" id="subcategory" class="form-control" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                           <label for="subcategory" class="">Subcategory Name</label>
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