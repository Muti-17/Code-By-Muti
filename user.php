<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun Baru</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <h1>Selamat Datang di Website Saya!</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">Tentang Saya</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <li><a href="user.php">User</a></li>
                <li><a href="berita.php">Berita</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
  <h1>Daftar Akun Baru</h1>
  <form action="user.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit" name="register">Daftar</button>
  </form>

  <form action="tampil-user.php">
    <button type="cek" name="cek">Cek</button>
  </form>

  <?php
  if (isset($_POST['register'])) {
    include 'db.php'; // Hubungkan ke database

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Memeriksa apakah username sudah ada
    $query = "SELECT * FROM akun WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo "<p>Username sudah ada. Silakan pilih username lain.</p>";
    } else {
      // Menambahkan akun baru ke database
      $query = "INSERT INTO akun (username, password, email) VALUES ('$username', '$password', '$email')";
      if (mysqli_query($conn, $query)) {
        echo "<p>Akun berhasil dibuat. Silakan login.</p>";
      } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
      }
    }
  }
  ?>
</body>
</html>
