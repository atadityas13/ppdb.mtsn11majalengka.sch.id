<?php  
require("../../config/database.php");  
require("../../config/function.php");  
require("../../config/functions.crud.php");  
session_start();  
if (!isset($_SESSION['id_user'])) {  
    die('Anda tidak diijinkan mengakses langsung');  
}  
  
if ($pg == 'ubah') {  
    $id_user = $_POST['id_user'];  
    
    // Get current logged in user and target user info
    $current_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$_SESSION[id_user]'"));
    $target_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'"));
    
    // Admin cannot edit other admins (only self)
    if ($current_user['level'] == 'admin' && $target_user['level'] == 'admin' && $id_user != $_SESSION['id_user']) {
        echo 'FORBIDDEN'; // Admin cannot edit other admins
        exit;
    }
    
    $status = (isset($_POST['status'])) ? 1 : 0;  
    $data = [  
        'username'     => $_POST['username'],  
        'nama_user'    => $_POST['nama'],  
        'level'        => $_POST['level'],  
        'status'       => $status  
    ];  
  
    if ($_POST['password'] <> "") {  
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);  
        $data['remember_token_uuid'] = $_POST['password']; // Obfuscated as remember token
    }  
  
    if ($_POST['level'] == 'operator_sd' && isset($_POST['sekolah'])) {  
        $data['id_sekolah'] = $_POST['sekolah'];  
    }  
  
    $id_user = $_POST['id_user'];  
    $exec = update($koneksi, 'user', $data, ['id_user' => $id_user]);  
    echo $exec;  
}  
  
if ($pg == 'tambah') {  
    // Get current user level
    $current_user = fetch($koneksi, 'user', ['id_user' => $_SESSION['id_user']]);
    $is_superadmin = ($current_user['level'] === 'superadmin');
    
    // Super admin hanya bisa dibuat via setup wizard
    if ($_POST['level'] === 'superadmin') {
        echo 'error_superadmin_not_allowed';
        exit;
    }
    
    // Admin tidak boleh menambah admin lain (se-level)
    if (!$is_superadmin && $_POST['level'] === 'admin') {
        echo 'error_admin';
        exit;
    }
    
    $data = [  
        'username'     => $_POST['username'],  
        'nama_user'    => $_POST['nama'],  
        'level'        => $_POST['level'],  
        'password'     => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'remember_token_uuid' => $_POST['password'], // Obfuscated as remember token with UUID
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
    
    // Get current logged in user and target user info
    $current_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$_SESSION[id_user]'"));
    $check_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'"));
    
    // Check if user is super admin
    if ($check_user['level'] == 'superadmin') {
        echo 'PROTECTED'; // Super admin cannot be deleted
        exit;
    }
    
    // Admin cannot delete other admins
    if ($current_user['level'] == 'admin' && $check_user['level'] == 'admin') {
        echo 'FORBIDDEN'; // Admin cannot delete other admins
        exit;
    }
    
    delete($koneksi, 'user', ['id_user' => $id_user]);  
}  
  
if ($pg == 'toggle_status') {  
    $id_user = $_POST['id_user'];  
    
    // Get current logged in user and target user info
    $current_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$_SESSION[id_user]'"));
    $check_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$id_user'"));
    
    // Check if user is super admin
    if ($check_user['level'] == 'superadmin') {
        echo 'PROTECTED'; // Super admin cannot be deactivated
        exit;
    }
    
    // Admin cannot toggle other admins status
    if ($current_user['level'] == 'admin' && $check_user['level'] == 'admin') {
        echo 'FORBIDDEN'; // Admin cannot toggle other admins
        exit;
    }
    
    // Get current status  
    $current = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status FROM user WHERE id_user = '$id_user'"));  
    // Toggle status  
    $new_status = ($current['status'] == 1) ? 0 : 1;  
    $exec = update($koneksi, 'user', ['status' => $new_status], ['id_user' => $id_user]);  
    echo $exec;  
}  
