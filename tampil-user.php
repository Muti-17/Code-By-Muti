<?php
include 'db.php';

$query = "SELECT * FROM akun ORDER BY username DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk</title>
<link rel="stylesheet" href="db.css">
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Are you sure?');
        }
</script>

</head>
<body>
    <h1>Data User Akun</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Usernama</th>
            <th>Password</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
        
        <td>
            <a href="form-edit-akun.php?id=<?php echo $row['id']; ?>">EDIT</a>
            <a href="hapus-akun.php?id=<?php echo $row['id']; ?>" onclick="return checkDelete()">HAPUS</a>
        </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <form action='user.php' method='POST'>
        <table>
            <tr>
                <center><td> <input type='submit' name='tambah' value='Tambah User'></td>
        </tr>
        </table>
        </form>
        </table>
        <form action='index.php' method='POST'>
            <table>
                <tr>
                    <center><td> <input type='submit' name='kembali' value='Kembali ke Halaman Utama'> </td>
        </tr>
</body>
</html>