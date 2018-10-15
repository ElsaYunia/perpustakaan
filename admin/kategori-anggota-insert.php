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
		echo "<script>alert('Kategori Anggota tersebut sudah ada'); window.location = 'kategori-anggota-input.php'</script>";
}else{
		$query = mysql_query("INSERT INTO tbl_kategori_anggota (id_kategori_anggota, kategori_anggota, max_buku_pinjam,  max_hari_pinjam, perpanjangan) VALUES ('$id_kat', '$nama_kat', $max_buku, $lama, '$perpanjangan')");
			if ($query){
				echo "<script>alert('Data Kategori Anggota Berhasil dimasukan!'); window.location = 'kategori-anggota-input.php'</script>";	
			}else {
			echo "<script>alert('Data Kategori Anggota Gagal dimasukan!'); window.location = 'kategori-anggota-input.php'</script>";	
			}
	}

?>
