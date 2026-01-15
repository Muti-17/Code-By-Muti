<?php 
// koneksi database
include 'db.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
 
// update data ke database
mysqli_query($conn,"update messages set name='$name', email='$email', message='$message' where id='$id'");
 
// mengalihkan halaman kembali ke admin.php
header("location:admin.php");
 
?>