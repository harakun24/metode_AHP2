<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo align-items-center d-flex">
                    <b class="text-white col-8 text-right">SMK MUHAMMADIYAH 3 YOGYAKARTA</b>
                    <a href="/">
                        <img src="/assets/images/logo.png" style="height:70px" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="/">
                                    <i class="ti-dashboard"></i>
                                    <span>dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Data</span></a>
                                <ul class="collapse">
                                    <li><a href="<?=route_to('user_list');?>">User</a></li>
                                    <li><a href="<?=route_to('kriteria_list');?>">Kriteria</a></li>
                                    <li><a href="<?=route_to('sub_list');?>">Subkriteria</a></li>
                                    <li><a href="<?=route_to('jurusan_list');?>">Jurusan</a></li>
                                    <li><a href="<?=route_to('peserta_list');?>">Peserta</a></li>
                                    <li><a href="<?=route_to('tanya_list');?>">Pertanyaan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i>
                                    <span>Nilai</span></a>
                                <ul class="collapse">
                                    <li><a href="<?=route_to('m_kriteria');?>">Kriteria</a></li>
                                    <li><a href="#">Subkriteria</a>
                                        <ul class="collapse">
                                            <?php $adm = new \App\Controllers\Ahp();
$submenu = $adm->kriteria->findAll();
$submenu2 = $adm->sub->where([
    'kriteria_id' => $adm->kriteria->where([
        'kriteria_nama' => 'UN',
    ])->first()['kriteria_id'],
])->findAll();?>
                                            <?php foreach ($submenu as $ss): ?>
                                            <li><a
                                                    href="/ahp/nilai/sub/<?=$ss['kriteria_id'];?>"><?=$ss['kriteria_nama'];?></a>
                                            </li>

                                            <?php endforeach?>
                                        </ul>
                                    </li>
                                    <li><a href="#">Jurusan</a>
                                        <ul class="collapse">
                                            <?php foreach ($submenu2 as $ss): ?>
                                            <li><a href="/ahp/nilai/un/<?=$ss['sub_id'];?>"><?=$ss['sub_nama'];?></a>
                                            </li>
                                            <?php endforeach?>
                                        </ul>
                                    </li>
                                    <li><a href="<?=route_to('nilai_siswa');?>">Peserta</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?=route_to("logout_admin");?>">
                                    <i class="ti-back-left"></i>
                                    <span>Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area position-fixed" style="width:100%;z-index:2">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-2 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                    <div class="col-4 d-none d-md-flex align-items-center" style="margin-left:-12%;margin-right:12%">
                        <b class="text-right">SMK MUHAMMADIYAH 3 <br> YOGYAKARTA</b>
                        <img src="/assets/images/logo.png" style="height:70px" alt="">
                    </div>
                    <div class="col-10 col-md-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- <img class="avatar user-thumb" src="/assets/images/author/avatar.png" alt="avatar"> -->
                            <h4 class="user-name">
                                <?=$user;?> </h4>

                        </div>
                    </div>
                    <!-- profile info & task notification -->

                </div>
            </div>
            <div class="header-area" style="opacity:0">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-6 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                    <div class="col-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="/assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?=$user;?> <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=route_to('logout_admin');?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                    <!-- profile info & task notification -->

                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <?=$this->renderSection('content');?>


        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/metisMenu.min.js"></script>
    <script src="/assets/js/jquery.slimscroll.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="/assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="/assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="/assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/scripts.js"></script>
</body>

</html>