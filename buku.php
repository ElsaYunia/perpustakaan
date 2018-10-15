<?php 
	include "conn.php";
?>
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

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        

                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    

                   

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
					</tr></div>
                 <?php   
					}
              } 
              ?>
                   </tbody>
                   </table>
				   <?php $tampil=mysql_query("select * from tbl_buku ");
                          $user=mysql_num_rows($tampil);
                    ?>
				    <center><h4>Jumlah Total : <?php echo "$user"; ?> Buku </h4> </center>
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
                 <a href="buku.php" class="btn btn-sm btn-info">Refresh Data <i class="fa fa-refresh"></i></a> 
                </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section>
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
		
		
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>