<!DOCTYPE html>
<html>
<head>
    <title>Kontak</title>
</head>
<body>
    <a href="contact.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>EDIT DATA PESAN</h3>

    <?php
    include 'db.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn,"select * from messages where id='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="proses-edit-pesan.php">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="name" value="<?php echo $d['name']; ?>">
                </td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="text" name="email" value="<?php echo $d['email']; ?>"></td>
            </tr>
            <tr>
                <td>PESAN</td>
                <td><input type="text" name="message" value="<?php echo $d['message']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
    <?php 
    }
    ?>
</body>
</html>