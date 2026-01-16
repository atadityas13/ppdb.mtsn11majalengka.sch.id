# 🚀 Setup Aplikasi PPDB

## 📋 Persyaratan Sistem
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 / MariaDB 10.x atau lebih tinggi
- Apache/Nginx dengan mod_rewrite enabled
- Composer (untuk manage dependencies)

## 🔧 Cara Setup

### 1. Clone Repository
```bash
git clone <repository-url> ppdb
cd ppdb
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Database

#### Opsi A: Menggunakan File .env (Recommended)
```bash
# Copy file .env.example menjadi .env
cp .env.example .env

# Edit file .env dan sesuaikan dengan kredensial database Anda
nano .env  # atau gunakan editor lain
```

Isi file `.env`:
```env
DB_HOST=localhost
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
DB_NAME=your_database_name
```

#### Opsi B: Menggunakan File database.php (Legacy)
```bash
# Copy file template
cp config/database.example.php config/database.php

# Edit file database.php
nano config/database.php  # atau gunakan editor lain
```

### 4. Import Database
```bash
# Import database SQL
mysql -u your_username -p your_database_name < mtsnmaja_ppdb.sql
```

Atau via phpMyAdmin:
1. Buka phpMyAdmin
2. Buat database baru (misal: `ppdb_db`)
3. Import file `mtsnmaja_ppdb.sql`

### 5. Set Permissions (Linux/Mac)
```bash
chmod -R 755 assets/upload
chmod -R 755 temp
chmod -R 755 login/mod_daftar/temp
chmod -R 755 user/mod_formulir/temp
```

### 6. Akses Aplikasi
Buka browser dan akses:
```
http://localhost/ppdb
```

## 👤 Default Login

### Admin
- **URL**: `http://localhost/ppdb/login`
- **Username**: (cek di tabel `user`)
- **Password**: (cek di tabel `user`)

### Pendaftar (Siswa)
- **URL**: `http://localhost/ppdb/user`
- Register terlebih dahulu melalui halaman depan

## 🔐 Keamanan

### File yang Harus Di-ignore Git
File-file berikut sudah ditambahkan ke `.gitignore`:
- `config/database.php` - Kredensial database
- `.env` - Environment variables
- `error_log` - Log files
- `assets/upload/*` - Uploaded files

### Update File di Production
Jika Anda mengupdate file di hosting (production):

1. **File konfigurasi** (`database.php`, `.env`):
   - File ini sudah di-ignore Git
   - Aman untuk diubah tanpa conflict

2. **Update code dari Git**:
   ```bash
   git pull origin main
   ```
   File `database.php` dan `.env` Anda tidak akan tertimpa

## 🐛 Troubleshooting

### Error: "Koneksi Database Gagal"
- Cek kredensial di `.env` atau `config/database.php`
- Pastikan MySQL service berjalan
- Cek apakah database sudah dibuat

### Error: "Permission Denied" saat upload
```bash
chmod -R 777 assets/upload
chmod -R 777 temp
```

### Error: Class not found
```bash
composer dump-autoload
```

## 📚 Dokumentasi Lengkap
Lihat analisis lengkap aplikasi untuk detail arsitektur dan pengembangan lebih lanjut.

## 🤝 Kontribusi
Untuk berkontribusi:
1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📞 Support
Jika ada pertanyaan atau masalah, silakan buat issue di repository.

---
**Developed by A.T. Aditya**
Copyright © 2025 PPDB Online MTsN 11 Majalengka
