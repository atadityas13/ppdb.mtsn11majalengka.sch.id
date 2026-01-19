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
            font-size: 11pt;
            line-height: 1.5;
        }
        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin: 15px 0 20px 0;
            text-decoration: underline;
        }
        .identitas {
            margin: 15px 0;
        }
        .identitas table {
            width: 100%;
            border-collapse: collapse;
        }
        .identitas td {
            padding: 2px 0;
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
            margin: 10px 0;
        }
        .isi p {
            margin: 8px 0;
        }
        .isi ol {
            margin: 8px 0;
            padding-left: 25px;
        }
        .isi ol li {
            margin: 5px 0;
            padding-left: 5px;
        }
        .isi ul {
            margin: 5px 0;
            padding-left: 20px;
        }
        .isi ul li {
            margin: 3px 0;
        }
        .ttd {
            margin-top: 30px;
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
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="judul">SURAT PERNYATAAN</div>
    
    <div class="isi">
        <p>Yang bertanda tangan di bawah ini:</p>
    </div>
    
    <div class="identitas">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $siswa['nama'] ?></td>
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
            <li>Saya telah mendaftar sebagai calon peserta didik baru di MTsN 11 Majalengka untuk Tahun Pelajaran <?= date('Y') ?>/<?= (date('Y')+1) ?>.</li>
            
            <li>Seluruh data dan informasi yang saya sampaikan dalam formulir pendaftaran adalah benar dan sesuai dengan dokumen yang saya miliki.</li>
            
            <li>Apabila saya diterima sebagai peserta didik di MTsN 11 Majalengka, saya bersedia dan sanggup untuk:
                <ol style="list-style-type: lower-alpha; margin-top: 3px;">
                    <li>Mematuhi seluruh peraturan dan tata tertib yang berlaku di madrasah;</li>
                    <li>Mengikuti seluruh kegiatan pembelajaran dan kegiatan madrasah lainnya dengan penuh tanggung jawab;</li>
                    <li>Menjaga nama baik madrasah dan tidak melakukan perbuatan yang dapat merugikan diri sendiri maupun madrasah;</li>
                    <li>Menyelesaikan pendidikan hingga lulus tepat waktu.</li>
                </ol>
            </li>
            
            <li>Apabila di kemudian hari saya melanggar peraturan dan tata tertib yang berlaku di MTsN 11 Majalengka, saya bersedia menerima sanksi sesuai dengan ketentuan yang berlaku, termasuk sanksi pemberhentian sebagai peserta didik.</li>
        </ol>
        
        <p style="margin-top: 10px;">Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dalam keadaan sadar dan tanpa paksaan dari pihak manapun untuk dapat dipergunakan sebagaimana mestinya.</p>
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
                    <p>Cingambul, <?= $tgl_sekarang ?><br>Yang Membuat Pernyataan</p>
                    <div class="nama-ttd">
                        ( <?= $siswa['nama'] ?> )
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
