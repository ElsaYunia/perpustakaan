<?php
include "../conn.php";

$id         = $_POST['id'];
$username   = $_POST['username'];
$password   = $_POST['password'];


$query = mysql_query("UPDATE tbl_user SET username='$username', password='$password' WHERE id='$id'")or die(mysql_error());
if ($query){
echo "<script>alert('Data Berhasil di update!'); window.location = 'admin.php'</script>";		
} else {
	echo "<script>alert('Data Gagal di update!'); window.location = 'admin.php'</script>";	
    }
?>