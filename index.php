<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
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
    
    <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo" width="2000">
                Perpustakaan
            </a>
			

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="messages-menu">
                        <table width="1000">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
			<td align="left" width="150"> <h4>Cari Buku disini  <i class="fa fa-right"></i> </h4></td>
            </tr>
            </table>
                        </li>
						
						
						<li class="dropdown user user-menu">
                            <a href="buku.php" target ="_blank" data-placement="bottom" data-toggle="tooltip" title="Cari buku disini">
                                <i class="fa fa-book"></i>
                            </a>
							 
                                </li>
						
						</ul>
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <aside>

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">
					
                        <div class="col-md-6">
                            <section class="panel">
                              <header class="panel-heading">
                                  <b>Data Pengunjung Hari Ini</b>
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
										<th>no</th>
                                        <th>NIM</th>
                                        <th>Tanggal</th>
                                        <th>Jam Berkunjung </th>
                                        <th>Keperluan</th>
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
								$sql_plgn = mysql_query("select * from tbl_pengunjung where tgl='$tanggal' ORDER BY ID DESC LIMIT $posisi,$batas ")or die(mysql_error());
								$no = $posisi + 1;
								$cek = mysql_num_rows($sql_plgn);
								if($cek<1){
									echo"Belum ada pengunjung hari ini";
								}else{
									while($data = mysql_fetch_array($sql_plgn)) { ?>
                    <tbody>
                    <tr>
					 <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nrp']; ?></td>
                    <td><?php echo $data['tgl'];?></td>
                    <td><?php echo $data['jam'];?></td>
                    <td><?php echo $data['keperluan'];?></td>
                    <?php   
							}
						}
					  ?>
                      </table><hr />
                   <?php $tampil=mysql_query("select * from tbl_pengunjung where tgl='$tanggal'");
                          $user=mysql_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Pengunjung Hari Ini : <?php echo "$user"; ?> Orang </h4> </center>
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
                </div>
              </section>
			  
          </div><!--end col-6 -->
		  
		  
		  
          <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading">
                    <b>Buku Pengunjung</b>
                </header>
                <div class="panel-body">
                    <div class="twt-area">
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pengunjung.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIM</label>
                              <div class="col-sm-10">
                                  <input name="nrp" type="text" id="nrp" class="form-control"  onkeypress="return isNumberKey(event)" placeholder="nim Anda" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-6">
                                  <select class="form-control" name="jk" id="jk">
                                  <option value=""> -- Pilih Salah Satu --</option>
                                  <option value="Laki-laki"> Laki-laki</option>
                                  <option value="Perempuan"> Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Keperluan</label>
                              <div class="col-sm-10">
                                  <input name="perlu" type="text" id="perlu" class="form-control" placeholder="Keperluan" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Saran</label>
                              <div class="col-sm-10">
                                  <textarea rows="4" name="saran" id="saran" class="form-control" placeholder="Saran Anda untuk Perpustakaan" cols="25"></textarea>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						  <?php
						  date_default_timezone_set('Asia/Jakarta');
						  $jam = date("Y/m/d");
						  ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-10">
                                  <input name="tgl" type="text" class="form-control" id="tgl" value="<?php echo $jam ?>" readonly="readonly"/>
                              </div>
                          </div>
						  <?php
						  date_default_timezone_set('Asia/Jakarta');
						  $jam = date("H:i:s");
						  ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                              <div class="col-sm-10">
                                  <input name="jam" type="text" class="form-control" id="jam" value="<?php echo $jam ?>" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
                    </div>
                      </section> 
          </div>
          </div>
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

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
		<script>
		function isNumberKey(evt){  
	var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57)){
	alert("NRP tidak valid ");
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