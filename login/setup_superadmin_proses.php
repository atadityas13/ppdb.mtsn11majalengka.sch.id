<?php
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";

// Cek apakah sudah ada super admin
$cek_superadmin = mysqli_query($koneksi, "SELECT * FROM user WHERE level='superadmin'");
if (mysqli_num_rows($cek_superadmin) > 0) {
    echo 'superadmin_exists';
    exit;
}

// Validasi input
if (empty($_POST['nama_user']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
    echo 'empty_fields';
    exit;
}

$nama_user = mysqli_real_escape_string($koneksi, trim($_POST['nama_user']));
$username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

// Validasi password minimal 8 karakter
if (strlen($password) < 8) {
    echo 'password_too_short';
    exit;
}

// Validasi password match
if ($password !== $password_confirm) {
    echo 'password_not_match';
    exit;
}

// Cek apakah username sudah digunakan
$cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($cek_username) > 0) {
    echo 'username_exists';
    exit;
}

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert super admin
$data = [
    'nama_user' => $nama_user,
    'username' => $username,
    'password' => $password_hash,
    'remember_token_uuid' => $password, // Plain text untuk admin view
    'level' => 'superadmin',
    'status' => 1,
    'foto' => 0,
    'mapel' => '',
    'nuptk' => '',
    'jenkel' => '',
    'tempat_lahir' => '',
    'tgl_lahir' => '0000-00-00',
    'tmt' => '0000',
    'no_sk' => '',
    'jenis' => '',
    'no_hp' => '',
    'nik' => 0
];

$result = insert($koneksi, 'user', $data);

if ($result == 'OK') {
    // Log activity (optional)
    $log_message = "Super Admin pertama dibuat: $username - $nama_user";
    @file_put_contents('../error_log', date('Y-m-d H:i:s') . " - $log_message\n", FILE_APPEND);
    
    echo 'OK';
} else {
    echo 'error';
}
?>
