<?php
$namafolder="gambar_anggota/";

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
    $id = $_POST['id'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['id_penerbit'];
	$tahun = $_POST['tahun'];
	$jenis = $_POST['idJenis'];
	$stok = $_POST['stok'];
	$tempat = $_POST['idRak'];
	$nama4 = $_POST['nama4'];
	$isbn = $_POST['isbn'];
	
	
	
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png" || $jenis_gambar=="image/png"){
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$cek="select idBuku from tbl_buku where idBuku='$id'";
			$ada=mysql_query($cek) or die (mysql_error());
			
			$cek2 = "select judul from tbl_buku where idBuku = '$id'";
			$ada2=mysql_query($cek2) or die (mysql_error());
			
			if(mysql_num_rows($ada)>0){
				echo "<script>alert('Buku sudah ada.'); window.location = 'buku-input.php'</script>";
			}else if(mysql_num_rows($ada2)>0){
				echo "<script>alert('judul buku tersebut sudah ada'); window.location = 'buku-input.php'</script>";
			}else{
				$sql="INSERT INTO tbl_buku(idBuku,isbn,Judul,Pengarang,Penerbit,thnTerbit,idJenis,stok,idRak,tglInput,Foto) VALUES('$id',$isbn,'$judul','".$pengarang."','$penerbit','$tahun','$jenis','$stok','$tempat','$nama4','$gambar')";
				$res=mysql_query($sql) or die (mysql_error());
				echo "<script>alert('Anda telah berhasil menambah buku terbaru.'); window.location = 'buku.php'</script>";
				echo "Gambar berhasil dikirim ke direktori".$gambar;
				echo "<h3><a href='buku-input.php'> Input Lagi</a></h3>";
				echo "<h3><a href='buku.php'> Data Anggota</a></h3>";
			}
			
		}else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
	}else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
?>
