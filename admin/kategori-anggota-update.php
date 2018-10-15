<?php
include "../conn.php";

$id_kat         = $_POST['id_kategori_anggota'];
$nama_kat   	= $_POST['kategori_anggota'];
$max_buku   	= $_POST['max_buku_pinjam'];
$lama   		= $_POST['max_hari_pinjam'];
$perpanjangan   = $_POST['perpanjangan'];



$cek = "select kategori_anggota from tbl_kategori_anggota where kategori_anggota = '$nama_kat'";
$ada=mysql_query($cek) or die (mysql_error());

if(mysql_num_rows($ada)>0 ){
		echo "<script>alert('Jenis Buku tersebut sudah ada ,data gagal di update'); window.location = 'kategori-anggota.php'</script>";
}else{
		$query = mysql_query("UPDATE tbl_kategori_anggota  WHERE id_kategori_anggota='$id_kat'")or die(mysql_error());
			if ($query){
				echo "<script>alert('Data Berhasil di update!'); window.location = 'jenis.php'</script>";		
			}else {
			echo "<script>alert('Data Gagal di update!'); window.location = 'jenis.php'</script>";	
			}
	}

?>