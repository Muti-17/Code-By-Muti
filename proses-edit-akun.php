<?php 
// koneksi database
include 'db.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
 
// update data ke database
mysqli_query($conn,"update akun set username='$username', password='$password', email='$email' where id='$id'");
 
// mengalihkan halaman kembali ke admin.php
header("location:tampil-user.php");
 
?>