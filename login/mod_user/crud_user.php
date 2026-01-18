<?php  
require("../../config/database.php");  
require("../../config/function.php");  
require("../../config/functions.crud.php");  
session_start();  
if (!isset($_SESSION['id_user'])) {  
    die('Anda tidak diijinkan mengakses langsung');  
}  
  
if ($pg == 'ubah') {  
    $status = (isset($_POST['status'])) ? 1 : 0;  
    $data = [  
        'username'     => $_POST['username'],  
        'nama_user'    => $_POST['nama'],  
        'level'        => $_POST['level'],  
        'status'       => $status  
    ];  
  
    if ($_POST['password'] <> "") {  
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);  
    }  
  
    if ($_POST['level'] == 'operator_sd' && isset($_POST['sekolah'])) {  
        $data['id_sekolah'] = $_POST['sekolah'];  
    }  
  
    $id_user = $_POST['id_user'];  
    $exec = update($koneksi, 'user', $data, ['id_user' => $id_user]);  
    echo $exec;  
}  
  
if ($pg == 'tambah') {  
    $data = [  
        'username'     => $_POST['username'],  
        'nama_user'    => $_POST['nama'],  
        'level'        => $_POST['level'],  
        'password'     => password_hash($_POST['password'], PASSWORD_DEFAULT),  
        'status'       => 1  
    ];  
  
    if ($_POST['level'] == 'operator_sd' && isset($_POST['sekolah'])) {  
        $data['id_sekolah'] = $_POST['sekolah'];  
    }  
  
    $exec = insert($koneksi, 'user', $data);  
    echo $exec;  
}  
  
if ($pg == 'hapus') {  
    $id_user = $_POST['id_user'];  
    // Check if user is super admin
    $check_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'"));
    if ($check_user['level'] == 'superadmin') {
        echo 'PROTECTED'; // Super admin cannot be deleted
        exit;
    }
    delete($koneksi, 'user', ['id_user' => $id_user]);  
}  
  
if ($pg == 'toggle_status') {  
    $id_user = $_POST['id_user'];  
    // Check if user is super admin
    $check_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'"));
    if ($check_user['level'] == 'superadmin') {
        echo 'PROTECTED'; // Super admin cannot be deactivated
        exit;
    }
    // Get current status  
    $current = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status FROM user WHERE id_user = '$id_user'"));  
    // Toggle status  
    $new_status = ($current['status'] == 1) ? 0 : 1;  
    $exec = update($koneksi, 'user', ['status' => $new_status], ['id_user' => $id_user]);  
    echo $exec;  
}  
