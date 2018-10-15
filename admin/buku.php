<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrator Website</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="dashboard.php" class="logo">
                Administrator
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!--i class="fa fa-user"></i-->
                                <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>


                                        <li>
                                            <a href="logout.php"><!--i class="fa fa-ban fa-fw pull-right"></i--> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "index.html"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="info">
                                    <center><p><?php echo $_SESSION['username']; ?></p></center>

                                </div>
                            </div>
                            
                            <?php include "menu.php"; ?>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Data Buku</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="buku.php" method="POST">
                                        <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='qcari' placeholder='Cari berdasarkan Judul' required /> 
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                 
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
						<th><center>ID Buku </center></th>
                        <th><center>Judul </center></th>
                        <th><center>Pengarang </center></th>
						<th><center>Penerbit </center></th>
						<th><center>Tempat </center></th>
						<th><center>Action </center></th>
                      </tr>
                  </thead>
				  
				  <?php
							  $tanggal = date("Y/m/d");
							  $no = 1;
							  $batas = 10;
							  $hal = @$_GET['hal'];
							  if(empty($hal)){
								$posisi = 0;
									$hal = 1;
								}else{
									$posisi = ($hal - 1)*$batas;
								}
								$sql_plgn = mysql_query("select idBuku,Judul,Pengarang,Penerbit,NamaRak from tbl_buku , tbl_rak where tbl_rak.idRak = tbl_buku.idRak LIMIT $posisi,$batas")or die(mysql_error());
								
								
								 if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	                $sql_plgn=mysql_query("select idBuku,Judul,Pengarang,Penerbit,NamaRak from tbl_buku , tbl_rak where tbl_rak.idRak = tbl_buku.idRak AND
	                Judul like '%$qcari%'
	               or Pengarang like '%$qcari%' ");
                    }
                    //$tampil=mysql_query($sql_plgn) or die(mysql_error());
								
								$no = $posisi + 1;
								$cek = mysql_num_rows($sql_plgn);
								if($cek<1){
									echo"Data tdk ditemukan";
								}else{
									while($data = mysql_fetch_array($sql_plgn)) { ?>
				  
                     <!--?php while($data=mysql_fetch_array($tampil))
                    { ?-->
                    <tbody>
                    <tr>
					<td><a href="buku-detail.php?hal=edit&kd=<?php echo $data['idBuku'];?>"><?php echo $data['idBuku']; ?></a></td>
                    <td><?php echo $data['Judul'];?></td>
					<td><?php echo $data['Pengarang']; ?></td>
                    <td><?php echo $data['Penerbit'];?></td>
					<td><?php echo $data['NamaRak'];?></td>
					<td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Buku" href="Buku-edit.php?hal=edit&kd=<?php echo $data['idBuku'];?>">Edit</a>
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['Judul'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Buku" href="buku-hapus.php?hal=hapus&kd=<?php echo $data['idBuku'];?>"><!--span class="glyphicon glyphicon-trash"-->Hapus</a></center></td></tr></div>
                 <?php   
					}
              } 
              ?>
                   </tbody>
                   </table>
				   <?php $tampil=mysql_query("select * from tbl_buku ");
                          $user=mysql_num_rows($tampil);
                    ?>
				    <center><h4>Jumlah Total Buku : <?php echo "$user"; ?> Buah </h4> </center>
				  <div class="text-left" style = "margin-top: 10px;">
				   <ul class="pagination">
				   <?php
				   $jml_hal = ceil($user/$batas);
				   for($i=1;$i<=$jml_hal;$i++){
					 if($i != $hal){
						 echo "<li ><a href='?page=pelanggan&hal=$i'>$i<span class = 'sr-only'>(current)</span></a></li>";
					 } else{
						 //echo "<button style>$i</button>";
						 echo "<li class = 'active'><a href='?page=pelanggan&hal=$i'>$i</a></li>";
					 }
				   }
				   ?>				
				   </ul>
				   </div>
                  <!-- </div>-->
                <div class="text-right" style="margin-top: 10px;">
                 <a href="buku.php" class="btn btn-sm btn-info">Refresh Data <i class="fa fa-refresh"></i></a> <a href="buku-input.php" class="btn btn-sm btn-warning">Tambah Buku <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
				<br></br>
				<br></br>
				<br></br>
				<br></br>
				<br></br>
				<br></br>
				<br></br>
				<br></br>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
		
		
       
</body>
</html>