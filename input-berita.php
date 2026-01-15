<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Berita Baru</h2>
    <form method="POST" action="proses-tambah-berita.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul Berita</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td>
                    <select name="isi">
                        <option value="Umum">Umum</option>
                        <option value="Politik">Politik</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Olahraga">Olahraga</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>Isi Berita</td>
                <td><textarea name="isi" rows="10" cols="50" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Berita"></td>
            </tr>
        </table>
    </form>
    <p><a href="index.php">Kembali ke Beranda</a></p>
</body>
</html>