<?php
include ("../conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.html?error1');
} else if (empty($username)) {
	header('location:index.html?error=2');
} else if (empty($password)) {
	header('location:index.html?error=3');
}

$q = mysqli_query($con, "select * from tbl_user where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 0) {
    $_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $username;
	header('location:dashboard.php');
} else {
	header('location:index.html?error=4');
}
?>