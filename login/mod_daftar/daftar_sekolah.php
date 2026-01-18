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
                                        <button type="button" class="btn btn-sm btn-primary btn-edit-siswa" 
                                            data-id="<?= $daftar['id_daftar'] ?>"
                                            data-nisn="<?= htmlspecialchars($daftar['nisn']) ?>"
                                            data-nama="<?= htmlspecialchars($daftar['nama']) ?>"
                                            data-tempat="<?= htmlspecialchars($daftar['tempat_lahir']) ?>"
                                            data-tgl="<?= $daftar['tgl_lahir'] ?>"
                                            data-asal="<?= htmlspecialchars($daftar['asal_sekolah']) ?>"
                                            data-npsn="<?= $daftar['npsn_asal'] ?>"
                                            data-nohp="<?= $daftar['no_hp'] ?>"
                                            data-jenkel="<?= $daftar['jenkel'] ?>">  
                                            <i class="fas fa-edit"></i>  
                                        </button>  
                                        <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>  
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

<!-- Modal Edit Universal - Dipindahkan keluar dari tabel -->
<div class="modal fade" id="modal-edit-universal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="z-index: 10060 !important;">  
    <div class="modal-dialog" role="document" style="z-index: 10065 !important;">  
        <div class="modal-content" style="z-index: 10070 !important;">  
            <form id="form-edit-universal">  
                <div class="modal-header">  
                    <h5 class="modal-title">Ubah Data</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    <input type="hidden" id="edit-id-daftar" name="id_daftar" class="form-control" required="">  
                    <div class="form-group">  
                        <label>NISN</label>  
                        <input type="text" id="edit-nisn" name="nisn" class="form-control nisn" readonly>  
                    </div>  
                    <div class="form-group">  
                        <label>Nama Siswa</label>  
                        <input type="text" id="edit-nama" name="nama" class="form-control">  
                    </div>  
                    <div class="form-group">  
                        <label>Tempat Lahir</label>  
                        <input type="text" id="edit-tempat" name="tempat_lahir" class="form-control">  
                    </div>  
                    <div class="form-group">  
                        <label>Tanggal Lahir</label>  
                        <input type="date" id="edit-tgl" name="tgl_lahir" class="form-control">  
                    </div>  
                    <div class="form-group">  
                        <label>Sekolah Asal</label>  
                        <input type="text" id="edit-asal" name="asal" class="form-control" readonly>  
                    </div>  
                    <div class="form-group">  
                        <label>NPSN Sekolah</label>  
                        <input type="text" id="edit-npsn" name="npsn_asal" class="form-control" readonly>  
                    </div>  
                    <div class="form-group">  
                        <label>No HP</label>  
                        <input type="number" id="edit-nohp" name="no_hp" class="form-control">  
                    </div>  
                    <div class="form-group">  
                        <label>Jenis Kelamin</label>  
                        <select class="form-control" id="edit-jenkel" name="jenkel" required>  
                            <option value="L">Laki-Laki</option>  
                            <option value="P">Perempuan</option>  
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
  
<script>
    // Handle klik tombol edit - isi modal dengan data dari button
    $(document).on('click', '.btn-edit-siswa', function() {
        var id = $(this).data('id');
        var nisn = $(this).data('nisn');
        var nama = $(this).data('nama');
        var tempat = $(this).data('tempat');
        var tgl = $(this).data('tgl');
        var asal = $(this).data('asal');
        var npsn = $(this).data('npsn');
        var nohp = $(this).data('nohp');
        var jenkel = $(this).data('jenkel');
        
        $('#edit-id-daftar').val(id);
        $('#edit-nisn').val(nisn);
        $('#edit-nama').val(nama);
        $('#edit-tempat').val(tempat);
        $('#edit-tgl').val(tgl);
        $('#edit-asal').val(asal);
        $('#edit-npsn').val(npsn);
        $('#edit-nohp').val(nohp);
        $('#edit-jenkel').val(jenkel);
        
        // Paksa z-index backdrop juga
        $('#modal-edit-universal').modal('show');
        setTimeout(function() {
            $('.modal-backdrop').css('z-index', '10050');
            $('#modal-edit-universal').css('z-index', '10060');
        }, 100);
    });
    
    // Handle submit form edit universal
    $('#form-edit-universal').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_daftar/crud_daftar.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').attr('disabled', 'disabled');
            },
            success: function(data) {
                $('form button').removeAttr('disabled');
                $('#modal-edit-universal').modal('hide');
                iziToast.success({
                    title: 'Berhasil!',
                    message: 'Data berhasil diubah',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 1500);
            },
            error: function(data) {
                $('form button').removeAttr('disabled');
                iziToast.error({
                    title: 'Gagal!',
                    message: 'Terjadi kesalahan',
                    position: 'topRight'
                });
            }
        });
    });

 //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_siswa.php?pg=import2',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
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
                //$('#bodyreset').load(location.href + ' #bodyreset');
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
        })

    });
</script>
<script>
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
</script>
<script>
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
        })

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
    var id_sekolah = '<?= $user['id_sekolah'] ?>';  
  
    // Set asal sekolah  
    $('#asal').val(id_sekolah);  
  
    // Disable asal sekolah agar tidak bisa diubah  
    $('#asal').prop('disabled', true);  
  
    // Tambahkan input npsn_asal dengan nilai id_sekolah  
    $('#form-tambah').append('<input type="hidden" name="npsn_asal" value="' + id_sekolah + '">');  
    $('#form-tambah').append('<input type="hidden" name="asal_sekolah" value="' + nama_sekolah + '">');
</script>  
