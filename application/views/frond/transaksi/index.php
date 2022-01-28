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