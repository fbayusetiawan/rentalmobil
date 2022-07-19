<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $row->namaMobil ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url('upload/' . $row->fotoMobil) ?>" width="400" class="mb-5" alt="">
                <table width="100%">
                    <tr>
                        <th width="25%">No Plat Mobil</th>
                        <th>: <?= $row->noPlat ?></th>
                    </tr>
                    <tr>
                        <th>Nama Mobil</th>
                        <th>: <?= $row->namaMobil ?></th>
                    </tr>
                    <tr>
                        <th>Pabrik Mobil</th>
                        <th>: <?= $row->namaMerk ?></th>
                    </tr>
                    <tr>
                        <th>Tahun Mobil</th>
                        <th>: <?= $row->tahunMobil ?></th>
                    </tr>
                    <tr>
                        <th>Jumlah Kursi Mobil</th>
                        <th>: <?= $row->jumlahKursi ?></th>
                    </tr>
                    <tr>
                        <th>Warna Mobil</th>
                        <th>: <?= $row->warnaMobil ?></th>
                    </tr>
                    <tr>
                        <th>Harga Sewa</th>
                        <th>: Rp.<?= number_format(floatval($row->hargaSewa), 0, ',', '.')  ?></th>
                    </tr>
                    <tr>
                        <th>Harga Denda Mobil</th>
                        <th>: Rp.<?= number_format(floatval($row->dendaMobil), 0, ',', '.')  ?></th>
                    </tr>
                    
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->