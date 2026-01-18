<?php  
$akhir = new DateTime($setting['tgl_pengumuman']); // Waktu pengumuman  
$awal = new DateTime(); // Waktu sekarang  
$diff = $awal->diff($akhir);  
  
// Hitung selisih hari  
$hariSelisih = $diff->days;  
  
// Cek apakah pengguna adalah super admin, admin, panitia, atau operator SD  
$is_superadmin = $user['level'] == 'superadmin';  
$is_admin = $user['level'] == 'admin';  
$is_panitia = $user['level'] == 'panitia';  
$is_operator_sd = $user['level'] == 'operator_sd';  
  
// Tentukan apakah PPDB aktif atau tidak  
$is_ppdb_aktif = $akhir <= $awal;  
?>  
  
<ul class="sidebar-menu">  
    <li class="menu-header bg-warning"></li>  
  
    <?php if ($is_superadmin || $is_admin) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-home fa-fw"></i> <span>Kelembagaan</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=profil_lembaga">Profil Lembaga</a></li>  
            </ul>  
        </li>  
    <?php } ?>  
  
    <?php if ($is_operator_sd) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-home fa-fw"></i> <span>Data Sekolah</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=data_sekolah">Data Sekolah</a></li>  
            </ul>  
        </li>  
    <?php } ?>  
  
    <?php if ($is_superadmin || $is_admin || $is_panitia) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i> <span>Data PPDB</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=daftar">Semua Data</a></li>  
                <li><a class="nav-link" href="?pg=berkas_ppdb">Daftar Berkas</a></li>  
                <li><a class="nav-link text-success" href="?pg=diterima">Data Diterima</a></li>  
                <li><a class="nav-link text-warning" href="?pg=df_ulang">Siswa Daftar Ulang</a></li>  
                <li><a class="nav-link text-danger" href="?pg=ditolak">Ditolak / Cadangan</a></li>  
            </ul>  
        </li>  
    <?php } ?>  
  
    <?php if ($is_superadmin || $is_admin || $is_panitia) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire fa-fw"></i> <span>Data Master</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=sekolah">Master Sekolah</a></li>  
                <li><a class="nav-link" href="?pg=jurusan">Master Jurusan</a></li>  
                <li><a class="nav-link" href="?pg=jenis">Master Jenis Daftar</a></li>  
            </ul>  
        </li>  
    <?php } ?>  
  
    <?php if ($is_superadmin || $is_admin || $is_panitia) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Cetak</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=l_ppdbyes">Data Penerimaan PPDB</a></li>  
            </ul>  
        </li>  
    <?php } ?>

    <?php if ($is_superadmin || $is_admin) { ?>
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Akun</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=user">Akun Admin & Panitia</a></li>
                <li><a class="nav-link" href="?pg=operator_sd">Akun Operator SD</a></li>  
            </ul>  
        </li>  
    <?php } ?>

    <?php if ($is_panitia || $is_operator_sd) { ?>
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-circle"></i> <span>Profile</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=profile">Profil Saya</a></li>  
            </ul>  
        </li>  
    <?php } ?>
  
    <?php if ($is_operator_sd) { ?>  
        <li class="dropdown">  
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i> <span>PPDB</span></a>  
            <ul class="dropdown-menu">  
                <li><a class="nav-link" href="?pg=daftar_sekolah">Data Pendaftar</a></li>  
                <li><a class="nav-link" href="?pg=berkas_sekolah">Daftar Berkas</a></li>  
            </ul>  
        </li>  
    <?php } ?>  
</ul>

<?php if ($is_superadmin || $is_admin || $is_panitia) { ?>  
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">  
        <button type="button" class="btn btn-<?php echo $is_ppdb_aktif ? 'danger' : 'primary'; ?> btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#ppdb">  
            <i class="fas fa-web"></i>   
            <?php if ($is_ppdb_aktif) { ?>  
                Tutup Pendaftaran  
            <?php } else { ?>  
                Buka Pendaftaran  
            <?php } ?>  
        </button>  
    </div>  
<?php } ?>  
  
<div class="modal fade" id="ppdb" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <form id="form-ppdb">  
                <div class="modal-header">  
                    <h5 class="modal-title">  
                        <?php if ($is_ppdb_aktif) { ?>  
                            Tutup Pendaftaran PPDB  
                        <?php } else { ?>  
                            Buka Pendaftaran PPDB  
                        <?php } ?>  
                    </h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    <?php if ($is_ppdb_aktif) { ?>  
                        Apakah Anda yakin ingin menutup pendaftaran PPDB? Silakan pilih tanggal pembukaan berikutnya:  
                        <input type="date" name="tgl_pengumuman" class="form-control" value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>">  
                    <?php } else { ?>  
                        Apakah Anda yakin ingin membuka pendaftaran PPDB sekarang?  
                        <input type="hidden" name="tgl_pengumuman" value="<?php echo date('Y-m-d'); ?>">  
                    <?php } ?>  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                    <button type="submit" class="btn btn-<?php echo $is_ppdb_aktif ? 'danger' : 'primary'; ?>">  
                        <?php if ($is_ppdb_aktif) { ?>  
                            Tutup  
                        <?php } else { ?>  
                            Buka  
                        <?php } ?>  
                    </button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
  
<script>  
    $('#form-ppdb').submit(function(e) {  
        e.preventDefault();  
        $.ajax({  
            type: 'POST',  
            url: 'mod_setting/crud_setting.php?pg=aktifppdb',  
            data: $(this).serialize(),  
            success: function(data) {  
                if (data == 'ok') {  
                    iziToast.success({  
                        title: 'Mantap!',  
                        message: 'Pendaftaran berhasil diperbarui',  
                        position: 'topRight'  
                    });  
                    setTimeout(function() {  
                        window.location.reload();  
                    }, 2000);  
                    $('#ppdb').modal('hide');  
                } else {  
                    iziToast.error({  
                        title: 'Maaf!',  
                        message: 'Pendaftaran gagal diperbarui',  
                        position: 'topRight'  
                    });  
                }  
            }  
        });  
        return false;  
    });  
</script>  
