<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<?php include "jenis-id.php"; ?>
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
                            
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                   

                                        <li class="divider"></li>

                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.html"; // Set logout URL

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
                                    <b>Edit Anggota</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                    <?php
                    $query = mysql_query("SELECT * FROM tbl_anggota WHERE nrp='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="anggota-update.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NRP</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $data['nrp']; ?>" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Mahasiswa</label>
                              <div class="col-sm-8">
                                  <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="jk" id="jk">
                                  <option> <?php echo $data['jk']; ?></option>
                                  <option value="L"> Laki - Laki</option>
                                  <option value="P"> Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Hp</label>
                              <div class="col-sm-8">
                                  <input name="hp" class="form-control" id="hp" type="text" value="<?php echo $data['hp']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-8">
							  <textarea name="alamat" input class="form-control" type="text" id="alamat" class="form-control" /><?php echo $data['alamat']; ?></textarea>
                                  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-8">
                                  <span class="help-block">Silahkan memilih foto untuk update atau mengedit data, tekan tombol batal untuk kembali.</span>
                                  <img src="<?php echo $data['Foto']; ?>" height="250" width="250" alt="Foto Anggota" style="margin-bottom: 10px;" /><br />
                                  <input name="nama_file" id="nama_file" type="file"/>
                              </div>
                          </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="anggota.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                          <div style="margin-top: 20px;"></div>
                      </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                
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
		<script language="javascript" type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
		tinymce.init({
			selector: "textarea"
		});
		</script>
        
</body>
</html>