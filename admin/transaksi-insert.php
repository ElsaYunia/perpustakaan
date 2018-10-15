<?php
include "../conn.php";

$id				= isset($_POST['id']) ? $_POST['id'] : "";

$dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah_buku		= explode (".", $dapat_buku);
$idBuku			= $pecah_buku[0];
$buku			= $pecah_buku[1];

$dapat_mhs		= isset($_POST['anggota']) ? $_POST['anggota'] : "";
$pecah_mhs		= explode (".", $dapat_mhs);
$id_mhs 		= $pecah_mhs[0];
$mhs			= $pecah_mhs[1];

$tgl_pinjam		= isset($_POST['nama4']) ? $_POST['nama4'] : "";
$tgl_kembali	= isset($_POST['nama5']) ? $_POST['nama5'] : "";



$query = mysql_query("select * from tbl_buku where idBuku = '$idBuku'");
	while ($hasil=mysql_fetch_array($query)) {
		$sisa=$hasil['stok'];
	}
	if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');window.location = 'transaksi.php'</script>";
	}else{
		$qt = mysql_query("INSERT INTO tbl_transaksi VALUES ('$id', '$idBuku','$id_mhs', '$tgl_pinjam', '$tgl_kembali', 'Pinjam')");
		$qu	= mysql_query("UPDATE tbl_buku SET stok =(stok-1) WHERE idBuku = '$idBuku' ");
		if ($qt) {
			//echo "berhasil";
	        //echo "<script>alert('Data admin Berhasil dimasukan!'); window.location = 'transaksi.php'</script>";	
		}else{
			echo"gagal";
		}
		if ($qu) {
			//echo "berhasil";
			echo "<script>alert('Peminjaman Berhasil !'); window.location = 'transaksi.php'</script>";	
		}else{
			echo"gagal";
		}
	}

?>



