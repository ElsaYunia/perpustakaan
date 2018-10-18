<?php
include "../conn.php";

$id      = $_POST['id_penerbit'];
$p   	= $_POST['penerbit'];
$alamat   	= $_POST['alamat'];
$tlp   		  = $_POST['telepon'];

// if(mysql_num_rows($ada)>0 ){
// 		echo "<script>alert('Kategori Anggota tersebut sudah ada ,data gagal di update'); window.location = 'kategori-anggota.php'</script>";
// }else{
		$query = mysql_query(
			"UPDATE tbl_penerbit
					SET penerbit = '$p',
							alamat= '$alamat',
							telepon='$tlp'
			  WHERE id_penerbit='$id'"
		)or die(mysql_error());

		  if ($query){
				echo "<script>alert('Data Berhasil di update!'); window.location = 'penerbit.php'</script>";
			}else {
			echo "<script>alert('Data Gagal di update!'); window.location = 'penerbit.php'</script>";
			}
	//}

?>
