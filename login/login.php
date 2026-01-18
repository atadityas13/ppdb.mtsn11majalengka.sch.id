<?php
// Include koneksi database dan setting
require_once '../config/database.php';
require_once '../config/function.php';

// Ambil setting sekolah
$query_setting = mysqli_query($koneksi, "SELECT * FROM setting LIMIT 1");
$setting = mysqli_fetch_assoc($query_setting);

// Cek apakah sudah ada super admin di database
$cek_superadmin = mysqli_query($koneksi, "SELECT * FROM user WHERE level='superadmin'");
$has_superadmin = mysqli_num_rows($cek_superadmin) > 0;

// Jika belum ada super admin, redirect ke halaman setup
if (!$has_superadmin) {
    header("Location: setup_superadmin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Admin <?= $setting['nama_sekolah'] ?> </title>
  <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      overflow: hidden;
    }

    body::before {
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

    body::after {
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

    .login-container {
      width: 100%;
      max-width: 440px;
      position: relative;
      z-index: 10;
      animation: slideIn 0.6s ease-out;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 70px rgba(0, 0, 0, 0.4);
    }

    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 40px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .login-header::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      top: -50%;
      left: -50%;
      animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(360deg);
      }
    }

    .logo-wrapper {
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .logo-circle {
      width: 100px;
      height: 100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: logoFloat 3s ease-in-out infinite;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.3));
    }

    @keyframes logoFloat {
      0%, 100% {
        transform: translateY(0) scale(1);
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.3));
      }
      50% {
        transform: translateY(-8px) scale(1.05);
        filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.4));
      }
    }

    .logo-circle img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }

    .login-title {
      color: white;
      font-size: 28px;
      font-weight: 700;
      margin: 0;
      position: relative;
      z-index: 1;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .login-subtitle {
      color: rgba(255, 255, 255, 0.95);
      font-size: 14px;
      margin: 6px 0 0;
      position: relative;
      z-index: 1;
      font-weight: 400;
    }

    .login-body {
      padding: 35px 30px;
    }

    .welcome-text {
      text-align: center;
      margin-bottom: 30px;
    }

    .welcome-text h5 {
      color: #2d3748;
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .welcome-text p {
      color: #718096;
      font-size: 13px;
      margin: 0;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      color: #2d3748;
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 8px;
      transition: color 0.3s;
    }

    .input-wrapper {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 18px;
      transition: color 0.3s;
      z-index: 1;
    }

    .form-control {
      width: 100%;
      height: 48px;
      padding: 0 18px 0 50px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      font-size: 14px;
      color: #2d3748;
      background: #f7fafc;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: #667eea;
      background: white;
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-control:focus + .input-icon {
      color: #667eea;
    }

    .forgot-password {
      text-align: right;
      margin-top: 6px;
    }

    .forgot-password a {
      color: #667eea;
      font-size: 12px;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
      cursor: pointer;
    }

    .forgot-password a:hover {
      color: #764ba2;
      text-decoration: underline;
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
      accent-color: #667eea;
    }

    .remember-checkbox label {
      color: #4a5568;
      font-size: 13px;
      cursor: pointer;
      user-select: none;
    }

    .btn-login {
      width: 100%;
      height: 48px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 10px;
      color: white;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      position: relative;
      overflow: hidden;
    }

    .btn-login::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }

    .btn-login:hover::before {
      left: 100%;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .btn-login:disabled {
      background: #cbd5e0;
      cursor: not-allowed;
      box-shadow: none;
    }

    .login-footer {
      text-align: center;
      padding: 0 30px 30px;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 25px;
      margin-bottom: 15px;
    }

    .footer-links a {
      color: #718096;
      font-size: 13px;
      text-decoration: none;
      transition: color 0.3s;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
    }

    .footer-links a:hover {
      color: #667eea;
    }

    .footer-text {
      color: #a0aec0;
      font-size: 12px;
      margin: 0;
    }

    .back-link {
      text-align: center;
      margin-top: 20px;
    }

    .back-link a {
      color: white;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .back-link a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateX(-5px);
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(5px);
      animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .modal-content {
      background: white;
      margin: 10% auto;
      padding: 0;
      border-radius: 16px;
      width: 90%;
      max-width: 450px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      animation: slideUp 0.3s ease;
      overflow: hidden;
    }

    @keyframes slideUp {
      from {
        transform: translateY(50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .modal-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 20px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .modal-header h3 {
      margin: 0;
      font-size: 20px;
      font-weight: 600;
    }

    .close-modal {
      color: white;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      background: none;
      border: none;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      transition: background 0.3s;
    }

    .close-modal:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .modal-body {
      padding: 30px 25px;
    }

    .modal-body p {
      color: #4a5568;
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .modal-body .info-box {
      background: #f7fafc;
      border-left: 4px solid #667eea;
      padding: 15px;
      border-radius: 8px;
      margin-top: 15px;
    }

    .modal-body .info-box p {
      margin: 0;
      font-weight: 500;
      color: #2d3748;
    }

    .modal-body .help-item {
      display: flex;
      align-items: start;
      gap: 12px;
      margin-bottom: 15px;
      padding: 12px;
      background: #f7fafc;
      border-radius: 8px;
      transition: background 0.3s;
    }

    .modal-body .help-item:hover {
      background: #edf2f7;
    }

    .modal-body .help-item i {
      color: #667eea;
      font-size: 20px;
      margin-top: 2px;
    }

    .modal-body .help-item div h4 {
      margin: 0 0 5px 0;
      font-size: 15px;
      color: #2d3748;
    }

    .modal-body .help-item div p {
      margin: 0;
      font-size: 13px;
      color: #718096;
    }

    .modal-footer {
      padding: 15px 25px;
      background: #f7fafc;
      text-align: right;
    }

    .btn-modal {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 10px 24px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .btn-modal:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 576px) {
      body {
        padding: 15px;
      }

      .login-container {
        max-width: 100%;
      }

      .login-header {
        padding: 30px 25px;
      }

      .login-body {
        padding: 30px 25px;
      }

      .login-footer {
        padding: 0 25px 25px;
      }

      .login-title {
        font-size: 24px;
      }

      .login-subtitle {
        font-size: 13px;
      }

      .welcome-text h5 {
        font-size: 18px;
      }

      .footer-links {
        gap: 15px;
      }

      .modal-content {
        margin: 20% auto;
        width: 95%;
      }

      .modal-body {
        padding: 25px 20px;
      }
    }
  </style>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
</head>

<body>
  <div class="login-container">
  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <div class="logo-wrapper">
          <div class="logo-circle">
            <img src="../<?= $setting['logo'] ?>" alt="Logo">
          </div>
        </div>
        <h1 class="login-title">Admin Portal</h1>
        <p class="login-subtitle"><?= $setting['nama_sekolah'] ?></p>
      </div>

      <div class="login-body">
        <div class="welcome-text">
          <h5>Selamat Datang Kembali!</h5>
          <p>Silakan masuk dengan akun administrator Anda</p>
        </div>

        <form id="form-login" class="needs-validation" novalidate="">
          <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <div class="input-wrapper">
              <input id="username" 
                     type="text" 
                     class="form-control" 
                     name="username" 
                     placeholder="Masukkan username Anda" 
                     required 
                     autofocus>
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
                     placeholder="Masukkan password Anda" 
                     required>
              <i class="fas fa-lock input-icon"></i>
            </div>
            <div class="forgot-password">
              <a onclick="openForgotPasswordModal()">Lupa password?</a>
            </div>
          </div>

          <div class="remember-checkbox">
            <input type="checkbox" id="remember-me" name="remember">
            <label for="remember-me">Ingat saya</label>
          </div>

          <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Login
          </button>
        </form>
      </div>

      <div class="login-footer">
        <div class="footer-links">
          <a href="../index.php">
            <i class="fas fa-home"></i> Beranda
          </a>
          <a onclick="openHelpModal()">
            <i class="fas fa-question-circle"></i> Bantuan
          </a>
        </div>
        <p class="footer-text">© <?= date('Y') ?> <?= $setting['nama_sekolah'] ?>. All rights reserved.</p>
      </div>
    </div>

    <div class="back-link">
      <a href="../index.php">
        <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
      </a>
    </div>
  </div>

  <!-- Modal Lupa Password -->
  <div id="forgotPasswordModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-key"></i> Lupa Password?</h3>
        <button class="close-modal" onclick="closeForgotPasswordModal()">&times;</button>
      </div>
      <div class="modal-body">
        <p>Jika Anda lupa password akun administrator, silakan hubungi Super Admin atau Administrator lain untuk mereset password Anda.</p>
        <div class="info-box">
          <p><i class="fas fa-info-circle"></i> Untuk keamanan sistem, reset password hanya dapat dilakukan oleh Super Admin.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-modal" onclick="closeForgotPasswordModal()">Mengerti</button>
      </div>
    </div>
  </div>

  <!-- Modal Bantuan -->
  <div id="helpModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-question-circle"></i> Pusat Bantuan</h3>
        <button class="close-modal" onclick="closeHelpModal()">&times;</button>
      </div>
      <div class="modal-body">
        <div class="help-item">
          <i class="fas fa-user-lock"></i>
          <div>
            <h4>Login Bermasalah?</h4>
            <p>Pastikan username dan password yang Anda masukkan benar. Perhatikan huruf besar/kecil.</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-shield-alt"></i>
          <div>
            <h4>Keamanan Akun</h4>
            <p>Jangan bagikan password Anda kepada siapapun. Gunakan password yang kuat dan unik.</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-users-cog"></i>
          <div>
            <h4>Hubungi Administrator</h4>
            <p>Jika mengalami kendala teknis, silakan hubungi Super Admin atau IT Support sekolah.</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-book"></i>
          <div>
            <h4>Panduan Penggunaan</h4>
            <p>Akses menu Bantuan di dashboard untuk panduan lengkap penggunaan sistem PPDB.</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-modal" onclick="closeHelpModal()">Tutup</button>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>

  <script>
    // Modal Functions
    function openForgotPasswordModal() {
      document.getElementById('forgotPasswordModal').style.display = 'block';
    }

    function closeForgotPasswordModal() {
      document.getElementById('forgotPasswordModal').style.display = 'none';
    }

    function openHelpModal() {
      document.getElementById('helpModal').style.display = 'block';
    }

    function closeHelpModal() {
      document.getElementById('helpModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      const forgotModal = document.getElementById('forgotPasswordModal');
      const helpModal = document.getElementById('helpModal');
      if (event.target == forgotModal) {
        closeForgotPasswordModal();
      }
      if (event.target == helpModal) {
        closeHelpModal();
      }
    }

    // Close modal with ESC key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        closeForgotPasswordModal();
        closeHelpModal();
      }
    });

    // Form validation and submission
    $('#form-login').submit(function(e) {
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: 'login_cek.php?id=5448dfhcr27467576c78a50vi98j0ruv0w',
        data: $(this).serialize(),
        beforeSend: function() {
          $('.btn-login').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
        },
        success: function(data) {
          $('.btn-login').prop('disabled', false).html('<i class="fas fa-sign-in-alt"></i> Login');
          
          if (data == "ok") {
            iziToast.success({
              title: 'Berhasil!',
              message: 'Login berhasil. Mengalihkan ke dashboard...',
              position: 'topRight',
              timeout: 2000
            });
            setTimeout(function() {
              window.location.reload();
            }, 1500);
          } else {
            iziToast.error({
              title: 'Login Gagal!',
              message: 'Username atau password salah',
              position: 'topCenter',
              timeout: 3000
            });
          }
        },
        error: function() {
          $('.btn-login').prop('disabled', false).html('<i class="fas fa-sign-in-alt"></i> Login');
          iziToast.error({
            title: 'Error!',
            message: 'Terjadi kesalahan. Silakan coba lagi.',
            position: 'topCenter'
          });
        }
      });
      return false;
    });

    // Input focus animation
    $('.form-control').on('focus', function() {
      $(this).closest('.form-group').find('.form-label').css('color', '#667eea');
    });

    $('.form-control').on('blur', function() {
      $(this).closest('.form-group').find('.form-label').css('color', '#2d3748');
    });
  </script>
</body>

</html>