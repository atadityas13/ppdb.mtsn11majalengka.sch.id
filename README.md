# 🎓 PPDB Online MTsN 11 Majalengka

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Status](https://img.shields.io/badge/status-Production-success.svg)

> Sistem Informasi Penerimaan Peserta Didik Baru (PPDB) Online untuk MTsN 11 Majalengka - Solusi digital untuk mengelola pendaftaran siswa baru secara efisien dan transparan.

---

## 📖 Tentang Aplikasi

**PPDB Online MTsN 11 Majalengka** adalah aplikasi web-based yang dikembangkan untuk memfasilitasi proses penerimaan peserta didik baru secara digital. Aplikasi ini menggantikan proses pendaftaran manual dengan sistem online yang lebih efisien, transparan, dan mudah diakses oleh calon siswa dan operator sekolah.

Sistem ini dirancang dengan antarmuka yang user-friendly dan responsif, memungkinkan calon siswa untuk mendaftar kapan saja dan dari mana saja. Operator sekolah dapat dengan mudah mengelola data pendaftar, melakukan verifikasi, hingga pengumuman hasil seleksi.

### 🎯 Tujuan Pengembangan

- **Efisiensi**: Mengurangi waktu dan biaya proses pendaftaran
- **Transparansi**: Memberikan informasi yang jelas dan real-time kepada calon siswa
- **Aksesibilitas**: Memudahkan akses pendaftaran dari berbagai perangkat
- **Pengelolaan Data**: Centralized database untuk pengelolaan data yang lebih baik
- **Paperless**: Mengurangi penggunaan kertas dan mendukung green technology

---

## ✨ Fitur Utama

### 👨‍🎓 Fitur Calon Siswa

- **Pendaftaran Online**
  - Form pendaftaran lengkap dengan validasi
  - Upload dokumen persyaratan
  - Captcha security untuk mencegah bot
  - Cetak bukti pendaftaran dengan barcode

- **Dashboard Siswa**
  - Lihat status pendaftaran real-time
  - Konfirmasi daftar ulang online
  - Download formulir dan berkas
  - Update data dan upload dokumen tambahan

- **Informasi PPDB**
  - Jadwal dan timeline PPDB
  - Persyaratan pendaftaran
  - Pengumuman hasil seleksi
  - Kontak dan FAQ

### 👨‍💼 Fitur Admin/Operator

- **Manajemen Pendaftar**
  - Daftar pendaftar dengan filter dan pencarian
  - Verifikasi dan validasi data siswa
  - Ubah status pendaftaran (Diterima/Ditolak)
  - Konfirmasi daftar ulang siswa

- **Manajemen Master Data**
  - Kelola data jurusan/program
  - Manajemen data sekolah asal
  - Pengaturan jenis pendaftaran
  - Kelola kontak sekolah

- **Laporan dan Export**
  - Export data pendaftar ke Excel
  - Cetak formulir pendaftaran PDF
  - Cetak surat pernyataan
  - Statistik pendaftaran

- **Pengaturan Sistem**
  - Konfigurasi waktu PPDB
  - Pengaturan informasi sekolah
  - Backup dan restore database
  - Manajemen user/admin

### 👥 Fitur Operator Sekolah

- **Login Terpisah**
  - Sistem login khusus operator sekolah
  - Registrasi operator baru
  - Multi-level user access

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP 7.4+** - Server-side scripting
- **MySQL/MariaDB** - Database management
- **mysqli** - Database driver

### Frontend
- **HTML5 & CSS3** - Markup dan styling
- **Bootstrap 4** - Responsive framework
- **jQuery** - JavaScript library
- **DataTables** - Advanced table plugin
- **SweetAlert2** - Beautiful alert dialogs
- **IziToast** - Elegant notification

### Libraries & Tools
- **Composer** - Dependency management
  - `dompdf/dompdf` - PDF generation
  - `longman/telegram-bot` - Telegram integration
  - `picqer/php-barcode-generator` - Barcode generation
- **PHPExcel** - Excel export functionality
- **Securimage** - CAPTCHA security
- **AdminLTE** - Admin dashboard template

### Security Features
- **CAPTCHA** - Bot prevention
- **SQL Injection Prevention** - Prepared statements
- **XSS Protection** - Input sanitization
- **Session Management** - Secure authentication
- **Password Encryption** - Secure password storage

---

## 📋 Persyaratan Sistem

### Server Requirements
- PHP >= 7.4
- MySQL >= 5.7 atau MariaDB >= 10.2
- Apache/Nginx Web Server
- mod_rewrite enabled (Apache)
- GD Library (untuk CAPTCHA dan barcode)
- mbstring extension
- Composer (untuk dependency management)

### Recommended
- PHP 8.0+
- MySQL 8.0+
- SSL Certificate (HTTPS)
- Minimum 512MB RAM
- 1GB Storage space

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/[your-username]/ppdb-mtsn11majalengka.git
cd ppdb-mtsn11majalengka
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Database

Buat database baru di MySQL:

```sql
CREATE DATABASE mtsnmaja_ppdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Import database:

```bash
mysql -u root -p mtsnmaja_ppdb < mtsnmaja_ppdb.sql
```

### 4. Konfigurasi Aplikasi

Copy file `.env.example` menjadi `.env` dan sesuaikan konfigurasi:

```bash
cp .env.example .env
```

Edit file `config/database.php`:

```php
$host = "localhost";
$user = "your_database_username";
$pass = "your_database_password";
$db = "mtsnmaja_ppdb";
```

### 5. Set Permissions

```bash
chmod 755 -R assets/upload/
chmod 755 -R temp/
chmod 755 -R login/backup_restore/backup/
```

### 6. Akses Aplikasi

Buka browser dan akses:

- **Website Utama**: `http://localhost/ppdb-mtsn11majalengka/`
- **Admin Login**: `http://localhost/ppdb-mtsn11majalengka/login/`
- **Operator Sekolah**: `http://localhost/ppdb-mtsn11majalengka/sekolah/login.php`

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`

⚠️ **Penting:** Segera ubah password default setelah login pertama!

---

## 📱 Struktur Direktori

```
ppdb-mtsn11majalengka/
├── assets/              # Asset files (CSS, JS, images)
│   ├── css/
│   ├── js/
│   ├── img/
│   ├── upload/          # Upload folder untuk dokumen siswa
│   └── modules/         # Third-party modules
├── config/              # Konfigurasi aplikasi
│   ├── database.php     # Koneksi database
│   ├── function.php     # Fungsi helper
│   └── functions.crud.php
├── login/               # Admin panel
│   ├── mod_daftar/      # Modul pendaftar
│   ├── mod_formulir/    # Modul formulir
│   ├── mod_setting/     # Pengaturan sistem
│   ├── mod_user/        # Manajemen user
│   ├── mod_laporan/     # Laporan
│   └── backup_restore/  # Backup database
├── user/                # Dashboard siswa
│   ├── mod_formulir/    # Form siswa
│   └── mod_berkas/      # Upload dokumen
├── sekolah/             # Portal operator sekolah
├── vendor/              # Composer dependencies
├── temp/                # Temporary files
├── beranda.php          # Landing page
├── index.php            # Entry point
└── composer.json        # Composer configuration
```

---

## 📚 Panduan Penggunaan

### Untuk Admin

1. **Login** ke panel admin di `/login/`
2. **Atur Waktu PPDB** di menu Setting > Waktu PPDB
3. **Kelola Data Master** (Jurusan, Sekolah Asal)
4. **Monitor Pendaftar** di menu Data Pendaftar
5. **Verifikasi & Seleksi** pendaftar
6. **Umumkan Hasil** seleksi
7. **Backup Database** secara berkala

### Untuk Calon Siswa

1. Buka website PPDB
2. Klik tombol **"DAFTAR"**
3. Isi formulir pendaftaran lengkap
4. Masukkan kode CAPTCHA
5. Klik **"DAFTAR"** dan simpan informasi login
6. Login ke dashboard siswa
7. Lengkapi berkas persyaratan
8. Tunggu pengumuman hasil seleksi
9. Jika diterima, lakukan konfirmasi daftar ulang

---

## 🔐 Keamanan

Aplikasi ini menerapkan beberapa layer keamanan:

- ✅ **SQL Injection Prevention** - Menggunakan prepared statements
- ✅ **XSS Protection** - Input sanitization dan validation
- ✅ **CAPTCHA** - Bot prevention pada form registrasi
- ✅ **Session Security** - Secure session management
- ✅ **Access Control** - Role-based permission
- ✅ **Password Hashing** - Secure password storage
- ✅ **HTTPS Ready** - SSL certificate support
- ✅ **File Upload Validation** - Mencegah upload file berbahaya

---

## 🔄 Maintenance

### Backup Database

Gunakan fitur backup bawaan:
1. Login admin → Menu Backup/Restore
2. Klik "Backup Database"
3. File akan tersimpan di `/login/backup_restore/backup/`

Atau via command line:

```bash
mysqldump -u root -p mtsnmaja_ppdb > backup_$(date +%Y%m%d).sql
```

### Restore Database

```bash
mysql -u root -p mtsnmaja_ppdb < backup_20260117.sql
```

### Clear Cache

```bash
rm -rf temp/*
```

### Update Dependencies

```bash
composer update
```

---

## 🐛 Troubleshooting

### Error: "Cannot connect to database"
- Periksa konfigurasi di `config/database.php`
- Pastikan MySQL service berjalan
- Cek username dan password database

### Error: "Upload file gagal"
- Periksa permission folder `assets/upload/`
- Cek setting `upload_max_filesize` di php.ini

### Error: "CAPTCHA tidak muncul"
- Pastikan GD Library terinstall
- Periksa permission folder `securimage/`

### Error: "PDF tidak bisa di-generate"
- Pastikan dompdf terinstall via composer
- Cek permission folder `temp/`

---

## 📄 Changelog

### Version 1.0.0 (January 2026)
- ✨ Initial release
- ✅ Sistem pendaftaran online
- ✅ Dashboard admin lengkap
- ✅ Dashboard siswa
- ✅ Export Excel & PDF
- ✅ Backup/Restore database
- ✅ Multi-role user management
- 🐛 Bug fixes dan optimasi

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📞 Kontak & Dukungan

**Developer**  
🧑‍💻 **A.T. Aditya** (Anzas Tio Aditya)  
📧 Email: [official@mtsn11majalengka.sch.id]  
🏢 Instansi: **MTsN 11 Majalengka**  
🌐 Website: [https://ppdb.mtsn11majalengka.sch.id](https://ppdb.mtsn11majalengka.sch.id)

**Sekolah**  
🏫 **MTs Negeri 11 Majalengka**  
📍 Alamat: [Majalengka]  
📞 Telepon: [(0233) 8319182]  
📧 Email: [official@mtsn11majalengka.sch.id]

---

## 📜 Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](LICENSE). Anda bebas untuk menggunakan, memodifikasi, dan mendistribusikan aplikasi ini dengan izin developer dan tetap mencantumkan credit kepada developer asli.

```
MIT License

Copyright (c) 2026 A.T. Aditya - MTsN 11 Majalengka

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 🙏 Credits & Acknowledgments

Terima kasih kepada semua pihak yang telah berkontribusi dalam pengembangan aplikasi ini:

- **AdminLTE** - Admin dashboard template
- **Bootstrap** - Responsive framework
- **jQuery** - JavaScript library
- **DataTables** - Table plugin
- **DomPDF** - PDF generation library
- **PHPExcel** - Excel export functionality
- **Securimage** - CAPTCHA library
- **SweetAlert2** - Alert dialog library
- **IziToast** - Notification library
- Dan semua open source contributors

---

## 🌟 Support

Jika aplikasi ini bermanfaat, jangan lupa untuk memberikan ⭐ **Star** di GitHub!

Untuk dukungan dan pertanyaan, silakan buka [Issues](https://github.com/[your-username]/ppdb-mtsn11majalengka/issues) atau hubungi developer.

---

<div align="center">

**Developed with ❤️ by A.T. Aditya**

**MTsN 11 Majalengka** • 2026

[Website](https://ppdb.mtsn11majalengka.sch.id) • [Documentation](https://github.com/[your-username]/ppdb-mtsn11majalengka/wiki) • [Report Bug](https://github.com/[your-username]/ppdb-mtsn11majalengka/issues)

</div>
