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
    
    // Cek apakah sekolah lainnya (input manual)
    if ($npsn === 'LAINNYA') {
        // Ambil data dari input manual
        $nama_sekolah_manual = strtoupper(mysqli_real_escape_string($koneksi, trim($_POST['nama_sekolah_manual'])));
        $npsn_manual = mysqli_real_escape_string($koneksi, trim($_POST['npsn_manual']));
        
        // Validasi
        if (strlen($nama_sekolah_manual) < 5) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Nama sekolah minimal 5 karakter'
            ]);
            exit;
        }
        
        if (strlen($npsn_manual) !== 8 || !ctype_digit($npsn_manual)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'NPSN harus 8 digit angka'
            ]);
            exit;
        }
        
        // Cek apakah NPSN manual sudah ada di database
        $cek_npsn = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE npsn='$npsn_manual'");
        if (mysqli_num_rows($cek_npsn) > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'NPSN sudah terdaftar di sistem. Silakan pilih dari daftar sekolah'
            ]);
            exit;
        }
        
        // Insert sekolah baru ke database dengan status 0 (pending)
        $insert_sekolah = insert($koneksi, 'sekolah', [
            'npsn' => $npsn_manual,
            'nama_sekolah' => $nama_sekolah_manual,
            'status' => 0  // Pending approval
        ]);
        
        if ($insert_sekolah !== 'OK') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menambahkan data sekolah'
            ]);
            exit;
        }
        
        // Gunakan NPSN manual untuk operator
        $npsn = $npsn_manual;
        $sekolah = ['npsn' => $npsn_manual, 'nama_sekolah' => $nama_sekolah_manual];
    } else {
        // Cek apakah sekolah ada dan aktif
        $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $npsn, 'status' => 1]);
        
        if (!$sekolah) {
            echo json_encode([
                'status' => 'error',
                'message' => 'NPSN tidak ditemukan atau tidak aktif dalam sistem'
            ]);
            exit;
        }
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
    
    // Insert data operator baru (status 0 = pending approval dari admin)
    $insert = insert($koneksi, 'user', [
        'nama_user' => $nama_user,
        'level' => 'operator_sd',
        'username' => $username,
        'password' => $password_hash,
        'status' => 0,
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
        $message_tambahan = ($_POST['npsn'] === 'LAINNYA') 
            ? ' Data sekolah dan akun operator akan diverifikasi terlebih dahulu.' 
            : '';
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Pendaftaran berhasil! Akun Anda akan diaktifkan setelah disetujui oleh Admin MTsN 11 Majalengka.' . $message_tambahan . ' Silakan tunggu konfirmasi'
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
