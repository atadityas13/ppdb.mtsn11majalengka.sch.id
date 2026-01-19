<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_daftar'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_daftar']]);

// Format tanggal lahir
$tgl_lahir = date('d F Y', strtotime($siswa['tgl_lahir']));
$bulan_indo = array(
    'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
    'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
    'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
    'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
);
$tgl_lahir = strtr($tgl_lahir, $bulan_indo);
$tgl_sekarang = date('d F Y');
$tgl_sekarang = strtr($tgl_sekarang, $bulan_indo);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan - <?= $siswa['nama'] ?></title>
    <style>
        @page {
            margin: 2cm 2.5cm;
        }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.8;
        }
        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            margin: 30px 0 10px 0;
            text-decoration: underline;
        }
        .nomor {
            text-align: center;
            margin-bottom: 30px;
        }
        .identitas {
            margin: 20px 0;
        }
        .identitas table {
            width: 100%;
            border-collapse: collapse;
        }
        .identitas td {
            padding: 3px 0;
            vertical-align: top;
        }
        .identitas td:first-child {
            width: 35%;
        }
        .identitas td:nth-child(2) {
            width: 5%;
        }
        .isi {
            text-align: justify;
            margin: 15px 0;
        }
        .ttd {
            margin-top: 40px;
        }
        .ttd-table {
            width: 100%;
        }
        .ttd-kiri {
            width: 50%;
            text-align: center;
        }
        .ttd-kanan {
            width: 50%;
            text-align: center;
        }
        .nama-ttd {
            margin-top: 80px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="judul">SURAT PERNYATAAN</div>
    <div class="nomor">Nomor: <?= $siswa['no_daftar'] ?>/PPDB/<?= date('Y') ?></div>
    
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini:</p>
    </div>
    
    <div class="identitas">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><strong><?= strtoupper($siswa['nama']) ?></strong></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $siswa['tempat_lahir'] ?>, <?= $tgl_lahir ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan" ?></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><?= $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td><?= $siswa['asal_sekolah'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $siswa['alamat'] ?>, <?= $siswa['kecamatan'] ?>, <?= $siswa['kabupaten'] ?></td>
            </tr>
        </table>
    </div>
    
    <div class="isi">
        <p>Dengan ini menyatakan dengan sesungguhnya bahwa:</p>
        
        <ol>
            <li>Saya telah mendaftar sebagai calon peserta didik baru di <strong><?= $setting['nama_sekolah'] ?></strong> untuk Tahun Pelajaran <?= date('Y') ?>/<?= (date('Y')+1) ?>.</li>
            
            <li>Seluruh data dan informasi yang saya sampaikan dalam formulir pendaftaran adalah benar dan sesuai dengan dokumen yang saya miliki.</li>
            
            <li>Apabila saya diterima sebagai peserta didik di <strong><?= $setting['nama_sekolah'] ?></strong>, saya bersedia dan sanggup untuk:
                <ul style="list-style-type: lower-alpha; margin-left: 20px;">
                    <li>Mematuhi seluruh peraturan dan tata tertib yang berlaku di madrasah;</li>
                    <li>Mengikuti seluruh kegiatan pembelajaran dan kegiatan madrasah lainnya dengan penuh tanggung jawab;</li>
                    <li>Menjaga nama baik madrasah dan tidak melakukan perbuatan yang dapat merugikan diri sendiri maupun madrasah;</li>
                    <li>Menyelesaikan pendidikan hingga lulus tepat waktu.</li>
                </ul>
            </li>
            
            <li>Apabila di kemudian hari saya melanggar peraturan dan tata tertib yang berlaku di <strong><?= $setting['nama_sekolah'] ?></strong>, saya bersedia menerima sanksi sesuai dengan ketentuan yang berlaku, termasuk sanksi pemberhentian sebagai peserta didik.</li>
            
            <li>Apabila dikemudian hari diketahui bahwa data yang saya berikan tidak benar atau palsu, saya bersedia menerima sanksi pembatalan status sebagai peserta didik tanpa ada tuntutan apapun kepada pihak madrasah.</li>
        </ol>
        
        <p>Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dalam keadaan sadar dan tanpa paksaan dari pihak manapun untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
    
    <div class="ttd">
        <table class="ttd-table">
            <tr>
                <td class="ttd-kiri">
                    <p>Mengetahui,<br>Orang Tua/Wali</p>
                    <div class="nama-ttd">
                        ( <?= $siswa['nama_ayah'] ?> )
                    </div>
                </td>
                <td class="ttd-kanan">
                    <p><?= $siswa['kecamatan'] ?>, <?= $tgl_sekarang ?><br>Yang Membuat Pernyataan</p>
                    <div class="nama-ttd">
                        ( <?= strtoupper($siswa['nama']) ?> )
                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("surat_pernyataan_".$siswa['nisn'].".pdf", array("Attachment" => false));
exit(0);
?>
