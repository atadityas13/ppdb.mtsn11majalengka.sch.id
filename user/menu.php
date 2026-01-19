<ul class="sidebar-menu">
    <li class="menu-header bg-warning"></li>
    
		<li><a class="nav-link" href="?pg=formulir"><i class="fas fa-indent"></i> <span>Formulir</span></a></li>
		<li><a class="nav-link" href="?pg=berkas"><i class="fas fa-upload    "></i> <span>Upload Berkas</span></a></li>
		<?php if ($siswa['status'] == 0) { ?>
		<li><a class="nav-link" href="?pg=df_ulang"><i class="fas fa-address-card   "></i> <span>Daftar Ulang</span><small class="label pull-right badge badge-danger">wajib</small></a></li>
		<?php } else { ?>
		<li><a class="nav-link" href="?pg=df_ulang"><i class="fas fa-address-card   "></i> <span>Daftar Ulang</span><small class="label pull-right badge badge-danger">sudah</small></a></li>
		<?php } ?>
		<li><a class="nav-link" href="?pg=buktidaftar"><i class="fas fa-print"></i> <span>Cetak Bukti</span></a></li>
		<li><a class="nav-link" href="?pg=pengumuman"><i class="fas fa-bullhorn fa-fw"></i> <span>Pengumuman</span></a></li>
</ul>
<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= $setting['web'] ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Website
            </a>
          </div>
		  