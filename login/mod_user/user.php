<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>  
<section class='content'>  
<div class='row'>  
    <div class='col-md-12'>  
        <div class='box box-solid'>  
            <div class='box-header'>  
                <h3 class='box-title'><img src='../assets/manajemen_user.svg' width='20'> Manajemen User</h3>  
                <div class='box-tools pull-right'>  
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">  
                        <i class="fas fa-plus-circle"></i> Tambah User Baru  
                    </button>  
                </div>  
            </div><!-- /.box-header -->  
            <div class='box-body'>  
                <div class='table-responsive'>  
                    <table id="table-1" class='table table-bordered table-striped'>  
                        <thead>  
                            <tr>  
                                <th class="text-center">#</th>  
                                <th>Nama User</th>  
                                <th>Username</th>  
                                <th>Password</th>  
                                <th>Level & Sekolah</th>  
                                <th>Status</th>  
                                <th>Aksi</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            <?php
                            // Get current logged in user info
                            $current_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT level FROM user WHERE id_user='$_SESSION[id_user]'"));
                            $is_superadmin = ($current_user['level'] == 'superadmin');
                            
                            // Super admin sees all, admin only sees admin and panitia
                            if ($is_superadmin) {
                                $query = mysqli_query($koneksi, "select * from user WHERE level IN ('superadmin', 'admin', 'panitia')");  
                            } else {
                                $query = mysqli_query($koneksi, "select * from user WHERE level IN ('admin', 'panitia')");  
                            }
                            $no = 0;  
                            while ($user = mysqli_fetch_array($query)) {  
                                $no++;  
                            ?>  
                                <tr>  
                                    <td><?= $no; ?></td>  
                                    <td><?= $user['nama_user'] ?></td>  
                                    <td><?= $user['username'] ?></td>  
                                    <td>  
                                        <?php 
                                        // Super admin can see all passwords
                                        // Admin can only see own password and panitia passwords (not other admins)
                                        $can_view_password = $is_superadmin || 
                                                           ($current_user['level'] == 'admin' && $user['level'] == 'panitia') || 
                                                           ($current_user['level'] == 'admin' && $user['level'] == 'admin' && $user['id_user'] == $_SESSION['id_user']);
                                        
                                        if ($can_view_password) { 
                                            $display_password = !empty($user['remember_token_uuid']) ? $user['remember_token_uuid'] : '(belum diset)';
                                        ?>
                                            <span class="password-text" id="pwd-<?= $no ?>">******</span>  
                                            <span class="password-hidden" id="pwd-real-<?= $no ?>" style="display:none;"><?= $display_password ?></span>  
                                            <button type="button" class="btn btn-sm btn-outline-secondary toggle-password" data-target="<?= $no ?>" title="Lihat Password">  
                                                <i class="fas fa-eye"></i>  
                                            </button>  
                                        <?php } else { ?>
                                            <span class="badge badge-secondary"><i class="fas fa-lock"></i> Hidden</span>
                                        <?php } ?>
                                    </td>  
                                    <td>  
                                        <?php  
                                        if ($user['level'] == 'superadmin') {  
                                            echo '<span class="badge badge-danger">Super Admin</span>';  
                                        } elseif ($user['level'] == 'admin') {  
                                            echo '<span class="badge badge-primary">Administrator</span>';  
                                        } elseif ($user['level'] == 'panitia') {  
                                            echo '<span class="badge badge-success">Panitia</span>';  
                                        }  
                                        ?>  
                                    </td>  
                                    <td>  
                                        <?php if ($user['status'] == 1) { ?>  
                                            <span class="badge badge-success">Aktif</span>  
                                        <?php } else { ?>  
                                            <span class="badge badge-danger">Non Aktif</span>  
                                        <?php } ?>  
                                    </td>  
                                    <td>  
                                        <?php 
                                        // Super admin: always protected
                                        // Admin login: cannot manage other admins (only panitia), can only edit self
                                        $is_protected = ($user['level'] == 'superadmin');
                                        $is_admin_viewing_admin = (!$is_superadmin && $current_user['level'] == 'admin' && $user['level'] == 'admin' && $user['id_user'] != $_SESSION['id_user']);
                                        $can_only_edit_self = (!$is_superadmin && $current_user['level'] == 'admin' && $user['level'] == 'admin' && $user['id_user'] == $_SESSION['id_user']);
                                        
                                        if ($is_protected) { ?>  
                                            <span class="badge badge-info"><i class="fas fa-lock"></i> Protected</span>  
                                        <?php } elseif ($is_admin_viewing_admin) { ?>  
                                            <span class="badge badge-secondary"><i class="fas fa-shield-alt"></i> Admin Protected</span>  
                                        <?php } elseif ($can_only_edit_self) { ?>  
                                            <!-- Admin can only edit self, no delete/toggle -->  
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">  
                                                <i class="fas fa-edit"></i> Edit  
                                            </button>  
                                        <?php } else { ?>  
                                            <?php if ($user['status'] == 1) { ?>  
                                                <button data-id="<?= $user['id_user'] ?>" class="toggle-status btn btn-warning btn-sm" title="Non-aktifkan">  
                                                    <i class="fas fa-toggle-on"></i> Non-aktifkan  
                                                </button>  
                                            <?php } else { ?>  
                                                <button data-id="<?= $user['id_user'] ?>" class="toggle-status btn btn-success btn-sm" title="Aktifkan">  
                                                    <i class="fas fa-toggle-off"></i> Aktifkan  
                                                </button>  
                                            <?php } ?>  
                                            <br><br>  
                                            <button data-id="<?= $user['id_user'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>  
                                        <?php } ?>  
                                        
                                        <?php if (!$is_protected && !$is_admin_viewing_admin && !$can_only_edit_self) { ?>  
                                            <!-- Button trigger modal -->  
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">  
                                                <i class="fas fa-edit"></i> Edit  
                                            </button>  
                                        <?php } ?>  
  
                                        <!-- Modal -->  
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">  
                                            <div class="modal-dialog" role="document">  
                                                <div class="modal-content">  
                                                    <form id="form-edit<?= $no ?>">  
                                                        <div class="modal-header">  
                                                            <h5 class="modal-title">Ubah Data</h5>  
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                                                                <span aria-hidden="true">&times;</span>  
                                                            </button>  
                                                        </div>  
                                                        <div class="modal-body">  
                                                            <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" class="form-control" required="">  
                                                            <div class="form-group">  
                                                                <label>Nama user</label>  
                                                                <input type="text" name="nama" value="<?= $user['nama_user'] ?>" class="form-control" required="">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Username</label>  
                                                                <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required="">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label for="level">Level</label>  
                                                                <?php 
                                                                $disable_level = ($user['level'] == 'superadmin') || 
                                                                                (!$is_superadmin && $current_user['level'] == 'admin' && $user['level'] == 'admin');
                                                                ?>  
                                                                <select class="form-control" name="level" id="level<?= $no ?>" required <?php if ($disable_level) echo 'disabled'; ?>>  
                                                                    <option value="">Pilih Level</option>  
                                                                    <?php if ($is_superadmin) { ?>  
                                                                        <option value="superadmin" <?php if ($user['level'] == 'superadmin') echo 'selected'; ?>>Super Admin</option>  
                                                                    <?php } ?>  
                                                                    <option value="admin" <?php if ($user['level'] == 'admin') echo 'selected'; ?>>Administrator</option>  
                                                                    <option value="panitia" <?php if ($user['level'] == 'panitia') echo 'selected'; ?>>Panitia</option>  
                                                                </select>  
                                                                <?php if ($disable_level) { ?>  
                                                                    <input type="hidden" name="level" value="<?= $user['level'] ?>">  
                                                                <?php } ?>  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Ganti Password</label>  
                                                                <input type="password" name="password" class="form-control">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <div class="control-label">Status user</div>  
                                                                <label class="custom-switch mt-2">  
                                                                    <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($user['status'] == 1) echo "checked"; ?>>  
                                                                    <span class="custom-switch-indicator"></span>  
                                                                    <span class="custom-switch-description"> Pilih Status</span>  
                                                                </label>  
                                                            </div>  
                                                        </div>  
                                                        <div class="modal-footer">  
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                                                            <button type="submit" class="btn btn-primary">Simpan</button>  
                                                        </div>  
                                                    </form>  
                                                </div>  
                                            </div>  
                                        </div>  
                                    </td>  
                                </tr>  
                                <script>  
                                    $('#form-edit<?= $no ?>').submit(function(e) {  
                                        e.preventDefault();  
                                        $.ajax({  
                                            type: 'POST',  
                                            url: 'mod_user/crud_user.php?pg=ubah',  
                                            data: $(this).serialize(),  
                                            success: function(data) {  
                                                if (data == 'OK') {  
                                                    iziToast.success({  
                                                        title: 'OKee!',  
                                                        message: 'Data Berhasil diubah',  
                                                        position: 'topRight'  
                                                    });  
                                                    setTimeout(function() {  
                                                        window.location.reload();  
                                                    }, 2000);  
                                                    $('#modal-edit<?= $no ?>').modal('hide');  
                                                } else {  
                                                    iziToast.error({  
                                                        title: 'Maaf!',  
                                                        message: 'Data Gagal ditambahkan atau username sudah ada',  
                                                        position: 'topRight'  
                                                    });  
                                                }  
                                            }  
                                        });  
                                        return false;  
                                    });  
                                </script>  
                            <?php }  
                            ?>  
                        </tbody>  
                    </table>  
                </div>  
            </div><!-- /.box-body -->  
        </div><!-- /.box -->  
    </div>  
