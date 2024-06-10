<?php
session_start();

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

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

$login_failed = false;

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Query untuk memeriksa keberadaan pengguna dalam database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Jika data ditemukan, atur sesi username dan arahkan ke halaman beranda
        $_SESSION['username'] = $username;
        header("Location: ytbmerah.php");
        exit();
    } else {
        // Jika tidak ditemukan, set login_failed to true
        $login_failed = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Merah</title>
    <link rel="icon" href="images/iconYT.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(33, 33, 33); /* Updated background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .left-text {
            flex: 1;
            padding: 20px;
            max-width: 600px;
            color: white; /* Ensuring the text is readable on the dark background */
        }
        .login-container {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            max-width: 1200px;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff; /* Contrast background for the form */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-right: 20px; /* Added margin to the right */
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            background-color: #e6e6e6; /* Lighter background for input fields */
            color: #333; /* Dark text for input fields */
        }
        .login-form input[type="text"]::placeholder,
        .login-form input[type="password"]::placeholder {
            color: #999; /* Placeholder text color */
        }
        .login-form button {
            background-color: #cc181e; /* Updated button color */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .login-form button:hover {
            opacity: 0.8;
        }
        .login-form .register {
            text-align: center;
            margin-top: 20px;
        }
        .login-form .register a {
            color: dodgerblue;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
        .logo-container {
            order: -1;
            margin-bottom: 20px;
            }
        .login-form {
            order: 1;
            }
        }



    </style>
</head>
<body>

<div class="login-container">
    <!-- div class="left-text"> -->
    <div class="logo-container">
        <img src="images/yt_loginbg.png" alt="YouTube Logo" style="max-width: 100%;">
    </div>
        <!-- <h1>Welcome to ....,</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt...</p> -->
        <!-- Add more text or content here as needed -->
    </div>
    <div class="login-form">
        <h2>Login to Your Account</h2>
        <?php if ($login_failed): ?>
            <div class="error-message">Login Failed !!!</div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Input Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Input Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="register">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <p>Forgot your password? <a href="forgot_password.php">Reset here</a></p>
        </div>
    </div>
</div>

</body>
</html>
