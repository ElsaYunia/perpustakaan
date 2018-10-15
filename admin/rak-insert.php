<?php
include "../conn.php";

$id         = $_POST['id'];
$rak   		= $_POST['rak'];

$cek = "select NamaRak from tbl_rak where NamaRak = '$rak'";
$ada=mysql_query($cek) or die (mysql_error());

if(mysql_num_rows($ada)>0 ){
		echo "<script>alert('Rak tersebut sudah ada'); window.location = 'rak-input.php'</script>";
}else{
		$query = mysql_query("INSERT INTO tbl_rak (idRak, NamaRak) VALUES ('$id', '$rak')");
			if ($query){
				echo "<script>alert('Data rak Berhasil dimasukan!'); window.location = 'rak-input.php'</script>";
			}else {
			echo "<script>alert('Data rak Gagal dimasukan!'); window.location = 'rak-input.php'</script>";	
			}
	}
?>


