    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- </body>

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
</html> -->


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
    	<div class="footer__container container grid">
    		<div class="footer__content grid">
    			<div class="footer__data">
    				<h3 class="footer__title">Hotel</h3>
    				<p class="footer__description">Make Your Best Stay Experience.
    				</p>
    				<div>
    					<a href="https://www.facebook.com/" target="_blank" class="footer__social">
    						<i class="ri-facebook-box-fill"></i>
    					</a>
    					<a href="https://twitter.com/" target="_blank" class="footer__social">
    						<i class="ri-twitter-fill"></i>
    					</a>
    					<a href="https://www.instagram.com/" target="_blank" class="footer__social">
    						<i class="ri-instagram-fill"></i>
    					</a>
    					<a href="https://www.youtube.com/" target="_blank" class="footer__social">
    						<i class="ri-youtube-fill"></i>
    					</a>
    				</div>
    			</div>

    			<div class="footer__data">
    				<h3 class="footer__subtitle">About</h3>
    				<ul>
    					<li class="footer__item">
    						<a href="" class="footer__link">About Us</a>
    					</li>
    					<li class="footer__item">
    						<a href="" class="footer__link">Features</a>
    					</li>
    					<li class="footer__item">
    						<a href="" class="footer__link">New & Blog</a>
    					</li>
    				</ul>
    			</div>

    			<!-- <div class="footer__data">
                        <h3 class="footer__subtitle">Company</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">Team</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Plan y Pricing</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Become a member</a>
                            </li>
                        </ul>
                    </div> -->

    			<div class="footer__data">
    				<h3 class="footer__subtitle">Support</h3>
    				<ul>
    					<li class="footer__item">
    						<a href="" class="footer__link">TAMS"Z</a>
    					</li>
    					<li class="footer__item">
    						<a href="" class="footer__link">Support Center</a>
    					</li>
    					<li class="footer__item">
    						<a href="" class="footer__link">Contact Us</a>
    					</li>
    				</ul>
    			</div>
    		</div>

    		<div class="footer__rights">
    			<p class="footer__copy">&#169; 2020 Bedimcode. All rigths reserved.</p>
    			<div class="footer__terms">
    				<a href="#" class="footer__terms-link">Terms & Agreements</a>
    				<a href="#" class="footer__terms-link">Privacy Policy</a>
    			</div>
    		</div>
    	</div>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
    	<i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <script>
    	var price = document.querySelector('.price').value;
    	var uangJmlKmr

    	$(document).ready(function() {


    		$('#tgl_checkin, #tgl_checkout,#jumlah').on('change textInput input', function() {
    			let jumlah = $("#jumlah").val()
    			if (($("#tgl_checkin").val() != "") && ($("#tgl_checkout").val() != "")) {
    				var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
    				var firstDate = new Date($("#tgl_checkin").val());
    				var secondDate = new Date($("#tgl_checkout").val());
    				var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
    				$("#lama_hari").val(diffDays);
    				$("#total").val((parseFloat(price) * parseFloat(jumlah)) * diffDays);
    				$("#total_bayar").val('Rp. ' + (parseFloat(price) * parseFloat(jumlah)) * diffDays);

    			}
    		});
    	});
    </script>

    <!--=============== SCROLL REVEAL===============-->
    <script src="<?= base_url('assets/'); ?>assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="<?= base_url('assets/'); ?>assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="<?= base_url('assets/'); ?>assets/js/main.js"></script>

    </body>

    </html>
