

      <section>
          <!-- <div class="container"> -->
            <div id="carouselExampleControls" class="carousel slide col-lg-12" data-bs-ride="carousel">
                <div class="carousel-inner carousel">
                  <div class="carousel-item active ">
                    <img src="<?= base_url('assets/');?>img/hotel.jpg" class="d-block " alt="..." width="100%">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= base_url('assets/');?>img/ruangtamu.jpg" class="d-block " alt="..." width="100%">
                  </div>
                  <div class="carousel-item">
                    <img src="<?= base_url('assets/');?>img/depan.jpg" class="d-block" alt="..." width="100%">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          <!-- </div> -->
      </section>

      <section>
          <div class="container">
              <div class="box" id="reservasi">
                <form class="reservasi" action="<?= base_url('home_f/kamar') ?>" method="post">
                    <h3 class="text-center text-white">Reservasi</h3>
                      <div class="row d-flex align-items-center">
                              <div class="col-md-3">
                                <span class="text-white mb-3">Check In</span>
                                <input class="form-control form-control-sm" type="date">
                              </div>
                              <div class="col-md-3">
                                <span class="text-white mb-3">Check Out</span>
                                <input class="form-control form-control-sm" type="date">
                              </div>
                              <div class="col-md-2">
                                <span class="text-white mb-3">Type</span>
                                <select name="" class="form-control form-control-sm" id="">
                                  <option value="">-- Select --</option>
                                  <option value="">Double</option>
                                  <option value="">Single</option>
                                </select>
                              </div>
                              <div class="col-md-2">
                                <span class="text-white mb-3">Price / Night</span>
                                <input class="form-control form-control-sm" type="text">
                              </div>
                              <div class="col-md-2">
                                <button class="btn mt-4 btn-secondary btn-small">Submit</button>
                              </div>
                      </div>
                  </form>
              </div>
          </div>
        </section>
        
        <section class="container-check">
          <!-- 
            here link to generate waves
            https://getwaves.io/ -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ec293c" fill-opacity="1" d="M0,160L120,186.7C240,213,480,267,720,266.7C960,267,1200,213,1320,186.7L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
          <div class="check">
          <div class="container ">
            <div class="row">
              <div class="col-md-6 align-self-center text-center text-white">
                <h3>Check In</h3>
                <p class="f-2">*Waktu Check-In mulai pukul 14:00 WIB</p>
                <h3>Check Out</h3>
                <p>*Waktu Check-Out mulai pukul 7:00 - 12:00 WIB</p>
                <a href="<?= base_url('') ?>home_f/kamar" class="btn btn-outline-light text-white" role="button">Check Now</a>
            </div>
              <div class="col-md-6 d-block align-self-center ">
                <img src="./assets/img/check.svg" class="img-fluid" width="450" alt="">
              </div>
            </div>
        </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ec293c" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,53.3C640,64,800,96,960,106.7C1120,117,1280,107,1360,101.3L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
      </section>

      <section class="fiture" id="fasilitas">
        <div class="container ">
          <h1 class="text-center mb-3">Fasilitas</h1>
          <div class="row">
              <div class="col-md-4">
                 <div class="card text-center mb-2" >
                     <div class="card-body">
                       <h4 class="card-title ">Umum</h4>
                       <p class="card-text">
                        Ruang Tamu, WIFI, Resepsionis 24 jam, Dapur, Parkir Mobil, Parkir Motor
                       </p>
                     </div>
                   </div>
              </div>
              <div class="col-md-4">
                 <div class="card text-center mb-2" >
                     <div class="card-body">
                       <h4 class="card-title">Kamar</h4>
                       <p class="card-text">Kamar Non-smoking, LED-TV, AC, Lemari Pakaian, Air Mineral Kemasan</p>
                     </div>
                   </div>
              </div>
              <div class="col-md-4">
                 <div class="card text-center mb-2" >
                     <div class="card-body">
                       <h4 class="card-title">Kamar Mandi</h4>
                       <p class="card-text">Shower, Kloset Duduk, Perlengkapan Mandi</p>
                     </div>
                   </div>
              </div>
          </div>
      </div>
      </section>


      <section class="about ">
        <div id="about" class="about">
          <div class="container">
            <h1 class="text-center">About</h1>
            <div class="row mt-4">
                <div class="col-md-6 d-block align-self-center">
                  <img src="./assets/img/about.svg" class="img-fluid" width="450" alt="">
                </div>
                <div class="col-md-6 align-self-center text-center">
                  <p>Hotel Reddoorz Syariah Near Unsoed merupakan salah satu cabang hotel yang berdiri sejak 12 Agustus 2020 oleh Bapak Andri Tanu Saputra. Hotel ini memiliki 10 kamar yang beralamat di Jl. Anggrek, Brubahan, Grendeng, Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53122.
                  </p>
                </div>
            </div>
          </div>
        </div>
      </section>

      <section class="map">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ec293c" fill-opacity="1" d="M0,96L80,96C160,96,320,96,480,117.3C640,139,800,181,960,176C1120,171,1280,117,1360,90.7L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
        <div class="container-map">
          <div class="container mx-auto">
            <h1 class="text-center text-white mb-3">Location</h1>
            <p><iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.585618947278!2d109.24490131477576!3d-7.400239994660568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655efcb155ba97%3A0xa05f2816c5be88c1!2sRedDoorz%20Syariah%20near%20UNSOED!5e0!3m2!1sid!2sid!4v1635843828750!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ec293c" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,181.3C384,160,480,128,576,138.7C672,149,768,203,864,218.7C960,235,1056,213,1152,208C1248,203,1344,213,1392,218.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
      </section>
      
      <footer class="text-center ">
        <p> <small>Copyright © 2021 | Reddoorz Syariah Near Unsoed</small> </p>
      </footer>

