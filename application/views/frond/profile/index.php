<div class="container mt-3">
    <h2> <a style="color: #ec293c;" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
</div>
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
                <button type="submit" class="btn btn-danger">Submit</button>
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
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>