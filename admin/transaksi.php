<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<?php include "transaksi-fungsi.php"; ?> 
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
                                    <b>Data Transaksi</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="transaksi.php" method="POST">
                                        <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='qcari' placeholder='Cari berdasarkan NRP' required /> 
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                    <?php
                    //$query1="select * from tbl_transaksi";
                    $query1 = "select idTrans,Judul,nrp,tglPinjam,tglKembali,status from tbl_transaksi,tbl_buku where tbl_buku.idBuku = tbl_transaksi.idBuku AND status = 'Pinjam' ORDER BY idTrans ASC" ;
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               //$query1="SELECT * FROM  tbl_transaksi where nrp like '%$qcari%'";
				   $query1 = "select idTrans,Judul,nrp,tglPinjam,tglKembali,status from tbl_transaksi,tbl_buku where tbl_buku.idBuku = tbl_transaksi.idBuku AND nrp like '%$qcari%'";
                    }
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>ID Transaksi </center></th>
                        <th><center>Buku </center></th>
                        <th><center>Peminjam </center></th>
						<th><center>Tgl Pinjam</th>
						<th><center>Tgl Kembali</th>
						<th><center>Status</th>
						<th><center>Denda</th>
						
                        <th><center>Tools</center></th-->
                      </tr>
                  </thead>
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $data['idTrans']; ?></td>
                    <td><?php echo $data['Judul'];?></td>
                    <td><?php echo $data['nrp'];?></td>
					 <td><?php echo $data['tglPinjam']; ?></td>
                    <td><?php echo $data['tglKembali'];?></td>
                    <td><?php echo $data['status'];?></td>
					<td align="center">
							<?php
								$tgl_dateline=$data['tglKembali'];
								$tgl_kembali=date('d-m-Y');
								$lambat=terlambat($tgl_dateline, $tgl_kembali);
								$denda1 = 100;
								$denda=$lambat*$denda1;
								if ($lambat>0) {
									echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
								}
								else {
									echo $lambat." hari";
								}
							?>
							
							</td>
				
                    
				   <td><center><div id = "thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Pengembalian"  href="transaksi-pengembalian.php?hal=edit&id=<?php echo $data['idTrans']; ?>&judul=<?php echo $data['Judul']; ?>">Pengembalian</a> <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Pepranjangan" href="transaksi-perpanjangan.php?hal=edit&id=<?php echo $data['idTrans']; ?>&judul=<?php echo $data['Judul'];?>&tgl_kembali=<?php echo $data['tglKembali']; ?>&lambat=<?php echo $lambat; ?>">Perpanjangan</a></td>
				   </tr></div>
				   
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right" style="margin-top: 10px;">
                 <a href="transaksi.php" class="btn btn-sm btn-info">Refresh Data <i class="fa fa-refresh"></i></a> <a href="transaksi-input.php" class="btn btn-sm btn-warning">Input Peminjaman <i class="fa fa-arrow-circle-right"></i></a>
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

</body>
</html>