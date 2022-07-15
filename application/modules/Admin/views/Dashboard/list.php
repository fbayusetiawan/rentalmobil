<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <!-- <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li> -->
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"> <?= $title ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Supir</span>
                        <h2 class="mb-0 text-info"><?= $pegawai ?> Orang</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Pelanggan Rental</span>
                        <h2 class="mb-0 text-info"><?= $pelanggan ?> Orang</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Mobil Tersedia</span>
                        <!-- <a href="<?= base_url('Posyandu/Bumil/New') ?>"> -->
                        <h2 class="mb-0 text-info"><?= $totalMobil ?> Mobil</h2>
                        <!-- </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Jumlah Mobil Terental</span>
                        <h2 class="mb-0 text-info"><?= $totalMobil1 ?> Mobil</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>