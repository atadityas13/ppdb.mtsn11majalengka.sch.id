<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';

if ($pg == 'ubah') {
    $data = [
        'nama_user'  => $_POST['nama_user'],
        'username'   => $_POST['username'],
        'id_sekolah' => $_POST['id_sekolah'],
        'status'     => $_POST['status']
    ];

    // Update password hanya jika diisi
    if (!empty($_POST['password'])) {
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['remember_token_uuid'] = $_POST['password']; // Save plain text as remember token
    }

    $where = [
        'id_user' => $_POST['id_user']
    ];

    $exec = update($koneksi, 'user', $data, $where);
    
    if ($exec) {
        echo 'ok';
    } else {
        echo mysqli_error($koneksi);
    }
}

if ($pg == 'hapus') {
    $id_user = $_POST['id_user'];
    
    // Cek apakah bukan admin
    $check = mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'");
    $user_data = mysqli_fetch_array($check);
    
    if ($user_data['level'] == 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Tidak dapat menghapus akun admin']);
        exit;
    }
    
    delete($koneksi, 'user', ['id_user' => $id_user]);
    echo 'ok';
}
