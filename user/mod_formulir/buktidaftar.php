<?php
// JANGAN panggil session_start() lagi jika di index.php sudah ada
// JANGAN panggil database.php lagi jika di index.php sudah ada

// Ambil ID dari session yang sudah aktif di index
$id_daftar = $_SESSION['id_daftar'];

// Pastikan variabel $koneksi adalah variabel yang benar dari database.php
// Kita lakukan fetch data siswa
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id_daftar]);

// Jika terjadi error pada fetch atau data tidak ada, tampilkan pesan manual agar tidak blank
if (!$siswa) {
    echo "<div class='alert alert-danger'>Data pendaftar tidak ditemukan. Silakan cek koneksi database.</div>";
    exit;
}
?>

<div class="section-header">
    <div class="section-header-back">
        <a href="." class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Cetak Bukti Pendaftaran</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Formulir</h4>
                    </div>
                    <div class="card-body">
                        <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kartu Pendaftar</h4>
                    </div>
                    <div class="card-body">
                        <a target="_blank" href="mod_formulir/print_kartu.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-print"></i> Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Surat Pernyataan</h4>
                    </div>
                    <div class="card-body">
                        <a target="_blank" href="mod_formulir/pernyataan.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Preview Identitas</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <?php 
                        $foto = (empty($siswa['foto'])) ? 'assets/img/avatar/avatar-1.png' : $siswa['foto'];
                    ?>
                    <img src="../<?= $foto ?>" class="img-thumbnail" style="width: 150px;">
                </div>
                <div class="col-md-9">
                    <table class="table table-sm table-striped">
                        <tr><td>No. Daftar</td><td>: <?= $siswa['no_daftar'] ?></td></tr>
                        <tr><td>Nama Lengkap</td><td>: <?= $siswa['nama'] ?></td></tr>
                        <tr><td>NISN</td><td>: <?= $siswa['nisn'] ?></td></tr>
                        <tr><td>Tempat, Tgl Lahir</td><td>: <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>