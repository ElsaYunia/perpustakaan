<?php
include "../conn.php";

$id         = $_POST['id'];
$jenis   	= $_POST['jenis'];


$cek = "select NamaJenis from tbl_jenis_buku where NamaJenis = '$jenis'";
$ada=mysql_query($cek) or die (mysql_error());

if(mysql_num_rows($ada)>0 ){
		echo "<script>alert('Jenis Buku tersebut sudah ada ,data gagal di update'); window.location = 'jenis.php'</script>";
}else{
		$query = mysql_query("UPDATE tbl_jenis_buku SET NamaJenis = '$jenis' WHERE idJenis='$id'")or die(mysql_error());
			if ($query){
				echo "<script>alert('Data Berhasil di update!'); window.location = 'jenis.php'</script>";		
			}else {
			echo "<script>alert('Data Gagal di update!'); window.location = 'jenis.php'</script>";	
			}
	}

?>