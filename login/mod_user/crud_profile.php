<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();

if (!isset($_SESSION['id_user'])) {
    die('Unauthorized');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    
    // Pastikan user hanya bisa update profilenya sendiri
    if ($id_user != $_SESSION['id_user']) {
        die('Unauthorized');
    }
    
    // Data yang akan diupdate
    $data = [
        'nama_user' => $_POST['nama'],
        'email' => $_POST['email'],
        'telepon' => $_POST['telepon']
    ];
    
    // Jika password diisi, lakukan validasi dan update
    if (!empty($_POST['password_lama']) || !empty($_POST['password_baru'])) {
        // Ambil data user saat ini
        $current_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT password FROM user WHERE id_user='$id_user'"));
        
        // Verifikasi password lama
        if (!password_verify($_POST['password_lama'], $current_user['password'])) {
            echo 'PASSWORD_SALAH';
            exit;
        }
        
        // Update password baru
        if (!empty($_POST['password_baru'])) {
            $data['password'] = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);
        }
    }
    
    // Update data
    $exec = update($koneksi, 'user', $data, ['id_user' => $id_user]);
    echo $exec;
} else {
    die('Invalid request');
}
