<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="utf-8" />  
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />  
    <title>PPDB | <?= $setting['nama_sekolah'] ?></title>  
    <!-- META DISKRIPSI-->  
    <meta name="description" content="Mari bergabung Bersama Kami di <?= $setting['nama_sekolah'] ?>, Pendaftaran Peserta didik Baru Tahun <?= date('Y') ?> Kembali dibuka ">  
    <meta name="keywords" content="simasapp v.1.1,simas madrasah, simas sekolah, web simas,"/>  
  
    <!-- Vendor -->  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />  
    <link href="https://unbk.kemdikbud.go.id/vendor/chart/Chart.min.css" rel="stylesheet" />  
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">  
    <link href="https://unbk.kemdikbud.go.id/assets/css/front.min.css" rel="stylesheet" />  
    <link rel="shortcut icon" href="<?= $setting['logo'] ?>" />  
    <link rel="stylesheet" href="assets/css/1.css">  
    <link rel="stylesheet" href="assets/css/2.css">  
    <link rel="stylesheet" href="assets/css/3.css">  
    <link rel="stylesheet" href="assets/css/components2.css">  
    <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">  
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">  
    <!--WAKTU JALAN-->  
    <link rel="stylesheet" type="text/css" href="assets/front/vendor/animate/animate.css">  
    <link rel="stylesheet" type="text/css" href="assets/front/vendor/countdowntime/flipclock.css">  
    <link rel="stylesheet" type="text/css" href="assets/front/css/main.css">  
    <!-- DataTables CSS -->  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">  
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
    <!--===============================================================================================-->  
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --text-dark: #2d3748;
            --text-light: #718096;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.15);
            --shadow-xl: 0 20px 40px rgba(0,0,0,0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
            background: #f8f9fa;
        }

        /* Navbar Modern */
        .home-header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        /* Kembalikan background untuk text visibility */
        .home-banner-bg-color {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }

        .home-banner-bg-img {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -2;
            background-image: url('assets/img/bg-pattern.png');
            background-size: cover;
        }

        .navbar {
            padding: 1rem 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
        }

        .navbar-brand img {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
            border: 2px solid rgba(102, 126, 234, 0.1);
            background: white;
            padding: 8px;
            display: block;
            object-fit: contain;
        }

        .navbar-brand:hover img {
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            transform: scale(1.05);
        }

        .home-header-text h5 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            margin-bottom: 2px;
            font-size: 0.9rem;
        }

        .home-header-text h6 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.85rem;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.7rem 1.2rem !important;
            margin: 0 0.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background: var(--primary-gradient);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .nav-link i {
            margin-right: 5px;
        }

        /* Hero Section Modern */
        .home-banner {
            position: relative;
            padding: 80px 0;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.95) 100%);
        }

        .home-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('assets/images/bg.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 0;
        }

        .home-banner > * {
            position: relative;
            z-index: 1;
        }

        .home-banner-bg-color {
            display: none;
        }

        .home-banner-bg-img {
            display: none;
        }

        /* Card Modern dengan Glassmorphism */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            background: white;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .card-header {
            background: var(--primary-gradient) !important;
            color: white !important;
            padding: 1.2rem;
            font-weight: 600;
            font-size: 1.1rem;
            border: none !important;
        }

        /* Carousel Modern */
        .carousel-frame {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            position: relative;
        }

        .carousel-frame::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
            pointer-events: none;
        }

        .carousel-frame:hover::before {
            opacity: 0.1;
        }

        .carousel-inner {
            border-radius: 20px;
        }

        .carousel-item img {
            border-radius: 20px;
            transition: transform 0.5s ease;
        }

        .carousel-item:hover img {
            transform: scale(1.05);
        }

        .carousel-caption {
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 30px 20px 20px !important;
            border-radius: 0 0 20px 20px;
        }

        .carousel-caption h5 {
            font-weight: 600;
            font-size: 1.3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .carousel-frame:hover .carousel-control-prev,
        .carousel-frame:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-indicators li {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: white;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .carousel-indicators li.active {
            opacity: 1;
            transform: scale(1.3);
        }

        /* Video Frame */
        .embed-responsive {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Pulse Animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .home-header-text {
                display: none !important;
            }
            
            .navbar-brand img {
                height: 50px !important;
            }

            .nav-link {
                padding: 0.5rem 1rem !important;
                margin: 0.2rem 0;
            }

            .card {
                margin-top: 20px;
            }

            /* Fix untuk banner dan form di mobile */
            .home-banner {
                padding: 40px 0;
            }

            .home-banner .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .home-banner .row {
                margin-bottom: 0;
            }

            .home-banner .col-sm-8,
            .home-banner .col-sm-7 {
                margin-bottom: 30px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .home-banner .col-sm-4,
            .home-banner .col-sm-5 {
                margin-bottom: 20px;
                padding-left: 15px;
                padding-right: 15px;
            }

            /* Carousel di mobile */
            #carousel2 {
                margin-bottom: 30px;
            }

            #carousel2 .carousel-inner {
                padding: 20px;
            }

            #carousel2 h5 {
                font-size: 1.1rem !important;
            }

            #carousel2 p {
                font-size: 0.9rem;
            }

            #carousel2 ul {
                padding-left: 20px;
                font-size: 0.9rem;
            }

            #carousel2 ul li {
                margin-bottom: 10px;
            }

            /* Card login di mobile */
            .card-login {
                margin-top: 0 !important;
            }

            .card-login .card-body {
                padding: 1.5rem;
            }

            /* Carousel frame di mobile */
            .carousel-frame {
                margin-bottom: 20px;
            }

            .carousel-caption {
                padding: 15px 10px 10px !important;
            }

            .carousel-caption h5 {
                font-size: 1rem !important;
            }

            .carousel-caption p {
                font-size: 0.85rem !important;
                display: none;
            }
        }

        @media (max-width: 576px) {
            /* Extra small devices */
            .home-banner {
                padding: 30px 0;
            }

            .home-banner .container {
                margin-top: 20px !important;
            }

            #carousel2 .carousel-inner {
                padding: 15px;
            }

            #carousel2 h5 {
                font-size: 1rem !important;
            }

            #carousel2 ul {
                font-size: 0.85rem;
            }

            .card-header {
                font-size: 0.9rem !important;
                padding: 0.8rem !important;
            }

            /* Form controls di mobile */
            .form-control {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.9rem;
            }

            /* Section spacing */
            section {
                padding-top: 20px;
                padding-bottom: 20px;
            }
        }

        /* Style untuk card-login */
        .card-login {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
        }

        .card-login .card-body {
            padding: 2rem;
        }

        .card-login img {
            display: block;
            margin: 0 auto 1.5rem;
        }

        /* Ensure proper spacing for sections */
        .home-content {
            background: white;
            position: relative;
            z-index: 10;
        }

        #tentang {
            padding: 60px 0;
        }

        @media (max-width: 768px) {
            #tentang {
                padding: 40px 0;
            }

            #tentang .col-sm-6 {
                margin-bottom: 30px;
            }

            #tentang .card {
                margin-bottom: 20px;
            }

            /* Form pendaftaran di mobile */
            .form-row {
                margin-bottom: 0;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            label {
                font-size: 0.9rem;
                margin-bottom: 0.3rem;
            }
        }

        @media (max-width: 576px) {
            #tentang {
                padding: 30px 0;
            }

            #tentang .container {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        /* Statistik Section */
        .statistik {
            padding: 60px 0;
        }

        .statistik h5 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .statistik h6 {
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 2rem;
        }

        @media (max-width: 768px) {
            .statistik {
                padding: 40px 0;
            }

            .statistik h5 {
                font-size: 1.4rem;
            }

            .statistik h6 {
                font-size: 1rem;
            }

            .statistik .col-sm-6 {
                margin-bottom: 15px;
            }

            .statistik .col-sm-12 {
                margin-bottom: 20px;
            }

            /* Table responsive di mobile */
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table {
                font-size: 0.85rem;
            }

            .table th,
            .table td {
                padding: 0.5rem;
                white-space: nowrap;
            }
        }

        @media (max-width: 576px) {
            .statistik {
                padding: 30px 0;
            }

            .statistik .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .statistik h5 {
                font-size: 1.2rem;
            }

            .statistik h6 {
                font-size: 0.9rem;
            }

            .card h2 {
                font-size: 1.8rem;
            }
        }

        /* Ensure proper spacing between sections */
        section {
            position: relative;
            z-index: 5;
        }

        section + section {
            margin-top: 0;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #5568d3;
        }

        /* Floating Music Button (Left) */
        #play-pause-btn {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-gradient);
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            z-index: 9999;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #play-pause-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        #play-pause-btn:active {
            transform: scale(0.95);
        }

        /* Animation for music button */
        @keyframes pulse-music {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }
            50% {
                box-shadow: 0 4px 25px rgba(102, 126, 234, 0.8);
            }
        }

        #play-pause-btn.playing {
            animation: pulse-music 2s ease-in-out infinite;
        }

        /* Tooltip untuk tombol musik */
        .music-tooltip {
            position: fixed;
            bottom: 90px;
            left: 30px;
            background: white;
            color: var(--text-dark);
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 10000;
            font-size: 0.9rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .music-tooltip::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-top: 8px solid white;
        }

        .music-tooltip.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* WhatsApp Button (Right) */
        .chating {
            position: fixed !important;
            bottom: 30px !important;
            right: 30px !important;
            left: auto !important;
            width: auto !important;
            padding: 0 !important;
            z-index: 9998 !important;
            transition: all 0.3s ease;
        }

        .chating:hover {
            transform: scale(1.05);
        }

        .chating img {
            width: 100px !important;
            height: auto !important;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
        }

        .chating:hover img {
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }

        @media (max-width: 768px) {
            #play-pause-btn {
                width: 45px;
                height: 45px;
                font-size: 16px;
                bottom: 20px;
                left: 20px;
            }

            .music-tooltip {
                bottom: 75px;
                left: 20px;
                font-size: 0.8rem;
                padding: 10px 14px;
            }

            .chating {
                bottom: 20px !important;
                right: 20px !important;
            }

            .chating img {
                width: 80px !important;
            }
        }
    </style>  
    <!-- Start GA -->  
    <script>  
        window.dataLayer = window.dataLayer || [];  
        function gtag() {  
            dataLayer.push(arguments);  
        }  
        gtag('js', new Date());  
        gtag('config', 'UA-94034622-3');  
    </script>  
    <?php  
    $akhir  = new DateTime($setting['tgl_pengumuman']); // Waktu awal  
    $awal = new DateTime(); // Waktu sekarang atau akhir  
    $diff  = $awal->diff($akhir);  
    ?>  
