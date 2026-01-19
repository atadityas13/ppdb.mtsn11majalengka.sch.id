<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_daftar'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_daftar']]);

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kartu Pendaftar - <?= $siswa['nama'] ?></title>
    <style>
        @page { margin: 1cm; }
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
        }
        .card { 
            width: 9cm; 
            margin: 20px auto; 
            border: 2px solid #333;
            padding: 15px;
        }
        .header-title {
            font-size: 11pt;
            font-weight: bold;
            text-align: center;
            margin: 0;
        }
        table { 
            width: 100%; 
            font-size: 10pt;
            border-collapse: collapse;
        }
        td { 
            padding: 4px 0;
            vertical-align: top;
        }
        td:first-child {
            width: 35%;
        }
        td:nth-child(2) {
            width: 5%;
        }
        .foto-container {
            width: 3cm;
            height: 4cm;
            border: 1px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            overflow: hidden;
        }
        .foto { 
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .no-foto {
            color: #999;
            font-size: 9pt;
            text-align: center;
        }
        hr { 
            border: 0;
            border-top: 2px solid #333; 
            margin: 10px 0;
        }
        .text-center { text-align: center; }
        .ttd { 
            margin-top: 15px; 
            text-align: right;
            font-size: 9pt;
        }
        .ttd p {
            margin: 3px 0;
        }
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
            .card { 
                margin: 0 auto;
                page-break-inside: avoid;
            }
        }
        .btn-print {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            z-index: 1000;
        }
        .btn-print:hover {
            background: #0056b3;
        }
    </style>
    <script>
        function printCard() {
            window.print();
        }
    </script>
</head>
<body>
    <button onclick="printCard()" class="btn-print no-print">🖨️ Cetak Kartu</button>
    
    <div class="card">
        <img src="../../<?= $setting['kop'] ?>" width="100%" />
        <hr>
        <p class="header-title">KARTU BUKTI PENDAFTARAN</p>
        
        <div class="foto-container">
            <?php if (!empty($siswa['foto']) && file_exists("../../" . $siswa['foto'])): ?>
                <img src="../../<?= $siswa['foto'] ?>" class="foto" alt="Foto">
            <?php else: ?>
                <div class="no-foto">Foto<br>Belum<br>Tersedia</div>
            <?php endif; ?>
        </div>
        
        <table>
            <tr>
                <td>No Pendaftaran</td>
                <td>:</td>
                <td><?= $siswa['no_daftar'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><strong><?= $siswa['nama'] ?></strong></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?= $siswa['jurusan'] ?></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td><?= $siswa['asal_sekolah'] ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>Username</strong></td>
                <td>:</td>
                <td><strong><?= $siswa['nisn'] ?></strong></td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td>:</td>
                <td><strong><?= $siswa['remember_token_uuid'] ?></strong></td>
            </tr>
        </table>
        
        <div class="ttd">
            <p>Kepala Madrasah<br><strong>MTsN 11 Majalengka</strong></p>
            <br><br>
            <p><strong><?= $setting['kepala'] ?></strong><br>
            NIP. <?= $setting['nip'] ?></p>
        </div>
    </div>
</body>
</html>
<?php

$html = ob_get_clean();
echo $html;
exit(0);
?>
