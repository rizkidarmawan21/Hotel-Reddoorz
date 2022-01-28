<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<p class="mb-4">Welcome <u><?= $user['name']?></u> to the dashboard page.</p>

    <div class="row">


        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Total Obat </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countObat ?></div>
                                    </div>
                                <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Stok Barang </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countStok['stok'] ?></div>
                                    </div>
                                <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Transaksi </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countTransaksi ?></div>
                                    </div>
                                <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Uang Masuk  <span class="badge badge-pill badge-secondary">Transaksi</span></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $total = 0;
                                                foreach($countUangMasuk as $u){
                                                    // echo $u['total'];
                                                    $total += $u['total'];
                                                }

                                                echo "Rp ", number_format($total, 0, ',', '.');
                                            ?>
                                        </div>
                                    </div>
                                <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 -->




    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
