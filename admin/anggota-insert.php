<?php
$namafolder="gambar_anggota/";

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
    $nrp = $_POST['nrp'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$hp = $_POST['hp'];
	$alamat = $_POST['alamat'];
	
	
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png" || $jenis_gambar=="image/png"){
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$cek="select nrp from tbl_anggota where nrp='$nrp'";
			$ada=mysql_query($cek) or die (mysql_error());
			if(mysql_num_rows($ada)>0){
				echo "<script>alert('NRP udah ada.'); window.location = 'anggota-input.php'</script>";
			}else{
				$sql="INSERT INTO tbl_anggota(nrp,nama,jk,hp,alamat,foto) VALUES('$nrp','$nama','$jk','$hp','$alamat','$gambar')";
				$res=mysql_query($sql) or die (mysql_error());
				echo "<script>alert('Anda telah berhasil menambah Anggota terbaru.'); window.location = 'anggota.php'</script>";
				echo "Gambar berhasil dikirim ke direktori".$gambar;
				echo "<h3><a href='anggota-input.php'> Input Lagi</a></h3>";
				echo "<h3><a href='anggota.php'> Data Anggota</a></h3>";
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
