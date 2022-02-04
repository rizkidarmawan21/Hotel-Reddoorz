<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/style.css">
    <link href="<?= base_url('assets/');?>css/lightbox.css" rel="stylesheet">

    <title>Ryal Hotel</title>
    <style>
                .carousel-item img {
  width: 100%;
  height: 70vh;
  object-fit: cover;
  object-position: center;
  background-size: cover;
}

.btn-blue {
	background-color: #14505c;
	padding: 10px 50px;
}
    </style>
  </head>
  <body style="background-color: #0e2a2f;" class="text-white">
  
<div class="container col-7 mt-3">
    <h2> <a class="btn btn-blue text-white" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
</div>
<br>
<br>
<!-- projek -->
<section id="project" class="mt-5">
    <div class="container col-md-7">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-3">

            <div class="col mb-4">
                <h3>Edit Profile</h2>
            </div>
            <?= form_open_multipart('home_f/edit_profile'); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
                <?= form_error('name', '<small class="text-danger pl-3 ">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>" required>
            </div>
            <div class="row">
                <label for="image" class="form-label">Photo</label>
                <div class="col">
                    <img src="<?= base_url('') ?>/assets/img/profile/<?= $user['image'] ?>" class="rounded" width="150" alt="image profile">
                </div>
                <div class="col-md-9">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div align="right">
                <button type="submit" class="btn btn-light">Submit</button>
            </div>
            </form>
        </div>
        <hr>
        <div class="row mb-3 mt-5">
            <form action="<?= base_url('home_f/changepassword') ?>" method="post">

                <div class="col mb-4">
                    <h3>Change Password</h2>
                </div>
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1" required>
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    </body>

  <script>
    var price = document.querySelector('.price').value;
    var uangJmlKmr

    $(document).ready(function() {


    $('#tgl_checkin, #tgl_checkout,#jumlah').on('change textInput input', function () {
      let jumlah =  $("#jumlah").val()
        if ( ($("#tgl_checkin").val() != "") && ($("#tgl_checkout").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#tgl_checkin").val());
            var secondDate = new Date($("#tgl_checkout").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            $("#lama_hari").val(diffDays);
            $("#total").val((parseFloat(price) * parseFloat(jumlah))*diffDays);
            $("#total_bayar").val('Rp. ' +(parseFloat(price) * parseFloat(jumlah))*diffDays);

        }
    });
});
</script>
<script src="<?= base_url('assets/'); ?>js/lightbox.js"></script>
</html>
