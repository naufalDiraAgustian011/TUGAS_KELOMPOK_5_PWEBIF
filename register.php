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

// Tambahkan fitur penambahan akun
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $email = test_input($_POST["email"]);

    // Query untuk menambahkan pengguna baru ke dalam database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            background-color: #f5f5f5;
        }
        .register-form {
            width: 300px;
            margin: 150px auto;
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-form .form-group {
            margin-bottom: 20px;
        }
        .register-form label {
            font-weight: bold;
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }
        .register-form button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="register-form">
    <!-- Registration Form -->
    <h2>Register Your Account</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</div>

</body>
</html>
