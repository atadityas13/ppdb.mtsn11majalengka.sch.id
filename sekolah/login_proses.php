<?php
session_start();
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    
    // Validasi input
    if (empty($username) || empty($password)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username dan password harus diisi'
        ]);
        exit;
    }
    
    // Cek user dengan username dan level operator_sd
    $query = "SELECT * FROM user WHERE username='$username' AND level='operator_sd' LIMIT 1";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) == 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username tidak ditemukan atau bukan operator sekolah'
        ]);
        exit;
    }
    
    $user = mysqli_fetch_array($result);
    
    // Cek apakah akun sudah disetujui admin
    if ($user['status'] != '1') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Akun Anda belum disetujui oleh Admin MTsN 11 Majalengka. Silakan hubungi Administrator untuk aktivasi akun'
        ]);
        exit;
    }
    
    $user = mysqli_fetch_array($result);
    
    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Login berhasil
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['level'] = $user['level'];
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Login berhasil! Selamat datang ' . $user['nama_user']
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password yang Anda masukkan salah'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}
