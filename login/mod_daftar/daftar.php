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
                        <select class="form-control" name="jenkel" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="asal">Asal Sekolah</label>
                        <select class="form-control" style="width: 100%" name="asal" id="asal" required>
                            <option value="">Pilih Asal Sekolah</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from sekolah where status='1'");
                            while ($sekolah = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Pilihan Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jurusan where status='1'");
                            while ($jurusan = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['id_jurusan'] ?> <?= $jurusan['nama_jurusan'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control nohp">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
                    
                    Terdapat <b><?= rowcount($koneksi, 'daftar') ?></b> Jumlah data Pendaftar Akan Di Hapus.
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <h5 class="modal-title">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Import File Excel</label>
                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                            <small id="helpfile" class="form-text text-muted">File harus .xls</small>
                        </div>
                       
               			<p><a href="template_excel/importdaftar.xls">Download Format</a></p>
				
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
                    <a class="btn btn-primary" href="mod_daftar/export_excel.php" role="button"> Download Excel</a>
                    <button type="button" class="btn btn-icon icon-left btn-info" data-toggle="modal" data-target="#tambahdata">
                        <i class="far fa-edit"></i> Tambah Data
                    </button>
					<!--<button type="button" class="btn btn-danger m-b-5" data-toggle="modal" data-target="#importdata"><i class="sidebar-item-icon fa fa-upload"></i>
					Import Data
					</button>-->
					<button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#hapusdata">
                        <i class="fa fa-trash"></i> Hapus Data
                    </button>
					 
	</div>
	
            </div>
			
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                </th>
                                <th>NISN</th>
								<th>Password</th>
                                <th>Nama Pendaftar</th>
                                <th>Sekolah Asal</th>
                                <th>L/P</th>
                                <th>No Hp</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from daftar");
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                                $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' "));
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $daftar['nisn'] ?></td>
									 <td><?= $daftar['password'] ?></td>
                                    <td><?= $daftar['nama'] ?></td>
                                    <td><?= $daftar['asal_sekolah'] ?></td>
                                    <td><?= $daftar['jenkel'] ?></td>
                                    <td>
                                        <i class="fab fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>
                                   
                                    <td>
                                        <select class="form-control form-control-sm status-dropdown" data-id="<?= $daftar['id_daftar'] ?>" data-nisn="<?= $daftar['nisn'] ?>" data-nama="<?= $daftar['nama'] ?>">
                                            <option value="0" <?= $daftar['status'] == 0 ? 'selected' : '' ?>>Diverifikasi</option>
                                            <option value="1" <?= $daftar['status'] == 1 ? 'selected' : '' ?>>Diterima</option>
                                            <option value="2" <?= $daftar['status'] == 2 ? 'selected' : '' ?>>Dicadangkan</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=ubahdaftar&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-info"><i class="fas fa-file-alt"></i></a>
                                        <!-- Button trigger modal -->
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak" href="mod_daftar/print_daftar.php?id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-print    "></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fas fa-edit    "></i>
                                        </button>
                                        </button>
                                        <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                            <input type="hidden" value="<?= $daftar['id_daftar'] ?>" name="id_daftar" class="form-control" required="">
															
															<div class="form-group">
															<label>NISN</label>
															<input type="text"  value="<?= $daftar['nisn'] ?>" name="nisn" class="form-control nisn" ="">
															</div>
															<div class="form-group">
															<label>Nama Siswa</label>
															<input type="text"  value="<?= $daftar['nama'] ?>" name="nama" class="form-control" ="">
															</div>

														   <div class="form-group">
																<label>Tempat Lahir</label>
															<input type="text"  value="<?= $daftar['tempat_lahir'] ?>" name="tempat_lahir" class="form-control" ="">
															</div>
															<div class="form-group">
																<label>Tanggal Lahir</label>
															<input type="date"  value="<?= $daftar['tgl_lahir'] ?>" name="tgl_lahir" class="form-control" ="">
															</div>
															
															<div class="form-group">
																<label>Jenis Kelamin</label>
																<select class="form-control" name="jenkel" required>
																	<option value="L" <?= $daftar['jenkel'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
																	<option value="P" <?= $daftar['jenkel'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
																</select>
															</div>
															
															<div class="form-group">
															<label>Sekolah Asal</label>
															<input type="text"  value="<?= $daftar['asal_sekolah'] ?>" name="asal" class="form-control" ="">
															</div>
															<div class="form-group">
															<label>NPSN Sekolah</label>
															<input type="text"  value="<?= $daftar['npsn_asal'] ?>" name="npsn_asal" class="form-control" ="">
															</div>
															<div class="form-group">
															<label>No HP</label>
															<input type="number"  value="<?= $daftar['no_hp'] ?>" name="no_hp" class="form-control" ="">
															</div>
															
                                                            <div class="form-group">
                                                                <div class="control-label">Pilih Status</div>
                                                                <div class="custom-switches-stacked mt-2">
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="0" class="custom-switch-input" checked>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Diverifikasi</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="1" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Diterima</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="2" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Dicadangkan</span>
                                                                    </label>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
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
                                            url: 'mod_daftar/crud_daftar.php?pg=status',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                iziToast.success({
                                                    title: 'OKee!',
                                                    message: 'Status Berhasil diubah',
                                                    position: 'topRight'
                                                });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
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
            </div>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Statistik Jenis Kelamin</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Laki-laki</th>
                                <th>Perempuan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $laki = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM daftar WHERE jenkel='L'"));
                            $perempuan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM daftar WHERE jenkel='P'"));
                            $total_gender = $laki + $perempuan;
                            ?>
                            <tr>
                                <td class="text-center"><strong><?= $laki ?></strong></td>
                                <td class="text-center"><strong><?= $perempuan ?></strong></td>
                                <td class="text-center"><strong><?= $total_gender ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Statistik Status</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Diverifikasi</th>
                                <th>Diterima</th>
                                <th>Dicadangkan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $diverifikasi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM daftar WHERE status='0'"));
                            $diterima = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM daftar WHERE status='1'"));
                            $dicadangkan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM daftar WHERE status='2'"));
                            $total_status = $diverifikasi + $diterima + $dicadangkan;
                            ?>
                            <tr>
                                <td class="text-center"><strong><?= $diverifikasi ?></strong></td>
                                <td class="text-center"><strong><?= $diterima ?></strong></td>
                                <td class="text-center"><strong><?= $dicadangkan ?></strong></td>
                                <td class="text-center"><strong><?= $total_status ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
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
    
    // Handle perubahan status dropdown dengan konfirmasi
    $('.status-dropdown').on('change', function() {
        var dropdown = $(this);
        var id_daftar = dropdown.data('id');
        var nisn = dropdown.data('nisn');
        var nama = dropdown.data('nama');
        var newStatus = dropdown.val();
        var statusText = dropdown.find('option:selected').text();
        var oldStatus = dropdown.data('old-status') || dropdown.find('option:selected').data('original');
        
        // Simpan status awal jika belum ada
        if (typeof dropdown.data('old-status') === 'undefined') {
            dropdown.data('old-status', dropdown.find('option:not(:selected)').first().val());
        }
        
        // Konfirmasi perubahan status
        if (confirm('Apakah Anda yakin ingin mengubah status siswa ' + nama + ' (' + nisn + ') menjadi ' + statusText + '?')) {
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_daftar.php?pg=update_status',
                data: {
                    id_daftar: id_daftar,
                    status: newStatus
                },
                success: function(response) {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Status berhasil diubah menjadi ' + statusText,
                        position: 'topRight'
                    });
                    dropdown.data('old-status', newStatus);
                },
                error: function() {
                    iziToast.error({
                        title: 'Error!',
                        message: 'Gagal mengubah status',
                        position: 'topRight'
                    });
                    // Kembalikan ke status sebelumnya jika gagal
                    dropdown.val(dropdown.data('old-status'));
                }
            });
        } else {
            // Kembalikan ke status sebelumnya jika dibatalkan
            dropdown.val(dropdown.data('old-status'));
        }
    });
    
    // Simpan status awal setiap dropdown saat halaman dimuat
    $('.status-dropdown').each(function() {
        $(this).data('old-status', $(this).val());
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

    // Toggle input manual untuk sekolah lainnya - Form Admin
    $('#asal-admin').change(function() {
        if ($(this).val() === 'LAINNYA') {
            $('#input-sekolah-manual-admin').slideDown();
            $('#asal_manual_admin').prop('required', true);
        } else {
            $('#input-sekolah-manual-admin').slideUp();
            $('#asal_manual_admin').prop('required', false).val('');
        }
    });
</script>