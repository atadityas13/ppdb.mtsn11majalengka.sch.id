<?php
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";

// Cek apakah sudah ada super admin
$cek_superadmin = mysqli_query($koneksi, "SELECT * FROM user WHERE level='superadmin'");
if (mysqli_num_rows($cek_superadmin) > 0) {
    // Sudah ada super admin, redirect ke login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Setup Super Admin &mdash; <?= $setting['nama_sekolah'] ?></title>
  <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  
  <style>
    .setup-container {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .setup-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    .setup-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 15px 15px 0 0;
      padding: 30px;
      text-align: center;
    }
    .setup-icon {
      font-size: 64px;
      margin-bottom: 15px;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
    .info-box {
      background: #f8f9fa;
      border-left: 4px solid #667eea;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 5px;
    }
    .password-strength {
      height: 5px;
      border-radius: 3px;
      margin-top: 5px;
      transition: all 0.3s;
    }
    .strength-weak { background: #dc3545; width: 33%; }
    .strength-medium { background: #ffc107; width: 66%; }
    .strength-strong { background: #28a745; width: 100%; }
  </style>
</head>

<body>
  <div class="setup-container">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="setup-card">
            <div class="setup-header">
              <div class="setup-icon">
                <i class="fas fa-crown"></i>
              </div>
              <h3>Setup Super Administrator</h3>
              <p class="mb-0">Selamat datang! Silakan buat akun Super Admin pertama Anda</p>
            </div>
            
            <div class="card-body p-4">
              <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> <strong>Penting!</strong> 
                Akun Super Admin hanya bisa dibuat sekali. Pastikan Anda menyimpan username dan password dengan aman.
              </div>

              <div class="info-box">
                <h6 class="font-weight-bold text-primary mb-2">
                  <i class="fas fa-info-circle"></i> Informasi Super Admin:
                </h6>
                <ul class="mb-0 small">
                  <li>✅ Akses penuh ke semua fitur sistem</li>
                  <li>✅ Dapat mengelola semua user (admin, panitia, operator)</li>
                  <li>✅ Dapat melihat password semua user</li>
                  <li>✅ Tidak dapat dihapus oleh admin biasa</li>
                  <li>⚠️ Hanya boleh ada 1 Super Admin dalam sistem</li>
                </ul>
              </div>

              <form id="form-setup" method="POST">
                <div class="form-group">
                  <label for="nama_user">
                    <i class="fas fa-user"></i> Nama Lengkap <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control form-control-lg" id="nama_user" name="nama_user" 
                         placeholder="Contoh: John Doe" required autofocus>
                  <small class="form-text text-muted">Nama lengkap administrator</small>
                </div>

                <div class="form-group">
                  <label for="username">
                    <i class="fas fa-user-shield"></i> Username <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control form-control-lg" id="username" name="username" 
                         placeholder="Username untuk login" required>
                  <small class="form-text text-muted">Gunakan kombinasi huruf dan angka (tanpa spasi)</small>
                </div>

                <div class="form-group">
                  <label for="password">
                    <i class="fas fa-key"></i> Password <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" 
                           placeholder="Minimal 8 karakter" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                  </div>
                  <div class="password-strength" id="password-strength"></div>
                  <small class="form-text text-muted">Gunakan kombinasi huruf besar, kecil, angka, dan simbol</small>
                </div>

                <div class="form-group">
                  <label for="password_confirm">
                    <i class="fas fa-check-circle"></i> Konfirmasi Password <span class="text-danger">*</span>
                  </label>
                  <input type="password" class="form-control form-control-lg" id="password_confirm" name="password_confirm" 
                         placeholder="Ketik ulang password" required>
                  <small class="form-text text-muted" id="match-info"></small>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="agree" name="agree" required>
                    <label class="custom-control-label" for="agree">
                      Saya memahami bahwa akun ini memiliki akses penuh ke sistem dan bertanggung jawab atas keamanannya
                    </label>
                  </div>
                </div>

                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-submit">
                    <i class="fas fa-rocket"></i> Buat Super Admin & Mulai
                  </button>
                </div>
              </form>

              <hr>
              
              <div class="text-center">
                <small class="text-muted">
                  <i class="fas fa-shield-alt"></i> Data akan dienkripsi dan disimpan dengan aman
                </small>
              </div>
            </div>
          </div>

          <div class="text-center mt-3">
            <small class="text-white">
              Copyright &copy; <?= date('Y') ?> <strong><?= $setting['nama_sekolah'] ?></strong>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="../assets/js/scripts.js"></script>

  <script>
    $(document).ready(function() {
      // Toggle password visibility
      $('#toggle-password').click(function() {
        var passwordField = $('#password');
        var icon = $(this).find('i');
        
        if (passwordField.attr('type') === 'password') {
          passwordField.attr('type', 'text');
          icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          passwordField.attr('type', 'password');
          icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });

      // Password strength checker
      $('#password').on('keyup', function() {
        var password = $(this).val();
        var strength = 0;
        
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^a-zA-Z0-9]/)) strength++;

        var strengthBar = $('#password-strength');
        strengthBar.removeClass('strength-weak strength-medium strength-strong');
        
        if (strength <= 1) {
          strengthBar.addClass('strength-weak');
        } else if (strength <= 3) {
          strengthBar.addClass('strength-medium');
        } else {
          strengthBar.addClass('strength-strong');
        }
      });

      // Password match checker
      $('#password_confirm').on('keyup', function() {
        var password = $('#password').val();
        var confirm = $(this).val();
        var matchInfo = $('#match-info');

        if (confirm.length === 0) {
          matchInfo.text('').removeClass('text-danger text-success');
        } else if (password === confirm) {
          matchInfo.text('✓ Password cocok').removeClass('text-danger').addClass('text-success');
        } else {
          matchInfo.text('✗ Password tidak cocok').removeClass('text-success').addClass('text-danger');
        }
      });

      // Form validation
      $('#form-setup').submit(function(e) {
        e.preventDefault();

        var password = $('#password').val();
        var confirm = $('#password_confirm').val();

        // Validasi password minimal 8 karakter
        if (password.length < 8) {
          iziToast.error({
            title: 'Error!',
            message: 'Password minimal 8 karakter',
            position: 'topRight'
          });
          return false;
        }

        // Validasi password match
        if (password !== confirm) {
          iziToast.error({
            title: 'Error!',
            message: 'Password dan konfirmasi password tidak cocok',
            position: 'topRight'
          });
          return false;
        }

        // Submit form
        $('#btn-submit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Membuat Super Admin...');

        $.ajax({
          type: 'POST',
          url: 'setup_superadmin_proses.php',
          data: $(this).serialize(),
          success: function(response) {
            if (response == 'OK') {
              iziToast.success({
                title: 'Berhasil!',
                message: 'Super Admin berhasil dibuat. Silakan login...',
                position: 'topRight'
              });
              
              setTimeout(function() {
                window.location.href = 'login.php';
              }, 2000);
            } else if (response == 'username_exists') {
              iziToast.error({
                title: 'Error!',
                message: 'Username sudah digunakan. Silakan gunakan username lain.',
                position: 'topRight'
              });
              $('#btn-submit').prop('disabled', false).html('<i class="fas fa-rocket"></i> Buat Super Admin & Mulai');
            } else if (response == 'superadmin_exists') {
              iziToast.error({
                title: 'Error!',
                message: 'Super Admin sudah ada. Anda akan dialihkan ke halaman login...',
                position: 'topRight'
              });
              setTimeout(function() {
                window.location.href = 'login.php';
              }, 2000);
            } else {
              iziToast.error({
                title: 'Error!',
                message: 'Terjadi kesalahan. Silakan coba lagi.',
                position: 'topRight'
              });
              $('#btn-submit').prop('disabled', false).html('<i class="fas fa-rocket"></i> Buat Super Admin & Mulai');
            }
          },
          error: function() {
            iziToast.error({
              title: 'Error!',
              message: 'Terjadi kesalahan koneksi. Silakan coba lagi.',
              position: 'topRight'
            });
            $('#btn-submit').prop('disabled', false).html('<i class="fas fa-rocket"></i> Buat Super Admin & Mulai');
          }
        });

        return false;
      });
    });
  </script>
</body>
</html>
