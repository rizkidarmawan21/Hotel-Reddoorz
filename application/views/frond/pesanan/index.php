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
                    <th>#</th>
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
                                        echo '<a href="'. base_url('home_f/bayar/'.$p['id_transaksi']) .'" > <span class="badge rounded-pill bg-secondary" >Bayar</span> </a>';
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