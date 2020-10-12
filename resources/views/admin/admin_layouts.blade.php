
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ANIGASTORE Admin Panel</title>
        <link rel="icon" href="{{ asset('public/image/anigastore.png') }}">
        <!-- Bootstrap core CSS  -->
        <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
        <!-- Material Design Bootstrap  -->
        <link rel="stylesheet" href="{{ asset('public/backend/css/mdb.css') }}">
        <!-- DataTables.net  -->
        <link rel="stylesheet" href="{{ asset('public/backend/css/addons/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/css/addons/datatables-select.min.css') }}">
        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css">
        <!-- Your custom styles (optional) -->
        @stack('css')
    </head>
    <body class="fixed-sn white-skin">
        @guest
            
        @else
            <header>
                <!-- Sidebar navigation -->
                <div id="slide-out" class="side-nav sn-bg-4 fixed">
                    <ul class="custom-scrollbar">
                        <!-- Logo -->
                        <li class="logo-sn waves-effect py-3">
                            <div class="text-center">
                            <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
                            </div>
                        </li>
                        <!-- Side navigation links -->
                        <li>
                            <ul class="collapsible collapsible-accordion">

                                <li>
                                    <a href="{{ url('admin/home') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Dashboards
                                    </a>
                                </li>
                                @if(Auth::user()->category == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                    <i class="w-fa fas fa-image"></i>Category<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{ route('categories') }}" class="waves-effect">Category</a></li>
                                        <li><a href="{{ route('subcategories') }}" class="waves-effect">Sub Category</a></li>
                                        <li><a href="{{ route('brands') }}" class="waves-effect">Brand</a></li>
                                    </ul>
                                    </div>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->coupon == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-user"></i>Coupons<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('admin.coupon') }}" class="waves-effect">Coupons</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->product == 1)
                                <li>
                                    <a href="{{ route('products') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Product
                                    </a>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->blog == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-th"></i>Blogs<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('add.blog.categorylist') }}" class="waves-effect">Blog Category</a></li>
                                            <li><a href="{{ route('add.posts') }}" class="waves-effect">Add Post</a></li>
                                            <li><a href="{{ route('blog.posts') }}" class="waves-effect">Post List</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif
                                
                                @if(Auth::user()->order == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-th"></i>Orders<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('admin.new.order') }}" class="waves-effect">New Order</a></li>
                                            <li><a href="{{ route('admin.accept.order') }}" class="waves-effect">Accepted Order</a></li>
                                            <li><a href="{{ route('admin.progres.order') }}" class="waves-effect">Progres Order</a></li>
                                            <li><a href="{{ route('admin.delivered.order') }}" class="waves-effect">Delivered Order</a></li>
                                            <li><a href="{{ route('admin.cancel.order') }}" class="waves-effect">Cancel Order</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->report == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fab fa-css3"></i>Reports<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('today.order') }}" class="waves-effect">Today Order</a></li>
                                            <li><a href="{{ route('today.delivered') }}" class="waves-effect">Today Delivered</a></li>
                                            <li><a href="{{ route('this.mounth') }}" class="waves-effect">This Month Delivered</a></li>
                                            <li><a href="{{ route('search.report') }}" class="waves-effect">Search Report</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->role == 1)
                                <li>
                                    <a href="{{ route('admin.all.user') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>User Role
                                    </a>
                                </li>
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fab fa-css3"></i>Return Order<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('admin.return.all') }}" class="waves-effect">All Request</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->contact == 1)
                                <li>
                                    <a href="{{ route('all.message') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Contact Message
                                    </a>
                                </li>
                                @else
                                @endif
                                
                                @if(Auth::user()->stock == 1)
                                <li>
                                    <a href="{{ route('admin.product.stock') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Product Stocks
                                    </a>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->comment == 1)
                                <li>
                                    <a href="" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Product Comments
                                    </a>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->setting == 1)
                                <li>
                                    <a href="{{ route('admin.site.setting') }}" class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fas fa-tachometer-alt"></i>Site Setting
                                    </a>
                                </li>
                                @else
                                @endif

                                @if(Auth::user()->other == 1)
                                <li>
                                    <a class="collapsible-header waves-effect arrow-r">
                                        <i class="w-fa fab fa-css3"></i>Others<i class="fas fa-angle-down rotate-icon"></i>
                                    </a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('admin.newslater') }}" class="waves-effect">NewsLaters</a></li>
                                            <li><a href="{{ route('admin.seo') }}" class="waves-effect">SEO Setting</a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                @endif
                                
                            </ul>
                        </li>
                    <!-- Side navigation links -->

                    </ul>
                    <div class="sidenav-bg mask-strong"></div>
                </div>
                <!-- Sidebar navigation -->

                <!-- Navbar -->
                <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

                    <!-- SideNav slide-out button -->
                    <div class="float-left">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
                    </div>

                    <!-- Breadcrumb -->
                    <div class="breadcrumb-dn mr-auto">
                    <p>ANIGASTORE</p>
                    </div>

                    <div class="d-flex change-mode">

                    <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                        <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
                    </div>

                    <!-- Navbar links -->
                    <ul class="nav navbar-nav nav-flex-icons ml-auto">

                        <!-- Dropdown -->
                        <li class="nav-item dropdown notifications-nav">
                        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="badge red">3</span> <i class="fas fa-bell"></i>
                            <span class="d-none d-md-inline-block">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                            </a>
                            <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                            </a>
                            <a class="dropdown-item" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                            </a>
                        </div>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Log Out</a>
                            <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                            <a class="dropdown-item" href="#">My account</a>
                        </div>
                        </li>

                    </ul>
                    <!-- Navbar links -->

                    </div>

                </nav>
                <!-- Navbar -->
            </header>
        @endguest
        
        @yield('admin_content')

        <!-- SCRIPTS  -->
        <!-- JQuery  -->
        <script src="{{ asset('public/backend/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Sweet Alert -->
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="/pathto/js/sweetalert.js"></script>
        @include('sweet::alert')
        <!-- Bootstrap tooltips  -->
        <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
        <!-- Bootstrap core JavaScript  -->
        <script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript  -->
        <script src="{{ asset('public/backend/js/mdb.js') }}"></script>
        <!-- DataTables  -->
        <script src="{{ asset('public/backend/js/addons/datatables.min.js') }}"></script>
        <!-- DataTables Select  -->
        <script src="{{ asset('public/backend/js/addons/datatables-select.min.js') }}"></script>
        {{-- Toaster --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- Custom scripts -->
        @stack('js')
        
        {{-- dark mode --}}
        <script>
            $(function () {
                $('#dark-mode').on('click', function (e) {

                e.preventDefault();
                $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
                $('.list-panel a').toggleClass('dark-grey-text');
                $('.tulisan-putih').toggleClass('text-white');
                $('footer, .card').toggleClass('dark-card-admin');
                $('body, .navbar').toggleClass('white-skin navy-blue-skin');
                $(this).toggleClass('white text-dark btn-outline-black');
                $('body').toggleClass('dark-bg-admin');
                $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                    '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
                $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
                $('.gradient-card-header').toggleClass('white black lighten-4');
                $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

                });
            });
        </script>
        <!-- Initializations -->
        <script>
            new WOW().init();
        </script>
        <script>
            // SideNav Initialization
            $(".button-collapse").sideNav();
                var container = document.querySelector('.custom-scrollbar');
                var ps = new PerfectScrollbar(container, {
                    wheelSpeed: 2,
                    wheelPropagation: true,
                    minScrollbarLength: 20
            });
            // Data Picker Initialization
            $('.datepicker').pickadate();
            // Material Select Initialization
            $(document).ready(function () {
                $('.mdb-select').material_select();
            });
            // Tooltips Initialization
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script>
            @if(Session::has('messege'))
                var type="{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('messege') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('messege') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('messege') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('messege') }}");
                        break;
                }
            @endif
        </script>  
        <script>  
            $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
                swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                    swal("Data Is Save!");
                    }
                });
            });
        </script>
    </body>
</html>
