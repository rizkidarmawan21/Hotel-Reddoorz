<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
	<link href="<?= base_url('assets/'); ?>css/lightbox.css" rel="stylesheet">

	<title>Ryal Hotel</title>
	<style>
		.carousel-item img {
			width: 100%;
			height: 70vh;
			object-fit: cover;
			object-position: center;
			background-size: cover;
		}

		.btn-blue {
			background-color: #14505c;
			padding: 10px 50px;
		}
	</style>
</head>

<body >

	<div class="container col-12 mt-3">
		<h2> <a class="btn btn-blue text-white" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
	</div>

	<br>
	<br>
	<br>
	<div class="container col-md-12">
		<h2 class="mt-3">Pesanan User</h2>
		<?= $this->session->flashdata('message'); ?>
		<div class="table-responsive mt-4">

			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Pesanan</th>
						<th>Type Kamar</th>
						<th>Jumlah Kamar</th>
						<th>Check In / Out</th>
						<th>Total Bayar</th>
						<th>Status</th>
						<th>Catatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$time;
					$i = 1;
					foreach ($pesanan as $p) : ?>
						<tr>
							<th scope="row"><?= $i++ ?></th>
							<td><?= $p['tgl_pesan'] ?></td>
							<td><?= $p['type'] ?></td>
							<td><?= $p['jumlah_kamar'] ?></td>
							<td><?= date('d F Y', strtotime($p['tgl_masuk'])) ?>
								<br>
								/
								<?= date('d F Y', strtotime($p['tgl_keluar'])) ?>
							</td>
							<td>Rp. <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
							<td>
								<?php
								if ($p['status_pesanan'] == 0) {
									echo '<span class="badge rounded-pill bg-danger">Belum Dikonfirmasi Admin</span>
                                <br>
                                <a target="blank" href="https://api.whatsapp.com/send?phone=6285956319466&text=Hai%20admin%20saya%20ingin%20konfirmasi%20pesanan%20saya%20" ><span class="badge rounded-pill bg-success">Konfirmasi Admin</span></a>
                                ';
								} elseif ($p['status_pesanan'] == 2) {
									echo '<span class="badge rounded-pill bg-danger">Dibatalkan</span>';
								} else {
									echo '<span class="badge rounded-pill bg-success">Dikonfirmasi</span>';
								}
								?>


							</td>
							<td>
								<span class="badge rounded-pill bg-warning">Maksimal Pembayaran <br>
									<?php
									$time = strtotime($p['tgl_pesan']) + (60 * 60 * 24);
									echo  date('d F Y H:i:s', $time);
									?>
								</span>
							</td>
							<td>
								<a href="<?= base_url('') ?>home_f/detail_pesan/<?= $p['id_transaksi'] ?>"> <span class="badge rounded-pill bg-warning">Detail</span> </a>
								<br>
								<?php
								if ($p['status_pesanan'] != 2) {
									if ($p['status_pembayaran'] == 0) {

										if (time() >  $time) {
											echo '<span style="cursor: pointer;" class="badge rounded-pill bg-secondary" onClick="myAlert()">Bayar</span>';
										} else {
											echo '<a href="' . base_url('home_f/bayar/' . $p['id_transaksi']) . '" > <span class="badge rounded-pill bg-secondary" >Bayar</span> </a>';
										}
									}
								}
								?>

							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	<script>
		function myAlert() {
			alert('Pesanan anda sudah kadaluarsa')
		}
	</script>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

<script>
	var price = document.querySelector('.price').value;
	var uangJmlKmr

	$(document).ready(function() {


		$('#tgl_checkin, #tgl_checkout,#jumlah').on('change textInput input', function() {
			let jumlah = $("#jumlah").val()
			if (($("#tgl_checkin").val() != "") && ($("#tgl_checkout").val() != "")) {
				var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
				var firstDate = new Date($("#tgl_checkin").val());
				var secondDate = new Date($("#tgl_checkout").val());
				var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
				$("#lama_hari").val(diffDays);
				$("#total").val((parseFloat(price) * parseFloat(jumlah)) * diffDays);
				$("#total_bayar").val('Rp. ' + (parseFloat(price) * parseFloat(jumlah)) * diffDays);

			}
		});
	});
</script>
<script src="<?= base_url('assets/'); ?>js/lightbox.js"></script>

</html>
