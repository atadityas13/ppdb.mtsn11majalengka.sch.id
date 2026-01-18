<?php  
/**
 * TOPBAR DIRECT MENU
 * Menu shortcut di navbar untuk akses cepat (mobile)
 */

// Ambil variabel dari menu.php jika belum ada
if (!isset($is_superadmin)) {
    $is_superadmin = $user['level'] == 'superadmin';
    $is_admin = $user['level'] == 'admin';
    $is_panitia = $user['level'] == 'panitia';
    $is_operator_sd = $user['level'] == 'operator_sd';
}
?>

<!-- Direct Menu Links (Visible on Mobile) -->
<!-- Hanya untuk Operator SD, bukan untuk Admin/Panitia (mereka pakai desktop) -->

<?php if ($is_operator_sd) { ?>
    <!-- Home Button -->    <li class="d-lg-none">
        <a href="." class="nav-link topbar-menu-link" title="Home">
            <i class="fas fa-home"></i>
            <span class="menu-text">Home</span>
        </a>
    </li>
    
    <!-- Menu untuk Operator SD -->
    <li class="d-lg-none">
        <a href="?pg=daftar_sekolah" class="nav-link topbar-menu-link" title="Data Pendaftar">
            <i class="fas fa-users"></i>
            <span class="menu-text">Pendaftar</span>
        </a>
    </li>
    <li class="d-lg-none">
        <a href="?pg=berkas_sekolah" class="nav-link topbar-menu-link" title="Daftar Berkas">
            <i class="fas fa-folder-open"></i>
            <span class="menu-text">Berkas</span>
        </a>
    </li>
<?php } ?>
