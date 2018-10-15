<?php 
	include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Perpustakaan</title>
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
        
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Detail Buku</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                    <?php
                    $query = mysql_query("select idBuku,Judul,Pengarang,Penerbit,thnTerbit,NamaJenis,stok,NamaRak,tglInput,Foto from tbl_buku , tbl_jenis_buku,tbl_rak WHERE tbl_jenis_buku.idJenis = tbl_buku.idJenis AND tbl_rak.idRak = tbl_buku.idRak AND idBuku='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                      <table id="example" class="table table-hover table-bordered">
                    <tr>
                    <td>NRP</td>
                    <td><?php echo $data['idBuku']; ?></td>
                    <td rowspan="15"><div class="pull-center image">
                            <img src="admin/<?php echo $data['Foto']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                        </div></td>
                    </tr>
                    <tr>
                    <td>Judul Buku</td>
                    <td><?php echo $data['Judul']; ?></td>
                    </tr>
                    <tr>
                    <td>Pengarang</td>
                    <td><?php echo $data['Pengarang']; ?></td>
                    </tr>
                    <tr>
                    <td>Penerbit</td>
                    <td><?php echo $data['Penerbit']; ?></td>
                    </tr>
                    <tr>
                    <td>Tahun terbit</td>
                    <td><?php echo $data['thnTerbit']; ?></td>
                    </tr>
					<td>Jenis Buku</td>
                    <td><?php echo $data['NamaJenis']; ?></td>
                    </tr>
					<td>Stok</td>
                    <td><?php echo $data['stok']; ?></td>
                    </tr>
					<td>Rak</td>
                    <td><?php echo $data['NamaRak']; ?></td>
                    </tr>
					<td>Tanggal Input</td>
                    <td><?php echo $data['tglInput']; ?></td>
                    </tr>
                   </table>
                  
                <div class="text-right">
                <a href="buku.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                </div>  
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                
           

        </div><!-- ./wrapper -->


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
        
        
</body>
</html>