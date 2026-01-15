<?php 
// koneksi database
include 'db.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$nama_gambar = $_POST['nama_gambar'];
 
// update data ke database
mysqli_query($conn,"update berita set judul='$judul', isi='$isi', penulis='$penulis', tanggal='$tanggal', nam_gambar='$nama_gambar' where id='$id'");
 
// mengalihkan halaman kembali ke admin.php
header("location:input-berita.php");
 
?>