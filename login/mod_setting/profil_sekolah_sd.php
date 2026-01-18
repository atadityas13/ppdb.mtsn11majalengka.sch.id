<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>  
<div class='row'>  
    <div class='col-md-12'>  
        <div class='card'>  
            <div class='card-header'>  
                <h4><i class='fas fa-school'></i> Data Sekolah</h4>  
            </div>
            <div class='card-body'>  
                <?php  
                $id_sekolah = $user['id_sekolah'];  
                $sekolah_query = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE npsn = '$id_sekolah'");  
                $sekolah = mysqli_fetch_array($sekolah_query);  
                ?>  
                <form id="form-sekolah">  
                    <input type="hidden" name="npsn" value="<?= $sekolah['npsn'] ?>">  
                    <div class="form-group">  
                        <label>NPSN</label>  
                        <input type="text" name="npsn" value="<?= $sekolah['npsn'] ?>" class="form-control" readonly>  
                    </div>  
                    <div class="form-group">  
                        <label>Nama Sekolah</label>  
                        <input type="text" name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>" class="form-control" required="" readonly>  
                    </div>
                    <div class="form-group">  
                        <label>Nama Operator</label>  
                        <input type="text" value="<?= $user['nama_user'] ?>" class="form-control" readonly>  
                    </div>
                    <div class="form-group">  
                        <label>Kontak</label>  
                        <input type="text" name="kontak" value="<?= isset($sekolah['kontak']) ? $sekolah['kontak'] : '' ?>" class="form-control" required="">  
                    </div>  
                    <div class="form-group">  
                        <label>Alamat</label>  
                        <textarea name="alamat" class="form-control" rows="4" required=""><?= $sekolah['alamat'] ?></textarea>  
                    </div>  
                    <div class="form-group">  
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>  
                    </div>  
                </form>  
            </div>
        </div>
    </div>  
</div>  
  
<script>  
    $('#form-sekolah').submit(function(e) {  
        e.preventDefault();  
        $.ajax({  
            type: 'POST',  
            url: 'mod_setting/crud_sekolah.php?pg=ubah',  
            data: $(this).serialize(),  
            success: function(data) {  
                if (data == 'OK') {  
                    iziToast.success({  
                        title: 'OKee!',  
                        message: 'Data Sekolah Berhasil diubah',  
                        position: 'topRight'  
                    });  
                    setTimeout(function() {  
                        window.location.reload();  
                    }, 2000);  
                } else {  
                    iziToast.error({  
                        title: 'Maaf!',  
                        message: 'Data Gagal diubah',  
                        position: 'topRight'  
                    });  
                }  
            }  
        });  
        return false;  
    });  
</script>  
