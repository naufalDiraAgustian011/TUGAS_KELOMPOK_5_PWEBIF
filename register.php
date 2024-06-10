
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

$register_success = false;
$register_failed = false;

// Proses registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);
    $birthdate = test_input($_POST["birthdate"]);

    // Validasi password dan confirm password
    if ($password == $confirm_password) {
        // Query untuk memeriksa apakah username atau email sudah ada dalam database
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // Jika username dan email belum ada, tambahkan pengguna baru
            $sql = "INSERT INTO users (username, email, password, birthdate) 
                    VALUES ('$username', '$email', '$password', '$birthdate')";
            if ($conn->query($sql) === TRUE) {
                $register_success = true;
            } else {
                $register_failed = true;
            }
        } else {
            $register_failed = true;
        }
    } else {
        $register_failed = true;
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
        }
        .register-form {
            width: 100%;
            max-width: 800px; /* Increased max-width for wider form */
            padding: 20px;
            background-color: #ffffff; /* Contrast background for the form */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            text-align: center;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left; /* Align labels to the left */
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"],
        .register-form input[type="date"] {
            width: 100%;
            padding: 12px; /* Adjusted padding for better spacing */
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"],
        .register-form input[type="date"] {
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
        .register-form .login {
            text-align: center;
            margin-top: 20px;
        }
        .register-form .login a {
            color: dodgerblue;
        }
        .error-message,
        .success-message {
            text-align: center;
            margin-bottom: 20px;
        }
        .error-message {
            color: red;
        }
        .success-message {
            color: green;
        }
    </style>
</head>
<body>

<div class="register-form">
    <h2>Register a New Account</h2>
    <?php if ($register_success): ?>
        <div class="success-message">Registration Successful! <a href="login.php">Login here</a></div>
    <?php elseif ($register_failed): ?>
        <div class="error-message">Registration Failed! Please try again.</div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Input Username" required>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Input Email Address" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Input Password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <button type="submit" name="register">Register</button>
    </form>
    <div class="login">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
