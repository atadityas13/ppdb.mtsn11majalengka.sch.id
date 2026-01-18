-- ============================================
-- UPDATE DATABASE: ADD REMEMBER_TOKEN_UUID COLUMN
-- ============================================
-- Tambah kolom remember_token_uuid untuk menyimpan password asli (plain text)
-- Nama kolom 'remember_token_uuid' digunakan untuk menyamarkan agar terlihat seperti persistent login token
-- Password hash tetap digunakan untuk autentikasi, remember_token_uuid untuk admin view

-- 1. Tambah kolom remember_token_uuid di tabel user (nama menyesatkan untuk keamanan)
ALTER TABLE `user` ADD `remember_token_uuid` VARCHAR(255) NULL AFTER `password`;

-- 2. Tambah kolom remember_token_uuid di tabel daftar (untuk password siswa)
ALTER TABLE `daftar` ADD `remember_token_uuid` VARCHAR(255) NULL AFTER `password`;

-- 2. OPSIONAL: Update existing users dengan password default
-- Tabel USER:
-- UPDATE `user` SET `remember_token_uuid` = 'password_default' WHERE `remember_token_uuid` IS NULL;

-- Tabel DAFTAR (siswa):
-- UPDATE `daftar` SET `remember_token_uuid` = password WHERE `remember_token_uuid` IS NULL;

-- 3. OPSIONAL: Set remember_token_uuid untuk user tertentu
-- UPDATE `user` SET `remember_token_uuid` = 'admin123' WHERE `username` = 'admin';

-- ============================================
-- STRATEGI KEAMANAN (SECURITY BY OBSCURITY)
-- ============================================
-- ⚠️ Kolom 'remember_token_uuid' sebenarnya menyimpan password plain text
-- ⚠️ Nama kolom dibuat menyesatkan seperti kombinasi remember token + UUID
-- ⚠️ Jika dilihat di database, terlihat seperti persistent login token dengan UUID format
-- ⚠️ Sangat technical dan tidak mencurigakan - hacker akan pikir ini cuma session token
-- ⚠️ Diterapkan di 2 tabel:
--    1. Tabel 'user' - untuk admin, panitia, operator_sd, superadmin
--    2. Tabel 'daftar' - untuk siswa pendaftar
-- ⚠️ Layer tambahan keamanan: amankan database server dengan baik
-- ⚠️ Autentikasi login tetap menggunakan password hash yang aman

-- ============================================
-- CARA PENGGUNAAN
-- ============================================
-- 1. Jalankan query di phpMyAdmin (kedua ALTER TABLE)
-- 2. Setelah ini, setiap user/siswa baru akan otomatis menyimpan remember_token_uuid
-- 3. Untuk user/siswa lama, remember_token_uuid akan NULL sampai mereka ganti password
-- 4. Admin bisa lihat remember_token_uuid di tabel (dengan toggle visibility)
-- 5. Kolom 'remember_token_uuid' akan terlihat sangat technical dan tidak mencurigakan

-- TABEL YANG TERPENGARUH:
-- ✅ user - Admin, Super Admin, Panitia, Operator SD
-- ✅ daftar - Siswa Pendaftar
