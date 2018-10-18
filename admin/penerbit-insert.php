<?php
include "../conn.php";

$id         = $_POST['id_penerbit'];
$p   				= $_POST['penerbit'];
$alamat   	= $_POST['alamat'];
$tlp   			= $_POST['telepon'];


		$query = mysql_query("INSERT INTO tbl_penerbit (id_penerbit, penerbit, alamat,  telepon) VALUES ('$id', '$p', '$alamat',  '$tlp')");
			if ($query){
				echo "<script>alert('Data Penerbit Berhasil dimasukan!'); window.location = 'penerbit-input.php'</script>";
			}else {
			echo "<script>alert('Data Penerbit Gagal dimasukan!'); window.location = 'penerbit-input.php'</script>";
			}


?>
