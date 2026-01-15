<?php
session_start();

$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'Muti Zahirah' && $password === '224477') {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1><center>Login</h1>
  <form method="POST">
    <label for="username">Nama Pengguna:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Kata Sandi:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit" name="submit">Login</button>
  </form>
<?php 
include 'db.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION["username"] = $username;
    header("Location: index.php");
  } else {
    echo "Invalid username or password.";
  }
}
mysqli_close($conn);

?>

<form action='logout.php' method='POST'>
<table >
 <tr>
 <center><td> <input type='submit' name='kembali' value='Batal'> </td> 
 </tr>
</table>
</form>
</body>
</html>