<?php
$namafolder="gambar_anggota/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
        $jenis_gambar=$_FILES['nama_file']['type'];
        $nrp = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $hp = $_POST['hp'];
		$alamat = $_POST['alamat'];

	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE tbl_anggota SET  nama='$nama', jk='$jk', hp='$hp', alamat='$alamat', Foto='$gambar' WHERE nrp='$nrp'";
			$res=mysql_query($sql) or die (mysql_error());
			echo "<script>alert('Anda telah berhasil mengedit.'); window.location = 'anggota.php'</script>";
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='anggota.php'> Input Lagi</a></h3>";
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}

?>
