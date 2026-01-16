<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();

if ($pg == 'simpan') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {

        // --- Bagian untuk membuat nomor urut ---
        $query = "SELECT no_daftar FROM daftar ORDER BY SUBSTR(no_daftar, 4, 3) DESC LIMIT 1";
        $hasil = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($hasil) > 0) {
            $data  = mysqli_fetch_array($hasil);
            $kodedaftar = $data['no_daftar'];
            $noUrut = (int) substr($kodedaftar, 4, 3);
            $noUrut++;
        } else {
            $noUrut = 1;
        }
        $char = "250";
        $newID = $char . sprintf("%03s", $noUrut);
        // --- Akhir bagian nomor urut ---


        // Ambil nama jurusan dan NPSN sekolah dari form
        $nama_jurusan = $_POST['jurusan']; 
        $npsn_sekolah = $_POST['asal']; 

        // Query untuk mendapatkan nama sekolah dan NPSN berdasarkan NPSN yang dipilih
        $query_sekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE npsn = '$npsn_sekolah'"); 
        $data_sekolah = mysqli_fetch_assoc($query_sekolah);
        $nama_sekolah = $data_sekolah['nama_sekolah']; 
        $npsn_asal = $data_sekolah['npsn']; 

        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
            'jurusan' => $nama_jurusan,  
            'nisn' => $_POST['nisn'],
            'nama' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'jenkel' => $_POST['jenkel'],
            'npsn_asal' => $npsn_asal,  
            'asal_sekolah' => $nama_sekolah, 
            'password' => $_POST['password'],
            'tgl_daftar' => $_POST['tgl_daftar'],
            'foto' => 'default.png'
        ];

        $cek = rowcount($koneksi, 'daftar', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'daftar', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
                'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];
            echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}

if ($pg == 'simpan2') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        
        // --- Bagian untuk membuat nomor urut ---
        $query = "SELECT no_daftar FROM daftar ORDER BY SUBSTR(no_daftar, 4, 3) DESC LIMIT 1";
        $hasil = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($hasil) > 0) {
            $data  = mysqli_fetch_array($hasil);
            $kodedaftar = $data['no_daftar'];
            $noUrut = (int) substr($kodedaftar, 4, 3);
            $noUrut++;
        } else {
            $noUrut = 1;
        }
        $char = "250";
        $newID = $char . sprintf("%03s", $noUrut);
        // --- Akhir bagian nomor urut ---

        // Ambil nama jurusan dan NPSN sekolah dari form
        $nama_jurusan = $_POST['jurusan']; 
        $npsn_sekolah = $_POST['asal'];

        // Cek apakah memilih sekolah lainnya (input manual)
        if ($npsn_sekolah === 'LAINNYA') {
            $nama_sekolah = strtoupper(mysqli_escape_string($koneksi, trim($_POST['asal_manual'])));
            $npsn_asal = 'LAINNYA';
        } else {
            // Query untuk mendapatkan nama sekolah dan NPSN berdasarkan NPSN yang dipilih
            $query_sekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE npsn = '$npsn_sekolah'");
            $data_sekolah = mysqli_fetch_assoc($query_sekolah);
            $nama_sekolah = $data_sekolah['nama_sekolah'];
            $npsn_asal = $data_sekolah['npsn'];
        } 

        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama'])));
        $data = [
            'no_daftar' => $newID,
            'jurusan' => $nama_jurusan, 
            'jenis' => $_POST['jenis'],
            'nisn' => $_POST['nisn'],
            'nama' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'jenkel' => $_POST['jenkel'],
            'npsn_asal' => $npsn_asal,  
            'asal_sekolah' => $nama_sekolah, 
            'password' => $_POST['password'],
            'foto' => 'default.png'
        ];

        $cek = rowcount($koneksi, 'daftar', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'daftar', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
                'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];
            echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}

if ($pg == 'login') {
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nisn='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan Hubungi Operator Sekolah!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                $_SESSION['id_daftar'] = $siswa['id_daftar'];
                mysqli_query($koneksi, "UPDATE daftar set online='1' where id_daftar='$siswa[id_daftar]'"); 
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}

if ($pg == 'login2') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_siswa='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan Hubungi Operator Sekolah!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                $_SESSION['id_siswa'] = $siswa['id_siswa'];
                mysqli_query($koneksi, "UPDATE siswa set online='1' where id_siswa='$siswa[id_siswa]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}