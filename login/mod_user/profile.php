<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class='content'>
<div class='row'>
    <div class='col-md-12'>
        <div class='box box-solid'>
            <div class='box-header'>
                <h3 class='box-title'><i class='fas fa-user-circle'></i> Profile Operator Sekolah</h3>
            </div>
            <div class='box-body'>
                <div class='row'>
                    <!-- Informasi Sekolah -->
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body text-center'>
                                <img src='../assets/img/avatar/avatar-1.png' alt='Avatar' class='rounded-circle mb-3' style='width: 150px; height: 150px;'>
                                <h5><?= $user['nama_user'] ?></h5>
                                <p class='text-muted'>
                                    <span class='badge badge-info'><?= $user['level'] == 'operator_sd' ? 'Operator SD' : ucfirst($user['level']) ?></span>
                                </p>
                                <?php 
                                if ($user['level'] == 'operator_sd' && !empty($user['id_sekolah'])) {
                                    $sekolah_info = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM sekolah WHERE npsn = '{$user['id_sekolah']}'"));
                                    if ($sekolah_info) {
                                ?>
                                <hr>
                                <div class='text-left'>
                                    <p class='mb-1'><strong>Sekolah:</strong></p>
                                    <p class='text-muted'><?= $sekolah_info['nama_sekolah'] ?></p>
                                    <p class='mb-1'><strong>NPSN:</strong></p>
                                    <p class='text-muted'><?= $sekolah_info['npsn'] ?></p>
                                    <p class='mb-1'><strong>Alamat:</strong></p>
                                    <p class='text-muted'><?= $sekolah_info['alamat'] ?></p>
                                </div>
                                <?php 
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Edit Profile -->
                    <div class='col-md-8'>
                        <div class='card'>
                            <div class='card-header'>
                                <h4>Edit Profile</h4>
                            </div>
                            <div class='card-body'>
                                <form id='form-profile'>
                                    <input type='hidden' name='id_user' value='<?= $user['id_user'] ?>'>
                                    
                                    <div class='form-group'>
                                        <label>Nama Lengkap <span class='text-danger'>*</span></label>
                                        <input type='text' name='nama' class='form-control' value='<?= $user['nama_user'] ?>' required>
                                        <small class='form-text text-muted'>Nama lengkap Anda</small>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label>Username</label>
                                        <input type='text' class='form-control' value='<?= $user['username'] ?>' readonly style='background-color: #f5f5f5;'>
                                        <small class='form-text text-muted'>Username tidak dapat diubah</small>
                                    </div>
                                    
                                    <?php if ($user['level'] == 'operator_sd') { ?>
                                    <div class='form-group'>
                                        <label>Sekolah</label>
                                        <input type='text' class='form-control' value='<?= $sekolah_info['nama_sekolah'] ?? '-' ?>' readonly style='background-color: #f5f5f5;'>
                                        <small class='form-text text-muted'>Sekolah tidak dapat diubah</small>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class='form-group'>
                                        <label>Email</label>
                                        <input type='email' name='email' class='form-control' value='<?= $user['email'] ?? '' ?>'>
                                        <small class='form-text text-muted'>Email untuk notifikasi (opsional)</small>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label>No. Telepon</label>
                                        <input type='text' name='telepon' class='form-control' value='<?= $user['telepon'] ?? '' ?>'>
                                        <small class='form-text text-muted'>Nomor telepon yang bisa dihubungi (opsional)</small>
                                    </div>
                                    
                                    <hr>
                                    
                                    <h6 class='text-primary'><i class='fas fa-key'></i> Ubah Password</h6>
                                    <p class='text-muted small'>Kosongkan jika tidak ingin mengubah password</p>
                                    
                                    <div class='form-group'>
                                        <label>Password Lama</label>
                                        <input type='password' name='password_lama' class='form-control'>
                                        <small class='form-text text-muted'>Wajib diisi jika ingin mengubah password</small>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label>Password Baru</label>
                                        <input type='password' name='password_baru' id='password_baru' class='form-control'>
                                        <small class='form-text text-muted'>Minimal 6 karakter</small>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label>Konfirmasi Password Baru</label>
                                        <input type='password' name='password_konfirmasi' id='password_konfirmasi' class='form-control'>
                                        <small class='form-text text-muted'>Ketik ulang password baru</small>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-primary btn-lg btn-block'>
                                            <i class='fas fa-save'></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script>
$(function() {
    $('#form-profile').submit(function(e) {
        e.preventDefault();
        
        // Validasi password jika diisi
        var passwordLama = $('input[name="password_lama"]').val();
        var passwordBaru = $('#password_baru').val();
        var passwordKonfirmasi = $('#password_konfirmasi').val();
        
        if (passwordBaru || passwordKonfirmasi || passwordLama) {
            if (!passwordLama) {
                iziToast.error({
                    title: 'Error!',
                    message: 'Password lama harus diisi jika ingin mengubah password',
                    position: 'topRight'
                });
                return false;
            }
            
            if (passwordBaru.length < 6) {
                iziToast.error({
                    title: 'Error!',
                    message: 'Password baru minimal 6 karakter',
                    position: 'topRight'
                });
                return false;
            }
            
            if (passwordBaru !== passwordKonfirmasi) {
                iziToast.error({
                    title: 'Error!',
                    message: 'Password baru dan konfirmasi tidak sama',
                    position: 'topRight'
                });
                return false;
            }
        }
        
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_profile.php',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Profile berhasil diperbarui',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else if (data == 'PASSWORD_SALAH') {
                    iziToast.error({
                        title: 'Gagal!',
                        message: 'Password lama yang Anda masukkan salah',
                        position: 'topRight'
                    });
                } else {
                    iziToast.error({
                        title: 'Gagal!',
                        message: 'Gagal memperbarui profile: ' + data,
                        position: 'topRight'
                    });
                }
            },
            error: function() {
                iziToast.error({
                    title: 'Error!',
                    message: 'Terjadi kesalahan sistem',
                    position: 'topRight'
                });
            }
        });
        
        return false;
    });
});
</script>
