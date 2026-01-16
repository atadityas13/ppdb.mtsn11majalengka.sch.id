<?php

session_start();

// Cek level user sebelum destroy session
$user_level = isset($_SESSION['level']) ? $_SESSION['level'] : '';

session_destroy();

// Redirect berdasarkan level user
if ($user_level == 'operator_sd') {
    header("Location: ../sekolah/login.php");
} else {
    header("Location: ../login");
}
exit();
