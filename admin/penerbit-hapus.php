<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_penerbit WHERE id_penerbit='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'penerbit.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'penerbit.php'</script>";
}
?>
