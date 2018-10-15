<?php
include "../conn.php";

$id         = $_POST['id'];
$jenis   	= $_POST['jenis'];

$cek = "select NamaJenis from tbl_jenis_buku where NamaJenis = '$jenis'";
$ada=mysql_query($cek) or die (mysql_error());

if(mysql_num_rows($ada)>0 ){
		echo "<script>alert('Jenis Buku tersebut sudah ada'); window.location = 'jenis-input.php'</script>";
}else{
		$query = mysql_query("INSERT INTO tbl_jenis_buku (idJenis, NamaJenis) VALUES ('$id', '$jenis')");
			if ($query){
				echo "<script>alert('Data jenis buku Berhasil dimasukan!'); window.location = 'jenis-input.php'</script>";	
			}else {
			echo "<script>alert('Data jenis buku Gagal dimasukan!'); window.location = 'jenis-input.php'</script>";	
			}
	}

?>
