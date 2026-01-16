<?php
/**
 * Database Configuration Template
 * 
 * INSTRUKSI:
 * 1. Copy file ini menjadi 'database.php'
 * 2. Sesuaikan nilai kredensial database dengan environment Anda
 * 3. File 'database.php' akan di-ignore oleh Git untuk keamanan
 */

// Deklarasi parameter koneksi database
// Sesuaikan dengan kredensial database Anda
$server   = "localhost";
$username = "your_database_username";  // Ganti dengan username database Anda
$password = "your_database_password";  // Ganti dengan password database Anda
$database = "your_database_name";      // Ganti dengan nama database Anda

// Koneksi database
$koneksi = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}

// GET parameters
(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

// SETTING WAKTU
date_default_timezone_set("Asia/Jakarta");
define('BASEPATH', dirname(__FILE__));
