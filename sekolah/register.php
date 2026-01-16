<?php
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran Operator Sekolah &mdash; <?= $setting['nama_sekolah'] ?></title>
  
  <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .register-brand {
      color: white;
      font-weight: 700;
      margin-bottom: 30px;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 25px;
      padding: 12px;
      font-weight: 600;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #5568d3 0%, #6b3fa0 100%);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    .form-control {
      border-radius: 10px;
      padding: 12px 15px;
      border: 2px solid #e3e6f0;
    }
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    .card-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 15px 15px 0 0 !important;
      padding: 20px;
    }
    .simple-footer {
      color: white;
      margin-top: 20px;
    }
    .info-box {
      background: rgba(255,255,255,0.1);
      border-radius: 10px;
      padding: 15px;
      color: white;
      margin-bottom: 20px;
      backdrop-filter: blur(10px);
    }
    .select2-container--default .select2-selection--single {
      border-radius: 10px;
      padding: 8px;
      border: 2px solid #e3e6f0;
      height: 48px;
    }
    .step-indicator {
      background: white;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
            
            <div class="register-brand text-center">
              <img src="../<?= $setting['logo'] ?>" alt="logo" width="140" class="mb-3" style="filter: drop-shadow(0 4px 12px rgba(102, 126, 234, 0.3)); border-radius: 10px;">
              <h3 class="mt-3">PENDAFTARAN OPERATOR SEKOLAH</h3>
              <h5>PPDB Online <?= $setting['nama_sekolah'] ?></h5>
            </div>

            <div class="info-box text-center">
              <i class="fas fa-user-shield fa-2x mb-2"></i>
              <p class="mb-0"><small>Daftarkan sekolah Anda untuk memantau data siswa pendaftar<br>yang berasal dari sekolah Anda secara real-time</small></p>
            </div>

            <div class="card">
              <div class="card-header text-center">
                <h4><i class="fas fa-user-plus"></i> Form Pendaftaran Operator</h4>
              </div>

              <div class="card-body p-4">
                <div class="step-indicator">
                  <div class="row text-center">
                    <div class="col-md-4">
                      <div class="step active">
                        <div class="step-icon"><i class="fas fa-school"></i></div>
                        <div class="step-text">Data Sekolah</div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="step">
                        <div class="step-icon"><i class="fas fa-user"></i></div>
                        <div class="step-text">Data Operator</div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="step">
                        <div class="step-icon"><i class="fas fa-key"></i></div>
                        <div class="step-text">Keamanan</div>
                      </div>
                    </div>
                  </div>
                </div>

                <form method="POST" id="form-register">
                  
                  <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> <strong>Informasi:</strong> Pilih sekolah Anda dari daftar. Buat username unik untuk login.
                  </div>

                  <div class="form-group">
                    <label for="npsn"><i class="fas fa-school"></i> Sekolah <small class="text-danger">*</small></label>
                    <select class="form-control select2" name="npsn" id="npsn" required style="width: 100%">
                      <option value="">-- Pilih Sekolah Anda --</option>
                      <?php
                      $sekolah_list = select($koneksi, 'sekolah', ['status' => 1], 'nama_sekolah ASC');
                      foreach ($sekolah_list as $skl) {
                        echo "<option value='{$skl['npsn']}'>[{$skl['npsn']}] {$skl['nama_sekolah']}</option>";
                      }
                      ?>
                      <option value="LAINNYA" style="background-color: #fff3cd; font-weight: bold;">🔽 Sekolah Lainnya (Tidak Ada Dalam Daftar)</option>
                    </select>
                    <small class="form-text text-muted">Pilih sekolah tempat Anda bertugas</small>
                  </div>

                  <div class="form-group" id="input-sekolah-manual-operator" style="display: none;">
                    <label for="nama_sekolah_manual"><i class="fas fa-school"></i> NAMA SEKOLAH <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="nama_sekolah_manual" id="nama_sekolah_manual" placeholder="Contoh: SD NEGERI 1 JAKARTA" style="text-transform: uppercase;">
                    <small class="form-text text-muted">Tulis nama lengkap sekolah dengan benar</small>
                  </div>

                  <div class="form-group" id="input-npsn-manual-operator" style="display: none;">
                    <label for="npsn_manual"><i class="fas fa-barcode"></i> NPSN SEKOLAH <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="npsn_manual" id="npsn_manual" placeholder="Contoh: 20200000" maxlength="8">
                    <small class="form-text text-muted">Nomor Pokok Sekolah Nasional (8 digit angka)</small>
                  </div>

                  <hr class="my-4">

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="nama_user"><i class="fas fa-user"></i> Nama Lengkap Operator <small class="text-danger">*</small></label>
                      <input id="nama_user" type="text" class="form-control" name="nama_user" required placeholder="Nama lengkap operator">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nuptk"><i class="fas fa-id-card"></i> NIP (Opsional)</label>
                      <input id="nuptk" type="text" class="form-control" name="nuptk" placeholder="Nomor NUPTK">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="no_hp"><i class="fas fa-phone"></i> No. HP/WhatsApp <small class="text-danger">*</small></label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx">
                      <small class="form-text text-muted">Untuk keperluan komunikasi dan notifikasi</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="jenkel"><i class="fas fa-venus-mars"></i> Jenis Kelamin <small class="text-danger">*</small></label>
                      <select class="form-control" name="jenkel" id="jenkel" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="form-group">
                    <label for="username"><i class="fas fa-user-lock"></i> Username <small class="text-danger">*</small></label>
                    <input id="username" type="text" class="form-control" name="username" required placeholder="Contoh: sdnnamasekolah01">
                    <small class="form-text text-muted">Username unik untuk login, gunakan kombinasi huruf dan angka tanpa spasi</small>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="password"><i class="fas fa-key"></i> Password <small class="text-danger">*</small></label>
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Minimal 6 karakter">
                      <small class="form-text text-muted">Gunakan password yang kuat</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="password2"><i class="fas fa-lock"></i> Konfirmasi Password <small class="text-danger">*</small></label>
                      <input id="password2" type="password" class="form-control" name="password_confirm" required placeholder="Ketik ulang password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">
                        Saya menyetujui <a href="#" data-toggle="modal" data-target="#termsModal" class="font-weight-bold">Syarat dan Ketentuan</a> yang berlaku
                      </label>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      <i class="fas fa-check-circle"></i> Daftar Sekarang
                    </button>
                  </div>

                  <hr class="my-4">

                  <div class="text-center">
                    <p class="mb-2">Sudah punya akun operator?</p>
                    <a href="login.php" class="btn btn-outline-primary btn-block">
                      <i class="fas fa-sign-in-alt"></i> Login di Sini
                    </a>
                  </div>

                  <div class="text-center mt-3">
                    <a href="../" class="btn btn-light btn-sm">
                      <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
                    </a>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer text-center">
              Copyright &copy; <?= date('Y') ?> <strong>PPDB Online MTsN 11 Majalengka</strong><br>
              <small>Developed by A.T. Aditya</small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Syarat & Ketentuan -->
  <div class="modal fade" tabindex="-1" role="dialog" id="termsModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"><i class="fas fa-file-contract"></i> Syarat dan Ketentuan</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="font-weight-bold text-primary"><i class="fas fa-check-circle"></i> 1. Kewenangan Akses</h6>
          <ul>
            <li>Operator sekolah hanya dapat melihat data siswa yang berasal dari sekolahnya</li>
            <li>Akun ini digunakan untuk memantau dan mendaftarkan siswa secara kolektif</li>
            <li>Tidak diperkenankan mengubah data tanpa koordinasi dengan admin utama</li>
          </ul>

          <h6 class="font-weight-bold text-primary"><i class="fas fa-shield-alt"></i> 2. Keamanan Akun</h6>
          <ul>
            <li>Jaga kerahasiaan username dan password Anda</li>
            <li>Jangan memberikan akses kepada pihak yang tidak berwenang</li>
            <li>Segera laporkan jika terjadi aktivitas mencurigakan</li>
            <li>Password dapat diubah sewaktu-waktu melalui menu profil</li>
          </ul>

          <h6 class="font-weight-bold text-primary"><i class="fas fa-database"></i> 3. Penggunaan Data</h6>
          <ul>
            <li>Data yang diakses hanya untuk keperluan verifikasi PPDB</li>
            <li>Dilarang keras menyebarluaskan data pribadi siswa kepada pihak ketiga</li>
            <li>Data harus dijaga kerahasiaannya sesuai UU Perlindungan Data Pribadi</li>
            <li>Pelanggaran akan dikenakan sanksi sesuai ketentuan yang berlaku</li>
          </ul>

          <h6 class="font-weight-bold text-primary"><i class="fas fa-tasks"></i> 4. Tanggung Jawab</h6>
          <ul>
            <li>Operator bertanggung jawab atas kebenaran data yang diakses</li>
            <li>Wajib berkoordinasi dengan admin utama untuk perubahan data penting</li>
            <li>Akun dapat dinonaktifkan sewaktu-waktu jika melanggar ketentuan</li>
            <li>Operator wajib aktif memantau data siswa dari sekolahnya</li>
          </ul>

          <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> <strong>Perhatian:</strong> Dengan mendaftar, Anda menyetujui semua syarat dan ketentuan di atas.
          </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-primary" data-dismiss="modal">
            <i class="fas fa-check"></i> Saya Mengerti dan Setuju
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script>
    // Initialize Select2
    $('.select2').select2({
      placeholder: "Ketik untuk mencari sekolah...",
      allowClear: true
    });

    // Toggle input manual untuk sekolah lainnya - Operator
    $('#npsn').change(function() {
      if ($(this).val() === 'LAINNYA') {
        $('#input-sekolah-manual-operator').slideDown();
        $('#input-npsn-manual-operator').slideDown();
        $('#nama_sekolah_manual').prop('required', true);
        $('#npsn_manual').prop('required', true);
      } else {
        $('#input-sekolah-manual-operator').slideUp();
        $('#input-npsn-manual-operator').slideUp();
        $('#nama_sekolah_manual').prop('required', false).val('');
        $('#npsn_manual').prop('required', false).val('');
      }
    });

    // Form validation and submit
    $("#form-register").submit(function(e) {
      e.preventDefault();
      
      var npsn = $('#npsn').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var password2 = $('#password2').val();
      
      if (!npsn) {
        iziToast.error({
          title: 'Error!',
          message: 'Silakan pilih sekolah Anda',
          position: 'topRight'
        });
        return false;
      }

      // Validasi untuk sekolah lainnya
      if (npsn === 'LAINNYA') {
        var namaSekolahManual = $('#nama_sekolah_manual').val().trim();
        var npsnManual = $('#npsn_manual').val().trim();
        
        if (namaSekolahManual.length < 5) {
          iziToast.error({
            title: 'Error!',
            message: 'Nama sekolah minimal 5 karakter',
            position: 'topRight'
          });
          return false;
        }
        
        if (npsnManual.length !== 8 || !/^\d+$/.test(npsnManual)) {
          iziToast.error({
            title: 'Error!',
            message: 'NPSN harus 8 digit angka',
            position: 'topRight'
          });
          return false;
        }
      }
      
      if (username.length < 4) {
        iziToast.error({
          title: 'Error!',
          message: 'Username minimal 4 karakter',
          position: 'topRight'
        });
        return false;
      }
      
      if (password.length < 6) {
        iziToast.error({
          title: 'Error!',
          message: 'Password minimal 6 karakter',
          position: 'topRight'
        });
        return false;
      }
      
      if (password !== password2) {
        iziToast.error({
          title: 'Error!',
          message: 'Konfirmasi password tidak cocok',
          position: 'topRight'
        });
        return false;
      }
      
      var formData = new FormData(this);
      
      $.ajax({
        type: 'POST',
        url: 'register_proses.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function() {
          $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i> Memproses pendaftaran...').prop('disabled', true);
        },
        success: function(response) {
          if (response.status == 'success') {
            iziToast.success({
              title: 'Berhasil!',
              message: response.message,
              position: 'topRight',
              timeout: 3000
            });
            setTimeout(function() {
              window.location.href = 'login.php';
            }, 2000);
          } else {
            iziToast.error({
              title: 'Gagal!',
              message: response.message,
              position: 'topRight'
            });
            $('button[type="submit"]').html('<i class="fas fa-check-circle"></i> Daftar Sekarang').prop('disabled', false);
          }
        },
        error: function() {
          iziToast.error({
            title: 'Error!',
            message: 'Terjadi kesalahan sistem',
            position: 'topRight'
          });
          $('button[type="submit"]').html('<i class="fas fa-check-circle"></i> Daftar Sekarang').prop('disabled', false);
        }
      });
    });
  </script>
</body>

</html>
