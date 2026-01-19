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
                    
                    Terdapat <b><?= rowcount($koneksi, 'daftar') ?></b> Jumlah data Pendaftar Akan Di Hapus.
                    

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
                    <a class="btn btn-primary" href="mod_daftar/export_excel.php" role="button"> Unduh Excel</a>
                    <button type="button" class="btn btn-icon icon-left btn-info" data-toggle="modal" data-target="#tambahdata">
                        <i class="far fa-edit"></i> Tambah Data
                    </button>
					<!--<button type="button" class="btn btn-danger m-b-5" data-toggle="modal" data-target="#importdata"><i class="sidebar-item-icon fa fa-upload"></i>
					Import Data
					</button>-->
					<button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#hapusdata">
                        <i class="fa fa-trash"></i> Hapus Data
                    </button>
                    <button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#modalStatistik">
                        <i class="fas fa-chart-bar"></i> Statistik
                    </button>
                    <a href="mod_laporan/print_daftar.php" target="_blank" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-print"></i> Cetak Laporan PPDB
                    </a>
					 
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from daftar");
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
                                    <td><?= $daftar['asal_sekolah'] ?></td>
                                    <td><?= $daftar['jenkel'] ?></td>
                                    <td>
                                        <i class="fab fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima kasih telah mendaftar di <?= $setting['nama_sekolah'] ?>. Silahkan Login untuk melengkapi formulir pendaftaran dengan username *<?= $daftar['nisn'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>
                                   
                                    <td>
                                        <?php if ($daftar['status'] == 1) { ?>
                                            <span class="badge badge-success badge-status" style="cursor: pointer;"
                                                  data-id="<?= $daftar['id_daftar'] ?>" 
                                                  data-nisn="<?= $daftar['nisn'] ?>" 
                                                  data-nama="<?= $daftar['nama'] ?>"
                                                  data-current="1">Diterima</span>
                                        <?php } elseif ($daftar['status'] == 2) { ?>
                                            <span class="badge badge-danger badge-status" style="cursor: pointer;"
                                                  data-id="<?= $daftar['id_daftar'] ?>" 
                                                  data-nisn="<?= $daftar['nisn'] ?>" 
                                                  data-nama="<?= $daftar['nama'] ?>"
                                                  data-current="2">Dicadangkan</span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning badge-status" style="cursor: pointer;"
                                                  data-id="<?= $daftar['id_daftar'] ?>" 
                                                  data-nisn="<?= $daftar['nisn'] ?>" 
                                                  data-nama="<?= $daftar['nama'] ?>"
                                                  data-current="0">Diverifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=ubahdaftar&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-info"><i class="fas fa-file-alt"></i></a>
                                        <!-- Dropdown Cetak -->
                                        <div class="btn-group" role="group">
                                            <button id="btnCetak<?= $no ?>" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnCetak<?= $no ?>">
                                                <a class="dropdown-item" href="mod_daftar/print_daftar.php?id=<?= enkripsi($daftar['id_daftar']) ?>" target="_blank"><i class="fas fa-file-alt"></i> Formulir</a>
                                                <a class="dropdown-item" href="mod_daftar/pernyataan.php?id=<?= enkripsi($daftar['id_daftar']) ?>" target="_blank"><i class="fas fa-file-signature"></i> Pernyataan</a>
                                            </div>
                                        </div>
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
                                                            <h5 class="modal-title">Ubah Data</h5>
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
																<label>Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
																<input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
																<small class="form-text text-muted">Password akan diubah hanya jika field ini diisi</small>
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
                                            url: 'mod_daftar/crud_daftar.php?pg=update_full',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                iziToast.success({
                                                    title: 'Berhasil!',
                                                    message: 'Data siswa berhasil diubah',
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

<!-- Modal Statistik -->
<div class="modal fade" id="modalStatistik" tabindex="-1" role="dialog" aria-labelledby="modalStatistikLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatistikLabel">Statistik Data Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <h6 class="text-primary mb-2">Statistik Jenis Kelamin</h6>
                    <table class="table table-bordered table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Laki-laki</th>
                                <th class="text-center">Perempuan</th>
                                <th class="text-center">Jumlah</th>
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
                
                <div>
                    <h6 class="text-primary mb-2">Statistik Status</h6>
                    <table class="table table-bordered table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Diverifikasi</th>
                                <th class="text-center">Diterima</th>
                                <th class="text-center">Dicadangkan</th>
                                <th class="text-center">Jumlah</th>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                    title: 'Berhasil!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
    
    // Handle klik pada badge status dengan SweetAlert
    $('#table-1').on('click', '.badge-status', function() {
        var badge = $(this);
        var id_daftar = badge.data('id');
        var nisn = badge.data('nisn');
        var nama = badge.data('nama');
        var currentStatus = badge.data('current');
        
        // Buat pilihan status dalam bentuk HTML
        var statusOptions = '<select id="status-select" class="swal2-input" style="width: 80%; padding: 10px;">' +
                          '<option value="0" ' + (currentStatus == 0 ? 'selected' : '') + '>Diverifikasi</option>' +
                          '<option value="1" ' + (currentStatus == 1 ? 'selected' : '') + '>Diterima</option>' +
                          '<option value="2" ' + (currentStatus == 2 ? 'selected' : '') + '>Dicadangkan</option>' +
                          '</select>';
        
        // SweetAlert dengan dropdown
        swal({
            title: 'Ubah Status Siswa',
            text: 'Pilih status untuk ' + nama + ' (' + nisn + ')',
            content: {
                element: "div",
                attributes: {
                    innerHTML: statusOptions
                }
            },
            buttons: {
                cancel: 'Batal',
                confirm: 'Ya, Ubah!'
            },
            icon: 'warning',
        }).then((willChange) => {
            if (willChange) {
                var newStatus = $('#status-select').val();
                
                // Jika tidak ada perubahan
                if (newStatus == currentStatus) {
                    iziToast.info({
                        title: 'Info',
                        message: 'Status tidak berubah',
                        position: 'topRight'
                    });
                    return;
                }
                
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
                            message: 'Status berhasil diubah',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function() {
                        iziToast.error({
                            title: 'Error!',
                            message: 'Gagal mengubah status',
                            position: 'topRight'
                        });
                    }
                });
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
                    title: 'Berhasil!',
                    message: 'Data berhasil disimpan',
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
            title: 'Apakah Anda yakin?',
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
                            title: 'Berhasil!',
                            message: 'Data berhasil dihapus',
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
            title: 'Apakah Anda yakin?',
            text: 'Akan menghapus data Anda?',
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
                            title: 'Berhasil!',
                            message: 'Data berhasil dihapus',
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

    // Script untuk modal edit universal
    $('.btn-edit-daftar').on('click', function() {
        var id = $(this).data('id');
        var nisn = $(this).data('nisn');
        var nama = $(this).data('nama');
        var tempat = $(this).data('tempat');
        var tgl = $(this).data('tgl');
        var jenkel = $(this).data('jenkel');
        var asal = $(this).data('asal');
        var npsn = $(this).data('npsn');
        var hp = $(this).data('hp');
        var status = $(this).data('status');

        $('#modal-edit-universal-daftar input[name="id_daftar"]').val(id);
        $('#modal-edit-universal-daftar input[name="nisn"]').val(nisn);
        $('#modal-edit-universal-daftar input[name="nama"]').val(nama);
        $('#modal-edit-universal-daftar input[name="tempat_lahir"]').val(tempat);
        $('#modal-edit-universal-daftar input[name="tgl_lahir"]').val(tgl);
        $('#modal-edit-universal-daftar select[name="jenkel"]').val(jenkel);
        $('#modal-edit-universal-daftar input[name="asal"]').val(asal);
        $('#modal-edit-universal-daftar input[name="npsn_asal"]').val(npsn);
        $('#modal-edit-universal-daftar input[name="no_hp"]').val(hp);
        $('#modal-edit-universal-daftar input[name="password"]').val('');
        $('#modal-edit-universal-daftar input[name="status"][value="' + status + '"]').prop('checked', true);
    });

    $('#form-edit-universal-daftar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=update_full',
            data: $(this).serialize(),
            success: function(data) {
                iziToast.success({
                    title: 'Berhasil!',
                    message: 'Data siswa berhasil diubah',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#modal-edit-universal-daftar').modal('hide');
            }
        });
        return false;
    });
</script>

<!-- Modal Edit Universal -->
<div class="modal fade" id="modal-edit-universal-daftar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="z-index: 99999 !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-universal-daftar">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_daftar" class="form-control" required="">
                    
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control nisn">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenkel" required>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sekolah Asal</label>
                        <input type="text" name="asal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NPSN Sekolah</label>
                        <input type="text" name="npsn_asal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="number" name="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                        <small class="form-text text-muted">Password akan diubah hanya jika field ini diisi</small>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>