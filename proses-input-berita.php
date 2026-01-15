<?php
include "db.php";

// Ambil data dari form
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];
$penulis = $_POST['penulis'];

// Proses upload gambar
$gambar = "";
if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $target_dir = "uploads/";
    $nama_file = time() . '_' . basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $nama_file;
    
    // Buat direktori jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // Pindahkan file yang diupload
    if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar = $target_file;
    }
}

// Tambahkan data berita ke database
$query = "INSERT INTO berita (judul, kategori, isi, penulis, tanggal, gambar) 
          VALUES ('$judul', '$kategori', '$isi', '$penulis', NOW, '$gambar'())";

if(mysqli_query($koneksi, $query)) {
    // Redirect ke halaman berita
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>