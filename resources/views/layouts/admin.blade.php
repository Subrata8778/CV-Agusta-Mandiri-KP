<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/logo/logo-bg.png') }}">
    <title>CV Agusta Mandiri - Admin</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/extra-libs/prism/prism.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">

    <!-- Custom -->
    <link href="{{ asset('admin/dist/css/styles.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <img src="{{ asset('storage/logo/logo-text-bg.png') }}" alt="CV Agusta Mandiri" class="img-fluid" style="max-height: 70px;">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left me-auto ms-3 ps-1"></ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <div class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('admin/images/users/profile-pic.jpg') }}" alt="user" class="rounded-circle" width="40">
                                <span class="ms-2 d-none d-lg-inline-block"><span>Halo,</span> <span class="text-dark">{{ auth()->user()->name }}</span></span>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Layanan</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.advertising.index') }}" aria-expanded="false">
                                <i data-feather="trending-up" class="feather-icon"></i>
                                <span class="hide-menu">Agusta Advertising</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="zap" class="feather-icon"></i>
                                <span class="hide-menu">Agusta Motor</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.car.sell.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Produk</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.car.brand.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Merk Mobil</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.car.category.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Kategori Mobil</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.property.index') }}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Agusta Properti</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">Janji Temu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.appointment.indexProcess') }}" aria-expanded="false">
                                <i data-feather="clock" class="feather-icon"></i>
                                <span class="hide-menu">Sedang Berjalan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.appointment.indexFinish') }}" aria-expanded="false">
                                <i data-feather="check-circle" class="feather-icon"></i>
                                <span class="hide-menu">Selesai</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.appointment.indexCancel') }}" aria-expanded="false">
                                <i data-feather="x-circle" class="feather-icon"></i>
                                <span class="hide-menu">Dibatalkan</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Laporan</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.portfolio.index') }}" aria-expanded="false">
                                <i data-feather="image" class="feather-icon"></i>
                                <span class="hide-menu">Portofolio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="box" class="feather-icon"></i>
                                <span class="hide-menu">Produk Terlaris</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.report.product.advInit') }}" class="sidebar-link">
                                        <span class="hide-menu"> Agusta Advertising</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.report.product.carInit') }}" class="sidebar-link">
                                        <span class="hide-menu"> Agusta Motor</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.report.product.propInit') }}" class="sidebar-link">
                                        <span class="hide-menu"> Agusta Properti</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.report.user') }}" aria-expanded="false">
                                <i data-feather="user" class="feather-icon"></i>
                                <span class="hide-menu">Performa Pelanggan</span>
                            </a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Autentikasi</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link text-danger" href="{{ route('logout') }}" aria-expanded="false">
                                <i data-feather="log-out" class="feather-icon text-danger"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @yield('breadcrumb')

            <div class="container-fluid">
                @yield('content')
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                © 2023 CV Agusta Mandiri. All rights reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('admin/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('admin/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('admin/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('admin/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <!-- <script src="{{ asset('admin/dist/js/app-style-switcher.js') }}"></script> -->
    <!-- <script src="{{ asset('admin/dist/js/feather.min.js') }}"></script> -->
    <!-- slimscrollbar scrollbar JavaScript -->
    <!-- <script src="{{ asset('admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script> -->
    <script src="{{ asset('admin/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <!-- <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script> -->
    <!--Custom JavaScript -->
    <!-- <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script> -->
    <!--This page plugins -->
    <script src="{{ asset('admin/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <!-- <script src="{{ asset('DataTables/datatables.min.js') }}"></script> -->

    <script src="{{ asset('admin/extra-libs/prism/prism.js') }}"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- numeral.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        function rupiah(rp) {
            return 'Rp ' + numeral(rp).format(0, 0);
        }

        $(document).ready(function() {
            $('.rupiah').each(function() {
                var num = $(this).text();
                $(this).text(rupiah(num));
            });
        });
    </script>

    @yield('jquery')

</body>

</html>