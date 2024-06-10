<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi email
    $email = $_POST["email"];

    // Lakukan validasi alamat email disini sesuai kebutuhan aplikasi Anda

    // Buat token reset password
    $token = bin2hex(random_bytes(32)); // Generate random token
    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Set expiry time (1 hour from now)

    // Simpan token dan waktu kedaluwarsa ke dalam database
    $sql = "UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'";
    // Eksekusi query

    // Kirim email reset password
    // Gunakan fungsi mail() atau library PHPMailer untuk mengirim email

    // Redirect pengguna ke halaman konfirmasi atau halaman lainnya
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
        .password-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff; /* Contrast background for the form */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .password-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .password-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .password-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .password-form button {
            background-color: #cc181e; /* Updated button color */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .password-form button:hover {
            opacity: 0.8;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="password-form">
    <h2>Forgot Password</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <!-- You can add more fields like security question, etc. -->
        <button type="submit">Reset Password</button>
    </form>
</div>

</body>
</html>
