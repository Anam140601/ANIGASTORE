@extends('admin.admin_layouts')

@section('admin_content')
<!-- Main layout -->
<main>
    <div class="container-fluid">
        <section class="mt-md-4 pt-md-2 mb-5 pb-4">
            <div class="row">

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Today Orders</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $todayqty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold dark-grey-text">@rupiah($today)</h4>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Better than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">This Month Orders</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $monthqty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold dark-grey-text">@rupiah($month)</h4>
                        <div class="progress mb-3">
                            <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Worse than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">This Year</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $yearqty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold dark-grey-text">@rupiah($year)</h4>
                        <div class="progress mb-3">
                            <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Worse than last week (75%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-0">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Today Delivered</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $todayDeliveredQty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold dark-grey-text">@rupiah($todayDelivered)</h4>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Better than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

            </div>
            <div class="row mt-5">

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Total Return</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $returnQty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold dark-grey-text">@rupiah($return)</h4>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Better than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Total Product</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $productQty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Worse than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Total Brand</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $brandQty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Worse than last week (75%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-0">

                    <!-- Card -->
                    <div class="card card-cascade cascading-admin-card">

                        <!-- Card Data -->
                        <div class="admin-up">
                        <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Total User</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ $userQty }}</h4>
                        </div>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Better than last week (25%)</p>
                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!-- Grid column -->

            </div>
        </section>
        <section class="mb-5">
            <div class="card card-cascade narrower">
                <section>
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-xl-5 col-lg-12 mr-0 pb-2">

                            <!-- Card image -->
                        <div class="view view-cascade gradient-card-header light-blue lighten-1">
                            <h2 class="h2-responsive mb-0 font-weight-500">Sales</h2>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade pb-0">

                            <!-- Panel data -->
                            <div class="row py-3 pl-4">

                                <!-- First column -->
                                <div class="col-md-6">

                                    <!-- Date select -->
                                    <p class="lead"><span class="badge info-color p-2">Data range</span></p>
                                    <select class="mdb-select colorful-select dropdown-info md-form">
                                    <option value="" disabled selected>Choose time period</option>
                                    <option value="1">Today</option>
                                    <option value="2">Yesterday</option>
                                    <option value="3">Last 7 days</option>
                                    <option value="3">Last 30 days</option>
                                    <option value="3">Last week</option>
                                    <option value="3">Last month</option>
                                    </select>

                                    <!-- Date pickers -->
                                    <p class="lead pt-3 pb-4"><span class="badge info-color p-2">Custom date</span></p>
                                    <div class="md-form">
                                    <input placeholder="Selected date" type="text" id="from" class="form-control datepicker">
                                    <label for="date-picker-example">From</label>
                                    </div>
                                    <div class="md-form">
                                    <input placeholder="Selected date" type="text" id="to" class="form-control datepicker">
                                    <label for="date-picker-example">To</label>
                                    </div>

                                </div>
                                <!-- First column -->

                                <!-- Second column -->
                                <div class="col-md-6 text-center pl-xl-2 my-md-0 my-3">

                                    <!-- Summary -->
                                    <p>Total sales: <strong>2000$</strong>
                                    <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top"
                                        title="Total sales in the given period"><i class="fas fa-question"></i></button>
                                    </p>
                                    <p>Average sales: <strong>100$</strong>
                                    <button type="button" class="btn btn-info btn-sm p-2 mr-0" data-toggle="tooltip"
                                        data-placement="top" title="Average daily sales in the given period"><i
                                        class="fas fa-question"></i></button>
                                    </p>

                                    <!-- Change chart -->
                                    <span class="min-chart my-4" id="chart-sales" data-percent="76"><span
                                        class="percent"></span></span>
                                    <h5>
                                    <span class="badge red accent-2 p-2">Change <i class="fas fa-arrow-circle-up ml-1"></i></span>
                                    <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top"
                                        title="Percentage change compared to the same period in the past"><i
                                        class="fas fa-question"></i>
                                    </button>
                                    </h5>

                                </div>
                                <!-- Second column -->

                                </div>
                                <!-- Panel data -->

                            </div>
                            <!-- Card content -->

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-xl-7 col-lg-12 mb-4 pb-2">

                            <!-- Chart -->
                            <div class="view view-cascade gradient-card-header blue-gradient">

                                <canvas id="lineChart" height="175"></canvas>

                            </div>

                        </div>
                        <!-- Grid column -->

                    </div>
                </section>
            </div>
        </section>
    </div>
</main>
@endsection
@push('js')
    <!-- Charts -->
    <script>
        // Small chart
        $(function () {
            $('.min-chart#chart-sales').easyPieChart({
            barColor: "#FF5252",
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
            });
        });

        // Main chart
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "#fff",
                backgroundColor: 'rgba(255, 255, 255, .3)',
                borderColor: 'rgba(255, 255, 255)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
            },
            options: {
            legend: {
                labels: {
                fontColor: "#fff",
                }
            },
            scales: {
                xAxes: [{
                gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                },
                ticks: {
                    fontColor: "#fff",
                },
                }],
                yAxes: [{
                display: true,
                gridLines: {
                    display: true,
                    color: "rgba(255,255,255,.25)"
                },
                ticks: {
                    fontColor: "#fff",
                },
                }],
            }
            }
        });
    </script>
@endpush
