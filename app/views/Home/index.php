<div class="main">

	<nav class="navbar bg-transparent shadow-sm">
		<div class="container">
			<div class="navbar-brand d-flex align-items-center" href="#">
				<img src="<?php echo URL ?>/img/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-3 logo">
				<span class="h3 abu">KECAMATAN HOKYA</span>
			</div>
		</div>
	</nav>
	<div class="container pt-4">
		<h1 class="text-center welcome">SELAMAT DATANG</h1>
		<p class="text-center fs-3 abu">Di Sistem Peggambilan Antrian Pelayanan Kecamatan hokya</p>
		<center>
			<div class="row mt-5 justify-content-evenly">
				<?php foreach ($data['kategori'] as $kategori) :?>

					<div class="col-sm-3 justify-content-center mb-5 ">
						<div class="card text-center pt-2 pb-2 kategori">

							<h5 class="hitam">Antrian saat ini</h5>
							<h5 class="hitam"><?php echo strtoupper($kategori['layanan']); ?></h5>
							<h1 class="antrian hitam"><?php echo $data['jumlah'][$kategori['layanan']] ?></h1>
							

						</div>

					</div>	

				<?php endforeach; ?>

			</div>
		</center>
	</div>
	<!-- note -->
	<div class="container note">
		<div>
			<p class="pe mb-5">
				Ketentuan pendaftaran Antrian:<br>
				1.Pendaftaran antrian dibuka jam 15:00 sehari sebelumnya <br>
				2.pendaftaran antrian ditutup jam 10:00 <br>
				3.Setiap layanan memiliki batas maksimal pelayanan <br>
			</p>
		</div>
	</div>

	<?php if ($data['daftar']==true):?>
		<center>
			<button type="button" class="btn btn-primary ps-3 pe-3 border-secondary" >
				DAFTAR ANTRIAN 
			</button>
		</center>
		<center>
			<i class="buka" style="color:red; font-size:15px;">*dibuka pada jam buka pendataran</i>
		</center>
	<?php else: ?>
		<center>
			<button type="button" class="btn btn-primary ps-3 pe-3 border-secondary mb-5 " data-bs-toggle="modal" data-bs-target="#modalDaftar">
				DAFTAR ANTRIAN
			</button>
		</center>
	<?php endif; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="daftar" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="daftar">AMBIL ANTRIAN</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<form action="<?php echo URL; ?>/Home/daftar" method="post">
						<label for="kategori">PILIH LAYANAN</label>
						<select class="form-control" id="kategori" type="text" name="kategori">
							<?php foreach ($data['kategori'] as $kategori) :?>
								<option value="<?php echo $kategori['layanan'] ?>"><?php echo strtoupper($kategori['layanan']); ?></option>
							<?php endforeach; ?>

						</select>
						<p class="keterangan pt-5"><span>*</span> Setelah daftar, hendak cetak kartu antri sebagai Bukti</p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary" name="daftar">Daftar</button>					
				</form>
			</div>
		</div>
	</div>
</div>

</div>