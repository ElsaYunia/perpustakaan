<?php include "conn.php"; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Graha Baca Online</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--slider-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <link rel="stylesheet" href="assets/css/slick/slick.css"> 
        <link rel="stylesheet" href="assets/css/slick/slick-theme.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/iconfont.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/bootsnav.css">
        <!-- xsslider slider css -->


        <!--<link rel="stylesheet" href="assets/css/xsslider.css">-->
        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed">
                <div class="navbar-top bg-grey fix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="navbar-callus text-left sm-text-center">
                                    <ul class="list-inline">
                                        <li><a href=""><i class="fa fa-phone"></i> Call us: 0272 122 344</a></li>
                                        <li><a href=""><i class="fa fa-envelope-o"></i> Contact us: kelompokweb497@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="navbar-socail text-right sm-text-center">
                                    <ul class="list-inline">
                                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->


                <div class="container"> 
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> 

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="nav-logo" href="#brand">
                            <img src="assets/images/company.png" class="logo" alt="">
                        </a>

                    </div>
                    <!-- End Header Navigation -->

                    <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>                    
                            <li><a href="koleksi.php">Koleksi</a></li>
                            <li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tentang
                            </a>
                            <ul class="dropdown-menu">
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="tujuan.php">Tujuan, Visi & Misi</a></li>
                            <li><a href="struktur.php">Struktur Organisasi</a></li>
                            <li><a href="kontak.php">Kontak</a></li>
                        </ul>
                     </li>
                            <li><a href="ketentuan.php">Ketentuan</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div> 
            </nav>
            </div>

            <!--Home Sections-->
            <div class="container">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="assets/images/gambar.jpg" alt="buku" style="width:100%;">
                            <div class="carousel-caption d-none d-md-block">
                            <p>Tersedia banyak buku</p>
                        </div>
                      </div>

                      <div class="item">
                        <img src="assets/images/gambar2.jpg" alt="pelayanan" style="width:100%;">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Pelayanan Yang Ramah</p>
                        </div>
                      </div>
                    
                      <div class="item">
                        <img src="assets/images/gambar3.jpg" alt="tempat" style="width:100%;">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Tempat yang nyaman</p>
                        </div>
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>



            <!--Featured Section-->
            <section id="features" class="features">
                <div class="container">
                    <div class="row">
                        <div class="main_features fix roomy-70">
                            <div class="col-md-4">
                                <div class="features_item sm-m-top-30">
                                    <div class="f_item_icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div class="f_item_text">
                                        <h3>Koleksi Buku</h3>
                                        <p>Lebih dari 1.000.000 buku.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="features_item sm-m-top-30">
                                    <div class="f_item_icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="f_item_text">
                                        <h3>Anggota</h3>
                                        <p>Lebih dari 100 Anggota Perpustakaan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="features_item sm-m-top-30">
                                    <div class="f_item_icon">
                                        <i class="fa fa-sliders"></i>
                                    </div>
                                    <div class="f_item_text">
                                        <h3>Update Harian</h3>
                                        <p>Update Buku secara periodik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Featured Section-->

            <footer id="contact" class="footer action-lage bg-black p-top-80">
                <!--<div class="action-lage"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="widget_area">
                            <div class="col-md-3">
                                <div class="widget_item widget_about">
                                    <h5 class="text-white">About Us</h5>
                                    <p class="m-top-20">E-Library yang menyediakan bacaan buku terlengkap di Yogyakarta. Dengan lebih dari 1.000.000 Buku dan 100 member.</p>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-location-arrow"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Location</h6>
                                            <p>
                                                Jalan Raya Janti, Bantul, Yogyakarta.</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-phone"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Phone :</h6>
                                            <p>0272 122 344</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Email Address :</h6>
                                            <p>webkelompok497@gmail.com</p>
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_latest sm-m-top-50">
                                    <h5 class="text-white">Agenda</h5>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"><img src="assets/images/agenda1.png" alt="" /></div>
                                        <div class="widget_latst_item_text">
                                            <p>Kunjungan Menristek</p>
                                            <a href="">31<sup>th</sup> Des 2018</a>
                                        </div>
                                    </div>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"><img src="assets/images/agenda2.png" alt="" /></div>
                                        <div class="widget_latst_item_text">
                                            <p>Book Store</p>
                                            <a href="">01<sup>th</sup> Jan 2019</a>
                                        </div>
                                    </div>
                                    <div class="widget_latst_item m-top-30">
                                        <div class="item_icon"></div>
                                        <div class="widget_latst_item_text">
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_service sm-m-top-50">
                                    <h5 class="text-white">JAM LAYANAN</h5>
                                    <ul class="m-top-20">
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> SENIN - KAMIS</a> <p>Buka jam 08.00 WIB - 19.00 WIB</p> </li>

                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> JUM'AT</a><p>Buka jam 09.00 WIB - 19.30 WIB</p><p>ISTIRAHAT JAM 11.30-13.00 WIB</p></li>
                                        <li class="m-top-20"><a href=""><i class="fa fa-angle-right"></i> SABTU - MINGGU</a><p>Buka jam 09.00 WIB - 14.00 WIB</p></li>
                                    </ul>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-3">
                                <div class="widget_item widget_newsletter sm-m-top-50">
                                    <h5 class="text-white">Newsletter</h5>
                                    <form class="form-inline m-top-30">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter you Email">
                                            <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>
                                        </div>

                                    </form>
                                    <div class="widget_brand m-top-40">
                                        <a href="" class="text-uppercase">GRAHA BACA ONLINE</a>
                                        <p>Follow Us</p>
                                    </div>
                                    <ul class="list-inline m-top-20">
                                        <li>-  <a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    </ul>

                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->
                        </div>
                    </div>
                </div>
                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            © Copyright 2018 <span>GrahaBacaOnline</span>. Designed by GrahaBacaOnline. 
                        </p>
                    </div>
                </div>
            </footer>




        </div>

        <!-- JS includes -->

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/css/slick/slick.js"></script>
        <script src="assets/css/slick/slick.min.js"></script>
        <script src="assets/js/jquery.collapse.js"></script>
        <script src="assets/js/bootsnav.js"></script>



        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
