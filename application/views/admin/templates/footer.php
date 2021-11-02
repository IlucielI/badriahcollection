</main>
</div>
<div class="container">
  <p class="copyright text-center mb-0">Badriah Collection © <?= date('Y'); ?></p>
</div>

<div class="costumalert">
  <span class="exclamation"><img src="<?= base_url() ?>asset/img/exclamation.png" width="25px"></span>
  <span class="msg mt-2">
    <p class="p-3 ml-3 mr-3">Warning: This is a warning alert !</p>
  </span>
  <div class="close-btn">
    <span class="close"><img src="<?= base_url() ?>asset/img/close.png" width="20px"></span>
  </div>
</div>

<script src="<?= base_url() ?>asset/js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>asset/js/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>asset/js/moment.js"></script>
<script src="<?= base_url() ?>asset/js/daterangepicker.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap-timepicker.min.js"></script>
<script>
  $(document).ready(function() {
    sidebarCollapse = document.getElementById("sidebarCollapse");
    sidebar = document.getElementById("sidebar");
    sidebarCollapse.addEventListener("click", function() {
      sidebar.classList.toggle("active");
    });

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('#addproduct').click(function(e) {
      e.preventDefault();
      getCategory();
    });
    $("#addnew").on("hidden.bs.modal", function() {
      $('.append_items').remove();
    });

    $(document).on('click', '.desc', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.edit', function(e) {
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.delete', function(e) {
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.photo', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
      getAlter(id);
    });

    $(document).on('click', '.editsubkategori', function(e) {
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getSub(id);
    });

    $(document).on('click', '.deletesubkategori', function(e) {
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getSub(id);
    });

    $(document).on('click', '.photosubkategori', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getSub(id);
    });

    $(document).on('click', '.editkategori', function(e) {
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getKat(id);
    });

    $(document).on('click', '.deletekategori', function(e) {
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getKat(id);
    });

    $(document).on('click', '.photokategori', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getKat(id);
    });

    $(document).on('click', '.bayar', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getTrans(id);
    });

    $(document).on('click', '.kirim', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getTrans(id);
    });

    $(document).on('click', '.desctrans', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      getInfoTrans(id);
    });

    $('#select_category').change(function() {
      var val = $(this).val();
      if (val == 0) {
        window.location = '<?= base_url() ?>Admin/produk';
      } else {
        window.location = '<?= base_url() ?>Admin/produk/' + val;
      }
    });

    $('#Kategori_Barang').change(function() {
      var Id_Kategori = $(this).val();
      if (Id_Kategori == 0) {
        $('#SubKategori_Barang').prop('disabled', true);
      } else {
        $('#SubKategori_Barang').prop('disabled', false);
        getCat(Id_Kategori);
      }
    });

    $('#edit_category').change(function() {
      var Id_Kategori = $(this).val();
      $('#edit_subcategory').prop('disabled', false);
      getCat(Id_Kategori);
    });

    function getCat(Id_Kategori) {
      $.ajax({
        url: '<?= base_url() ?>Admin/ajaxSubKategori',
        type: "POST",
        data: {
          'Id_Kategori': Id_Kategori
        },
        dataType: 'JSON',
        success: function(data) {
          $('#edit_subcategory').html(data);
          $('#SubKategori_Barang').html(data);
        }
      });

    };

    //Date picker
    $('#datepicker_add').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    $('#datepicker_edit').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    $('#table').DataTable();
  });

  function getRow(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajax',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        var hasil = data[0];
        $('.Deskripsi').html(hasil.Deskripsi_Barang);
        $('.name').html(hasil.Nama_Barang);
        $('.prodid').val(hasil.Id_Barang);
        $('#edit_name').val(hasil.Nama_Barang);
        $('#Ubah_Harga').val(hasil.Harga_Barang);
        $('#Ubah_Stok').val(hasil.Stok_Barang);
        $('#Ubah_Ukuran').val(hasil.Ukuran_Barang);
        $('#Ubah_Berat').val(hasil.Berat_Barang);
        $('.fotodatabase').val(hasil.Foto_Barang);
        document.getElementById("Update_Foto").src = "<?= base_url('asset/barang/'); ?>" + hasil.Foto_Barang;
        $('#catselected').val(hasil.Id_Kategori).html(hasil.Nama_Kategori);
        $('#subcatselected').val(hasil.Id_SubKategori).html(hasil.Nama_SubKategori);
        $('#edit_price').val(hasil.Harga_Barang);
      }
    });
  };

  function getAlter(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajaxAlter',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        var i;

        for (i = 0; i < 5; i++) {
          if (data[i] == null) {
            document.getElementById("Update_FotoAlter" + (i + 1)).src = "<?= base_url('asset/barang/Noimage.png') ?>";
            document.getElementById("FotoAlter" + (i + 1)).href = "<?= base_url('admin/alterKosong') ?>";
          } else {
            document.getElementById("Update_FotoAlter" + (i + 1)).src = "<?= base_url('asset/barang/') ?>" + data[i].FotoAlter_Barang;
            document.getElementById("FotoAlter" + (i + 1)).href = "<?= base_url('admin/deleteAlter/') ?>" + data[i].Id;
          }
        }

      }
    });
  };

  function getSub(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajaxInfoSub',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        var hasil = data[0];
        $('.name').html(hasil.Nama_SubKategori);
        $('.prodid').val(hasil.Id_SubKategori);
        $('#edit_name').val(hasil.Nama_SubKategori);
        $('.fotodatabase').val(hasil.Foto_SubKategori);
        document.getElementById("Update_Foto").src = "<?= base_url('asset/subkategori/'); ?>" + hasil.Foto_SubKategori;
        $('#catselected').val(hasil.Id_Kategori).html(hasil.Nama_Kategori);
      }
    });
  };

  function getKat(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajaxInfoKat',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        var hasil = data[0];
        $('.name').html(hasil.Nama_Kategori);
        $('.prodid').val(hasil.Id_Kategori);
        $('#edit_name').val(hasil.Nama_Kategori);
        $('.fotodatabase').val(hasil.Foto_Kategori);
        document.getElementById("Update_Foto").src = "<?= base_url('asset/kategori/'); ?>" + hasil.Foto_Kategori;
      }
    });
  };

  function getInfoTrans(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajaxInfoTrans',
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
        $('#alamat').html(data.Alamat_Pengiriman)
      }
    });
  };


  function getTrans(id) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url() ?>Admin/ajaxTrans',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        var hasil = data[0];
        $('.name').html(hasil.Id_Transaksi);
        $('.prodid').val(hasil.Id_Transaksi);
        $('#bayarselected').val(hasil.Id_StatusBayar).html(hasil.Status_Bayar);
        $('#kirimselected').val(hasil.Id_StatusKirim).html(hasil.Status_Kirim);
        document.getElementById("Update_Foto").src = "<?= base_url('asset/buktipembayaran/'); ?>" + hasil.Foto_Pembayaran;
      }
    });
  };
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
</body>

</html>