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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Split Screen Layout */
    .register-wrapper {
      display: flex;
      min-height: 100vh;
    }

    .register-left {
      position: fixed;
      left: 0;
      top: 0;
      width: 50%;
      height: 100vh;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 60px 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .register-right {
      margin-left: 50%;
      width: 50%;
      min-height: 100vh;
      background: white;
      padding: 40px;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      overflow-y: auto;
    }

    /* Branding Section */
    .brand-content {
      text-align: center;
      position: relative;
      z-index: 2;
    }

    .brand-logo {
      width: 120px;
      height: 120px;
      object-fit: contain;
      margin-bottom: 30px;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.2));
      animation: float 3s ease-in-out infinite;
    }

    .brand-title {
      color: white;
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 15px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .brand-subtitle {
      color: rgba(255, 255, 255, 0.95);
      font-size: 18px;
      font-weight: 500;
      margin-bottom: 20px;
    }

    .brand-description {
      color: rgba(255, 255, 255, 0.85);
      font-size: 15px;
      line-height: 1.6;
      max-width: 500px;
      margin: 0 auto;
    }

    /* Floating Animations */
    .floating-circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    /* Form Card */
    .register-card {
      background: white;
      width: 100%;
      max-width: 520px;
    }

    .register-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .register-title {
      font-size: 28px;
      font-weight: 700;
      color: #2d3748;
      margin-bottom: 8px;
    }

    .register-subtitle {
      font-size: 14px;
      color: #718096;
    }

    /* Form Styles */
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

    .form-control, .select2-container--default .select2-selection--single {
      width: 100%;
      height: 44px;
      padding: 0 15px;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      font-size: 13px;
      transition: all 0.3s;
      background: white;
    }

    .form-control:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .select2-container--default .select2-selection--single {
      line-height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 40px;
      padding-left: 10px;
    }

    textarea.form-control {
      height: auto;
      min-height: 80px;
      padding: 12px 15px;
      resize: vertical;
    }

    .password-toggle {
      position: relative;
    }

    .password-toggle .form-control {
      padding-right: 45px;
    }

    .toggle-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #a0aec0;
      transition: color 0.3s;
    }

    .toggle-icon:hover {
      color: #667eea;
    }

    /* Password Strength */
    .password-strength {
      height: 4px;
      background: #e2e8f0;
      border-radius: 2px;
      margin-top: 8px;
      overflow: hidden;
    }

    .strength-bar {
      height: 100%;
      transition: all 0.3s;
      border-radius: 2px;
    }

    .strength-weak .strength-bar {
      width: 33%;
      background: #dc3545;
    }

    .strength-medium .strength-bar {
      width: 66%;
      background: #ffc107;
    }

    .strength-strong .strength-bar {
      width: 100%;
      background: #28a745;
    }

    .password-match {
      font-size: 12px;
      margin-top: 5px;
    }

    .password-match.match {
      color: #28a745;
    }

    .password-match.no-match {
      color: #dc3545;
    }

    /* Alert Boxes */
    .alert {
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 13px;
      border: none;
    }

    .alert-info {
      background: #e6f2ff;
      color: #0066cc;
    }

    .alert-warning {
      background: #fff3cd;
      color: #856404;
    }

    /* Submit Button */
    .register-btn {
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
      margin-top: 10px;
    }

    .register-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .register-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    /* Footer */
    .register-footer {
      text-align: left;
      padding: 25px 0 0;
      border-top: 1px solid #e2e8f0;
      margin-top: 25px;
    }

    .footer-links {
      display: flex;
      justify-content: flex-start;
      gap: 20px;
      margin-bottom: 12px;
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

    /* Responsive Design */
    @media (max-width: 768px) {
      .register-wrapper {
        flex-direction: column;
      }

      .register-left {
        position: relative;
        width: 100%;
        height: auto;
        min-height: 280px;
        padding: 40px 30px;
      }

      .register-right {
        margin-left: 0;
        width: 100%;
        min-height: auto;
        padding: 30px 20px;
      }

      .brand-logo {
        width: 80px;
        height: 80px;
      }

      .brand-title {
        font-size: 28px;
      }

      .brand-subtitle {
        font-size: 16px;
      }

      .brand-description {
        font-size: 14px;
      }

      .register-title {
        font-size: 24px;
      }

      .form-control {
        height: 42px;
        font-size: 13px;
      }

      .register-btn {
        height: 46px;
        font-size: 14px;
      }
    }

    @media (max-width: 360px) {
      .register-left {
        padding: 30px 20px;
      }

      .register-right {
        padding: 25px 15px;
      }

      .brand-logo {
        width: 70px;
        height: 70px;
      }

      .brand-title {
        font-size: 24px;
      }

      .register-title {
        font-size: 22px;
      }

      .form-control {
        height: 40px;
        font-size: 12px;
      }

      .register-btn {
        height: 44px;
        font-size: 13px;
      }
    }
  </style>
</head>

<body>
  
  <!-- Split Screen Layout -->
  <div class="register-wrapper">
    
    <!-- Left Side - Branding -->
    <div class="register-left">
      <div class="brand-content">
        <img src="../<?= $setting['logo'] ?>" alt="Logo" class="brand-logo">
        <h1 class="brand-title">Registrasi Operator</h1>
        <h2 class="brand-subtitle"><?= $setting['nama_sekolah'] ?></h2>
        <p class="brand-description">
          Daftarkan sekolah Anda untuk memantau data siswa pendaftar yang berasal dari sekolah Anda secara real-time. Akses fitur lengkap untuk mengelola data pendaftar.
        </p>
      </div>
      
      <!-- Floating Animations -->
      <div class="floating-circle" style="top: 10%; left: 10%; width: 60px; height: 60px; animation-delay: 0s;"></div>
      <div class="floating-circle" style="top: 60%; right: 15%; width: 80px; height: 80px; animation-delay: 1s;"></div>
      <div class="floating-circle" style="bottom: 15%; left: 20%; width: 40px; height: 40px; animation-delay: 2s;"></div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="register-right">
      <div class="register-card">
        
        <!-- Form Header -->
        <div class="register-header">
          <h2 class="register-title">Buat Akun Operator</h2>
          <p class="register-subtitle">Lengkapi formulir untuk mendaftar</p>
        </div>

        <!-- Form Body -->
        <div class="register-body">
          <form method="POST" id="form-register">
            
            <div class="alert alert-info">
              <i class="fas fa-info-circle"></i> <strong>Info:</strong> Pilih sekolah Anda dari daftar atau pilih "Sekolah Lainnya" jika tidak terdaftar.
            </div>

            <div class="form-group">
              <label for="npsn" class="form-label"><i class="fas fa-school"></i> Sekolah <span class="text-danger">*</span></label>
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
              <small class="form-text text-muted" style="font-size: 11px; color: #a0aec0;">Pilih sekolah tempat Anda bertugas</small>
            </div>

            <div class="form-group" id="input-sekolah-manual-operator" style="display: none;">
              <label for="nama_sekolah_manual" class="form-label"><i class="fas fa-school"></i> Nama Sekolah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nama_sekolah_manual" id="nama_sekolah_manual" placeholder="Contoh: SD NEGERI 1 MAJALENGKA" style="text-transform: uppercase;">
              <small class="form-text text-muted" style="font-size: 11px; color: #a0aec0;">Tulis nama lengkap sekolah dengan benar</small>
            </div>

            <div class="form-group" id="input-npsn-manual-operator" style="display: none;">
              <label for="npsn_manual" class="form-label"><i class="fas fa-barcode"></i> NPSN Sekolah <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="npsn_manual" id="npsn_manual" placeholder="Contoh: 20200000" maxlength="8">
              <small class="form-text text-muted" style="font-size: 11px; color: #a0aec0;">Nomor Pokok Sekolah Nasional (8 digit angka)</small>
            </div>

            <div class="form-group">
              <label for="nama_user" class="form-label"><i class="fas fa-user"></i> Nama Lengkap Operator <span class="text-danger">*</span></label>
              <input id="nama_user" type="text" class="form-control" name="nama_user" required placeholder="Nama lengkap operator">
            </div>

            <div class="form-group">
              <label for="nuptk" class="form-label"><i class="fas fa-id-card"></i> NIP (Opsional)</label>
              <input id="nuptk" type="text" class="form-control" name="nuptk" placeholder="Nomor NUPTK">
            </div>

            <div class="form-group">
              <label for="no_hp" class="form-label"><i class="fas fa-phone"></i> No. HP/WhatsApp <span class="text-danger">*</span></label>
              <input id="no_hp" type="text" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx">
              <small class="form-text text-muted" style="font-size: 11px; color: #a0aec0;">Untuk keperluan komunikasi dan notifikasi</small>
            </div>

            <div class="form-group">
              <label for="jenkel" class="form-label"><i class="fas fa-venus-mars"></i> Jenis Kelamin <span class="text-danger">*</span></label>
              <select class="form-control" name="jenkel" id="jenkel" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="username" class="form-label"><i class="fas fa-user-lock"></i> Username <span class="text-danger">*</span></label>
              <input id="username" type="text" class="form-control" name="username" required placeholder="Contoh: namasaya130298">
              <small class="form-text text-muted" style="font-size: 11px; color: #a0aec0;">Username unik untuk login, gunakan kombinasi huruf dan angka tanpa spasi</small>
            </div>

            <div class="form-group">
              <label for="password" class="form-label"><i class="fas fa-key"></i> Password <span class="text-danger">*</span></label>
              <div class="password-toggle">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Minimal 8 karakter">
                <span class="toggle-icon" id="toggle-password">
                  <i class="fas fa-eye"></i>
                </span>
              </div>
              <div class="password-strength">
                <div class="strength-bar"></div>
              </div>
              <small class="form-text text-muted" id="strength-text" style="font-size: 11px; color: #a0aec0;">Gunakan kombinasi huruf besar, kecil, angka, dan simbol</small>
            </div>

            <div class="form-group">
              <label for="password2" class="form-label"><i class="fas fa-lock"></i> Konfirmasi Password <span class="text-danger">*</span></label>
              <div class="password-toggle">
                <input id="password2" type="password" class="form-control" name="password_confirm" required placeholder="Ketik ulang password">
                <span class="toggle-icon" id="toggle-password2">
                  <i class="fas fa-eye"></i>
                </span>
              </div>
              <small class="form-text password-match" id="match-info"></small>
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
              <label style="display: flex; align-items: start; gap: 8px; font-size: 13px; cursor: pointer;">
                <input type="checkbox" name="agree" id="agree" required style="margin-top: 2px;">
                <span>Saya menyetujui <a href="#" data-toggle="modal" data-target="#termsModal" style="color: #667eea; font-weight: 600;">Syarat dan Ketentuan</a> yang berlaku</span>
              </label>
            </div>

            <button type="submit" class="register-btn">
              <i class="fas fa-check-circle"></i> Daftar Sekarang
            </button>
          </form>
        </div>

        <!-- Footer -->
        <div class="register-footer">
          <div class="footer-links">
            <a href="login.php">
              <i class="fas fa-sign-in-alt"></i> Sudah Punya Akun?
            </a>
            <a href="../index.php">
              <i class="fas fa-home"></i> Beranda
            </a>
          </div>
          <p class="footer-text">&copy; <?= date('Y') ?> <?= $setting['nama_sekolah'] ?>. All rights reserved.</p>
        </div>

      </div>
    </div>
    
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

    // Toggle password visibility - Password 1
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

    // Toggle password visibility - Password 2
    $('#toggle-password2').click(function() {
      var passwordField = $('#password2');
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
      var strengthText = '';
      var strengthClass = '';
      
      // Calculate strength
      if (password.length >= 8) strength++;
      if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
      if (password.match(/[0-9]/)) strength++;
      if (password.match(/[^a-zA-Z0-9]/)) strength++;

      // Update strength bar
      var strengthContainer = $('.password-strength');
      strengthContainer.removeClass('strength-weak strength-medium strength-strong');
      
      if (password.length === 0) {
        strengthText = 'Gunakan kombinasi huruf besar, kecil, angka, dan simbol';
        strengthClass = 'text-muted';
      } else if (strength <= 1) {
        strengthContainer.addClass('strength-weak');
        strengthText = '💪 Lemah - Tambahkan huruf besar, angka, atau simbol';
        strengthClass = 'text-danger';
      } else if (strength <= 3) {
        strengthContainer.addClass('strength-medium');
        strengthText = '💪💪 Sedang - Tambahkan simbol untuk lebih kuat';
        strengthClass = 'text-warning';
      } else {
        strengthContainer.addClass('strength-strong');
        strengthText = '💪💪💪 Kuat - Password aman!';
        strengthClass = 'text-success';
      }
      
      $('#strength-text').text(strengthText).removeClass('text-muted text-danger text-warning text-success').addClass(strengthClass);
    });

    // Password match checker
    $('#password2').on('keyup', function() {
      var password = $('#password').val();
      var confirm = $(this).val();
      var matchInfo = $('#match-info');

      if (confirm.length === 0) {
        matchInfo.text('').removeClass('text-danger text-success');
      } else if (password === confirm) {
        matchInfo.html('<i class="fas fa-check-circle"></i> Password cocok').removeClass('text-danger').addClass('text-success');
      } else {
        matchInfo.html('<i class="fas fa-times-circle"></i> Password tidak cocok').removeClass('text-success').addClass('text-danger');
      }
    });

    // Also check match when password field changes
    $('#password').on('keyup', function() {
      var password = $(this).val();
      var confirm = $('#password2').val();
      var matchInfo = $('#match-info');

      if (confirm.length > 0) {
        if (password === confirm) {
          matchInfo.html('<i class="fas fa-check-circle"></i> Password cocok').removeClass('text-danger').addClass('text-success');
        } else {
          matchInfo.html('<i class="fas fa-times-circle"></i> Password tidak cocok').removeClass('text-success').addClass('text-danger');
        }
      }
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
      
      if (password.length < 8) {
        iziToast.error({
          title: 'Error!',
          message: 'Password minimal 8 karakter untuk keamanan',
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