</head>  
<body data-spy="scroll" data-target="#menu" data-offset="100">  
    <div class="home-wrapper" id="home">  
        <div class="home-header">  
            <div class="container p-0">  
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar-header">  
                    <a class="navbar-brand" href="javascript:;">  
                        <img src="<?= $setting['logo'] ?>" height="75" />  
                        <div class="home-header-text d-none d-sm-block">  
                            <h5>PENERIMAAN PESERTA DIDIK BARU</h5>  
                            <h6><?= $setting['nama_sekolah'] ?></h6>  
                            <h6>Tahun 2026</h6>  
                        </div>  
                        <span class="logo-mini-unbk d-block d-sm-none">PPDB MTsN 11 Majalengka</span>  
                    </a>  
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">  
                        <span class="navbar-toggler-icon"></span>  
                    </button>  
                    <div class="collapse navbar-collapse" id="menu">  
                        <ul class="navbar-nav ml-auto">  
                            <li class="nav-item active">  
                                <a class="nav-link" href="#home" id="link-home"><i class="fas fa-home"></i> Home</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#tentang" onclick="scrollToCarousel()"><i class="fas fa-info-circle"></i> Info Pendaftaran</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#tentang" id="link-tentang"><i class="fas fa-file-alt"></i> Daftar</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="sekolah/login.php">  
                                    <i class="fas fa-users"></i> Pendaftaran Kolektif Sekolah  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#statistik" id="link-statistik"><i class="fas fa-chart-bar"></i> Statistik</a>  
                            </li>  
                        </ul>  
                    </div>  
                </nav>  
            </div>  
        </div>  
        <?php if ($akhir <= $awal) { ?>  
            <div class="home-banner">  
                <div class="home-banner-bg home-banner-bg-color"></div>  
                <div class="home-banner-bg home-banner-bg-img"></div>  
                <div class="container mt-5">  
                    <div class="row">  
                        <div class="col-sm-7" data-aos="fade-right">  
                            <div class="carousel-frame">  
                                <div id="carousel1" class="carousel slide" data-ride="carousel">  
                                    <ol class="carousel-indicators">  
                                        <li data-target="#carousel1" data-slide-to="0" class="active"></li>  
                                        <li data-target="#carousel1" data-slide-to="1"></li>  
                                        <li data-target="#carousel1" data-slide-to="2"></li>  
                                    </ol>  
                                    <div class="card-header"><center><b><i class="fas fa-images"></i> Foto-foto Kegiatan MTsN 11 Majalengka</b></center></div>  
                                    <div class="carousel-inner">  
                                        <div class="carousel-item active">  
                                            <img src="assets/images/foto1.jpg" class="d-block w-100" alt="Foto 1">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Kegiatan Upacara Bendera</h5>  
                                                <p>Membangun karakter disiplin dan nasionalisme</p>  
                                            </div>  
                                        </div>  
                                        <div class="carousel-item">  
                                            <img src="assets/images/foto2.jpg" class="d-block w-100" alt="Foto 2">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Kegiatan Belajar di Kelas</h5>  
                                                <p>Pembelajaran interaktif dan menyenangkan</p>  
                                            </div>  
                                        </div>  
                                        <div class="carousel-item">  
                                            <img src="assets/images/foto3.jpg" class="d-block w-100" alt="Foto 3">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Pembelajaran Praktikum di Laboratorium Bahasa</h5>  
                                                <p>Fasilitas modern untuk pembelajaran optimal</p>  
                                            </div>  
                                        </div>  
                                    </div>  
                                    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">  
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>  
                                        <span class="sr-only">Previous</span>  
                                    </a>  
                                    <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">  
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>  
                                        <span class="sr-only">Next</span>  
                                    </a>  
                                </div>  
                            </div>  
                        </div>  
                        <div class="col-sm-5" data-aos="fade-left">  
                            <div class="card mt-4">  
                                <div class="card-header"><center><b><i class="fas fa-play-circle"></i> Video Profil MTsN 11 Majalengka</b></center></div>  
                                <div class="card-body">  
                                    <div class="embed-responsive embed-responsive-16by9">  
                                        <iframe class="embed-responsive-item" src="https://youtube.com/embed/Cm2Ew1E-A2k" allowfullscreen></iframe>  
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
  
            <div class="home-banner">  
                <div class="home-banner-bg home-banner-bg-color"></div>  
                <div class="home-banner-bg home-banner-bg-img"></div>  
                <div class="container mt-5">  
                    <div class="row">  
                        <div class="col-sm-8">  
                            <div id="carousel2" class="carousel slide" data-ride="carousel">  
                                <ol class="carousel-indicators">  
                                    <li data-target="#carousel2" data-slide-to="0" class="active"></li>  
                                    <li data-target="#carousel2" data-slide-to="1"></li>  
                                    <li data-target="#carousel2" data-slide-to="2"></li>  
                                </ol>  
                                <div class="carousel-inner">  
                                    <div class="carousel-item active">  
                                        <div>  
                                            <h5 data-animation="animated fadeInDownBig">  
                                                Selamat Datang di Web PPDB Online MTsN 11 Majalengka  
                                            </h5>  
                                            <br />  
                                            <p data-animation="animated slideInRight" data-delay="1s">  
                                                Aplikasi Penerimaan Peserta didik baru Tahun Pelajaran 2026/2027 <?= $setting['nama_sekolah'] ?>.  
                                            </p>  
                                            <p data-animation="animated slideInRight" data-delay="2s">  
                                                Pendaftaran Siswa dan Siswi Baru Tahun 2026 ini telah dibuka. Silahkan Segera Daftar dan lengkapi Formulir  
                                            </p>  
                                            <p data-animation="animated flipInX" data-delay="3s">  
                                                <a href="/#tentang" class="btn btn-warning nav-link">  
                                                    Lihat Alur Pendaftaran  
                                                    <span class="fa fa-chevron-down"></span>  
                                                </a>  
                                            </p>  
                                        </div>  
                                    </div>  
                                    <div class="carousel-item">  
                                        <div>  
                                            <h5 data-animation="animated fadeInDownBig">  
                                                Syarat Pendaftaran Peserta Didik Baru  
                                            </h5>  
                                            <h5 data-animation="animated fadeInDownBig">  
                                                Tahun Pelajaran 2026/2027  
                                            </h5>  
                                            <ul>  
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">  
                                                    Surat Keterangan Lulus  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="2s">  
                                                    Ijazah Jenjang Sebelumnya  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="3s">  
                                                    Kartu Keluarga  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="4s">  
                                                    Akta Kelahiran  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="5s">  
                                                    KIP (jika ada)  
                                                </li>  
                                            </ul>  
                                        </div>  
                                    </div>  
                                    <div class="carousel-item">  
                                        <div>  
                                            <h5 data-animation="animated fadeInDownBig">  
                                                Alur Pendaftaran Peserta Didik Baru  
                                            </h5>  
                                            <h5 data-animation="animated fadeInDownBig">  
                                                Tahun Pelajaran 2026/2027  
                                            </h5>  
                                            <ul>  
                                                <li data-animation="animated fadeInDownBig" data-delay="1s">  
                                                    Daftar Akun  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="2s">  
                                                    Lengkapi Formulir  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="3s">  
                                                    Upload Berkas  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="4s">  
                                                    Cetak Kartu Pendaftaran  
                                                </li>  
                                                <li data-animation="animated flipInX" data-delay="5s">  
                                                    Daftar ulang  
                                                </li>  
                                            </ul>  
                                        </div>  
                                    </div>  
                                </div>  
                                <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">  
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>  
                                    <span class="sr-only">Previous</span>  
                                </a>  
                                <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">  
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>  
                                    <span class="sr-only">Next</span>  
                                </a>  
                            </div>  
                        </div>  
                        <div class="col-sm-4">  
                            <div class="card card-login bg-info">  
                                <div class="card-body">  
                                    <img src="<?= $setting['logo_ppdb'] ?>" alt="" width="85%">  
                                    <br>  
                                    <form id="form-login">  
                                        <div class="form-group">  
                                            <span class="fa fa-user"></span>  
                                            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="username" placeholder="Masukkan NISN" required autocomplete="off">  
                                        </div>  
                                        <div class="form-group">  
                                            <span class="fa fa-key"></span>  
                                            <input type="password" class="form-control" name="password" id="inputPassword4-login" placeholder="Password">  
                                        </div>  
                                        <button type="submit" class="btn btn-primary btn-block btn-login" id="btnsimpan-login">  
                                            Masuk  
                                        </button>  
                                        <br>  
                                        <a href="#tentang" class="btn btn-primary btn-block btn-login">  
                                            Daftar Disini  
                                        </a>  
                                    </form>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
            <div class="home-content">  
                <section id="tentang">  
                    <div class="container">  
                        <div class="row">  
                            <div class="col-sm-6 d-flex align-items-center">  
                                <div class="col-md-12 animated bounceInLeft">  
                                    <?php if ($setting['jenjang'] == 1) { ?>  
                                        <div class="card">  
                                            <div class="card-header bg-info">  
                                                <h4>Formulir Pendaftaran</h4>  
                                            </div>  
                                            <form id="form-daftar">  
                                                <div class="card-body">  
                                                    <input type="date" name="tgl_daftar" class="form-control datepicker" value="<?= $daftar['tgl_daftar'] ?>" hidden>  
                                                    <div class="form-row">  
                                                        <label for="asal">JURUSAN / PEMINATAN</label>  
                                                        <select class="form-control select2" style="width: 100%" name="jurusan" id="jurusan">  
                                                            <option value=""></option>  
                                                            <?php $qu = mysqli_query($koneksi, "select * from jurusan where id='1'");  
                                                            while ($jur = mysqli_fetch_array($qu)) {  
                                                            ?>  
                                                                <option value="<?= $jur['id_jurusan'] ?>"> <?= $jur['nama_jurusan'] ?></option>  
                                                            <?php } ?>  
                                                        </select>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="jenis">JENIS PENDAFTARAN</label>  
                                                            <select class="form-control" name="jenis" id="jenis">  
                                                                <option value="1">Siswa Baru</option>  
                                                                <option value="2">Pindahan</option>  
                                                            </select>  
                                                        </div>  
                                                        <input type="hidden" class="form-control datepicker" name="tgl_daftar" required>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nisn">NISN* Sebagai Username Anda</label>  
                                                            <input type="number" maxlength="10" class="form-control" name="nisn" placeholder="NISN" autocomplete="off" required>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nama">NAMA LENGKAP*</label>  
                                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nohp">NO HANDPHONE</label>  
                                                            <input type="number" class="form-control" name="nohp" placeholder="No HP Whatsapp" required>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tempat">TEMPAT LAHIR</label>  
                                                            <input type="text" class="form-control" name="tempat" required>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tgllahir">TANGGAL LAHIR</label>  
                                                            <input type="date" class="form-control datepicker" name="tgllahir" required>  
                                                        </div>  
                                                        <div class="form-group">  
                                                            <label for="asal">Asal Sekolah</label>  
                                                            <select class="form-control" style="width: 100%" name="asal" id="asal" required>  
                                                                <option value="">Pilih Asal Sekolah</option>  
                                                                <?php  
                                                                $query = mysqli_query($koneksi, "select * from sekolah where status='1'");  
                                                                while ($sekolah = mysqli_fetch_array($query)) {  
                                                                ?>  
                                                                    <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>  
                                                                <?php } ?>  
                                                            </select>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-group">  
                                                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>  
                                                        <input type="password" class="form-control" name="password" id="inputPassword4-daftar" placeholder="Password" required>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Refresh Kode</a>  
                                                            <img class="p-b-5" id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <input class="form-control" type="text" name="kodepengaman" placeholder="masukan kode" required>  
                                                        </div>  
                                                    </div>  
                                                </div>  
                                                <div class="card-header bg-white">  
                                                    <button id='btnsimpan-daftar' type="submit" class="btn btn-lg btn-primary">DAFTAR</button>  
                                                </div>  
                                            </form>  
                                        </div>  
                                    <?php } else { ?>  
                                        <div class="card">  
                                            <div class="card-header bg-info">  
                                                <h4>Formulir Pendaftaran</h4>  
                                            </div>  
                                            <form id="form-daftar2">  
                                                <div class="card-body">  
                                                    <input type="date" name="tgl_daftar" class="form-control datepicker" value="<?= $daftar['tgl_daftar'] ?>" hidden>  
                                                    <div class="form-row">  
                                                        <label for="asal">PROGRAM</label>  
                                                        <select class="form-control" style="width: 100%" name="jurusan" id="jurusan" oninvalid="this.setCustomValidity('Pilih Program yang akan diikuti!')" oninput="this.setCustomValidity('')" required>  
                                                            <option value="">Pilih Program</option>  
                                                            <?php $qu = mysqli_query($koneksi, "select * from jurusan");  
                                                            while ($jur = mysqli_fetch_array($qu)) {  
                                                            ?>  
                                                                <option value="<?= $jur['nama_jurusan'] ?>"> <?= $jur['nama_jurusan'] ?></option>  
                                                            <?php } ?>  
                                                        </select>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="jenis">JENIS PENDAFTARAN</label>  
                                                            <select class="form-control" name="jenis" id="jenis">  
                                                                <option value="1">Siswa Baru</option>  
                                                                <option value="2">Pindahan</option>  
                                                            </select>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nisn">NISN* Sebagai Username Anda</label>  
                                                            <input type="number" class="form-control" name="nisn" placeholder="NISN" autocomplete="off" oninvalid="this.setCustomValidity('NISN wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nama">NAMA LENGKAP*</label>  
                                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" oninvalid="this.setCustomValidity('Nama Lengkap wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nohp">NO HANDPHONE</label>  
                                                            <input type="number" class="form-control" name="nohp" placeholder="No HP Whatsapp" oninvalid="this.setCustomValidity('Nomor Whatsapp wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tempat">TEMPAT LAHIR</label>  
                                                            <input type="text" class="form-control" name="tempat" oninvalid="this.setCustomValidity('Tempat Lahir wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tgllahir">TANGGAL LAHIR</label>  
                                                            <input type="date" class="form-control datepicker" name="tgllahir" required>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label>JENIS KELAMIN</label>  
                                                            <select class='form-control' name='jenkel' oninvalid="this.setCustomValidity('Jenis Kelamin wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                                <option value=''>Pilih Jenis Kelamin</option>  
                                                                <?php foreach ($jeniskelamin as $val => $key) { ?>  
                                                                    <?php if ($siswa['jenkel'] == $val) { ?>  
                                                                        <option value='<?= $val ?>' selected><?= $key ?> </option>  
                                                                    <?php  } else { ?>  
                                                                        <option value='<?= $val ?>'><?= $key ?> </option>  
                                                                    <?php } ?>  
                                                                <?php } ?>  
                                                            </select>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="asal">ASAL SEKOLAH</label>  
                                                            <select class="form-control" name="asal" id="asal" oninvalid="this.setCustomValidity('Asal Sekolah wajib diisi!')" oninput="this.setCustomValidity('')" required>  
                                                                <option value="">Pilih Asal Sekolah</option>  
                                                                <?php  
                                                                $query = mysqli_query($koneksi, "select * from sekolah where status='1'");  
                                                                while ($sekolah = mysqli_fetch_array($query)) {  
                                                                ?>  
                                                                    <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>  
                                                                <?php } ?>  
                                                                <option value="LAINNYA" style="background-color: #fff3cd; font-weight: bold;">🔽 SD/Sekolah Lainnya (Tidak Ada Dalam Daftar)</option>  
                                                            </select>  
                                                        </div>  
                                                        <div class="form-group col-md-6" id="input-sekolah-manual" style="display: none;">  
                                                            <label for="asal_manual">NAMA SEKOLAH ASAL <small class="text-danger">(Tulis dengan lengkap dan benar)</small></label>  
                                                            <input type="text" class="form-control" name="asal_manual" id="asal_manual" placeholder="Contoh: SD NEGERI 1 MAJALENGKA" style="text-transform: uppercase;">  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-group">  
                                                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>  
                                                        <input type="password" minlength="6" class="form-control" name="password" id="inputPassword4-daftar2" placeholder="Password" oninvalid="this.setCustomValidity('Password minimal harus 6 karakter!')" oninput="this.setCustomValidity('')" required>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Refresh Kode</a>  
                                                            <img class="p-b-5" id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <input class="form-control" type="text" name="kodepengaman" placeholder="masukan kode" oninvalid="this.setCustomValidity('Masukan kode capctha disamping!')" oninput="this.setCustomValidity('')" required>  
                                                        </div>  
                                                    </div>  
                                                </div>  
                                                <div class="card-footer">  
                                                    <button id='btnsimpan-daftar2' type="submit" class="btn btn-lg btn-primary">SIMPAN DATA</button>  
                                                </div>  
                                            </form>  
                                        </div>  
                                    <?php } ?>  
                                </div>  
                            </div>  
                            <div class="col-sm-6">  
                                <p align="center">  
                                    <img src="assets/alur.png" align="center" width="600" style="max-width: 100%" />  
                                </p>  
                            </div>  
                        </div>  
                    </div>  
                </section>  
            <?php } ?>  
            <?php if ($awal <= $akhir) { ?>  
                <div class="home-banner">  
                    <div class="home-banner-bg home-banner-bg-color"></div>  
                    <div class="home-banner-bg home-banner-bg-img"></div>  
                    <div class="container mt-5">  
                        <div class="row">  
                            <div class="col-sm-8">  
                                <div id="carousel2" class="carousel slide" data-ride="carousel">  
                                    <ol class="carousel-indicators">  
                                        <li data-target="#carousel2" data-slide-to="0" class="active"></li>  
                                    </ol>  
                                    <div class="carousel-inner">  
                                        <div class="carousel-item active">  
                                            <div>  
                                                <h5 data-animation="animated fadeInDownBig">  
                                                    Selamat Datang Di web PPDB Online  
                                                </h5>  
                                                <br />  
                                                <p data-animation="animated slideInRight" data-delay="1s">  
                                                    Aplikasi Penerimaan Peserta didik baru Tahun Pelajaran 2026/2027 <?= $setting['nama_sekolah'] ?>.  
                                                </p>  
                                                <p data-animation="animated slideInRight" data-delay="2s">  
                                                    Pendaftaran Siswa dan Siswi Baru Tahun 2026 Belum Dibuka.  
                                                </p>  
                                                <p data-animation="animated flipInX" data-delay="3s">  
                                                    <a href="" class="btn btn-success nav-link">  
                                                        Pendaftaran Dibuka Dalam  
                                                        <span class="fa fa-chevron-down"></span>  
                                                    </a>  
                                                </p>  
                                            </div>  
                                        </div>  
                                    </div>  
                                    <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">  
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>  
                                        <span class="sr-only">Previous</span>  
                                    </a>  
                                    <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">  
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>  
                                        <span class="sr-only">Next</span>  
                                    </a>  
                                </div>  
                                <center>  
                                    <div class="cd100"></div>  
                                </center>  
                            </div>  
                            <div class="col-sm-4">  
                                <div class="card card-login bg-info">  
                                    <div class="card-body">  
                                        <div class="avatar bg-info" align="center">  
                                            <img src="<?= $setting['logo_ppdb'] ?>" alt="" height="70%" width="70%">  
                                        </div>  
                                        <br>  
                                        <form id="form-login">  
                                            <div class="form-group">  
                                                <span class="fa fa-user"></span>  
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="username" placeholder="Masukkan NISN" required autocomplete="off" disabled>  
                                            </div>  
                                            <div class="form-group">  
                                                <span class="fa fa-key"></span>  
                                                <input type="password" class="form-control" name="password" id="inputPassword4-login" placeholder="Password" disabled>  
                                            </div>  
                                            <button type="submit" class="btn btn-primary btn-block btn-login" id="btnsimpan-login" disabled>  
                                                Masuk  
                                            </button>  
                                            <br>  
                                            <a href="#tentang" class="btn btn-primary btn-block btn-login">  
                                                Daftar Disini  
                                            </a>  
                                        </form>  
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
                <div class="home-content">  
                    <section id="tentang">  
                        <div class="container">  
                            <div class="row">  
                                <div class="col-sm-6 d-flex align-items-center">  
                                    <div class="col-md-12 animated bounceInLeft">  
                                        <div class="card">  
                                            <div class="card-header bg-info">  
                                                <h4>Formulir Pendaftaran</h4>  
                                                <h4>BELUM DIBUKA</h4>  
                                            </div>  
                                            <form id="form-daftar">  
                                                <div class="card-body">  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="jenis">JENIS PENDAFTARAN</label>  
                                                            <select class="form-control" name="jenis" id="jenis" disabled>  
                                                                <option value="1">Siswa Baru</option>  
                                                                <option value="2">Pindahan</option>  
                                                            </select>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nisn">NISN* Sebagai Username Anda</label>  
                                                            <input type="number" maxlength="10" class="form-control" name="nisn" placeholder="NISN" autocomplete="off" disabled>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nama">NAMA LENGKAP*</label>  
                                                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" disabled>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="nohp">NO HANDPHONE</label>  
                                                            <input type="number" class="form-control" name="nohp" placeholder="No HP Whatsapp" disabled>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tempat">TEMPAT LAHIR</label>  
                                                            <input type="text" class="form-control" name="tempat" disabled>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="tgllahir">TANGGAL LAHIR</label>  
                                                            <input type="date" class="form-control datepicker" name="tgllahir" disabled>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <label>JENIS KELAMIN</label>  
                                                            <select class='form-control' name='jenkel' disabled>  
                                                                <option value=''>Pilih Jenis Kelamin</option>  
                                                                <?php foreach ($jeniskelamin as $val => $key) { ?>  
                                                                    <?php if ($siswa['jenkel'] == $val) { ?>  
                                                                        <option value='<?= $val ?>' selected><?= $key ?> </option>  
                                                                    <?php  } else { ?>  
                                                                        <option value='<?= $val ?>'><?= $key ?> </option>  
                                                                    <?php } ?>  
                                                                <?php } ?>  
                                                            </select>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <label for="asal">Asal Sekolah</label>  
                                                            <select class="form-control" name="asal" id="asal" disabled>  
                                                                <option value="">Pilih Asal Sekolah</option>  
                                                                <?php  
                                                                $query = mysqli_query($koneksi, "select * from sekolah where status='1'");  
                                                                while ($sekolah = mysqli_fetch_array($query)) {  
                                                                ?>  
                                                                    <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>  
                                                                <?php } ?>  
                                                            </select>  
                                                        </div>  
                                                    </div>  
                                                    <div class="form-group">  
                                                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>  
                                                        <input type="password" class="form-control" name="password" id="inputPassword4-daftar" placeholder="Password" disabled>  
                                                    </div>  
                                                    <div class="form-row">  
                                                        <div class="form-group col-md-6">  
                                                            <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Refresh Kode</a>  
                                                            <img class="p-b-5" id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>  
                                                        </div>  
                                                        <div class="form-group col-md-6">  
                                                            <input class="form-control" type="text" name="kodepengaman" placeholder="masukan kode" disabled>  
                                                        </div>  
                                                    </div>  
                                                </div>  
                                                <div class="card-footer">  
                                                    <button id='btnsimpan-daftar' type="submit" class="btn btn-lg btn-primary" disabled>SIMPAN DATA</button>  
                                                </div>  
                                            </form>  
                                        </div>  
                                    </div>  
                                </div>  
                                <br>  
                                <div class="col-sm-6">  
                                    <p align="center">  
                                        <img src="assets/alur.png" align="center" width="600" style="max-width: 90%" />  
                                    </p>  
                                </div>  
                            </div>  
                        </div>  
                    </section>  
                </div>  
            <?php } ?>  
            <section class="bg-light statistik" id="statistik">  
                <div class="container">  
                    <h5 class="text-center">Data Pendaftar </h5>  
                    <h6 class="text-center">Peserta Didik Baru <?= $setting['nama_sekolah'] ?> Tahun 2026</h6>  
                    <div class="row mt-12">  
                        <div class="col-sm-6">  
                            <div class="card mt-2">  
                                <div class="card-header bg-primary">Data Pendaftar</div>  
                                <div class="card-body">  
                                    <h2 class="text-center"><?= rowcount($koneksi, 'daftar') ?></h2>  
                                </div>  
                            </div>  
                        </div>  
                        <div class="col-sm-6">  
                            <div class="card mt-2">  
                                <div class="card-header bg-success">Quota Pendaftar</div>  
                                <div class="card-body">  
                                    <h2 class="text-center"><?php $kuota = mysqli_fetch_array(mysqli_query($koneksi, "select *, sum(kuota) as kuota from jurusan"));  
                                                            echo $kuota['kuota']; ?></h2>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </section>  
            <section class="bg-light statistik" id="statistik">  
                <div class="container">  
                    <div class="row mt-12">  
                        <div class="col-sm-12">  
                            <div class="card">  
                                <div class="card-header text-white" style="background-color: #005f6b">  
                                    <h4>Data Statistik Asal Sekolah Pendaftar</h4>  
                                    <div class="card-header-action"></div>  
                                </div>  
                                <div class="card-body text-black" style="background-color: #fff">  
                                    <div class="table-responsive">  
                                        <table class="table table-striped table-sm" id="sortable-table">  
                                            <thead>  
                                                <tr>  
                                                    <th class="text-center"></th>  
                                                    <th>NPSN</th>  
                                                    <th>NAMA SEKOLAH</th>  
                                                    <th class="text-center">PENDAFTAR</th>  
                                                </tr>  
                                            </thead>  
                                            <tbody class="ui-sortable">  
                                                <?php $query = mysqli_query($koneksi, "select * from daftar group by asal_sekolah");  
                                                while ($sekolah = mysqli_fetch_array($query)) {    
                                                    $hitung = rowcount($koneksi, 'daftar', ['asal_sekolah' => $sekolah['asal_sekolah']]);    
                                                ?>  
                                                    <tr>  
                                                        <td>  
                                                            <div class="sort-handler ui-sortable-handle">  
                                                                <i class="fas fa-th"></i>  
                                                            </div>  
                                                        </td>  
                                                        <td><?= $sekolah['npsn_asal'] ?></td>  
                                                        <td><?= $sekolah['asal_sekolah'] ?></td>  
                                                        <td class="text-center">  
                                                            <div class="badge badge-success"><?= $hitung ?></div>  
                                                        </td>  
                                                    </tr>  
                                                <?php } ?>  
                                            </tbody>  
                                        </table>  
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </section>  
        </div>  
    </div>  
    <script>  
        var baseURL = '/';  
        var uniqueID = 'd8ac8098665d68759eeda768373bb6c2';  
        var chartData = JSON.parse('[{"title":"SMK","data":[91.61,7.81,0.58]},{"title":"MA","data":[88.33,11.07,0.6]},{"title":"SMA","data":[89.69,8.33,1.98]},{"title":"SMP","data":[59.15,24.1,16.75]},{"title":"MTs","data":[79.46,19.25,1.29]},{"title":"Nasional","data":[74.84,17.31,7.85]}]');  
        var chartLabel = JSON.parse('["Mandiri","Sekolah Lain","UNKP"]');  
    </script>  
    <!-- Vendor -->  
    <script src="https://unbk.kemdikbud.go.id/vendor/jquery/jquery-3.2.1.min.js"></script>  
    <script src="https://unbk.kemdikbud.go.id/vendor/jquery/jquery.form.min.js"></script>  
    <script src="https://unbk.kemdikbud.go.id/vendor/bootstrap-4/js/bootstrap.min.js"></script>  
    <script src="https://unbk.kemdikbud.go.id/vendor/bootstrap-4/js/popper.min.js"></script>  
    <script src="https://unbk.kemdikbud.go.id/vendor/wow/js/wow.min.js"></script>  
    <script src="https://unbk.kemdikbud.go.id/vendor/chart/Chart.min.js"></script>  
    <!-- Assets -->  
    <script src="https://unbk.kemdikbud.go.id/assets/js/front.min.js"></script>  
    <!-- Assets -->  
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>  
    <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>  
    <script src="assets/modules/popper.js"></script>  
    <script src="assets/modules/tooltip.js"></script>  
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>  
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>  
    <script src="assets/modules/moment.min.js"></script>  
    <script src="assets/js/stisla.js"></script>  
    <!-- JS Libraies -->  
    <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>  
    <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>  
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>  
    <!-- Page Specific JS File -->  
    <!-- JS DATATABLE -->  
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>  
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>  
    <!-- Template JS File -->  
    <script src="assets/js/scripts.js"></script>  
    <script src="assets/js/custom.js"></script>  
    <!-- Audio Player -->  
    <audio id="background-music">  
        <source src="assets/music/background-music.mp3" type="audio/mpeg">  
        Maaf, browser Anda tidak mendukung tag audio.  
    </audio>  
  
    <!-- Tombol Play dan Pause -->  
    <button id="play-pause-btn" class="fas fa-play"></button>  

    <!-- Tooltip untuk tombol musik -->
    <div class="music-tooltip" id="music-tooltip">
        <i class="fas fa-music"></i> Play Hymne MTsN 11 Majalengka
    </div>
  
    <script>  
        const audio = document.getElementById('background-music');  
        const playPauseBtn = document.getElementById('play-pause-btn');  
        const musicTooltip = document.getElementById('music-tooltip');
  
        // Fungsi untuk memutar atau menjeda musik  
        function togglePlayPause() {  
            if (audio.paused) {  
                audio.play();  
                playPauseBtn.classList.remove('fa-play');  
                playPauseBtn.classList.add('fa-pause');  
                playPauseBtn.classList.add('playing');  
            } else {  
                audio.pause();  
                playPauseBtn.classList.remove('fa-pause');  
                playPauseBtn.classList.add('fa-play');  
                playPauseBtn.classList.remove('playing');  
            }  
        }  
  
        // Event listener untuk tombol play/pause  
        playPauseBtn.addEventListener('click', togglePlayPause);  

        // Tampilkan tooltip setelah 2 detik, lalu sembunyikan setelah 5 detik
        window.addEventListener('load', function() {
            setTimeout(function() {
                musicTooltip.classList.add('show');
                
                // Sembunyikan tooltip setelah 3 detik ditampilkan (total 5 detik dari load)
                setTimeout(function() {
                    musicTooltip.classList.remove('show');
                }, 3000);
            }, 2000);
        });

        // Sembunyikan tooltip saat tombol diklik
        playPauseBtn.addEventListener('click', function() {
            musicTooltip.classList.remove('show');
        });

        // Fungsi untuk scroll ke carousel dan tampilkan slide alur pendaftaran (slide ke-3)
        function scrollToCarousel() {
            event.preventDefault();
            // Scroll ke section home banner
            const homeSection = document.getElementById('home');
            if (homeSection) {
                homeSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            
            // Pindah ke slide ke-3 (index 2) yang berisi alur pendaftaran
            setTimeout(function() {
                $('#carousel2').carousel(2);
            }, 800);
        }
    </script>  
    <script type="text/javascript">  
        $(document).ready(function() {  
            $('.klikmenu').click(function() {  
                var menu = $(this).data('id');  
                if (menu == "beranda") {  
                    $('#btndaftar').show();  
                    $('#isi_load').load('home.php');  
                } else if (menu == "pendaftaran") {  
                    $('#btndaftar').hide();  
                    $('#isi_load').load('pendaftaran.php');  
                } else if (menu == "daftar") {  
                    $('#isi_load').load('datadaftar.php');  
                } else if (menu == "siswa") {  
                    $('#isi_load').load('siswa.php');  
                } else if (menu == "pengumuman") {  
                    $('#isi_load').load('pengumuman.php');  
                } else if (menu == "login") {  
                    $('#isi_load').load('login.php');  
                }  
            });  
            // halaman yang di load default pertama kali  
            $('#isi_load').load('home.php');  
        });  
    </script>  
    <script>  
        $('#form-login').submit(function(e) {  
            e.preventDefault();  
            $.ajax({  
                type: 'POST',  
                url: 'crud_web.php?pg=login',  
                data: $(this).serialize(),  
                beforeSend: function() {  
                    $('#btnsimpan-login').prop('disabled', true);  
                },  
                success: function(data) {  
                    var json = $.parseJSON(data);  
                    $('#btnsimpan-login').prop('disabled', false);  
                    if (json.pesan == 'ok') {  
                        iziToast.success({  
                            title: 'Sukses!',  
                            message: 'Login Berhasil',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            window.location.href = "user";  
                        }, 2000);  
                    } else {  
                        iziToast.error({  
                            title: 'Maaf!',  
                            message: json.pesan,  
                            position: 'topCenter'  
                        });  
                    }  
                }  
            });  
            return false;  
        });  
        if (jQuery().daterangepicker) {  
            if ($(".datepicker").length) {  
                $('.datepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    singleDatePicker: true,  
               });  
            }  
            if ($(".datetimepicker").length) {  
                $('.datetimepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD hh:mm'  
                    },  
                    singleDatePicker: true,  
                    timePicker: true,  
                    timePicker24Hour: true,  
                });  
            }  
            if ($(".daterange").length) {  
                $('.daterange').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    drops: 'down',  
                    opens: 'right'  
                });  
            }  
        }  
        if (jQuery().select2) {  
            $(".select2").select2();  
        }  
    </script>  
    <script>  
        $('#form-daftar').submit(function(e) {  
            e.preventDefault();  
            // Validasi NISN  
            var nisn = $('input[name="nisn"]').val();  
            if (nisn.length !== 10) {  
                iziToast.error({  
                    title: 'Maaf!',  
                    message: 'NISN harus terdiri dari 10 angka',  
                    position: 'topCenter'  
                });  
                return false;  
            }  
            // Validasi No Handphone  
            var nohp = $('input[name="nohp"]').val();  
            if (nohp.length < 10 || nohp.length > 13) {  
                iziToast.error({  
                    title: 'Maaf!',  
                    message: 'No Handphone harus terdiri dari 10-13 angka',  
                    position: 'topCenter'  
                });  
                return false;  
            }  
            $.ajax({  
                type: 'POST',  
                url: 'crud_web.php?pg=simpan',  
                data: $(this).serialize(),  
                beforeSend: function() {  
                    $('#btnsimpan-daftar').prop('disabled', true);  
                },  
                success: function(data) {  
                    var json = $.parseJSON(data);  
                    $('#btnsimpan-daftar').prop('disabled', false);  
                    if (json.pesan == 'ok') {  
                        iziToast.success({  
                            title: 'Sukses!',  
                            message: 'Data berhasil disimpan',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            $('#home').load('konfirmasi.php?id=' + json.id + '&nisn=' + json.nisn + '&pass=' + json.pass + '&nama=' + json.nama);  
                        }, 2000);  
                    } else {  
                        iziToast.error({  
                            title: 'Maaf!',  
                            message: json.pesan,  
                            position: 'topCenter'  
                        });  
                        document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random();  
                    }  
                }  
            });  
            return false;  
        });  
        if (jQuery().daterangepicker) {  
            if ($(".datepicker").length) {  
                $('.datepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    singleDatePicker: true,  
                });  
            }  
            if ($(".datetimepicker").length) {  
                $('.datetimepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD hh:mm'  
                    },  
                    singleDatePicker: true,  
                    timePicker: true,  
                    timePicker24Hour: true,  
                });  
            }  
            if ($(".daterange").length) {  
                $('.daterange').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    drops: 'down',  
                    opens: 'right'  
                });  
            }  
        }  
        if (jQuery().select2) {  
            $(".select2").select2();  
        }  
    </script>  
    <script>  
        // Toggle input manual untuk sekolah lainnya
        $('#asal').change(function() {
            if ($(this).val() === 'LAINNYA') {
                $('#input-sekolah-manual').show();
                $('#asal_manual').prop('required', true);
                $('#placeholder-col').hide();
            } else {
                $('#input-sekolah-manual').hide();
                $('#asal_manual').prop('required', false).val('');
                $('#placeholder-col').show();
            }
        });

        $('#form-daftar2').submit(function(e) {  
            e.preventDefault();  
            // Validasi NISN  
            var nisn = $('input[name="nisn"]').val();  
            if (nisn.length !== 10) {  
                iziToast.error({  
                    title: 'PERIKSA KEMBALI NISN',  
                    message: 'NISN yang anda masukan tidak valid!',  
                    position: 'topCenter'  
                });  
                return false;  
            }  
  
            // Validasi No Handphone  
            var nohp = $('input[name="nohp"]').val();  
            if (nohp.length < 11 || nohp.length > 13) {  
                iziToast.error({  
                    title: 'PERIKSA KEMBALI NO HP',  
                    message: 'No Handphone Tidak Valid!',  
                    position: 'topCenter'  
                });  
                return false;  
            }
            
            // Validasi sekolah manual jika dipilih LAINNYA
            if ($('#asal').val() === 'LAINNYA') {
                var asalManual = $('#asal_manual').val().trim();
                if (asalManual.length < 5) {
                    iziToast.error({  
                        title: 'PERIKSA NAMA SEKOLAH',  
                        message: 'Nama sekolah harus diisi minimal 5 karakter!',  
                        position: 'topCenter'  
                    });  
                    return false;
                }
            }
            $.ajax({  
                type: 'POST',  
                url: 'crud_web.php?pg=simpan2',  
                data: $(this).serialize(),  
                beforeSend: function() {  
                    $('#btnsimpan-daftar2').prop('disabled', true);  
                },  
                success: function(data) {  
                    var json = $.parseJSON(data);  
                    $('#btnsimpan-daftar2').prop('disabled', false);  
                    if (json.pesan == 'ok') {  
                        iziToast.success({  
                            title: 'Sukses!',  
                            message: 'Data berhasil disimpan',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            $('#home').load('konfirmasi.php?id=' + json.id + '&nisn=' + json.nisn + '&pass=' + json.pass + '&nama=' + json.nama);  
                        }, 2000);  
  
                    } else {  
                        iziToast.error({  
                            title: 'Maaf!',  
                            message: json.pesan,  
                            position: 'topCenter'  
                        });  
                        document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random();  
  
                    }  
                    //$('#bodyreset').load(location.href + ' #bodyreset');  
                }  
            });  
            return false;  
        });  
        if (jQuery().daterangepicker) {  
            if ($(".datepicker").length) {  
                $('.datepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    singleDatePicker: true,  
                });  
            }  
            if ($(".datetimepicker").length) {  
                $('.datetimepicker').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD hh:mm'  
                    },  
                    singleDatePicker: true,  
                    timePicker: true,  
                    timePicker24Hour: true,  
                });  
            }  
            if ($(".daterange").length) {  
                $('.daterange').daterangepicker({  
                    locale: {  
                        format: 'YYYY-MM-DD'  
                    },  
                    drops: 'down',  
                    opens: 'right'  
                });  
            }  
        }  
        if (jQuery().select2) {  
            $(".select2").select2();  
        }  
    </script>  
    <!--WAKTU JALAN-->  
    <script src="assets/front/vendor/jquery/jquery-3.2.1.min.js"></script>  
    <script src="assets/front/vendor/bootstrap/js/popper.js"></script>  
    <script src="assets/front/vendor/countdowntime/flipclock.min.js"></script>  
    <script src="assets/front/vendor/countdowntime/moment.min.js"></script>  
    <script src="assets/front/vendor/countdowntime/moment-timezone.min.js"></script>  
    <script src="assets/front/vendor/countdowntime/moment-timezone-with-data.min.js"></script>  
    <script src="assets/front/vendor/countdowntime/countdowntime.js"></script>  
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Smooth scroll untuk nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            const navbar = document.querySelector('.home-header');
            
            if (currentScroll > 100) {
                navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.15)';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.08)';
            }
            
            lastScroll = currentScroll;
        });

        // Carousel auto-height
        $('.carousel').on('slide.bs.carousel', function (e) {
            var nextH = $(e.relatedTarget).height();
            $(this).find('.active.carousel-item').parent().animate({ height: nextH }, 500);
        });
    </script>
  
    <script>  
        $('.cd100').countdown100({  
            /*Set Endtime here*/  
            /*Endtime must be > current time*/  
            endtimeMonth: <?= $diff->m ?>,  
            endtimeDate: <?= $diff->d ?>,  
            endtimeHours: <?= $diff->h ?>,  
            endtimeMinutes: <?= $diff->i ?>,  
            endtimeSeconds: <?= $diff->s ?>,  
            timeZone: ""    
            // ex:  timeZone: "America/New_York"  
            //go to " http://momentjs.com/timezone/ " to get timezone    
        });  
    </script>  
</body>  
</html>  
