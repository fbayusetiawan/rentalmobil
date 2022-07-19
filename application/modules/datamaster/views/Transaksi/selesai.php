<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?> Yang Selesai Dirental</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="basic-datatable" class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Identitas (KTP/SIM)</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">No Telpon</th>
                            <th class="text-center">Mobil Yang Dirental</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Denda</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <?php $x = strtotime($row->tanggalKembali);
                                  $y = strtotime($row->tanggalSelesai);
                                  $selesai = abs($x - $y) / (60*60*24);
                                  $totalDenda = $selesai * $row->dendaMobil;  
                                    ?>
                            <tr>
                                <td width="50"><?= $no++ ?></td>
                                <td style="width: 100;"><?= $row->noKtp ?></td>
                                <td style="width: 100;"><?= $row->namaPelanggan ?></td>
                                <td style="width: 100;"><?= $row->noTelp ?></td>
                                <td style="width: 100;"><?= $row->namaMerk ?> <?= $row->namaMobil ?>, <?= $row->tahunMobil ?></td>

                                <td style="width: 100;">
                                    <?php
                                    if ($row->statusTransaksi == 0) {
                                        echo '<span class="badge badge-danger">Belum Melakukan Pembayaran</span>';
                                    } else if (
                                        $row->statusTransaksi == 1
                                    ) {
                                        echo '<span class="badge badge-info">Sudah Melakukan Pembayaran</span>';
                                    } else if (
                                        $row->statusTransaksi == 2
                                    ) {
                                        echo '<span class="badge badge-info">Selesai</span>';
                                    } else {
                                        echo '<span class="badge badge-success">Selesai Dirental</span>';
                                    }
                                    ?>
                                </td>
                                <td style="width: 100;">Rp.<?= number_format($totalDenda,0,',',',') ?></td>
                                <td width="100" class="text-center">
                                    <div class="btn-group mb-0">
                                        <!-- <a href="<?= base_url($linkin . '/edit/' . $row->idTransaksi) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a> -->
                                        <a href="<?= base_url($linkin . '/detail/' . $row->idTransaksi) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="detail"><i class="uil uil-eye"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idTransaksi) ?>" id="<?= $row->namaPelanggan ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->