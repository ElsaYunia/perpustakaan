<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_buku WHERE idBuku='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'buku.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'buku.php'</script>";	
}
?>