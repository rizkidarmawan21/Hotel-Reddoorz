<!-- 
    <div class="container mt-3">
            <h2> <a style="color: #ec293c;" href="<?= base_url(''); ?>"><i class="bi bi-reply"></i> Back Home</a></h2>
    </div> -->
<!-- projek -->
<!-- <section id="project" class="mt-5">
      <div class="container">
          <?= $this->session->flashdata('message'); ?>
          <div class="row text-center mb-3">
            <div class="col">
              <h2>Pilihan Kamar</h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <?php foreach ($kamar as $k) : ?>
              <div class="col-md-3 mb-3">
                <div class="card">
                <img src="<?= base_url('assets/'); ?>img/produk/<?= $k['image_produk'] ?>" width="100" class="card-img-top" alt="Ini Aku" />
                <div class="card-body"> -->
<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
<!-- <ul>
                      <li>Tipe <?= $k['type'] ?></li>
                      <li>Harga permalam <?= $k['price'] ?></li>
                      <li>Tersedia <?= $k['stok'] ?> Kamar</li>
                    </ul>
                    <a href="<?= base_url(''); ?>/home_f/pesan/<?= $k['id'] ?>" class="btn btn-danger">Pesan</a>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
          </div>
        </div>
      </section> -->

<main class="main">
<br>
<br>
<br>
	<!--==================== PLACES ====================-->
	<section class="place section" id="place">
		<?= $this->session->flashdata('message'); ?>
		<h2 class="section__title">Choose Your Room</h2>

		<div class="place__container container grid">
			<!--==================== PLACES CARD 1 ====================-->
			<?php foreach ($kamar as $k) : ?>
			<div class="place__card">
				<img src="<?= base_url('assets/'); ?>img/produk/<?= $k['image_produk'] ?>" alt="" class="place__img">

				<div class="place__content">
					<span class="place__rating">
						<i class="ri-star-line place__rating-icon"></i>
						<span class="place__rating-number">5.0</span>
					</span>

					<div class="place__data">
						<h3 class="place__title">Type <?= $k['type'] ?></h3>
						<span class="place__subtitle">Suplly <?= $k['stok'] ?></span>
						<span class="place__price">Rp<?= $k['price'] ?></span>
					</div>
				</div>

				<a href="<?= base_url(''); ?>/home_f/pesan/<?= $k['id'] ?>" class="button button--flex place__button">
					<i class="ri-arrow-right-line"></i>
				</a>
			</div>
			<?php endforeach ?>
		</div>
	</section>

</main>
