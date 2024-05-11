<?php
session_start();

// Verifikasi apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "info_account";

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses penghapusan akun
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $username = $_SESSION['username'];

    // Query untuk menghapus akun dari database
    $sql = "DELETE FROM users WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        // Hapus sesi dan arahkan ke halaman login
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        echo "Error deleting account: " . $conn->error;
    }
}

// Proses perubahan kata sandi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $username = $_SESSION['username'];
    $new_password = $_POST['new_password'];

    // Query untuk mengubah kata sandi
    $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Account Management</h2>
    <hr>
    <h3>Update Password</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Password</button>
    </form>
    <hr>
    <h3>Delete Account</h3>
    <p>Are you sure you want to delete your account?</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <button type="submit" name="delete" class="btn btn-danger">Delete Account</button>
    </form>
    <hr>
    <!-- Tambahkan tautan kembali ke halaman home_page.php -->
    <a href="home_page.php" class="btn btn-secondary">Back to Home Page</a>
</div>

</body>
</html>
