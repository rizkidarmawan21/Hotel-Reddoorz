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
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Status Akun</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($users as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $i['name'] ?></td>
                            <td><?= $i['email'] ?></td>
                            <td><?= $i['phone'] ?></td>
                            <td><?= $i['address'] ?></td>
                            <td>
                                <?php if ($i['is_active'] == 0) : ?>
                                    <span class="badge bdge-pill badge-warning">Tidak Aktif</span>
                                <?php elseif ($i['is_active'] == 1) : ?>
                                    <span class="badge bdge-pill badge-success">Aktif</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <!-- <a href="images/image-1.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a>     -->

                                <a href="<?= base_url('assets/img/profile/') . $i['image'] ?>" data-lightbox="image">
                                    <img class="img-hover" width="50px" src="<?= base_url('assets/img/profile/') . $i['image'] ?>" alt="">
                                </a>

                            </td>
                            <td>
                                <a href="<?= base_url('users/delete/' . $i['id']); ?>" onclick="return confirm('Yakin ingin menghapus data user ?')" class="badge badge-pill badge-danger">Hapus</a>
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