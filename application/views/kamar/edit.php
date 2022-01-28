<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


<?= form_open_multipart('kamar/update');?>

<div class="row">
    <div class="col-lg-3">
        <img class="mt-2" width="300px" src="<?= base_url('assets/img/produk/').$kamar['image_produk']?> " alt="">
        <div class="form-group mt-2">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image_produk">
                <label class="custom-file-label" for="image_produk">Choose file Image Produk</label>
                <li class="text-danger"> <small>File wajib berupa JPG atau PNG</small> </li>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?= $this->session->flashdata('message'); ?>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="hidden" name="id" id="id" value="<?= $kamar['id'];?>" >
            <input type="text" class="form-control" id="type" name="type" value="<?= $kamar['type'];?>">
            <?= form_error('type','<small class="text-danger pl-3 ">','</small>'); ?>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <textarea name="jumlah" id="jumlah" class="form-control" cols="30" rows="2"><?= $kamar['jumlah'];?></textarea>
            <?= form_error('jumlah','<small class="text-danger pl-3 ">','</small>'); ?>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" value="<?= $kamar['stok'];?>">
            <?= form_error('type','<small class="text-danger pl-3 ">','</small>'); ?>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $kamar['price'];?>">
            <?= form_error('type','<small class="text-danger pl-3 ">','</small>'); ?>
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-success">Edit Kamar</button>
        </div>
    </div>
    
</div>
<?php form_close();?>    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
