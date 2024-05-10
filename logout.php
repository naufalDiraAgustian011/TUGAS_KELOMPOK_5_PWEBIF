<?php
// Mulai sesi jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan kembali ke halaman login
header("Location: login.php");
exit();
?>
