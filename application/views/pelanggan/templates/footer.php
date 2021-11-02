</main>
<div class="text-light bg-dark">
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 item">
          <h3>Tentang Kami</h3>
          <p>Badriah Collection adalah salah satu e-commerce di Indonesia. Badriah Collection banyak melakukan inovasi dalam menyediakan produk, khususnya di kategori busana muslim.</p>
        </div>
        <div class="col-sm-6 col-md-4 item">
          <h3>Alamat</h3>
          <ul>
            <li>
              <div class="place">
                <span class="map"><img src="<?= base_url('asset/') ?>img/maps.png" width="40px"></span>
                <span>Sidotopo Kidul, Surabaya, Jawa timur</span>
              </div>
            </li>
            <li>
              <div class="phone">
                <span class="number"><img src="<?= base_url('asset/') ?>img/telp.png" width="40px"></span>
                <span>+6287876309800</span>
              </div>
            </li>
            <li>
              <div class="email">
                <span class="mail"><img src="<?= base_url('asset/') ?>img/email.png" width="40px"></span>
                <span>badriahcollection.official@gmail.com</span>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-5 item text">
          <h2 class="text-center d-flex justify-content-end">Berlangganan untuk update terbaru</h2>
          <p class="text-center">Dengan berlangganan anda akan mendapatkan update produk dan promo menarik kami.</p>
          <form class="form-inline" method="post" action="<?= base_url() ?>Home/Berlangganan">
            <div class="form-group ml-5"><input type="email" class="form-control" name="email" placeholder="Your Email" />
              <button class="btn btn-primary" type="submit">Subscribe </button></div>
          </form>
        </div>
        <div class="col item social"><a href="https://www.facebook.com/badria-collection-213593302798578"><img src="<?= base_url('asset/') ?>img/fb.png" width=40px></a><a href="https://shopee.co.id/shop/73091160"><img src="<?= base_url('asset/') ?>img/twit.png" width=38px></a>
          <a href="https://www.instagram.com/badria_collection/?hl=en"><img src="<?= base_url('asset/') ?>img/ig.png" width=40px></a>
          <a href="<?= base_url() ?>notfound404"><img src="<?= base_url('asset/') ?>img/yt.png" width=40px></a></div>
      </div>
      <p class="copyright text-center mb-0">Badriah Collection © <?= date('Y'); ?></p>
    </div>
  </footer>
</div>

<div class="costumalert" style="z-index: 100;">
  <span class="exclamation"><img src="<?= base_url() ?>asset/img/exclamation.png" width="25px"></span>
  <span class="msg mt-2">
    <p class="p-3 ml-3 mr-3">Warning: This is a warning alert !</p>
  </span>
  <div class="close-btn">
    <span class="close"><img src="<?= base_url() ?>asset/img/close.png" width="20px"></span>
  </div>
</div>

<script src="<?= base_url() ?>asset/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('asset/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>asset/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/') ?>slick-1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/') ?>js/main.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 3000,
    once: true,
  });
</script>
<script>
  //preloader
  window.addEventListener('load', () => {
    const preload = document.querySelector('.preload');
    preload.classList.add("preload-finish");
  })
</script>
<?php if ($this->session->flashdata('flash')) : ?>
  <script>
    $('.costumalert .msg p').text('<?= $this->session->flashdata('flash') ?>');
    $('.costumalert').addClass('show');
    setTimeout(function() {
      $('.costumalert').removeClass('show');
    }, 5000);
    $('.close-btn').click(function() {
      $('.costumalert').removeClass("show");
    })
  </script>
