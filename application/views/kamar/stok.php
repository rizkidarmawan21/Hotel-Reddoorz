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
                        <th width="30%" >Image</th>
                        <th width="10%">Type Kamar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                <?php $no = 1;
                foreach ($kamar as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td> <img width="130px" src="<?= base_url('assets/img/produk/').$i['image_produk']?>"" alt=""></td>
                            <td><?= $i['type'] ?></td>
                            <td>
                                <?php if ($i['stok'] == 0) : ?>
                                    <span class="badge badge-pill badge-warning">Persediaan Habis !</span>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-success"><?= $i['stok'] ?></span>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('kamar/edit/' . $i['id']); ?>" class="badge badge-pill badge-warning">Edit</a>
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