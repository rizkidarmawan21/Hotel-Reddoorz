 
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
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Atas Nama</th>
                        <th>Status Pembayaran</th>
                        <th width="10%">Bukti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                        foreach ($transaksi as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $i['name'] ?></td>
                            <td>Rp. <?= number_format($i['total_bayar'], 0, ',', '.') ?></td>
                            <td><?= $i['bank'] ?></td>
                            <td><?= $i['no_rekening'] ?></td>
                            <td>A/N <?= $i['nm_rekening'] ?></td>
                            <td>
                                <?php if ($i['status_pembayaran'] == 1) : ?>
                                    <span class="badge bdge-pill badge-warning">Menunggu Konfirmasi</span>
                                <?php elseif ($i['status_pembayaran'] == 2) : ?>
                                    <span class="badge bdge-pill badge-success">Sudah Dikonfirmasi</span>
                                <?php elseif ($i['status_pembayaran'] == 3) : ?>
                                    <span class="badge bdge-pill badge-danger">Dibatalkan</span>
                                <?php endif ?>
                            </td>
                            <td> 
                            <!-- <a href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a>     -->

                            <a href="<?= base_url('assets/img/bukti/') . $i['bukti'] ?>"  data-lightbox="image">
                                <img class="img-hover" width="130px" src="<?= base_url('assets/img/bukti/') . $i['bukti'] ?>" alt="">
                            </a>
                        
                        </td>
                <td>
                    <a href=" <?= base_url('transaksi/konfir_pembayaran/' . $i['id_transaksi']); ?>" class="badge badge-pill badge-secondary">Konfirmasi</a>
                                <br>
                                <a href="<?= base_url('transaksi/konfir_pembayaran/' . $i['id_transaksi']); ?>" class="badge badge-pill badge-danger">Batalkan</a>
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