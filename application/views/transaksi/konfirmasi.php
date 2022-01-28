

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
                <th width="5%" >No</th>
                <th>Tanggal Pesan</th>
                <th>Tipe Kamar</th>
                <th>Harga / Malam</th>
                <th>Jumlah</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Lama Inap</th>
                <th>Total Bayar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach( $transaksi as $i):?>
            <tr>
               <td><?= $no++?></td>
               <td><?= $i['tgl_pesan']?></td>
               <td><?= $i['type']?></td>
               <td>Rp. <?= number_format($i['price'], 0, ',', '.') ?></td>
               <td><?= $i['jumlah_kamar']?></td>
               <td><?= $i['name']?></td>
               <td><?= $i['phone']?></td>
               <td><?= date('d F Y', strtotime($i['tgl_masuk'])) ?> </td>
               <td><?= date('d F Y', strtotime($i['tgl_keluar'])) ?> </td>
               <td><?= $i['lama_hari']?> Hari</td>
               <td>Rp. <?= number_format($i['total_bayar'], 0, ',', '.') ?></td>
               <td>
                    <a href="<?= base_url('transaksi/konfir_pesanan/'. $i['id_transaksi']);?>"  class="badge badge-pill badge-secondary">Konfirmasi</a>
                    <br>
                    <a href="<?= base_url('transaksi/batal_pesanan/'. $i['id_transaksi']);?>"  class="badge badge-pill badge-danger">Batalkan</a>
               </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>




        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

