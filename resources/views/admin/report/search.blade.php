@extends('admin.admin_layouts')
@section('admin_content')
<main>
   <div class="container-fluid mb-5">
      <section>
         <div class="col-md-12">
            <h3 class="tulisan-putih font-weight-bold">Search Report</h3>
            <div class="row">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="modal-body mb-0">
                           <form action="{{ route('search.by.date') }}" method="post">
                              @csrf
                              <div class="">
                                 <label for="date" class="">Search By Date</label>
                                 <input type="date" id="date" class="form-control" name="date" >
                              </div>
                              <div class="text-center mt-1-half">
                                 <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="modal-body mb-0">
                           <form action="{{ route('search.by.month') }}" method="post">
                              @csrf
                              <div>
                                 <label for="month">Search By Month</label>
                                 <select class="browser-default custom-select custom-select-sm" name="month" id="month">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                 </select>
                              </div>
                              <div class="text-center mt-1-half">
                                 <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="modal-body mb-0">
                           <form action="{{ route('search.by.year') }}" method="post">
                              @csrf
                              <label for="year">Search By Year</label>
                              <select class="browser-default custom-select custom-select-sm" name="year" id="year">
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                                 <option value="2023">2023</option>
                                 <option value="2024">2024</option>
                                 <option value="2025">2025</option>
                              </select>
                              <div class="text-center mt-1-half">
                                 <button type="submit" class="btn btn-danger mb-2">Submit <i class="fas fa-paper-plane ml-1"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </section>
   </div>
</main>
@endsection