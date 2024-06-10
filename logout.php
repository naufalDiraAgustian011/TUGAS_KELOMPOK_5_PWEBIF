<?php
// Mulai sesi
session_start();

// Periksa apakah sesi pengguna sudah ada
if (isset($_SESSION['username'])) {
    // Hapus semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>
