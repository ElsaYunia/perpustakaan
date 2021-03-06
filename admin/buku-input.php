<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');
} else {
	include "../conn.php";
?>
<?php include"buku-id.php" ; ?>
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
	<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />         
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
                            <li><a href="logout.php"><!--i class="fa fa-ban fa-fw pull-right"></i--> Logout</a></li>
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
                                <b>Input Buku</b>
                            </header>
                            <div class="panel-body">
                            <form class="form-horizontal style-form" style="margin-top: 20px;" action="buku-insert.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm();">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Id Buku</label>
                                    <div class="col-sm-8">
                                       <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" value="<?php echo $kode_otomatis; ?>" readonly="readonly" />
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input name="judul" type="text" id="judul" class="form-control"  required />
                                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">No. ISBN</label>
                                <div class="col-sm-8">
                                    <input name="isbn" type="text" id="isbn" class="form-control"  required />
                                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                </div>
                            </div>
						    <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                <div class="col-sm-8">
                                    <input name="pengarang" type="text" id="pengarang" class="form-control" onkeypress="return huruf(event)"  required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                </div>
                            </div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
								<div class="col-sm-8">
								   <select class="form-control" name="id_penerbit" id="">
									   <option> -- Pilih Penerbit --</option>
								        <?php
        								    $query = "SELECT * FROM tbl_penerbit ORDER by id_penerbit ASC";
        								    $sql = mysql_query($query);
            								    while ($buku=mysql_fetch_array($sql)) {
            								    echo "<option value='$buku[0]'>$buku[1]</option>";
							                }
						                ?>
									</select>
								</div>
							</div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                <div class="col-sm-8">
                                    <input name="tahun" type="text" id="tahun" class="form-control" onkeypress="return isNumberKey(event)" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                </div>
                            </div>
						    <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jenis Buku</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="idJenis" id="jenis">
                                        <option> -- Pilih Jenis Buku --</option>
                                        <?php
        									$query = "SELECT * FROM tbl_jenis_buku ORDER by idJenis ASC";
        									$sql = mysql_query($query);
        									while ($buku=mysql_fetch_array($sql)) {
        									echo "<option value='$buku[0]'> $buku[0] - $buku[1]</option>";
        									}

        								?>
                                  </select>
                                </div>
                            </div>
    						<div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                                <div class="col-sm-8">
                                        <input name="stok" type="text" id="stok" class="form-control" onkeypress="return isNumberKey(event)" required />
                                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Lokasi Buku</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="idRak" id="idRak">
                                        <option> -- Pilih Lokasi Buku --</option>
                                            <?php
            									$query = "SELECT * FROM tbl_rak ORDER by idRak ASC";
            									$sql = mysql_query($query);
            									while ($rak=mysql_fetch_array($sql)) {
            									   echo "<option value='$rak[0]'> $rak[0] - $rak[1]</option>";
            								    }
        								    ?>
                                  </select>
                                </div>
                            </div>
					        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                                <div class="col-sm-8">
                                      <input name="nama4" type="text" id="nama4" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Gambar Buku</label>
                                <div class="col-sm-8">
                                      <input name="foto" id="foto" type="file" required />
                                </div>
                            </div>

                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="buku-input.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>


                          <div style="margin-top: 20px;"></div>
                      </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section>
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
		<script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript"></script>

		<script>
      $(function(){
        $("#nama4").datepicker();
        
      });
    </script>


        <script>
		function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31
	&& (charCode < 48 || charCode > 57)){
	alert("inputan hanya angka");
        return false;
        return true;
	}
	}
	function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32){
		alert("inputan hanya huruf");
            return false;
        return true;
		}
    }
		</script>
</body>
</html>
