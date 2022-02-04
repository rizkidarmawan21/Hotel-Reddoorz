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
    <h2 class="mt-3">Transaksi Pembayaran User</h2>
    <?= $this->session->flashdata('message'); ?>
    <div class="table-responsive mt-4">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Pesanan</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Bayar</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Status</th>
                    <th>Bukti</th>
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
                        <td><?= $p['name'] ?></td>
                        <td>Rp. <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
                        <td><?= $p['bank'] ?></td>
                        <td><?= $p['no_rekening'] ?> <br> A/N <?= $p['nm_rekening'] ?></td>
                        <td>
                            <?php
                            if ($p['status_pembayaran'] == 0) {
                                echo '<span class="badge rounded-pill bg-danger">Belum Dibayar</span>
                                ';
                            } elseif ($p['status_pembayaran'] == 1) {
                                echo '<span class="badge rounded-pill bg-warning">Menunggu konfirmasi</span>
                                <br>
                                <a target="blank" href="https://api.whatsapp.com/send?phone=6285956319466&text=Hai%20admin%20saya%20ingin%20konfirmasi%20pembayaran%20saya%20" ><span class="badge rounded-pill bg-success">Konfirmasi Admin</span></a>
                                ';
                            } elseif ($p['status_pembayaran'] == 2) {
                                echo '<span class="badge rounded-pill bg-success">Dikonfirmasi</span>';
                            } else {
                                echo '<span class="badge rounded-pill bg-danger">Dibatalkan</span>';
                            }
                            ?>


                        </td>
                        <td>
                        <a href="<?= base_url('assets/img/bukti/') . $p['bukti'] ?>"  data-lightbox="image">
                                <img class="img-hover" width="130px" src="<?= base_url('assets/img/bukti/') . $p['bukti'] ?>" alt="">
                            </a>
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
