<?php
include ("../conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.html?error1');
	break;
} else if (empty($username)) {
	header('location:index.html?error=2');
	break;
} else if (empty($password)) {
	header('location:index.html?error=3');
	break;
}

$q = mysql_query("select * from tbl_user where username='$username' and password='$password'");
$row = mysql_fetch_array ($q);

if (mysql_num_rows($q) == 1) {
    $_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $username;
	header('location:dashboard.php');
} else {
	header('location:index.html?error=4');
}
?>