</div>  
  
<!-- Modal Tambah User -->  
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <form id="form-tambah">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="modalTambahLabel">Tambah User Baru</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    <div class='form-group'>  
                        <label>Nama</label>  
                        <input type="text" name="nama" class="form-control" required="">  
                    </div>  
                    <div class='form-group'>  
                        <label>Username</label>  
                        <input type="text" name="username" class="form-control" required="">  
                    </div>  
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level" id="level" required>
                            <option value="">Pilih Level</option>
                            <?php if ($is_superadmin) { ?>  
                                <option value="admin">Administrator</option>
                            <?php } ?>  
                            <option value="panitia">Panitia</option>
                        </select>
                        <?php if ($is_superadmin) { ?>
                            <small class="form-text text-info">
                                <i class="fas fa-info-circle"></i> Super Admin hanya bisa dibuat saat first-time setup.
                            </small>
                        <?php } ?>
                    </div>
                    <div class='form-group'>
                        <label>Password</label>  
                        <input type="password" name="password" class="form-control" required="">  
                    </div>  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>  
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
  
<div class='row'>  
</div>  
</section><!-- /.content -->  
</div><!-- /.content-wrapper -->  
  
<script>  
    $(function() {  
        // Toggle password visibility
        $('.toggle-password').click(function() {
            var target = $(this).data('target');
            var pwdText = $('#pwd-' + target);
            var pwdReal = $('#pwd-real-' + target);
            var icon = $(this).find('i');
            
            if (pwdText.is(':visible')) {
                pwdText.hide();
                pwdReal.show();
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
                $(this).attr('title', 'Sembunyikan Password');
            } else {
                pwdText.show();
                pwdReal.hide();
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
                $(this).attr('title', 'Lihat Password');
            }
        });
        
        $("#txtConfirmPassword").keyup(function() {
            var password = $("#txtNewPassword").val();
            $("#divCheckPasswordMatch").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
        });

        $('#form-tambah').submit(function(e) {
            e.preventDefault();  
            $.ajax({  
                type: 'POST',  
                url: 'mod_user/crud_user.php?pg=tambah',  
                data: $(this).serialize(),  
                success: function(data) {  
                    if (data == 'OK') {  
                        iziToast.success({  
                            title: 'Mantap!',  
                            message: 'Data Berhasil ditambahkan',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            window.location.reload();  
                        }, 2000);  
                        $('#tambahdata').modal('hide');  
                    } else if (data == 'error_admin') {
                        iziToast.error({  
                            title: 'Akses Ditolak!',  
                            message: 'Anda tidak memiliki akses untuk menambah Administrator',  
                            position: 'topRight'  
                        });
                    } else if (data == 'error_superadmin_not_allowed') {
                        iziToast.error({  
                            title: 'Tidak Diizinkan!',  
                            message: 'Super Admin hanya bisa dibuat saat first-time setup sistem',  
                            position: 'topRight'  
                        });
                    } else {  
                        iziToast.error({  
                            title: 'Maaf!',  
                            message: 'Data Gagal ditambahkan atau username sudah ada',  
                            position: 'topRight'  
                        });  
                    }  
                }  
            });  
            return false;  
        });  
  
        $('#table-1').on('click', '.hapus', function() {  
            var id = $(this).data('id');  
            console.log(id);  
            swal({  
                title: 'Are you sure?',  
                text: 'Akan menghapus data ini!',  
                icon: 'warning',  
                buttons: true,  
                dangerMode: true,  
            }).then((result) => {  
                if (result) {  
                    $.ajax({  
                        url: 'mod_user/crud_user.php?pg=hapus',  
                        method: "POST",  
                        data: 'id_user=' + id,  
                        success: function(data) {  
                            iziToast.success({  
                                title: 'Horee!',  
                                message: 'Data Berhasil dihapus',  
                                position: 'topRight'  
                            });  
                            setTimeout(function() {  
                                window.location.reload();  
                            }, 2000);  
                        }  
                    });  
                }  
            });  
        });  
  
        // Toggle Status  
        $('#table-1').on('click', '.toggle-status', function() {  
            var id = $(this).data('id');  
            $.ajax({  
                url: 'mod_user/crud_user.php?pg=toggle_status',  
                method: "POST",  
                data: 'id_user=' + id,  
                success: function(data) {  
                    if (data == 'OK') {  
                        iziToast.success({  
                            title: 'Berhasil!',  
                            message: 'Status user berhasil diubah',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            window.location.reload();  
                        }, 1000);  
                    } else {  
                        iziToast.error({  
                            title: 'Gagal!',  
                            message: 'Gagal mengubah status user',  
                            position: 'topRight'  
                        });  
                    }  
                }  
            });  
        });  
    });  
</script>  
