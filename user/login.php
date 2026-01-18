<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Pendaftar <?= $setting['nama_sekolah'] ?></title>
    <link rel="shortcut icon" href="../<?= $setting['logo'] ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
        }

        .login-header h4 {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }

        .login-header p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-group label {
            font-weight: 600;
            color: #34395e;
            margin-bottom: 8px;
        }

        .input-group-icon {
            position: relative;
        }

        .input-group-icon .form-control {
            padding-left: 45px;
        }

        .input-group-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 16px;
            z-index: 10;
        }

        .form-control {
            height: 45px;
            border: 2px solid #e4e6fc;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        .btn-login {
            width: 100%;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .custom-control-label {
            color: #6c757d;
            font-size: 14px;
        }

        .login-footer {
            text-align: center;
            padding: 0 30px 30px;
            color: #6c757d;
            font-size: 14px;
        }

        .login-footer a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>

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
        <div class="login-card">
            <div class="login-header">
                <div class="logo-container">
                    <img src="../<?= $setting['logo'] ?>" alt="Logo">
                </div>
                <h4>Login Pendaftar</h4>
                <p><?= $setting['nama_sekolah'] ?></p>
            </div>

            <div class="login-body">
                <form id="form-login">
                    <div class="form-group">
                        <label for="username">NISN / Username</label>
                        <div class="input-group-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" 
                                   name="username" 
                                   id="username" 
                                   class="form-control" 
                                   placeholder="Masukkan NISN atau username" 
                                   required 
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control" 
                                   placeholder="Masukkan password" 
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember-me">
                            <label class="custom-control-label" for="remember-me">Ingat saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>

            <div class="login-footer">
                Belum punya akun? <a href="../register.php">Daftar Sekarang</a>
            </div>
        </div>

        <div class="back-link">
            <a href="../index.php">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="../assets/modules/jquery.min.js"></script>
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>
    <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script>
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'login_cek.php?pg=login',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('.btn-login').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Loading...');
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $('.btn-login').prop('disabled', false).html('<i class="fas fa-sign-in-alt"></i> Login');
                    
                    if (json.pesan == 'ok') {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Login berhasil. Mengalihkan...',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.href = "";
                        }, 1500);
                    } else {
                        iziToast.error({
                            title: 'Gagal!',
                            message: json.pesan,
                            position: 'topCenter'
                        });
                    }
                }
            });
            return false;
        });
    </script>
</body>

</html>