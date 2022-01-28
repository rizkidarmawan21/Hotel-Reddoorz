<div class="container col-md-7">
    <br>
    <br>
    <br>
    <br>
    <h2>Pesan Kamar</h2>
    <br>
    <div class="align-item-center">
    <img src="<?= base_url('assets/img/produk/default.jpg') ?>" class="img-fluid rounded mx-auto d-block" alt="Image Produk">
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
        <input type="text" class="form-control" value="Rp. <?= number_format($kamar['price'], 0, ',', '.') ?>" id="price" placeholder="price" readonly>
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
        <input type="text" class="form-control" name="lama_hari" id="lama_hari" placeholder="Lama Menginap" readonly>
    </div>
    <div class="mb-3">
        <label for="total_bayar" class="form-label">Total Biaya</label>
        <input type="text" class="form-control"  id="total_bayar" placeholder="Total Biaya" readonly>
        <input type="hidden"  name="total_bayar" id="total" >
    </div>
    <button type="submit" class="btn btn-danger my-4 col-12" onclick="alert('Apakah anda sudah yakin akan memesan kamar ini ?')">Pesan Kamar</button>
    </form>
</div>


