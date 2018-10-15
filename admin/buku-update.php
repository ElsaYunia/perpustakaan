<?php
$namafolder="gambar_anggota/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
        $jenis_gambar=$_FILES['nama_file']['type'];
        $id = $_POST['id'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		//$jenis = $_POST['jenis'];
		$stok = $_POST['stok'];
		//$tempat = $_POST['tempat'];
		$nama4 = $_POST['nama4'];
		
		$dapat_buku		= isset($_POST['jenis']) ? $_POST['jenis'] : "";
		$pecah_buku		= explode (".", $dapat_buku);
		$idJenis		= $pecah_buku[0];
		
		$dapat_buku2		= isset($_POST['tempat']) ? $_POST['tempat'] : "";
		$pecah_buku2		= explode (".", $dapat_buku2);
		$idJenis2			= $pecah_buku2[0];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			
			$sql="UPDATE tbl_buku SET  Judul='$judul', Pengarang='$pengarang', Penerbit='$penerbit', thnTerbit='$tahun', idJenis='$idJenis', stok='$stok', idRak='$idJenis2', tglInput='$nama4', Foto='$gambar' WHERE idBuku='$id'";
			$res=mysql_query($sql) or die (mysql_error());
			echo "<script>alert('Anda telah berhasil mengubah data buku.'); window.location = 'buku.php'</script>";
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='buku.php'> Input Lagi</a></h3>";	   
		
		}else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "<script>alert('Anda belum memilih gambar , update buku gagal'); window.location = 'buku.php'</script>";
}

?>