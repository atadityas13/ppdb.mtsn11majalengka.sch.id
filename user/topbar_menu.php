<?php  
/**
 * TOPBAR MENU FOR SISWA/USER
 * Menu shortcut di navbar untuk siswa
 */
?>
<!-- Direct Menu Links untuk Siswa (Visible on Mobile) -->
<div class="topbar-scroll-x"><ul style="padding-left:0; margin-bottom:0;">
<!-- Home Button -->
<li class="d-lg-none">
    <a href="." class="nav-link topbar-menu-link" title="Home">
        <i class="fas fa-home"></i>
        <span class="menu-text">Home</span>
    </a>
</li>
<li class="d-lg-none">
    <a href="?pg=formulir" class="nav-link topbar-menu-link" title="Formulir">
        <i class="fas fa-indent"></i>
        <span class="menu-text">Formulir</span>
    </a>
</li>
<li class="d-lg-none">
    <a href="?pg=berkas" class="nav-link topbar-menu-link" title="Upload Berkas">
        <i class="fas fa-upload"></i>
        <span class="menu-text">Berkas</span>
    </a>
</li>
<?php if ($siswa['status'] == 1) { ?>
<li class="d-lg-none">
    <a href="?pg=df_ulang" class="nav-link topbar-menu-link" title="Daftar Ulang" style="position: relative;">
        <i class="fas fa-address-card"></i>
        <span class="menu-text">Daftar Ulang</span>
        <span class="badge badge-danger" style="position: absolute; top: 2px; right: 2px; font-size: 8px; padding: 2px 4px;">Wajib</span>
    </a>
</li>
<li class="d-lg-none">
    <a href="?pg=cetakbukti" class="nav-link topbar-menu-link" title="Cetak Kartu">
        <i class="fas fa-print"></i>
        <span class="menu-text">Cetak Bukti</span>
    </a>
</li>
<?php } ?>
</ul></div>
