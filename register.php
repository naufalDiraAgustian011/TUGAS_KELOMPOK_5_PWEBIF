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
            font-family: Arial, sans-serif;
            background-color: #666666; /* Updated background color */
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
        .register-container {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            max-width: 1200px;
        }
        .register-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff; /* Contrast background for the form */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-right: 20px; /* Added margin to the right */
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #e6e6e6; /* Lighter background for input fields */
            color: #333; /* Dark text for input fields */
        }
        .register-form input[type="text"]::placeholder,
        .register-form input[type="password"]::placeholder,
        .register-form input[type="email"]::placeholder {
            color: #999; /* Placeholder text color */
        }
        .register-form button {
            background-color: #cc181e; /* Updated button color */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .register-form button:hover {
            opacity: 0.8;
        }
        .register-form .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
        .logo-container {
            order: -1;
            margin-bottom: 20px;
            }
        .register-form {
            order: 1;
            }
        }
    </style>
</head>
<body>

<div class="register-container">
    <!-- div class="left-text"> -->
    <div class="logo-container">
        <img src="yt_logo(1).png" alt="YouTube Logo" style="max-width: 100%;">
    </div>
        <!-- <h1>Welcome to ....,</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt...</p> -->
        <!-- Add more text or content here as needed -->
    </div>
    <div class="register-form">
        <h2>Register Your Account</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Input Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Input Password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Input Email" required>
            <button type="submit" name="register">Register</button>
        </form>
        <div class="register">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>

</body>
</html>


