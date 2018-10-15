<?php
include "../conn.php";

$id         = $_POST['id'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$query = mysql_query("INSERT INTO tbl_user (id, username, password) VALUES ('$id', '$username', '$password')");
if ($query){
	echo "<script>alert('Data admin Berhasil dimasukan!'); window.location = 'admin-input.php'</script>";	
} else {
	echo "<script>alert('Data admin Gagal dimasukan!'); window.location = 'admin-input.php'</script>";	
}
//}
?>


