<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>  
<!-- Modal -->  
  
<div class="row">  
    <div class="col-12">  
        <div class="card">  
            <div class="card-header">  
                <h4>Data Berkas PPDB</h4>  
            </div>  
			  
            <div class="card-body">  
			<p>  
				<small>Jika Tulisan Terdapat<a class="btn btn-sm btn-success">Lihat Disini</a>. Siswa Sudah Mengupload Berkas</small></p>  
                <div class="table-responsive">  
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">  
                        <thead>  
                            <tr>  
                                <th class="text-center">  
                                    No  
                                </th>  
                                <th>Nama Pendaftar</th>  
                                <th>Status</th>  
                                <th>Kartu Keluarga</th>  
								<th>Ijazah/SKl</th>  
								<th>Akta</th>  
								<th>SKTM/KIP</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            <?php  
                            // Ambil NPSN sekolah operator dari variabel $user  
                            $id_sekolah = $user['id_sekolah'];  
  
                            // Query untuk mengambil data siswa yang berasal dari sekolah operator  
                            $query = mysqli_query($koneksi, "SELECT * FROM daftar WHERE npsn_asal = '$id_sekolah'");  
                            $no = 0;  
                            while ($daftar = mysqli_fetch_array($query)) {  
                                $no++;  
                            ?>  
                                <tr>  
                                    <td><?= $no; ?></td>  
                                    <td><?= $daftar['nama'] ?></td>  
                                    <td>  
                                        <?php if ($daftar['status'] == 1) { ?>  
                                            <span class="badge badge-success">Aktif</span>  
                                        <?php } else { ?>  
                                            <span class="badge badge-danger">Tidak Aktif</span>  
                                        <?php } ?>  
                                    </td>  
                                    <td>  
                                     <?php if ($daftar['kk'] <> null) { ?>  
                                         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Kartu Keluarga" href="../<?= $daftar['kk'] ?>" class="btn btn-sm btn-success">Lihat Disini</a>  
                                     <?php } ?>   
                                     </td>  
									 <td>  
									 <?php if ($daftar['ijazah'] <> null) { ?>  
                                         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Ijazah/SKl" href="../<?= $daftar['ijazah'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-address-card    "></i></a>  
                                     <?php } ?>   
                                    </td>  
									 <td>  
									 <?php if ($daftar['akta'] <> null) { ?>  
                                         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Akta Kelahiran" href="../<?= $daftar['akta'] ?>" class="btn btn-sm btn-warning"><i class="far fa-address-card    "></i></a>  
                                     <?php } ?>   
                                    </td>  
									 <td>  
									 <?php if ($daftar['kip'] <> null) { ?>  
                                         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="KIP/SKTM" href="../<?= $daftar['kip'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-envelope    "></i></a>  
                                     <?php } ?>   
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
    $(document).ready(function() {  
        // Hancurkan DataTable jika sudah ada  
        if ($.fn.DataTable.isDataTable('#table-1')) {  
            $('#table-1').DataTable().destroy();  
        }  
  
        // Inisialisasi DataTable  
        $('#table-1').DataTable({  
            "paging": true,  
            "lengthChange": true,  
            "searching": true,  
            "ordering": true,  
            "info": true,  
            "autoWidth": false,  
            "responsive": true  
        });  
    });  
</script>  
