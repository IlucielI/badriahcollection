<div id="content">
  <div class="row">
    <div class="col-md-6 col-xl-10 mb-4">
      <div class="card shadow border-left-primary py-2">
        <div class="card-body">
          <div class="row align-items-center no-gutters">
            <div class="col mr-2">
              <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                <span>Total omzet Bulan Ini</span></div>
              <div class="text-dark font-weight-bold h5 mb-0">Rp <span><?= number_format($penjualanbulan, 2); ?></span></div>
            </div>
            <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-xl-10 mb-4">
      <div class="card shadow border-left-success py-2">
        <div class="card-body">
          <div class="row align-items-center no-gutters">
            <div class="col mr-2">
              <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                <span>Total omzet</span></div>
              <div class="text-dark font-weight-bold h5 mb-0">Rp <span><?= number_format($penjualanall, 2); ?></span></div>
            </div>
            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-xl-10 mb-4">
      <div class="card shadow border-left-warning py-2">
        <div class="card-body">
          <div class="row align-items-center no-gutters">
            <div class="col mr-2">
              <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                <span>Total Barang</span></div>
              <div class="text-dark font-weight-bold h5 mb-0"><span><?= $totalbarang; ?></span> Jenis</div>
            </div>
            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-6 col-xl-10 mb-4">
      <div class="card shadow border-left-danger py-2">
        <div class="card-body">
          <div class="row align-items-center no-gutters">
            <div class="col mr-2">
              <div class="text-uppercase text-danger font-weight-bold text-xs mb-1">
                <span>Pemesanan Belum Selesai</span></div>
              <div class="text-dark font-weight-bold h5 mb-0"><span><?= $pemesanan; ?></span></div>
            </div>
            <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>