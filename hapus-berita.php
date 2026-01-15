<?php
include "db.php";

// Ambil ID berita dari URL
$id = $_GET['id'];

// Ambil informasi gambar sebelum menghapus berita
$query_gambar = "SELECT gambar FROM berita WHERE id='$id'";
$hasil_gambar = mysqli_query($koneksi, $query_gambar);
$data_gambar = mysqli_fetch_array($hasil_gambar);

// Hapus file gambar jika ada
if(!empty($data_gambar['gambar']) && file_exists($data_gambar['gambar'])) {
    unlink($data_gambar['gambar']);
}

// Hapus data berita dari database
$query = "DELETE FROM berita WHERE id='$id'";
if(mysqli_query($koneksi, $query)) {
    // Redirect ke halaman berita
    header("Location: input-berita.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>