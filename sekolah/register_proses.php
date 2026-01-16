<?php
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npsn = mysqli_real_escape_string($koneksi, $_POST['npsn']);
    $nama_user = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
    $nuptk = mysqli_real_escape_string($koneksi, $_POST['nuptk']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $jenkel = mysqli_real_escape_string($koneksi, $_POST['jenkel']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    // Validasi input
    if (empty($npsn) || empty($nama_user) || empty($no_hp) || empty($jenkel) || empty($username) || empty($password)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Semua field wajib diisi (kecuali NUPTK)'
        ]);
        exit;
    }
    
    // Validasi username
    if (strlen($username) < 4) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username minimal 4 karakter'
        ]);
        exit;
    }
    
    // Validasi password
    if (strlen($password) < 6) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password minimal 6 karakter'
        ]);
        exit;
    }
    
    if ($password !== $password_confirm) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Konfirmasi password tidak cocok'
        ]);
        exit;
    }
    
    // Cek apakah sekolah ada dan aktif
    $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $npsn, 'status' => 1]);
    
    if (!$sekolah) {
        echo json_encode([
            'status' => 'error',
            'message' => 'NPSN tidak ditemukan atau tidak aktif dalam sistem'
        ]);
        exit;
    }
    
    // Cek apakah username sudah digunakan
    $cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username sudah digunakan. Silakan gunakan username lain'
        ]);
        exit;
    }
    
    // Cek apakah sekolah sudah punya operator
    $cek_operator = mysqli_query($koneksi, "SELECT * FROM user WHERE id_sekolah='$npsn' AND level='operator_sd'");
    if (mysqli_num_rows($cek_operator) > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Sekolah ini sudah memiliki operator. Silakan hubungi admin jika ada masalah'
        ]);
        exit;
    }
    
    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert data operator baru
    $insert = insert($koneksi, 'user', [
        'nama_user' => $nama_user,
        'level' => 'operator_sd',
        'username' => $username,
        'password' => $password_hash,
        'status' => 1,
        'foto' => 0,
        'mapel' => '',
        'nuptk' => $nuptk,
        'jenkel' => $jenkel,
        'tempat_lahir' => '',
        'tgl_lahir' => '0000-00-00',
        'tmt' => '0000',
        'no_sk' => '',
        'jenis' => '',
        'no_hp' => $no_hp,
        'nik' => 0,
        'id_sekolah' => $npsn
    ]);
    
    if ($insert == 'OK') {
        echo json_encode([
            'status' => 'success',
            'message' => 'Pendaftaran berhasil! Silakan login dengan username dan password Anda'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal menyimpan data. Silakan coba lagi'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}
