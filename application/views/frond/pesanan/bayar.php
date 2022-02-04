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

		.bg-blue {
			background-color: #14505c;
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
		<h2 class="mt-3">Konfirmasi Pembayaran</h2>
		<div class="row">
			<div class="col-md-6 mt-3">
				<?= form_open_multipart('home_f/bayar_aksi'); ?>
				<div class="mb-3">
					<label for="name" class="form-label">Nama Lengkap</label>
					<input type="text" class="form-control" id="name" value="<?= $pesanan['name'] ?>" placeholder="nama lengkap" readonly>
					<input type="hidden" class="form-control" name="id_transaksi" value="<?= $pesanan['id_transaksi'] ?>" placeholder="nama lengkap" readonly>
				</div>
				<div class="mb-3">
					<label for="total_bayar" class="form-label">Nominal Pembayaran</label>
					<input type="text" class="form-control" id="total_bayar" value="<?= $pesanan['total_bayar'] ?>" placeholder="total bayar" readonly>
				</div>
				<div class="mb-3">
					<label for="bank" class="form-label">Bank</label>
					<select name="bank" id="bank" class="form-control" required>
						<option>-- pilih --</option>
						<option value="Mandiri">Mandiri</option>
						<option value="BCA">BCA</option>
						<option value="BNI">BNI</option>
						<option value="BRI">BRI</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="no_rek" class="form-label">Nomor Rekening</label>
					<input type="number" name="no_rek" class="form-control" id="no_rek" placeholder="" required>
				</div>
				<div class="mb-3">
					<label for="nm_rek" class="form-label">Atas Nama Rekening</label>
					<input type="text" name="nm_rek" class="form-control" id="nm_rek" required>
				</div>
				<div class="form-group">
					<label for="bukti" class="form-label">Bukti Pembayaran</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="bukti" required>
						<li class="text-danger"> <small>File wajib berupa JPG atau PNG</small> </li>
					</div>
				</div>
				<button type="submit" name="submit" class="btn btn-sm btn-blue text-white mt-3">Submit</button>
				<?php form_close(); ?>
			</div>
			<div class="col-md-6 mt-3 p-3">
				<div class="list-group">
					<span class="list-group-item list-group-item-action bg-blue text-white" aria-current="true">
						<div class="d-flex w-100 justify-content-between">
							<h6 class="mb-1">Rekening Hotel Reddoorz Syariah Near Unsoed Purwokerto</h6>
						</div>
					</span>
					<span class="list-group-item list-group-item-action">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Mandiri</h5>
						</div>
						<p class="mb-1">7001400009629402</p>
					</span>
					<span class="list-group-item list-group-item-action">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">BCA</h5>
						</div>
						<p class="mb-1">7811101002316389</p>
					</span>
					<span class="list-group-item list-group-item-action">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">BNI</h5>
						</div>
						<p class="mb-1">7884800009619355</p>
					</span>
					<span class="list-group-item list-group-item-action">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">BRI</h5>
						</div>
						<p class="mb-1">8878800009507294</p>
					</span>
				</div>
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
