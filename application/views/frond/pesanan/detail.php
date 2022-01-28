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
                    <td  colspan="2" > <h5>User Info</h5></td>
                </tr>
                <tr>
                    <td width="20%">Nama</td>
                    <td>: <?= $pesanan['name']?></td>
                </tr>
                <tr>
                    <td width="20%">Telepon</td>
                    <td>: <?= $pesanan['phone']?></td>
                </tr>
                <tr>
                    <td width="20%">Alamat</td>
                    <td>: <?= $pesanan['address']?></td>
                </tr>
            </table>

            <table class="table table-bordered mt-3">
                <tr>
                    <td colspan="2" class=""><h5>Transaksi Info</h5></td>
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
            <a class="btn btn-primary btn-sm mb-3" href="<?= base_url('home_f/pesanan');?>">Kembali</a>
            <a class="btn btn-danger btn-sm mb-3" href="<?= base_url('home_f/batal_pesan/'. $pesanan['id_transaksi']);?>" onclick="return confirm('Yakin ingin membatalkan pesanan ?')">Batalkan Pesanan</a>
            
        </div>
    </div>
</div>