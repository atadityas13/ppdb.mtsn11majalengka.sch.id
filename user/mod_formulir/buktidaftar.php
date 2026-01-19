<?php
session_start();
require_once "../../config/database.php";
require_once "../../config/function.php";
require_once "../../config/functions.crud.php";
require_once "../mod_formulir/fungsi.php";

// Set locale untuk tanggal Indonesia
setlocale(LC_ALL, 'id-ID', 'id_ID');

if (!isset($_SESSION['id_daftar'])) {
    die('Akses tidak diizinkan. Silakan login ulang.');
}

// Pastikan koneksi $koneksi tersedia dari file database.php
$id_daftar = $_SESSION['id_daftar'];
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id_daftar]);

// Proteksi jika data siswa tidak ditemukan
if (!$siswa) {
    die('Data pendaftar tidak ditemukan.');
}
?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="?pg=setting" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Cetak Bukti Pendaftaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href='.'>Dashboard</a></div>
            <div class="breadcrumb-item">Cetak Bukti</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Cetak atau Download Bukti Pendaftaran</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">1</div>
                        <div class="activity-detail">
                            <h5>Formulir</h5>
                            <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="badge badge-primary">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-success text-white shadow-success">2</div>
                        <div class="activity-detail">
                            <h5>Kartu Pendaftar</h5>
                            <a target="_blank" href="mod_formulir/print_kartu.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="badge badge-success">
                                <i class="fas fa-id-card"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-warning text-white shadow-warning">3</div>
                        <div class="activity-detail">
                            <h5>Surat Pernyataan</h5>
                            <a target="_blank" href="mod_formulir/pernyataan.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="badge badge-warning">
                                <i class="fas fa-file-alt"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="card author-box card-primary mt-4">
            <div class="card-header">
                <h4>Preview Kartu Pendaftar</h4>
            </div>
            <div class="card-body">
                <div class="author-box-left">
                    <?php 
                        $foto_path = "../" . $siswa['foto'];
                        if (!file_exists($foto_path) || empty($siswa['foto'])) {
                            $foto_path = "../assets/img/avatar/avatar-1.png"; // Ganti ke path default avatar Anda
                        }
                    ?>
                    <img alt="image" src="<?= $foto_path ?>" class="rounded-circle author-box-picture" style="width: 100px; height: 100px; object-fit: cover;">
                    
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } elseif ($siswa['status'] == 2) { ?>
                        <span class="badge badge-danger">Cadangan</span>
                    <?php } else { ?>
                        <span class="badge badge-info">Diverifikasi / Proses</span>
                    <?php } ?>
                </div>

                <div class="author-box-details">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <form id="form-datadiri">
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3">No Pendaftaran</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" value="<?= $siswa['no_daftar'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" value="<?= $siswa['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3">NISN</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" value="<?= $siswa['nisn'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3">Tempat, Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" value="<?= $siswa['tempat_lahir'] ?>, <?= tgl_indo($siswa['tgl_lahir']) ?>" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>