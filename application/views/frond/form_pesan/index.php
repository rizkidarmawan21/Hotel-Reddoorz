<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/style.css">
    <link href="<?= base_url('assets/');?>css/lightbox.css" rel="stylesheet">

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
  <body style="background-color: #0e2a2f;" class="text-white">
  
<div class="container col-7 mt-3">
    <h2> <a class="btn btn-blue text-white" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
</div>

<div class="container col-md-7">
    <br>
    <br>
    <br>
    <br>
    <h2>Pesan Kamar</h2>
    <br>
    <div class="align-item-center">
    <img src="<?= base_url('assets/img/produk/')?><?= $kamar['image_produk']?>" width="300px" class="img-fluid rounded mx-auto d-block" alt="Image Produk">
    </div>


    <form action="<?= base_url('home_f') ?>/pesan_action" method="post">
    <div class="mb-3">
        <input type="hidden" name="id_user" value="<?= $user['id']?>">
        <input type="hidden" name="id_kamar" value="<?= $kamar['id']?>">
        <label for="type" class="form-label">Tipe Kamar</label>
        <input type="text" class="form-control" name="type" id="type" value="<?= $kamar['type']?>" placeholder="type" readonly>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Harga / Hari</label>
        <input type="text" class="form-control" value="Rp. <?= $kamar['price']?>" id="price" placeholder="price" readonly>
        <input type="hidden" name="price" class="price" value="<?= $kamar['price']?>" id="price">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="name" value="<?= $user['name']?>" id="name" placeholder="name" readonly>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">No. Telepon</label>
        <input type="text" class="form-control" name="phone" value="<?= $user['phone']?>" id="phone" placeholder="phone" readonly>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="address" value="<?= $user['address']?>" id="address" placeholder="address" readonly>
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Kamar</label>
        <!-- <select name="jumlah" id="jumlah" class="form-control" onchange="hitung(this.value)" required> -->
        <select name="jumlah" id="jumlah" class="form-control" required>
            <option>pilih</option>
            <?php for ($i=1; $i <= $kamar['stok'] ; $i++) : ?>
            <option value="<?= $i ?>" ><?= $i ?></option>
            <?php endfor ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tgl_checkin" class="form-label">Tanggal Check-In </label>
        <input type="date" class="form-control" name="tgl_checkin" id="tgl_checkin" placeholder="Tgl Check In" required>
    </div>
    <div class="mb-3">
        <label for="tgl_checkout" class="form-label">Tanggal Check-Out </label>
        <input type="date" class="form-control" name="tgl_checkout" id="tgl_checkout"  placeholder="Tgl Check Out" required>
    </div>
    <div class="mb-3">
        <label for="lama_hari" class="form-label">Lama Menginap</label>
        <input type="text" class="form-control" name="lama_hari" id="lama_hari" placeholder="Lama Menginap" readonly required>
    </div>
    <div class="mb-3">
        <label for="total_bayar" class="form-label">Total Biaya</label>
        <input type="text" class="form-control"  id="total_bayar" placeholder="Total Biaya" readonly required>
        <input type="hidden"  name="total_bayar" id="total" required>
    </div>
    <button type="submit" class="btn btn-blue text-white my-4 col-12" onclick="alert('Apakah anda sudah yakin akan memesan kamar ini ?')">Pesan Kamar</button>
    </form>
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


    $('#tgl_checkin, #tgl_checkout,#jumlah').on('change textInput input', function () {
      let jumlah =  $("#jumlah").val()
        if ( ($("#tgl_checkin").val() != "") && ($("#tgl_checkout").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#tgl_checkin").val());
            var secondDate = new Date($("#tgl_checkout").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            $("#lama_hari").val(diffDays);
            $("#total").val((parseFloat(price) * parseFloat(jumlah))*diffDays);
            $("#total_bayar").val('Rp. ' +(parseFloat(price) * parseFloat(jumlah))*diffDays);

        }
    });
});
</script>
<script src="<?= base_url('assets/'); ?>js/lightbox.js"></script>
</html>



