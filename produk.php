<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>Graha Baca Online</title> 
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: Facebook Open Graph -->
  <meta property="og:title" content=""/>
  <meta property="og:description" content=""/>
  <meta property="og:type" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:image" content=""/>
  <!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="dashboard/css/bootstrap.css" rel="stylesheet">
    <link href="dashboard/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="dashboard/css/style.css" rel="stylesheet">
  <link rel="dashboard/stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
  <link rel="dashboard/stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
  <link rel="dashboard/stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
  <link rel="dashboard/stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
  <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
  <!--start: Header -->
  <header>
    
    <!--start: Container -->
    <div class="container">
      
      <!--start: Row -->
      <div class="row">
          
        <!--start: Logo -->
        <div class="logo span3">
            
          <a class="brand" href="#"><img src="dashboard/img/logo2.png" alt="Logo"></a>
            
        </div>
        <!--end: Logo -->
					
 <!--start: Navigation -->
        <div class="span9">
          
          <div class="navbar navbar-inverse">
              <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                      <ul class="nav">
                          <li class="active"><a href="index.php">Home</a></li>
                          <li><a href="produk.php">Buku Tersedia</a></li>
                                    <li><a href="detail.php">Keranjang</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="admin/index.html">Admin</a></li>
                                <li><a href="user.php">Konsumen</a></li>
                                <!--<li class="divider"></li>
                                <li class="nav-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>-->
                            </ul>
                          </li>
                      </ul>
                    </div>
                </div>
              </div>
          
        </div>  
        <!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Buku Tersedia</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container"> 
        <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->            
      		<!-- start: Row -->
            
      		<div class="row">
	<?php
                    $sql = mysql_query("SELECT * FROM tbl_buku ORDER BY idBuku DESC");
	if(mysql_num_rows($sql) == 0){
		echo "Tidak ada produk!";
	}else{
		while($query = mysql_fetch_assoc($sql)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $query['Judul']; ?></h3></div>
                        <img src="<?php echo $data['Foto']; ?>" />
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>

                    </div>
        		</div>
                <?php   
              }
              }
              
              ?>
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
      <hr>
    
      <hr>
      
      <!-- start: Row -->
      <div class="row">
        
        <!-- start: Icon Boxes -->
        <div class="icons-box-vert-container">

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-ok ico-color circle-color big"></i>
              <div class="icons-box-vert-info">
                <h3>Kemudahan Peminjaman</h3>
                <p>Dapatkan kemudahan peminjaman buku di Graha Baca Online, Kami menyediakan buku bacaan terupdate.</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box-->

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-cup  ico-white circle-color-full big-color"></i>
              <div class="icons-box-vert-info">
                <h3>Kemudahan Mencari</h3>
                <p>Dapatkan kemudahan pencarian buku-buku yang terbaru di Graha Baca Online.</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box -->

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-ipad ico-color circle-color big"></i>
              <div class="icons-box-vert-info">
                <h3>Berselancar dengan Gadget</h3>
                <p>Anda bisa melihat review buku kami melalui gadget kesayangan anda, meminjam buku di Graha Baca Online praktis dan mudah.</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box -->

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-thumbs-up  ico-white circle-color-full big-color"></i>
              <div class="icons-box-vert-info">
                <h3>Sosial Media</h3>
                <p>Follow twitter dan fan page facebook kami untuk mendapatkan info menarik.</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box -->

        </div>
        <!-- end: Icon Boxes -->
        <div class="clear"></div>
      </div>
      <!-- end: Row -->
      
      <hr>
      
    </div>
    <!--end: Container-->
  
  </div>
  <!-- end: Wrapper  -->      

    <!-- start: Footer Menu -->
  <div id="footer-menu" class="hidden-tablet hidden-phone">

    <!-- start: Container -->
    <div class="container">
      
      <!-- start: Row -->
      <div class="row">

        <!-- start: Footer Menu Back To Top -->
        <div class="span1">
            
          <div id="footer-menu-back-to-top">
            <a href="#"></a>
          </div>
        
        </div>
        <!-- end: Footer Menu Back To Top -->
      
      </div>
      <!-- end: Row -->
      
    </div>
    <!-- end: Container  -->  

  </div>  
  <!-- end: Footer Menu -->

  <!-- start: Footer -->
  <div id="footer">
    
    <!-- start: Container -->
    <div class="container">
      
      <!-- start: Row -->
      <div class="row">

        <!-- start: About -->
        <div class="span3">
          
          <h3>Tentang Graha Baca Online</h3>
          <p>
            Graha Baca Online adalah perpustkaan online, sasaran kami semua kalangan baik muda maupun tua, mulai dari anak - anak dan orang dewasa.
          </p>
            
        </div>
        <!-- end: About -->

        <!-- start: Photo Stream -->
        <div class="span3">
          
          <h3>Alamat Kami</h3>
          Kampus STMIK Akakom Yogyakarta. Janti, Bantul, Yogyakarta<br />
                    Telp : (0272) 888 777<br />
                    Email : <a href="mailto:kelompokweb497@gmail.com">kelompokweb497@gmail.com</a> / <a href="mailto:kelompokweb497@gmail.com">kelompokweb497@gmail.com</a>
        </div>
        <!-- end: Photo Stream -->

        <div class="span6">
        
          <!-- start: Follow Us -->
          <h3>Follow Us!</h3>
          <ul class="social-grid">
            <li>
              <div class="social-item">       
                <div class="social-info-wrap">
                  <div class="social-info">
                    <div class="social-info-front social-twitter">
                      <a href="http://twitter.com"></a>
                    </div>
                    <div class="social-info-back social-twitter-hover">
                      <a href="http://twitter.com"></a>
                    </div>  
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="social-item">       
                <div class="social-info-wrap">
                  <div class="social-info">
                    <div class="social-info-front social-facebook">
                      <a href="http://facebook.com"></a>
                    </div>
                    <div class="social-info-back social-facebook-hover">
                      <a href="http://facebook.com"></a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="social-item">       
                <div class="social-info-wrap">
                  <div class="social-info">
                    <div class="social-info-front social-dribbble">
                      <a href="http://dribbble.com"></a>
                    </div>
                    <div class="social-info-back social-dribbble-hover">
                      <a href="http://dribbble.com"></a>
                    </div>  
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="social-item">       
                <div class="social-info-wrap">
                  <div class="social-info">
                    <div class="social-info-front social-flickr">
                      <a href="http://flickr.com"></a>
                    </div>
                    <div class="social-info-back social-flickr-hover">
                      <a href="http://flickr.com"></a>
                    </div>  
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- end: Follow Us -->
        
          <!-- start: Newsletter -->
        <!--  <form id="newsletter">
            <h3>Newsletter</h3>
            <p>Please leave us your email</p>
            <label for="newsletter_input">@:</label>
            <input type="text" id="newsletter_input"/>
            <input type="submit" id="newsletter_submit" value="submit">
          </form> -->
          <!-- end: Newsletter -->
        
        </div>
        
      </div>
      <!-- end: Row --> 
      
    </div>
    <!-- end: Container  -->

  </div>
  <!-- end: Footer -->

  <!-- start: Copyright -->
  <div id="copyright">
  
    <!-- start: Container -->
    <div class="container">
    
      <p>
        Copyright &copy; <a href="http://www.grahabacaonline.com">@IrfanElsaLilik</a> 
      </p>
  
    </div>
    <!-- end: Container  -->
    
  </div>  
  <!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="dashboard/js/jquery-1.8.2.js"></script>
<script src="dashboard/js/bootstrap.js"></script>
<script src="dashboard/js/flexslider.js"></script>
<script src="dashboard/js/carousel.js"></script>
<script src="dashboard/js/jquery.cslider.js"></script>
<script src="dashboard/js/slider.js"></script>
<script defer="defer" src="dashboard/js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>