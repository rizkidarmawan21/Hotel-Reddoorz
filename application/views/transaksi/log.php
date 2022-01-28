<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h2 text-gray-800"><?= $title; ?></h2>

    <hr class="sidebar-divider mt-3">
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="table-responsive col-md-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tipe Kamar</th>
                        <th>Harga / Malam</th>
                        <th>Jumlah</th>
                        <th>Nama</th>
                        <th>Check In / Out</th>
                        <th>Lama Inap</th>
                        <th>Rekening</th>
                        <th>Status Pesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Total Bayar</th>
                        <th>Bukti TF</th>
                    </tr>
                </thead>
                    <tbody>
                <?php $no = 1;
                foreach ($transaksi as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $i['type'] ?></td>
                            <td>Rp. <?= number_format($i['price'], 0, ',', '.') ?></td>
                            <td><?= $i['jumlah_kamar'] ?></td>
                            <td><?= $i['name'] ?> -
                                <?= $i['phone'] ?></td>
                            <td><?= date('d F Y', strtotime($i['tgl_masuk'])) ?> / <?= date('d F Y', strtotime($i['tgl_keluar'])) ?></td>
                            <td><?= $i['lama_hari'] ?> Hari</td>
                            <td><?= $i['bank'] ?> <?= $i['no_rekening'] ?> <br> A/N <?= $i['nm_rekening'] ?></td>
                            <td>
                                <?php if ($i['status_pesanan'] == 1) : ?>
                                    <span class="badge bdge-pill badge-success">Dikonfirmasi</span>
                                <?php elseif ($i['status_pesanan'] == 2) : ?>
                                    <span class="badge bdge-pill badge-danger">Dibatalkan</span>
                                <?php else : ?>
                                    <span class="badge bdge-pill badge-danger">belum dikonfirmasi</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($i['status_pembayaran'] == 1) : ?>
                                    <span class="badge bdge-pill badge-warning">Menunggu Konfirmasi</span>
                                <?php elseif ($i['status_pembayaran'] == 2) : ?>
                                    <span class="badge bdge-pill badge-success">Dikonfirmasi</span>
                                <?php elseif ($i['status_pembayaran'] == 3) : ?>
                                    <span class="badge bdge-pill badge-danger">Dibatalkan</span>
                                <?php else : ?>
                                    <span class="badge bdge-pill badge-danger">Belum Dibayar</span>
                                <?php endif ?>
                            </td>
                            <td>Rp. <?= number_format($i['total_bayar'], 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('assets/img/bukti/') . $i['bukti'] ?>" data-lightbox="image">
                                    <img class="img-hover" width="130px" src="<?= base_url('assets/img/bukti/') . $i['bukti'] ?>" alt="">
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>




        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->