<!-- <div class="container"> -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">RedDoorz</a> -->
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="250">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item align-content-end">
          <a class="nav-link active" aria-current="page" href="<?= base_url(''); ?>">Beranda</a>
        </li>
        <li class="nav-item align-content-end">
          <a class="nav-link" href="<?= base_url(''); ?>home_f/kamar">Kamar</a>
        </li>
        <li class="nav-item align-content-end">
          <a class="nav-link" href="<?= base_url(''); ?>#fasilitas">Fasilitas</a>
        </li>
        <li class="nav-item align-content-end">
          <a class="nav-link" href="<?= base_url(''); ?>#about">Tentang</a>
        </li>
        <?php
      if ($this->session->userdata('is_login') == true) : ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         <b>  <?= $user['name']?></b>  
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url(''); ?>home_f/profil">Profile</a></li>
            <li><a class="dropdown-item" href="<?= base_url(''); ?>home_f/pesanan" >Pesanan</a></li>
            <li><a class="dropdown-item" href="<?= base_url(''); ?>home_f/transaksi">Transaksi</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('') ?>login_f/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
      <img src="<?= base_url('') ?>/assets/img/profile/<?= $user['image']?>" class="rounded-circle" width="35" alt="image profile" >
      <?php else : ?>
      </ul>

        <div class="d-grid gap-2 d-lg-block">
          <a href="<?= base_url(''); ?>/login_f" class="btn btn-outline-danger">Login</a>
          <a href="<?= base_url(''); ?>/login_f/registration" class="btn btn-outline-secondary" ">Register</a>
        </div>
        <?php endif ?>
              </div>
            </div>
          </nav>
      <!-- </div> -->