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

<body>
	<div class="container col-12 mt-3">
		<h2> <a class="btn btn-blue text-white" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
	</div>
	<br>
	<br>
	<br>

	<div class="container col-md-12">
		<h2 class="mt-3">Detail Pesanan</h2>
		<div class="row">
			<div class="col-md-4 mt-2">
				<img src="<?= base_url('assets/img/produk/') . $pesanan['image_produk'] ?>" width="250" class="img-fluid" alt="Image Product">
			</div>
			<div class="col-md mt-2">
				<table class="table table-bordered">
					<tr>
						<td colspan="2">
							<h5>User Info</h5>
						</td>
					</tr>
					<tr>
						<td width="20%">Nama</td>
						<td>: <?= $pesanan['name'] ?></td>
					</tr>
					<tr>
						<td width="20%">Telepon</td>
						<td>: <?= $pesanan['phone'] ?></td>
					</tr>
					<tr>
						<td width="20%">Alamat</td>
						<td>: <?= $pesanan['address'] ?></td>
					</tr>
				</table>

				<table class="table table-bordered mt-3">
					<tr>
						<td colspan="2" class="">
							<h5>Transaksi Info</h5>
						</td>
					</tr>
					<tr>
						<td width="20%">Tipe</td>
						<td>: <?= $pesanan['type'] ?></td>
					</tr>
					<tr>
						<td width="20%">Harga</td>
						<td>: <?= $pesanan['price'] ?> / hari</td>
					</tr>
					<tr>
						<td width="20%">Tgl Pesan</td>
						<td>: <?= $pesanan['tgl_pesan'] ?></td>
					</tr>
					<tr>
						<td width="20%">Check In</td>
						<td>: <?= date('d F Y', strtotime($pesanan['tgl_masuk'])) ?></td>
					</tr>
					<tr>
						<td width="20%">Check Out</td>
						<td>: <?= date('d F Y', strtotime($pesanan['tgl_keluar'])) ?></td>
					</tr>
					<tr>
						<td width="20%">Lama Inap</td>
						<td>: <?= $pesanan['lama_hari'] ?> Hari</td>
					</tr>
					<tr>
						<td width="20%">Jumlah Kamar</td>
						<td>: <?= $pesanan['jumlah_kamar'] ?></td>
					</tr>
					<tr>
						<td width="20%">Total Bayar</td>
						<td>: <?= $pesanan['total_bayar'] ?></td>
					</tr>
					<tr>
						<td width="20%">Status Pesanan</td>
						<td>:
							<?php if ($pesanan['status_pesanan'] == 0) : ?>
								<span class="badge rounded-pill bg-warning"> Belum Dikonfirmasi </span>
							<?php elseif ($pesanan['status_pesanan'] == 1) : ?>
								<span class="badge rounded-pill bg-success">Dikonfirmasi </span>
							<?php else : ?>
								<span class="badge rounded-pill bg-danger">Dibatalkan </span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td width="20%">Status Pembayaran</td>
						<td>:

							<?php if ($pesanan['status_pembayaran'] == 0) : ?>
								<span class="badge rounded-pill bg-warning"> Belum Dibayar </span>
							<?php elseif ($pesanan['status_pesanan'] == 1) : ?>
								<span class="badge rounded-pill bg-warning">Menunggu Konfirmasi</span>
							<?php elseif ($pesanan['status_pesanan'] == 2) : ?>
								<span class="badge rounded-pill bg-success">Dikonfirmasi</span>
							<?php else : ?>
								<span class="badge rounded-pill bg-danger">Dibatalkan </span>
							<?php endif; ?>
						</td>
					</tr>
				</table>
				<a class="btn btn-primary btn-sm mb-3" href="<?= base_url('home_f/pesanan'); ?>">Kembali</a>
				<a class="btn btn-danger btn-sm mb-3" href="<?= base_url('home_f/batal_pesan/' . $pesanan['id_transaksi']); ?>" onclick="return confirm('Yakin ingin membatalkan pesanan ?')">Batalkan Pesanan</a>

			</div>
		</div>
	</div>



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
