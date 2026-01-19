
			<section class='content'>
							<div class='col-md-12'>
								<div class='box box-solid'>
									<div class='box-header'>
										<h3 class='box-title'>Kartu Bukti Pendaftaran</h3>
										<div class='box-tools pull-right btn-group'>
											<button onclick="window.print()" class="btn btn-success"><i class="fas fa-print"></i> Cetak Kartu</button>
										</div>
									</div>
									<div class='box-body' style='background:#c3c3c3; '>
									
<style>
	.kartu-container { 
		background:#fff; 
		width:80%; 
		margin:0 auto; 
		padding:35px; 
		height:100%;
	}
	.kartu-inner {
		width:10.4cm;
		border:2px solid #333;
		padding: 20px;
		margin: 0 auto;
	}
	.kartu-inner table {
		width: 100%;
		font-size: 11pt;
	}
	.kartu-inner td {
		padding: 4px 0;
		vertical-align: top;
	}
	.kartu-inner td:first-child {
		width: 35%;
	}
	.kartu-inner td:nth-child(2) {
		width: 5%;
	}
	.foto-container {
		width: 3cm;
		height: 4cm;
		border: 1px solid #333;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 10px auto;
		overflow: hidden;
	}
	.foto-container img {
		max-width: 100%;
		max-height: 100%;
		object-fit: cover;
	}
	.no-foto {
		color: #999;
		font-size: 9pt;
		text-align: center;
	}
	.kartu-inner hr {
		border: 0;
		border-top: 2px solid #333;
		margin: 10px 0;
	}
	.kartu-title {
		text-align: center;
		font-weight: bold;
		font-size: 12pt;
		margin: 10px 0;
	}
	.ttd-section {
		margin-top: 20px;
		text-align: right;
		font-size: 10pt;
	}
	@media print {
		.box-header, .box-body > div:first-child { background: white !important; }
		.btn { display: none; }
	}
</style>

 <font face="arial">
	<div class="kartu-container">
		<div class="kartu-inner">
			<img src="../<?= $setting['kop'] ?>" width="100%" />
			<hr>
			<div class="kartu-title">KARTU BUKTI PENDAFTARAN</div>
			
			<div class="foto-container">
				<?php if (!empty($siswa['foto']) && file_exists("../" . $siswa['foto'])): ?>
					<img src='../ <?= $siswa['foto'] ?>' alt='Foto'>
				<?php else: ?>
					<div class="no-foto">Foto<br>Belum<br>Tersedia</div>
				<?php endif; ?>
			</div>
			
			<table>
				<tr>
					<td>No Pendaftaran</td>
					<td>:</td>
					<td><?= $siswa['no_daftar'] ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><strong><?= $siswa['nama'] ?></strong></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>:</td>
					<td><?= $siswa['jurusan'] ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td><?= $siswa['asal_sekolah'] ?></td>
				</tr>
				<tr>
					<td colspan="3" style="padding: 8px 0;"></td>
				</tr>
				<tr>
					<td><strong>Username</strong></td>
					<td>:</td>
					<td><strong><?= $siswa['nisn'] ?></strong></td>
				</tr>
				<tr>
					<td><strong>Password</strong></td>
					<td>:</td>
					<td><strong><?= $siswa['remember_token_uuid'] ?></strong></td>
				</tr>
			</table>
			
			<div class="ttd-section">
				<p>Kepala Madrasah<br><strong>MTsN 11 Majalengka</strong></p>
				<br><br>
				<p><strong><?= $setting['kepala'] ?></strong><br>
				NIP. <?= $setting['nip'] ?></p>
			</div>
		</div>
	</div>
</font>
			</div></div></div></section>