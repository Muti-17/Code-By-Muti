<?php
include "db.php";

// Ambil id berita dari URL
$id = $_GET['id'];

// Query untuk mengambil data berita
$query = "SELECT * FROM berita WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="proses-edit-berita.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul Berita</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Isi</td>
                <td>
                    <select name="isi">
                        <option value="Umum" <?php if($data['isi'] == 'Umum') echo 'selected'; ?>>Umum</option>
                        <option value="Politik" <?php if($data['isi'] == 'Politik') echo 'selected'; ?>>Politik</option>
                        <option value="Ekonomi" <?php if($data['isi'] == 'Ekonomi') echo 'selected'; ?>>Ekonomi</option>
                        <option value="Teknologi" <?php if($data['isi'] == 'Teknologi') echo 'selected'; ?>>Teknologi</option>
                        <option value="Olahraga" <?php if($data['isi'] == 'Olahraga') echo 'selected'; ?>>Olahraga</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>
                    <?php if(!empty($data['gambar'])): ?>
                        <img src="<?php echo $data['gambar']; ?>" width="100"><br>
                    <?php endif; ?>
                    <input type="file" name="gambar">
                    <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">
                    <small>Biarkan kosong jika tidak ingin mengubah gambar</small>
                </td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" value="<?php echo $data['penulis']; ?>" required></td>
            </tr>
            <tr>
                <td>Isi Berita</td>
                <td><textarea name="isi" rows="10" cols="50" required><?php echo $data['isi']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>
</html>