<?php endif; ?>
<!-- Menu Toggle Script -->
<script>
  $('.PopupImg').click(function(e) {
    e.preventDefault();
    $('#ModalImage img').attr('src', $(this).attr('src'));
    $('#ModalImage').modal('show');
  })

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $('#table').DataTable();


  $("#sort").change(function() {
    var val = $(this).val();
    if (val == 0) {
      window.location = '<?= base_url() ?>Home/allproduk?sortby=DESC<?php if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                                    if (isset($katpilih)) echo ('&kategori=' . $katpilih);
                                                                    if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih); ?>';

    } else {
      window.location = '<?= base_url() ?>Home/allproduk?sortby=' + val + '<?php if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                                            if (isset($katpilih)) echo ('&kategori=' . $katpilih);
                                                                            if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih); ?>';

    }


  });
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $(document).on('click', '#gunakanprofile', function(e) {
    e.preventDefault();
    document.getElementById("inputNamaLengkap").value = "<?= $user['Nama_Pelanggan'] ?>";
    document.getElementById("inputAddress").value = "<?= $user['Alamat'] ?>";
    document.getElementById("inputZip").value = "<?= $user['Kode_Pos'] ?>";
    document.getElementById("inputNoHp").value = "<?= $user['No_Hp'] ?>";
    document.getElementById("NamaLengkap").innerHTML = document.getElementById("inputNamaLengkap").value;
    document.getElementById("No_Hp").innerHTML = document.getElementById("inputNoHp").value;
    document.getElementById("Alamat").innerHTML = document.getElementById("inputAddress").value;
    document.getElementById("KodePos").innerHTML = document.getElementById("inputZip").value;
  });

  function myFunction($id, $input) {
    document.getElementById($id).innerHTML = document.getElementById($input).value;
  }

  function tambahdankurang($id, $input) {
    if ($input == 'kurang') {
      if (document.getElementById($id).value > 1) {
        document.getElementById($id).value -= 1;
      }
    }
    if ($input == 'tambah') {
      if (parseInt(document.getElementById($id).value) > 0 && parseInt(document.getElementById($id).value) < parseInt(document.getElementById($id).getAttribute("max"))) {
        var tambah = parseInt(document.getElementById($id).value) + 1;
        document.getElementById($id).value = tambah;
      }
    }
  }

  $('#inputbayar').change(function(e) {
    e.preventDefault();
    var Id_Metode = $(this).val();
    $.ajax({
      url: '<?= base_url() ?>Home/ajaxKeranjang',
      type: "POST",
      data: {
        'Id_Metode': Id_Metode
      },
      dataType: 'JSON',
      success: function(data) {

        $('#Nomor_Tujuan').html(data[0].Nomor_Tujuan);
        $('#AtasNama').html(data[0].AtasNama);
      }
    });
  });
  $('#inputState').change(function(e) {
    e.preventDefault();
    var Id_Ongkir = $(this).val();
    $.ajax({
      url: '<?= base_url() ?>Home/ajaxOngkir',
      type: "POST",
      data: {
        'Id_Ongkir': Id_Ongkir
      },
      dataType: 'JSON',
      success: function(data) {
        $('#Ongkir').html('Rp ' + data[0].Harga_Ongkir.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        $('#Provinsi').html(data[0].Provinsi);
        $('#totalBayar').html('Rp ' + (parseInt(data[0].Harga_Ongkir) + <?= $this->cart->total(); ?>).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        document.getElementById('Total_Pembayaran').value = (parseInt(data[0].Harga_Ongkir) + <?= $this->cart->total(); ?>);
      }
    });
  });

  $(document).on('click', '.lihat', function(e) {
    e.preventDefault();
    $('#lihat').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.upload', function(e) {
    e.preventDefault();
    $('#upload_photo').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desctrans', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    getInfoTrans(id);
  });

  function getRow(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Home/ajaxTransUser',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        var hasil = data[0];
        $('.name').html(hasil.Id_Transaksi);
        $('.prodid').val(hasil.Id_Transaksi);
        $('#Nmetode').html(hasil.Nama_Metode);
        $('.No_Tujuan').html(hasil.Nomor_Tujuan);
        $('.AtasNama').html(hasil.AtasNama);
        $('.fotodatabase').val(hasil.Foto_Pembayaran);
        document.getElementById("Update_Foto").src = "<?= base_url('asset/buktipembayaran/'); ?>" + hasil.Foto_Pembayaran;
      }
    });
  };

  function getInfoTrans(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Home/ajaxInfoTrans',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('#date').html(data.Tanggal_Transaksi);
        $('#transid').html(data.Id_Transaksi);
        $('#detail').html(data.list);
        $('#total').html(data.Total_Pembayaran);
        $('#alamat').html(data.Alamat_Pengiriman);
      }
    });
  };
</script>

</body>

</html>