<?php
include "../conn.php";

$id	=$_GET['id'];
$judul= $_GET['judul'];

$us=mysql_query("UPDATE tbl_transaksi SET status='Kembali' WHERE idTrans='$id'");
$uj=mysql_query("UPDATE tbl_buku SET stok=(stok+1) WHERE Judul='$judul'");
//$ug=mysql_query("Delete from tbl_transaksi WHERE idTrans='$id'");

	if ($us || $uj) {
		echo "<script>alert('buku berhasil dikembalikan'); window.location = 'transaksi.php'</script>";	
	} else {
		echo "<script>alert('buku gagal dikembalikan'); window.location = 'transaksi.php'</script>";	
	}
?>