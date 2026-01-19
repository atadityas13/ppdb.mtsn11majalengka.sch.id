<?php require "../mod_formulir/fungsi.php"; ?>
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="?pg=setting" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Cetak Bukti Pendaftaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href='.'>Dashboard</a></div>
      <div class="breadcrumb-item active">Cetak Bukti</div>
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
              <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" class="badge badge-primary"><i class="fas fa-download"></i> Download</a>
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
              <a target="_blank" href="mod_formulir/print_kartu.php" class="badge badge-success"><i class="fas fa-id-card"></i> Download</a>
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
              <a target="_blank" href="mod_formulir/pernyataan.php" class="badge badge-warning"><i class="fas fa-file-alt"></i> Download</a>
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
          <img alt="image" src="../<?= $siswa['foto'] ?>" class="rounded-circle author-box-picture">
          <div class="clearfix"></div>
          <br>
          <div class="author-box-job">Status Pendaftaran</div>
          <?php if ($siswa['status'] == 1) { ?>
            <span class="badge badge-success">Diterima</span>
          <?php } elseif ($siswa['status'] == 2) { ?>
            <span class="badge badge-danger">Cadangan</span>
          <?php } else { ?>
            <span class="badge badge-info">Diverifikasi</span>
          <?php } ?>
        </div>
        <div class="author-box-details">
          <div class="tab-content" id="myTabContent2">
            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
              <form id="form-datadiri">
                <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="number" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat dan Tanggal Lahir</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>, <?= tgl_indo($siswa['tgl_lahir']) ?>" disabled>
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
