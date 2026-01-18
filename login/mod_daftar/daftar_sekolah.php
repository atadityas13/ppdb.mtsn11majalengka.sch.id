<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>  
<!-- Modal -->  
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <form id="form-tambah">  
                <div class="modal-header">  
                    <h5 class="modal-title">Tambah Data Pendaftar</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    <div class="form-group">  
                        <label for="jenis">JENIS PENDAFTARAN</label>  
                        <select class="form-control" name="jenis" id="jenis">  
                            <option value="1">Siswa Baru</option>  
                            <option value="2">Pindahan</option>  
                        </select>  
                    </div>  
                    <div class="form-group">  
                        <label>NISN</label>  
                        <input type="text" name="nisn" class="form-control nisn" required="">  
                    </div>  
                    <div class="form-group">  
                        <label>Nama Pendaftar</label>  
                        <input type="text" name="nama" class="form-control" required="">  
                    </div>  
                    <div class="form-group">  
                        <label>Tempat Lahir</label>  
                        <input type="text" name="tempat_lahir" class="form-control" required="">  
                    </div>  
                    <div class="form-group">  
                        <label>Tanggal Lahir</label>  
                        <input type="date" name="tgl_lahir" class="form-control" required="">  
                    </div>  
                    <div class="form-group">  
                        <label>Jenis Kelamin</label>  
                        <select class="form-control" name="jenkel" id="jenkel" required>  
                            <option value="L">Laki-Laki</option>  
                            <option value="P">Perempuan</option>  
                        </select>  
                    </div>  
                    <div class="form-group">  
                        <label for="asal">Asal Sekolah</label>  
                        <select class="form-control" style="width: 100%" name="asal" id="asal" required>  
                            <option value="">Pilih Asal Sekolah</option>  
                            <?php  
                            $query = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE status='1'");  
                            while ($sekolah = mysqli_fetch_array($query)) {  
                            ?>  
                                <option value="<?= $sekolah['npsn'] ?>" <?= $sekolah['npsn'] == $user['id_sekolah'] ? 'selected' : '' ?>><?= $sekolah['nama_sekolah'] ?></option>  
                            <?php } ?>  
                        </select>  
                    </div>  
                    <div class="form-group">  
                        <label for="jurusan">Pilihan Program</label>  
                        <select class="form-control" name="jurusan" id="jurusan" required>  
                            <option value="">Pilih Program</option>  
                            <?php  
                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE status='1'");  
                            while ($jurusan = mysqli_fetch_array($query)) {  
                            ?>  
                                <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>  
                            <?php } ?>  
                        </select>  
                    </div>  
                    <div class="form-group">  
                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>  
                        <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>  
                    </div>  
                    <div class="form-group">  
                        <label>No HP</label>  
                        <input type="text" name="nohp" class="form-control nohp" required="">  
                    </div>  
                    <!-- Menambahkan input asal_sekolah dan npsn_asal -->  
                    <input type="hidden" name="npsn_asal" value="<?= $user['id_sekolah'] ?>">  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                    <button type="submit" class="btn btn-primary">Simpan</button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
  
<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <form id="form-konfirmasi">  
                <div class="modal-header">  
                    <h5 class="modal-title">Hapus Data Pendaftar</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    Terdapat <b><?= rowcount($koneksi, 'daftar WHERE npsn_asal = ' . $user['id_sekolah']) ?></b> Jumlah data Pendaftar Akan Di Hapus.  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                    <button type="submit" class="btn btn-primary">Hapus Semua</button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
  
<div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <form id="form-import">  
                <div class="modal-header">  
                    <h5 class="modal-title">Impor Data</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    <div class="form-group">  
                        <label for="file">Impor File Excel</label>  
                        <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>  
                        <small id="helpfile" class="form-text text-muted">File harus .xls</small>  
                    </div>  
                    <p><a href="template_excel/importdaftar.xls">Unduh Format</a></p>  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>  
                    <button type="submit" class="btn btn-primary">Simpan</button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
  
