<!-- <script type="text/javascript"> -->
	<!-- // window.print();  -->
	<!-- </script> -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo URL ?>/css/bootstrap.css">
		<title>
			<?php echo $data["judul"]; ?>

		</title>

	</head>
	<body>
		<center>
			<div class="container justify-content-center" style="margin-top: 30vh;">
				<div class="card" style="width: 30rem;">
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><h3>SELAMAT DATANG</h3><h5>KEAMATAN HOKYA</h5>
							<h8>Jalan sini aja jangan sana</h8>
						</li>
						<li class="list-group-item text-center">
							<h4>ANTRIAN</h4><h1><?php echo  $data["antrian"]["no_urut"]?></h1><h6><?php echo strtoupper($data["antrian"]["layanan"]) ?></h6>
						</li>
						<li class="list-group-item text-center"><h3>TERIMAKASIH</h3></li>
					</ul>
				</div>
			</div>
		</center>
		<script type="text/javascript">

			// CETAK
			window.print();
			// KEMBALI KE home
			if (window.matchMedia) {
				var mediaQueryList = window.matchMedia('print');
				mediaQueryList.addListener(function(mql) {
					if (!mql.matches) {
						window.location.href = "<?php echo URL; ?>";
					}
				});
			}


		</script>