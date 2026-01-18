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
      background: #f5f7fa;
      min-height: 100vh;
      padding: 0;
      margin: 0;
    }

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

    /* Logo for Left Side */
    .brand-logo {
      width: 120px;
      height: 120px;
      margin: 0 auto 30px;
      animation: logoFloat 3s ease-in-out infinite;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.2));
      object-fit: contain;
    }

    @keyframes logoFloat {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
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
      z-index: 1;
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

    .welcome-text {
      display: none;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      color: #2d3748;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 6px;
      transition: color 0.3s;
    }

    .input-wrapper {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 16px;
      transition: color 0.3s;
      z-index: 1;
    }

    .form-control {
      width: 100%;
      height: 44px;
      padding: 0 15px 0 45px;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      font-size: 13px;
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
      margin-top: 5px;
    }

    .forgot-password a {
      color: #667eea;
      font-size: 11px;
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
      margin-bottom: 20px;
    }

    .remember-checkbox input[type="checkbox"] {
      width: 16px;
      height: 16px;
      margin-right: 7px;
      cursor: pointer;
      accent-color: #667eea;
    }

    .remember-checkbox label {
      color: #4a5568;
      font-size: 12px;
      cursor: pointer;
      user-select: none;
    }

    .login-btn {
      width: 100%;
      height: 44px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      position: relative;
      overflow: hidden;
    }

    .login-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }

    .login-btn:hover::before {
      left: 100%;
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .login-btn:disabled {
      background: #cbd5e0;
      cursor: not-allowed;
      box-shadow: none;
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
      cursor: pointer;
    }

    .footer-links a:hover {
      color: #667eea;
    }

    .footer-text {
      color: #a0aec0;
      font-size: 11px;
      margin: 0;
    }

    .back-link {
      display: none;
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

      .modal-content {
        width: 95%;
        margin: 20px auto;
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
        <img src="../<?php echo $setting['logo']; ?>" alt="Logo" class="brand-logo">
        <h1 class="brand-title">Admin Portal</h1>
        <h2 class="brand-subtitle"><?php echo $setting['nama_sekolah']; ?></h2>
        <p class="brand-description">
          Selamat datang di Portal Administrasi PPDB Online. Silakan masuk dengan kredensial yang telah diberikan untuk mengakses sistem manajemen penerimaan peserta didik baru.
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
          <h2 class="login-title">Masuk ke Akun</h2>
          <p class="login-subtitle">Masukkan username dan password Anda</p>
        </div>

        <!-- Form Body -->
        <div class="login-body">
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

            <button type="submit" class="login-btn">
              <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
          </form>
        </div>

        <!-- Form Footer -->
        <div class="login-footer">
          <div class="footer-links">
            <a href="../index.php">
              <i class="fas fa-home"></i> Beranda
            </a>
            <a onclick="openHelpModal()">
              <i class="fas fa-question-circle"></i> Bantuan
            </a>
          </div>
          <p class="footer-text">&copy; <?php echo date('Y'); ?> <?php echo $setting['nama_sekolah']; ?>. All rights reserved.</p>
        </div>
        
      </div>
    </div>
    
  </div>

  <!-- Forgot Password Modal -->
  <div id="forgotPasswordModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-key"></i> Lupa Password</h3>
        <button class="close-modal" onclick="closeForgotPasswordModal()">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>Jika Anda lupa password, silakan hubungi admin untuk mereset password Anda.</p>
        <div class="info-box">
          <p><i class="fas fa-phone"></i> Hubungi Admin: <?php echo $setting['telp']; ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-modal" onclick="closeForgotPasswordModal()">Tutup</button>
      </div>
    </div>
  </div>

  <!-- Help Modal -->
  <div id="helpModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-question-circle"></i> Bantuan</h3>
        <button class="close-modal" onclick="closeHelpModal()">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="help-item">
          <i class="fas fa-user-check"></i>
          <div>
            <h4>Login Gagal</h4>
            <p>Pastikan username dan password yang Anda masukkan benar</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-shield-alt"></i>
          <div>
            <h4>Keamanan Akun</h4>
            <p>Jangan berbagi password Anda dengan orang lain</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-clock"></i>
          <div>
            <h4>Jam Operasional</h4>
            <p>Sistem dapat diakses 24/7 selama periode PPDB berlangsung</p>
          </div>
        </div>
        <div class="help-item">
          <i class="fas fa-phone-alt"></i>
          <div>
            <h4>Kontak Support</h4>
            <p>Hubungi <?php echo $setting['telp']; ?> untuk bantuan lebih lanjut</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-modal" onclick="closeHelpModal()">Mengerti</button>
      </div>
    </div>
  </div>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
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
          $('.login-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
        },
        success: function(data) {
          $('.login-btn').prop('disabled', false).html('<i class="fas fa-sign-in-alt"></i> Masuk');
          
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
          $('.login-btn').prop('disabled', false).html('<i class="fas fa-sign-in-alt"></i> Masuk');
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