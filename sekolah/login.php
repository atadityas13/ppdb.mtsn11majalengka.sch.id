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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f7fa;
      min-height: 100vh;
      padding: 0;
      margin: 0;
    }

    /* Split Screen Layout */
    .login-wrapper {
      width: 100%;
      min-height: 100vh;
      display: flex;
      flex-direction: row;
    }

    /* Left Side - Branding */
    .login-left {
      position: fixed;
      left: 0;
      top: 0;
      width: 50%;
      height: 100vh;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px;
      overflow: hidden;
    }

    .login-left::before {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      top: -200px;
      left: -200px;
      animation: float 20s infinite ease-in-out;
    }

    .login-left::after {
      content: '';
      position: absolute;
      width: 300px;
      height: 300px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 50%;
      bottom: -150px;
      right: -150px;
      animation: float 15s infinite ease-in-out reverse;
    }

    @keyframes float {
      0%, 100% {
        transform: translate(0, 0) scale(1);
      }
      50% {
        transform: translate(50px, 50px) scale(1.1);
      }
    }

    .brand-content {
      position: relative;
      z-index: 2;
      text-align: center;
    }

    .brand-logo {
      width: 120px;
      height: 120px;
      margin: 0 auto 30px;
      animation: logoFloat 3s ease-in-out infinite;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.2));
      object-fit: contain;
    }

    @keyframes logoFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    .brand-title {
      color: white;
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 15px;
      text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    }

    .brand-subtitle {
      color: rgba(255, 255, 255, 0.95);
      font-size: 18px;
      margin-bottom: 40px;
      font-weight: 400;
      text-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
    }

    .brand-description {
      color: rgba(255, 255, 255, 0.9);
      font-size: 15px;
      line-height: 1.8;
      max-width: 400px;
      margin: 0 auto;
    }

    /* Floating Circles */
    .floating-circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      animation: float 6s ease-in-out infinite;
    }

    /* Right Side - Form */
    .login-right {
      margin-left: 50%;
      width: 50%;
      min-height: 100vh;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
      overflow-y: auto;
    }

    .login-card {
      background: white;
      width: 100%;
      max-width: 480px;
    }

    .login-header {
      background: transparent;
      padding: 0;
      margin-bottom: 30px;
      text-align: center;
    }

    .logo-circle {
      width: 60px;
      height: 60px;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: float 3s ease-in-out infinite;
    }

    .logo-circle img {
      width: 60px;
      height: 60px;
      object-fit: contain;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .login-title {
      color: #2d3748;
      font-size: 28px;
      font-weight: 700;
      margin: 0 0 8px 0;
    }

    .login-subtitle {
      color: #718096;
      font-size: 14px;
      margin: 0 0 30px 0;
      font-weight: 400;
    }

    .login-body {
      padding: 0;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #2d3748;
      margin-bottom: 8px;
    }

    .input-wrapper {
      position: relative;
    }

    .form-control {
      width: 100%;
      height: 44px;
      padding: 0 15px 0 45px;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      font-size: 13px;
      transition: all 0.3s;
    }

    .form-control:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 16px;
    }

    .remember-checkbox {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }

    .remember-checkbox input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-right: 8px;
      cursor: pointer;
    }

    .remember-checkbox label {
      font-size: 13px;
      color: #4a5568;
      cursor: pointer;
      user-select: none;
    }

    .login-btn {
      width: 100%;
      height: 48px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .login-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .login-footer {
      text-align: left;
      padding: 30px 0 0;
      border-top: 1px solid #e2e8f0;
      margin-top: 30px;
    }

    .footer-links {
      display: flex;
      justify-content: flex-start;
      gap: 20px;
      margin-bottom: 15px;
    }

    .footer-links a {
      color: #718096;
      font-size: 12px;
      text-decoration: none;
      transition: color 0.3s;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .footer-links a:hover {
      color: #667eea;
    }

    .footer-text {
      color: #a0aec0;
      font-size: 11px;
      margin: 0;
    }

    .register-link {
      background: #f7fafc;
      padding: 15px;
      border-radius: 8px;
      text-align: center;
      margin-top: 20px;
    }

    .register-link p {
      margin: 0 0 10px 0;
      font-size: 13px;
      color: #4a5568;
    }

    .register-link a {
      display: inline-block;
      padding: 10px 20px;
      background: white;
      border: 2px solid #667eea;
      color: #667eea;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 13px;
      transition: all 0.3s;
    }

    .register-link a:hover {
      background: #667eea;
      color: white;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
      .login-wrapper {
        flex-direction: column;
      }

      .login-left {
        position: relative;
        width: 100%;
        height: auto;
        min-height: 300px;
        padding: 40px 25px;
      }

      .login-right {
        margin-left: 0;
        width: 100%;
        min-height: auto;
        padding: 30px 20px;
      }

      .brand-logo {
        width: 70px;
        height: 70px;
      }

      .brand-title {
        font-size: 28px;
      }

      .brand-subtitle {
        font-size: 16px;
      }

      .brand-description {
        font-size: 13px;
      }

      .login-card {
        max-width: 100%;
      }

      .logo-circle {
        width: 60px;
        height: 60px;
      }

      .logo-circle img {
        width: 40px;
        height: 40px;
      }

      .login-title {
        font-size: 24px;
      }

      .login-subtitle {
        font-size: 13px;
      }

      .form-group input {
        height: 42px;
        font-size: 13px;
      }

      .form-group label {
        font-size: 12px;
      }

      .login-btn {
        height: 46px;
        font-size: 14px;
      }
    }

    @media (max-width: 360px) {
      .login-left {
        padding: 30px 20px;
      }

      .login-right {
        padding: 25px 15px;
      }

      .brand-logo {
        width: 60px;
        height: 60px;
      }

      .brand-title {
        font-size: 24px;
      }

      .brand-subtitle {
        font-size: 14px;
      }

      .logo-circle {
        width: 50px;
        height: 50px;
      }

      .logo-circle img {
        width: 35px;
        height: 35px;
      }

      .login-title {
        font-size: 22px;
      }

      .form-group input {
        height: 40px;
        font-size: 12px;
      }

      .login-btn {
        height: 44px;
        font-size: 13px;
      }
    }
  </style>
</head>

<body>

  <!-- Split Screen Layout -->
  <div class="login-wrapper">
    
    <!-- Left Side - Branding -->
    <div class="login-left">
      <div class="brand-content">
        <img src="../<?= $setting['logo'] ?>" alt="Logo" class="brand-logo">
        <h1 class="brand-title">Operator Sekolah</h1>
        <h2 class="brand-subtitle"><?= $setting['nama_sekolah'] ?></h2>
        <p class="brand-description">
          Portal khusus untuk Admin/Operator Sekolah Dasar (SD) dalam pendaftaran siswa secara kolektif. Pantau dan kelola data pendaftar dari sekolah Anda secara real-time.
        </p>
      </div>
      
      <!-- Floating Animations -->
      <div class="floating-circle" style="top: 10%; left: 10%; width: 60px; height: 60px; animation-delay: 0s;"></div>
      <div class="floating-circle" style="top: 60%; right: 15%; width: 80px; height: 80px; animation-delay: 1s;"></div>
      <div class="floating-circle" style="bottom: 15%; left: 20%; width: 40px; height: 40px; animation-delay: 2s;"></div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="login-right">
      <div class="login-card">
        
        <!-- Form Header -->
        <div class="login-header">
          <div class="logo-circle">
            <img src="../<?= $setting['logo'] ?>" alt="Logo">
          </div>
          <h2 class="login-title">Login Operator Sekolah</h2>
          <p class="login-subtitle">Masukkan username dan password Anda</p>
        </div>

        <!-- Form Body -->
        <div class="login-body">
          <form method="POST" id="form-login" class="needs-validation" novalidate="">
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <div class="input-wrapper">
                <input id="username" 
                       type="text" 
                       class="form-control" 
                       name="username" 
                       tabindex="1" 
                       required 
                       autofocus 
                       placeholder="Masukkan username Anda">
                <i class="fas fa-user input-icon"></i>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <div class="input-wrapper">
                <input id="password" 
                       type="password" 
                       class="form-control" 
                       name="password" 
                       tabindex="2" 
                       required 
                       placeholder="Masukkan password Anda">
                <i class="fas fa-lock input-icon"></i>
              </div>
            </div>

            <div class="remember-checkbox">
              <input type="checkbox" id="remember-me" name="remember" tabindex="3">
              <label for="remember-me">Ingat saya</label>
            </div>

            <button type="submit" class="login-btn" tabindex="4">
              <i class="fas fa-sign-in-alt"></i> Login Sekarang
            </button>
          </form>

          <!-- Register Link -->
          <div class="register-link">
            <p>Belum punya akun operator?</p>
            <a href="register.php">
              <i class="fas fa-user-plus"></i> Daftar Sebagai Operator Sekolah
            </a>
          </div>
        </div>

        <!-- Form Footer -->
        <div class="login-footer">
          <div class="footer-links">
            <a href="../index.php">
              <i class="fas fa-home"></i> Beranda
            </a>
          </div>
          <p class="footer-text">&copy; <?= date('Y') ?> <?= $setting['nama_sekolah'] ?>. All rights reserved.</p>
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
