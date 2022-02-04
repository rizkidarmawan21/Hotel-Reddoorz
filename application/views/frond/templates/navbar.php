<!-- <div class="container"> -->
<!-- <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <div class="container"> -->
<!-- <a class="navbar-brand" href="#">RedDoorz</a> -->
<!-- <a class="navbar-brand" href="#">
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
         <b>  <?= $user['name'] ?></b>  
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
      <img src="<?= base_url('') ?>/assets/img/profile/<?= $user['image'] ?>" class="rounded-circle" width="35" alt="image profile" >
      <?php else : ?>
      </ul>

        <div class="d-grid gap-2 d-lg-block">
          <a href="<?= base_url(''); ?>/login_f" class="btn btn-outline-danger">Login</a>
          <a href="<?= base_url(''); ?>/login_f/registration" class="btn btn-outline-secondary" ">Register</a>
        </div>
        <?php endif ?>
              </div>
            </div>
          </nav> -->
<!-- </div> -->

<style>
	.dropdown {
		position: relative;
		display: inline-block;

	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		padding: 12px 16px;
		z-index: 1;
	}

	.color-black {
		color: black;
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}
</style>
<header class="header" id="header">
	<nav class="nav container">
		<a href="#" class="nav__logo">Ryal Hotel</a>

		<div class="nav__menu" id="nav-menu">
			<ul class="nav__list">
				<li class="nav__item">
					<a href="<?= base_url() ?>#home" class="nav__link active-link">Home</a>
				</li>
				<li class="nav__item">
					<a href="<?= base_url() ?>#about" class="nav__link">About</a>
				</li>
				<li class="nav__item">
					<a href="<?= base_url() ?>#discover" class="nav__link">Discover</a>
				</li>
				<li class="nav__item">
					<a href="<?= base_url(''); ?>home_f/kamar" class="nav__link">Room</a>
				</li>
				<?php
				if ($this->session->userdata('is_login') == true) : ?>
					<li class="nav__item">
						<div class="dropdown">
							<span class="nav__link"><?= $user['name'] ?></span>
							<div class="dropdown-content">
								<a href="<?= base_url(''); ?>home_f/profil" class="color-black">Profile</a>
								<br>
								<br>
								<a href="<?= base_url(''); ?>home_f/pesanan " class="color-black">Orders</a>
								<br>
								<br>
								<a href="<?= base_url(''); ?>home_f/transaksi" class="color-black">Transaction</a>
								<br>
								<br>
								<a href="<?= base_url('') ?>login_f/logout" style="color: red;" class="color-black">Logout</a>
							</div>
						</div>
					</li>
				<?php else : ?>
					<li class="nav__item">
						<a href="<?= base_url(''); ?>/login_f" class="nav__link">Login</a>
					</li>
				<?php endif ?>


			</ul>

			<div class="nav__dark">
				<!-- Theme change button -->
				<span class="change-theme-name">Dark mode</span>
				<i class="ri-moon-line change-theme" id="theme-button"></i>
			</div>

			<i class="ri-close-line nav__close" id="nav-close"></i>
		</div>

		<div class="nav__toggle" id="nav-toggle">
			<i class="ri-function-line"></i>
		</div>
	</nav>
</header>
