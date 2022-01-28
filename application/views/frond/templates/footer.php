    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
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
<script src="<?= base_url('assets/');?>js/lightbox.js"></script>
</html>