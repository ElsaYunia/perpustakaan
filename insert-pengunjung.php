<?php
include "conn.php";
$nrp         = $_POST['nrp'];
$jk 		 = $_POST['jk'];
$perlu 	 	 = $_POST['perlu'];
$saran	     = $_POST['saran'];
$tgl 		 = $_POST['tgl'];
$jam		 = $_POST['jam'];

//$query = mysql_query("INSERT INTO tbl_pengunjung VALUES ('', '$nrp' ,'$nama', '$jk','$perlu', '$saran', '$tgl', '$jam')");
if($jk == ""){
	echo "<script>alert('Lengkapi data dengan benar !'); window.location = 'index.php'</script>";	
} 
else {
	$query = mysql_query("INSERT INTO tbl_pengunjung VALUES ('', '$nrp', '$jk','$perlu', '$saran', '$tgl', '$jam')");
	if ($query){
		echo "<script>alert('Selamat datang di Perpustakaan!'); window.location = 'index.php'</script>";	
	}else{
		echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";	
	}
}
?>


