<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_rak WHERE idRak='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'rak.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'rak.php'</script>";	
}
?>