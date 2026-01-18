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
<?php if ($is_operator_sd) { ?>
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
    <li class="d-lg-none">
        <a href="?pg=profile" class="nav-link topbar-menu-link" title="Profile">
            <i class="fas fa-user-circle"></i>
            <span class="menu-text">Profile</span>
        </a>
    </li>
<?php } ?>

<?php if ($is_superadmin || $is_admin || $is_panitia) { ?>
    <!-- Menu untuk Admin/Panitia -->
    <li class="d-lg-none">
        <a href="?pg=daftar" class="nav-link topbar-menu-link" title="Data Pendaftar">
            <i class="fas fa-users"></i>
            <span class="menu-text">Pendaftar</span>
        </a>
    </li>
    <li class="d-lg-none">
        <a href="?pg=berkas_ppdb" class="nav-link topbar-menu-link" title="Berkas PPDB">
            <i class="fas fa-folder-open"></i>
            <span class="menu-text">Berkas</span>
        </a>
    </li>
    <li class="d-lg-none">
        <a href="?pg=diterima" class="nav-link topbar-menu-link" title="Data Diterima">
            <i class="fas fa-check-circle"></i>
            <span class="menu-text">Diterima</span>
        </a>
    </li>
<?php } ?>
