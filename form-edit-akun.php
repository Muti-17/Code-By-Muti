<!DOCTYPE html>
<html>
<head>
    <title>AKUN</title>
</head>
<body>
    <a href="user.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>EDIT DATA AKUN</h3>

    <?php
    include 'db.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn,"select * from akun where id='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="proses-edit-akun.php">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="username" value="<?php echo $d['username']; ?>">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $d['password']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $d['email']; ?>"></td>
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