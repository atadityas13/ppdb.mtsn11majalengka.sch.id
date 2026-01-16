<?php
/**
 * Database Configuration
 * 
 * File ini di-ignore oleh Git untuk keamanan.
 * Gunakan database.example.php sebagai template untuk setup baru.
 */

// Load environment variables jika file .env ada
$env_file = dirname(__DIR__) . '/.env';
if (file_exists($env_file)) {
    $env_lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($env_lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) continue;
        
        // Parse environment variable
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        
        // Set as environment variable
        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Helper function untuk get environment variable dengan default value
function env($key, $default = null) {
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }
    return $value;
}

// Deklarasi parameter koneksi database
// Prioritas: Environment Variable -> Hardcoded (fallback untuk backward compatibility)
$server   = env('DB_HOST', 'localhost');
$username = env('DB_USERNAME', 'mtsnmaja_ppdb');
$password = env('DB_PASSWORD', 'PPDBmtsn11');
$database = env('DB_NAME', 'mtsnmaja_ppdb');

// Koneksi database
$koneksi = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    // Log error untuk debugging (optional)
    error_log('Database Connection Failed: ' . mysqli_connect_error());
    die('Koneksi Database Gagal. Silakan hubungi administrator.');
}

// Set charset untuk prevent SQL injection via encoding
mysqli_set_charset($koneksi, 'utf8mb4');

// GET parameters
(isset($_GET['pg'])) ? $pg = $_GET['pg'] : $pg = '';
(isset($_GET['ac'])) ? $ac = $_GET['ac'] : $ac = '';

// SETTING WAKTU
$timezone = env('APP_TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set($timezone);
define('BASEPATH', dirname(__FILE__));
