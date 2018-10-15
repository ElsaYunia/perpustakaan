<?php
include "../conn.php";

$id         = $_POST['id'];
$rak   		= $_POST['rak'];


$cek = "select NamaRak from tbl_rak where NamaRak = '$rak'";
$ada=mysql_query($cek) or die (mysql_error());

if(mysql_num_rows($ada)>0 ){
		echo "<script>alert('Rak tersebut sudah ada , update data gagal'); window.location = 'rak.php'</script>";
}else{
		$query = mysql_query("UPDATE tbl_rak SET NamaRak= '$rak' WHERE idRak='$id'")or die(mysql_error());
			if ($query){
				echo "<script>alert('Data Berhasil di update!'); window.location = 'rak.php'</script>";		
			}else {
			echo "<script>alert('Data Gagal di update!'); window.location = 'rak.php'</script>";	
			}
	}
?>