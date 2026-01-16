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
  <title>Login Operator Sekolah &mdash; <?= $setting['nama_sekolah'] ?></title>
  
  <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .login-brand {
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
    .text-link {
      color: white;
      text-decoration: underline;
    }
    .text-link:hover {
      color: #f0f0f0;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-5 offset-xl-4">
            
            <div class="login-brand text-center">
              <img src="../<?= $setting['logo'] ?>" alt="logo" width="120" class="shadow-light rounded-circle mb-3" style="background: white; padding: 10px;">
              <h3 class="mt-3">OPERATOR SEKOLAH</h3>
              <h5>PPDB Online <?= $setting['nama_sekolah'] ?></h5>
            </div>

            <div class="info-box text-center">
              <i class="fas fa-info-circle fa-2x mb-2"></i>
              <p class="mb-0"><small>Khusus untuk Admin/Operator Sekolah Dasar (SD)<br>untuk pendaftaran siswa secara kolektif.</small></p>
            </div>

            <div class="card">
              <div class="card-header text-center">
                <h4><i class="fas fa-sign-in-alt"></i> Login Operator Sekolah</h4>
              </div>

              <div class="card-body p-4">
                <form method="POST" id="form-login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus placeholder="Masukkan Username">
                    <div class="invalid-feedback">
                      Silakan masukkan username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Masukkan Password">
                    <div class="invalid-feedback">
                      Silakan masukkan password Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      <i class="fas fa-sign-in-alt"></i> Login Sekarang
                    </button>
                  </div>
                  
                  <div class="text-center mt-4">
                    <p class="mb-2">Belum punya akun operator?</p>
                    <a href="register.php" class="btn btn-outline-primary btn-block">
                      <i class="fas fa-user-plus"></i> Daftar Sebagai Operator Sekolah
                    </a>
                  </div>

                  <hr class="my-4">
                  
                  <div class="text-center">
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

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script>
    $("#form-login").submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      
      $.ajax({
        type: 'POST',
        url: 'login_proses.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function() {
          $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i> Memproses...').prop('disabled', true);
        },
        success: function(response) {
          if (response.status == 'success') {
            iziToast.success({
              title: 'Berhasil!',
              message: response.message,
              position: 'topRight'
            });
            setTimeout(function() {
              window.location.href = '../login/';
            }, 1000);
          } else {
            iziToast.error({
              title: 'Gagal!',
              message: response.message,
              position: 'topRight'
            });
            $('button[type="submit"]').html('<i class="fas fa-sign-in-alt"></i> Login Sekarang').prop('disabled', false);
          }
        },
        error: function() {
          iziToast.error({
            title: 'Error!',
            message: 'Terjadi kesalahan sistem',
            position: 'topRight'
          });
          $('button[type="submit"]').html('<i class="fas fa-sign-in-alt"></i> Login Sekarang').prop('disabled', false);
        }
      });
    });
  </script>
</body>

</html>
