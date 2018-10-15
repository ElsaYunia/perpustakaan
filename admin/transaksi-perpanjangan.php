<?php
$id = $_GET['id'];
$judul = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

if($lambat > 7) {
	echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !'); window.location = 'transaksi.php'</script>";
	
	} else {
	include "../conn.php"; 

	$pecah			= explode("-",$tgl_kembali);
	$next_7_hari	= mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
	$hari_next		= date("d-m-Y", $next_7_hari);


	$update_tgl_kembali=mysql_query("UPDATE tbl_transaksi SET tglKembali='$hari_next' WHERE idTrans='$id'");

	if ($update_tgl_kembali) {
		echo "<script>alert('Transaksi berhasil diperpanjang'); window.location = 'transaksi.php'</script>";	
	} else {
		echo "<script>alert('Transaksi gagal diperpanjang'); window.location = 'transaksi.php'</script>";	
	}
}
?>
	