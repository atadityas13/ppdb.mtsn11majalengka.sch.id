<?php  
require("../../config/database.php");  
require("../../config/function.php");  
require("../../config/functions.crud.php");  
session_start();  
if (!isset($_SESSION['id_user'])) {  
    die('Anda tidak diijinkan mengakses langsung');  
}  
  
if ($pg == 'ubah') {  
    $data = [  
        'nama_sekolah' => $_POST['nama_sekolah'],  
        'alamat'       => $_POST['alamat'],  
        'kontak'       => $_POST['kontak']  
    ];  
  
    $npsn = $_POST['npsn'];  
    $exec = update($koneksi, 'sekolah', $data, ['npsn' => $npsn]);  
    echo $exec;  
}  
