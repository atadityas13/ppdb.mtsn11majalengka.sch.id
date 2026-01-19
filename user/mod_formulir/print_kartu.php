<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_daftar'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_daftar']]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kartu Pendaftar - <?= $siswa['nama'] ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        .card { 
            width: 10.4cm; 
            margin: 20px auto; 
            border: 1px solid #333;
            padding: 20px;
        }
        table { width: 100%; font-size: 12px; }
        td { padding: 3px 0; }
        .foto { max-width: 80px; max-height: 100px; }
        hr { border: 1px solid #333; }
        .text-center { text-align: center; }
        .ttd { margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="card">
        <img src="../../<?= $setting['kop'] ?>" width="100%" />
        <hr>
        <h4 class="text-center">KARTU BUKTI PENDAFTARAN</h4>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100px" valign="top" align="center" rowspan="7">
                    <img src="../../<?= $siswa['foto'] ?>" class="foto" alt="Foto">
                </td>
            </tr>
            <tr>
                <td width="35%" valign="top">No Pendaftaran</td>
                <td valign="top">: <?= $siswa['no_daftar'] ?></td>
            </tr>
            <tr>
                <td valign="top">Nama</td>
                <td valign="top">: <?= $siswa['nama'] ?></td>
            </tr>
            <tr>
                <td valign="top">Jurusan</td>
                <td valign="top">: <?= $siswa['jurusan'] ?></td>
            </tr>
            <tr>
                <td valign="top">Asal Sekolah</td>
                <td valign="top">: <?= $siswa['asal_sekolah'] ?></td>
            </tr>
            <tr>
                <td valign="top">Username</td>
                <td valign="top">: <?= $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <td valign="top">Password</td>
                <td valign="top">: <?= $siswa['password'] ?></td>
            </tr>
        </table>
        
        <div class="ttd">
            <p>Kepala Sekolah<br><?= $setting['nama_sekolah'] ?></p>
            <br><br><br>
            <p><strong><?= $setting['kepala'] ?></strong><br>
            <strong>NIP. <?= $setting['nip'] ?></strong></p>
        </div>
    </div>
</body>
</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("kartu_pendaftar.pdf", array("Attachment" => false));
exit(0);
?>
