-- ========================================================
-- Script Pembersihan Database PPDB
-- ========================================================
-- Script untuk menghapus tabel dan kolom yang tidak digunakan
-- Jalankan script ini di database MySQL Anda
-- 
-- ⚠️ PENTING: BACKUP DATABASE TERLEBIH DAHULU! ⚠️
-- ========================================================

-- ========================================================
-- 1. HAPUS TABEL PEMBAYARAN
-- ========================================================

-- Hapus tabel bayar (tabel transaksi pembayaran)
DROP TABLE IF EXISTS `bayar`;

-- Hapus tabel biaya (tabel master biaya pendaftaran)
DROP TABLE IF EXISTS `biaya`;

-- ========================================================
-- 2. HAPUS KOLOM PEMBAYARAN DARI TABEL SETTING
-- ========================================================

-- Hapus kolom infobayar dari tabel setting
ALTER TABLE `setting` DROP COLUMN IF EXISTS `infobayar`;

-- ========================================================
-- 3. HAPUS KOLOM NILAI RAPOR DARI TABEL DAFTAR
-- ========================================================
-- Kolom nilai rapor untuk 5 semester (bin, mat, ipa, big)

-- Semester 1
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bin1`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `mat1`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `ipa1`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `big1`;

-- Semester 2
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bin2`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `mat2`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `ipa2`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `big2`;

-- Semester 3
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bin3`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `mat3`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `ipa3`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `big3`;

-- Semester 4
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bin4`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `mat4`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `ipa4`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `big4`;

-- Semester 5
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bin5`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `mat5`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `ipa5`;
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `big5`;

-- Kolom jumlah total nilai
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `jumlah`;

-- Kolom bayar (status pembayaran)
ALTER TABLE `daftar` DROP COLUMN IF EXISTS `bayar`;

-- ========================================================
-- 4. HAPUS TABEL LAIN YANG TIDAK DIGUNAKAN (OPSIONAL)
-- ========================================================

-- Hapus tabel histori jika tidak digunakan (sesuaikan dengan kebutuhan)
-- DROP TABLE IF EXISTS `histori`;

-- ========================================================
-- SELESAI!
-- ========================================================
-- Semua tabel dan kolom yang tidak digunakan telah dihapus:
-- 
-- ✅ Tabel bayar (transaksi pembayaran)
-- ✅ Tabel biaya (master biaya)
-- ✅ Kolom infobayar di tabel setting
-- ✅ Kolom nilai rapor (bin1-5, mat1-5, ipa1-5, big1-5)
-- ✅ Kolom jumlah (total nilai)
-- ✅ Kolom bayar (status pembayaran)
--
-- Database PPDB sekarang sudah bersih dan optimal!
-- ========================================================
