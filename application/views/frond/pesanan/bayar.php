<br>
<br>
<br>
<div class="container col-md-12">
    <h2 class="mt-3">Konfirmasi Pembayaran</h2>
    <div class="row">
        <div class="col-md-6 mt-3">
        <?= form_open_multipart('home_f/bayar_aksi');?>
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
                <input type="text" name="nm_rek" class="form-control" id="nm_rek" required >
            </div>
            <div class="form-group">
                <label for="bukti" class="form-label">Bukti Pembayaran</label>
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="bukti" required>
                <li class="text-danger"> <small>File wajib berupa JPG atau PNG</small> </li>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-sm btn-danger">Submit</button>
            <?php form_close();?>
        </div>
        <div class="col-md-6 mt-3 p-3">
            <div class="list-group">
                <span class="list-group-item list-group-item-action bg-danger text-white" aria-current="true">
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