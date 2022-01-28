

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h2 text-gray-800"><?= $title; ?></h2>

    <hr class="sidebar-divider mt-3">
    <?= $this->session->flashdata('message'); ?>

    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>
    <div class="row">
        <div class="table-responsive col-md-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="5%" >No</th>
                <th width="10%" >Image</th>
                <th>Type</th>
                <th>Jumlah</th>
                <th width="20%">Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach( $kamar as $i):?>
            <tr>
                <td><?= $no++ ?></td>
                <td> <img width="130px" src="<?= base_url('assets/img/produk/').$i['image_produk']?>"" alt=""></td>
                <td><?= $i['type'] ?></td>
                <td><?= $i['jumlah'] ?></td>
                <td>Rp. <?= number_format($i['price'], 0, ',', '.') ?> / night</td>
                <td>
                    <a href="<?= base_url('kamar/edit/'. $i['id']);?>"  class="badge badge-pill badge-warning">Edit</a>
                    <a href="<?= base_url('kamar/delete/'. $i['id']);?>" onclick="return confirm('Are you sure you want to delete this data?')"   class="badge badge-pill badge-danger">Delete</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <!-- Form -->
    <?= form_open_multipart('kamar/store');?>
        <div class="modal-body">
            <div class="form-group">
                <select name="type" class="form-control" id="type">
                    <option>-- Pilih type --</option>
                    <option value="Double">Double</option>
                    <option value="Single">Single</option>
                </select>
                <?= form_error('type','<small class="text-danger pl-3 ">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah...">
                <?= form_error('jumlah','<small class="text-danger pl-3 ">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok...">
                <?= form_error('stok','<small class="text-danger pl-3 ">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="price" name="price" placeholder="Price...">
                <?= form_error('price','<small class="text-danger pl-3 ">','</small>'); ?>
            </div>
            <div class="form-group">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_produk">
                <label class="custom-file-label" for="image_produk">Choose file Image Produk</label>
                <li class="text-danger"> <small>File wajib berupa JPG atau PNG</small> </li>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        
    <?php form_close();?>    
    <!-- end Form -->


    </div>
  </div>
</div>