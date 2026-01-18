<?php  
/**
 * TOPBAR QUICK MENU
 * Menu shortcut di navbar untuk akses cepat (terutama untuk mobile user)
 */

// Ambil variabel dari menu.php jika belum ada
if (!isset($is_superadmin)) {
    $is_superadmin = $user['level'] == 'superadmin';
    $is_admin = $user['level'] == 'admin';
    $is_panitia = $user['level'] == 'panitia';
    $is_operator_sd = $user['level'] == 'operator_sd';
}
?>

<!-- Quick Access Menu Dropdown (Visible on Mobile) -->
<li class="dropdown d-lg-none quick-menu-dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <i class="fas fa-th-large"></i>
        <span class="badge badge-success">Menu Cepat</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right quick-menu-list">
        <div class="dropdown-title">Menu Cepat</div>
        
        <!-- Home -->
        <a href="." class="dropdown-item has-icon">
            <i class="fas fa-home text-warning"></i> Home
        </a>
        
        <?php if ($is_superadmin || $is_admin || $is_panitia) { ?>
            <!-- Data PPDB -->
            <div class="dropdown-divider"></div>
            <div class="dropdown-title">Data PPDB</div>
            <a href="?pg=daftar" class="dropdown-item has-icon">
                <i class="fas fa-users text-primary"></i> Semua Data Pendaftar
            </a>
            <a href="?pg=berkas_ppdb" class="dropdown-item has-icon">
                <i class="fas fa-folder-open text-info"></i> Daftar Berkas
            </a>
            <a href="?pg=diterima" class="dropdown-item has-icon">
                <i class="fas fa-check-circle text-success"></i> Data Diterima
            </a>
            
            <!-- Data Master -->
            <div class="dropdown-divider"></div>
            <div class="dropdown-title">Data Master</div>
            <a href="?pg=sekolah" class="dropdown-item has-icon">
                <i class="fas fa-school text-primary"></i> Master Sekolah
            </a>
            <a href="?pg=jurusan" class="dropdown-item has-icon">
                <i class="fas fa-graduation-cap text-info"></i> Master Jurusan
            </a>
        <?php } ?>
        
        <?php if ($is_operator_sd) { ?>
            <!-- PPDB Operator SD -->
            <div class="dropdown-divider"></div>
            <div class="dropdown-title">PPDB Sekolah</div>
            <a href="?pg=daftar_sekolah" class="dropdown-item has-icon">
                <i class="fas fa-users text-primary"></i> Data Pendaftar
            </a>
            <a href="?pg=berkas_sekolah" class="dropdown-item has-icon">
                <i class="fas fa-folder-open text-info"></i> Daftar Berkas
            </a>
            
            <!-- Data Sekolah -->
            <div class="dropdown-divider"></div>
            <a href="?pg=data_sekolah" class="dropdown-item has-icon">
                <i class="fas fa-building text-success"></i> Data Sekolah
            </a>
            <a href="?pg=profile" class="dropdown-item has-icon">
                <i class="fas fa-user-circle text-warning"></i> Profile Saya
            </a>
        <?php } ?>
        
        <?php if ($is_superadmin || $is_admin) { ?>
            <!-- Akun -->
            <div class="dropdown-divider"></div>
            <div class="dropdown-title">Kelola Akun</div>
            <a href="?pg=user" class="dropdown-item has-icon">
                <i class="fas fa-user-tie text-primary"></i> Admin & Panitia
            </a>
            <a href="?pg=operator_sd" class="dropdown-item has-icon">
                <i class="fas fa-user-tag text-info"></i> Operator SD
            </a>
        <?php } ?>
    </div>
</li>

<!-- Notification Badge (Optional - for showing important info) -->
<li class="dropdown d-lg-none">
    <a href="." class="nav-link nav-link-lg" title="Kembali ke Home">
        <i class="fas fa-home"></i>
    </a>
</li>
