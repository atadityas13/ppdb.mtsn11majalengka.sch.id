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
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />  
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
  
    <!--===============================================================================================-->  
    <style>  
        .carousel-frame {  
            border: 4px solid #1e90ff; /* Warna bingkai */  
            border-radius: 10px; /* Sudut bingkai */  
            overflow: hidden; /* Memastikan gambar tidak keluar dari bingkai */  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan untuk efek 3D */  
        }  
  
        .carousel-frame .carousel-inner .carousel-item img {  
            border-radius: 10px; /* Mengatur sudut gambar agar sesuai dengan bingkai */  
        }  
  
        .carousel-frame .carousel-caption {  
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang caption dengan transparansi */  
            color: #fff; /* Warna teks caption */  
            padding: 10px; /* Padding caption */  
            border-radius: 0 0 10px 10px; /* Sudut caption */  
        }  
  
        /* Optional: Tambahkan gaya CSS untuk tombol play/pause */  
        #play-pause-btn {  
            position: fixed;  
            bottom: 20px;  
            right: 20px;  
            z-index: 1000;  
            background-color: rgba(0, 0, 0, 0.7);  
            color: #fff;  
            border: none;  
            font-size: 24px;  
            padding: 10px;  
            border-radius: 50%;  
            cursor: pointer;  
            outline: none;  
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
                            <li class="nav-item">  
                                <a class="nav-link" href="sekolah/login.php">  
                                    <i class="fas fa-school"></i> Operator Sekolah  
                                </a>  
                            </li>  
                            <li class="nav-item active">  
                                <a class="nav-link" href="#home" id="link-home">Home</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#tentang" id="link-tentang">Daftar</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#statistik" id="link-statistik">Statistik</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="#persyaratan" id="link-persyaratan">Info Pendaftaran</a>  
                            </li>  
                            <li class="nav-item">  
                                <a class="nav-link" href="./login" id="link-jadwal">Admin</a>  
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
                        <div class="col-sm-7">  
                            <div class="carousel-frame">  
                                <div id="carousel1" class="carousel slide" data-ride="carousel">  
                                    <ol class="carousel-indicators">  
                                        <li data-target="#carousel1" data-slide-to="0" class="active"></li>  
                                        <li data-target="#carousel1" data-slide-to="1"></li>  
                                        <li data-target="#carousel1" data-slide-to="2"></li>  
                                    </ol>  
                                    <div class="card-header bg-white"><center><b>Foto-foto Kegiatan MTsN 11 Majalengka</b></center></div>  
                                    <div class="carousel-inner">  
                                        <div class="carousel-item active">  
                                            <img src="assets/images/foto1.jpg" class="d-block w-100" alt="Foto 1">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Kegiatan Upacara Bendera</h5>  
                                                <p></p>  
                                            </div>  
                                        </div>  
                                        <div class="carousel-item">  
                                            <img src="assets/images/foto2.jpg" class="d-block w-100" alt="Foto 2">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Kegiatan Belajar di Kelas</h5>  
                                                <p></p>  
                                            </div>  
                                        </div>  
                                        <div class="carousel-item">  
                                            <img src="assets/images/foto3.jpg" class="d-block w-100" alt="Foto 3">  
                                            <div class="carousel-caption d-none d-md-block">  
                                                <h5>Kegiatan Pembelajaran Praktikum di Laboratorium Bahasa</h5>  
                                                <p></p>  
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
                        <div class="col-sm-5">  
                            <div class="card mt-4">  
                                <div class="card-header bg-white"><center><b>Video Profil MTsN 11 Majalengka</b></center></div>  
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
                                                            </select>  
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
                                                    Pendaftaran Siswa dan Siswi Baru Tahun 2024 Belum Dibuka.  
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
  
    <script>  
        const audio = document.getElementById('background-music');  
        const playPauseBtn = document.getElementById('play-pause-btn');  
  
        // Fungsi untuk memutar atau menjeda musik  
        function togglePlayPause() {  
            if (audio.paused) {  
                audio.play();  
                playPauseBtn.classList.remove('fa-play');  
                playPauseBtn.classList.add('fa-pause');  
            } else {  
                audio.pause();  
                playPauseBtn.classList.remove('fa-pause');  
                playPauseBtn.classList.add('fa-play');  
            }  
        }  
  
        // Event listener untuk tombol play/pause  
        playPauseBtn.addEventListener('click', togglePlayPause);  
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
