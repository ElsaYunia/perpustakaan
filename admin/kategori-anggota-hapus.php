<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_kategori_anggota WHERE id_kategori_anggota='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kategori-anggota.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kategori-anggota.php'</script>";
}
?>
