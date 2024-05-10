<?php
session_start();

// Jika pengguna sudah login, alihkan ke halaman beranda
if (isset($_SESSION['username'])) {
    header("Location: home_page.php");
    exit();
}

// Set username dan password yang valid
$validUsername = "naufal";
$validPassword = "padang123";

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$usernameErr = $passwordErr = "";

// Periksa apakah form login telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
        // Jika username tidak cocok, set pesan kesalahan
        if ($username != $validUsername) {
            $usernameErr = "Invalid username";
        }
    }

    // Validasi password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Jika password tidak cocok, set pesan kesalahan
        if ($password != $validPassword) {
            $passwordErr = "Invalid password";
        }
    }

    // Jika tidak ada pesan kesalahan, arahkan ke halaman sukses
    if (empty($usernameErr) && empty($passwordErr)) {
        // Simpan username ke session dan arahkan ke halaman beranda
        $_SESSION['username'] = $username;
        header("Location: home_page.php");
        exit();
    }
}

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
    }
    .login-form {
      width: 300px;
      margin: 150px auto;
      background: #fff;
      padding: 25px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-form .form-group {
      margin-bottom: 20px;
    }
    .login-form label {
      font-weight: bold;
    }
    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      color: #fff;
      border-radius: 3px;
      cursor: pointer;
    }
    .login-form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="login-form">
  <!-- YouTube Logo -->
  <h2>Login to Your Account</h2>
  <!-- Login Form -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <span class="error"><?php echo $usernameErr; ?></span>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <span class="error"><?php echo $passwordErr; ?></span>
    </div>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