<div class="row">  
    <div class="col-12">  
        <div class="card">  
            <div class="card-header">  
                <h4>Data Pendaftar</h4>  
                <div class="card-header-action">  
                    <a class="btn btn-primary" href="mod_daftar/export_excel.php" role="button">Download Excel</a>  
                    <button type="button" class="btn btn-icon icon-left btn-info" data-toggle="modal" data-target="#tambahdata">  
                        <i class="far fa-edit"></i> Tambah Data  
                    </button>  
                </div>  
            </div>  
            <div class="card-body">  
                <div class="table-responsive">  
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">  
                        <thead>  
                            <tr>  
                                <th class="text-center">No</th>  
                                <th>NISN</th>  
                                <th>Password</th>  
                                <th>Nama Pendaftar</th>  
                                <th>L/P</th>  
                                <th>No Hp</th>  
                                <th>Status</th>  
                                <th>Aksi</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            <?php  
                            $id_sekolah = $user['id_sekolah'];  
                            $query = mysqli_query($koneksi, "SELECT * FROM daftar WHERE npsn_asal = '$id_sekolah'");  
                            $no = 0;  
                            while ($daftar = mysqli_fetch_array($query)) {  
                                $no++;  
                            ?>  
                                <tr>  
                                    <td><?= $no; ?></td>  
                                    <td><?= $daftar['nisn'] ?></td>  
                                    <td>
                                        <span class="password-display" style="font-family: monospace;">******</span>
                                        <i class="fas fa-eye toggle-password" 
                                           style="cursor: pointer; margin-left: 5px; color: #6777ef;" 
                                           data-password="<?= htmlspecialchars($daftar['remember_token_uuid'] ?? $daftar['password']) ?>"
                                           title="Tampilkan/Sembunyikan password"></i>
                                    </td>  
                                    <td><?= $daftar['nama'] ?></td>  
                                    <td><?= $daftar['jenkel'] ?></td>  
                                    <td>  
                                        <i class="fab fa-whatsapp text-success"></i>  
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">  
                                            <?= $daftar['no_hp'] ?></a>  
                                    </td>  
                                    <td>  
                                        <?php if ($daftar['status'] == 1) { ?>  
                                            <span class="badge badge-success">Diterima</span>  
                                        <?php } elseif ($daftar['status'] == 2) { ?>  
                                            <span class="badge badge-danger">Dicadangkan</span>  
                                        <?php } else { ?>  
                                            <span class="badge badge-warning">Diverifikasi</span>  
                                        <?php } ?>  
                                    </td>  
                                    <td>  
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=ubahdaftar&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>  
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak" href="mod_daftar/print_daftar.php?id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-print"></i></a>  
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">  
                                            <i class="fas fa-edit"></i>  
                                        </button>  
                                        <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>  
                                        <!-- Modal Edit -->  
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
                                                            <input type="hidden" value="<?= $daftar['id_daftar'] ?>" name="id_daftar" class="form-control" required="">  
                                                            <div class="form-group">  
                                                                <label>NISN</label>  
                                                                <input type="text" value="<?= $daftar['nisn'] ?>" name="nisn" class="form-control nisn" readonly>  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Nama Siswa</label>  
                                                                <input type="text" value="<?= $daftar['nama'] ?>" name="nama" class="form-control">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Tempat Lahir</label>  
                                                                <input type="text" value="<?= $daftar['tempat_lahir'] ?>" name="tempat_lahir" class="form-control">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Tanggal Lahir</label>  
                                                                <input type="date" value="<?= $daftar['tgl_lahir'] ?>" name="tgl_lahir" class="form-control">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Sekolah Asal</label>  
                                                                <input type="text" value="<?= $daftar['asal_sekolah'] ?>" name="asal" class="form-control" readonly>  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>NPSN Sekolah</label>  
                                                                <input type="text" value="<?= $daftar['npsn_asal'] ?>" name="npsn_asal" class="form-control" readonly>  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>No HP</label>  
                                                                <input type="number" value="<?= $daftar['no_hp'] ?>" name="no_hp" class="form-control">  
                                                            </div>  
                                                            <div class="form-group">  
                                                                <label>Jenis Kelamin</label>  
                                                                <select class="form-control" name="jenkel" id="jenkel" required>  
                                                                    <option value="L" <?= $daftar['jenkel'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>  
                                                                    <option value="P" <?= $daftar['jenkel'] == 'P' ? 'selected' : '' ?>>Perempuan</option>  
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
                                  
                            <?php }  
                            ?>  
                        </tbody>  
                    </table>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
<script>  
    // IMPORT FILE PENDUKUNG       
    $('#form-import').on('submit', function(e) {  
        e.preventDefault();  
        $.ajax({  
            type: 'post',  
            url: 'mod_siswa/crud_siswa.php?pg=import2',  
            data: new FormData(this),  
            processData: false,  
            contentType: false,  
            cache: false,  
            beforeSend: function() {  
                $('form button').on("click", function(e) {  
                    e.preventDefault();  
                });  
            },  
            success: function(data) {  
                $('#importdata').modal('hide');  
                iziToast.success({  
                    title: 'Mantap!',  
                    message: data,  
                    position: 'topRight'  
                });  
                setTimeout(function() {  
                    window.location.reload();  
                }, 2000);  
            }  
        });  
    });  
  
    var cleaveI = new Cleave('.nisn', {  
        blocks: [10]  
    });  
  
    var cleaveI = new Cleave('.nohp', {  
        blocks: [4, 4, 4, 5]  
    });  
  
    $('#form-tambah').submit(function(e) {  
        e.preventDefault();  
        $.ajax({  
            type: 'POST',  
            url: 'mod_daftar/crud_daftar.php?pg=tambah',  
            data: $(this).serialize(),  
            beforeSend: function() {  
                $('form button').on("click", function(e) {  
                    e.preventDefault();  
                });  
            },  
            success: function(data) {  
                iziToast.success({  
                    title: 'Mantap!',  
                    message: 'data berhasil disimpan',  
                    position: 'topRight'  
                });  
                setTimeout(function() {  
                    window.location.reload();  
                }, 2000);  
                $('#tambahdata').modal('hide');  
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
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',  
                    method: "POST",  
                    data: 'id_daftar=' + id,  
                    success: function(data) {  
                        iziToast.error({  
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
  
    $('#form-konfirmasi').submit(function(e) {  
        e.preventDefault();  
        swal({  
            title: 'Apa kamu yakin ?',  
            text: 'Akan Menghapus data anda ?',  
            icon: 'warning',  
            buttons: true,  
            dangerMode: true,  
        }).then((result) => {  
            if (result) {  
                $.ajax({  
                    url: 'mod_daftar/crud_daftar.php?pg=konfirmasi',  
                    method: "POST",  
                    data: $(this).serialize(),  
                    success: function(data) {  
                        iziToast.success({  
                            title: 'Terimakasih!',  
                            message: 'Data Berhasil di Hapus',  
                            position: 'topRight'  
                        });  
                        setTimeout(function() {  
                            window.location.reload();  
                        }, 1000);  
                    }  
                });  
            }  
        });  
    });  
  
    // Toggle password visibility untuk tabel Data Pendaftar
    $('.toggle-password').click(function() {
        var icon = $(this);
        var passwordSpan = icon.siblings('.password-display');
        var actualPassword = icon.data('password');
        
        if (passwordSpan.text() === '******') {
            passwordSpan.text(actualPassword);
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordSpan.text('******');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Handle all edit forms with event delegation
    $(document).on('submit', '[id^="form-edit"]', function(e) {
        e.preventDefault();
        var form = $(this);
        var modalId = form.closest('.modal').attr('id');
        
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=status',
            data: form.serialize(),
            success: function(data) {
                iziToast.success({
                    title: 'OKee!',
                    message: 'Status Berhasil diubah',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#' + modalId).modal('hide');
            }
        });
        return false;
    });

    // Otomatis isi asal sekolah dan npsn_asal dengan sekolah operator  
    $(document).ready(function() {  
        var id_sekolah = '<?= $user['id_sekolah'] ?>';  
  
        // Set asal sekolah  
        $('#asal').val(id_sekolah);  
  
        // Disable asal sekolah agar tidak bisa diubah  
        $('#asal').prop('disabled', true);  
  
        // Tambahkan input npsn_asal dengan nilai id_sekolah  
        $('#form-tambah').append('<input type="hidden" name="npsn_asal" value="' + id_sekolah + '">');  
        $('#form-tambah').append('<input type="hidden" name="asal_sekolah" value="' + nama_sekolah + '">');  
    });  
</script>  
