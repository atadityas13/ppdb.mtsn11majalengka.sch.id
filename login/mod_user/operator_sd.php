<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <h1>Akun Operator SD</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Akun Operator SD</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Sekolah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT u.*, s.nama_sekolah 
                                                              FROM user u 
                                                              LEFT JOIN sekolah s ON u.id_sekolah = s.npsn 
                                                              WHERE u.level='operator_sd' 
                                                              ORDER BY u.id_user DESC");
                            $no = 0;
                            while ($user = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $user['nama_user'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td>
                                        <span class="password-text" id="pwd-<?= $no ?>">******</span>
                                        <span class="password-hidden" id="pwd-real-<?= $no ?>" style="display:none;"><?= $user['password'] ?></span>
                                        <button type="button" class="btn btn-sm btn-outline-secondary toggle-password" data-target="<?= $no ?>" title="Lihat Password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                    <td><?= $user['nama_sekolah'] ?? 'Tidak ada' ?></td>
                                    <td>
                                        <?php if ($user['status'] == 0) { ?>
                                            <span class="badge badge-warning">
                                                <i class="fas fa-clock"></i> Menunggu Verifikasi
                                            </span>
                                        <?php } elseif ($user['status'] == 1) { ?>
                                            <span class="badge badge-success">
                                                <i class="fas fa-check-circle"></i> Aktif
                                            </span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times-circle"></i> Non Aktif
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button data-id="<?= $user['id_user'] ?>" class="hapus btn-sm btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Data Operator SD</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" class="form-control" required>

                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" value="<?= $user['nama_user'] ?>" name="nama_user" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" value="<?= $user['username'] ?>" name="username" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Sekolah</label>
                                                                <select class="form-control select2" name="id_sekolah" required>
                                                                    <option value="">Pilih Sekolah</option>
                                                                    <?php
                                                                    $sekolah_query = mysqli_query($koneksi, "SELECT * FROM sekolah ORDER BY nama_sekolah ASC");
                                                                    while ($sekolah = mysqli_fetch_array($sekolah_query)) {
                                                                    ?>
                                                                        <option value="<?= $sekolah['npsn'] ?>" <?= $user['id_sekolah'] == $sekolah['npsn'] ? 'selected' : '' ?>>
                                                                            <?= $sekolah['nama_sekolah'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                                                                <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                                                                <small class="form-text text-muted">Password akan diubah hanya jika field ini diisi</small>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control" name="status" required>
                                                                    <option value="0" <?= $user['status'] == 0 ? 'selected' : '' ?>>Menunggu Verifikasi</option>
                                                                    <option value="1" <?= $user['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
                                                                    <option value="2" <?= $user['status'] == 2 ? 'selected' : '' ?>>Non Aktif</option>
                                                                </select>
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
                                            url: 'mod_user/crud_operator.php?pg=ubah',
                                            data: $(this).serialize(),
                                            success: function(data) {
                                                iziToast.success({
                                                    title: 'Berhasil!',
                                                    message: 'Data operator berhasil diubah',
                                                    position: 'topRight'
                                                });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
           Toggle password visibility
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
        
        //  </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Delete operator
        $('.hapus').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data operator akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'mod_user/crud_operator.php?pg=hapus',
                        data: {
                            id_user: id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Data operator berhasil dihapus.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    });
                }
            });
        });

        // Initialize Select2
        $('.select2').select2({
            dropdownParent: $('.modal')
        });
    });
</script>
