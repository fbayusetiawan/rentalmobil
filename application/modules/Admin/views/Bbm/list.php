<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="basic-datatable" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar Mobil</th>
                            <th>Nama Mobil</th>
                            <th>Jenis BBM</th>
                            <th>Biaya BBM</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                            <th>Bukti Tf</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td width="50"><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('upload/' . $row->fotoMobil) ?>" width="100px" alt="">
                                </td>
                                <td style="width: 100;"><?= $row->namaMerk ?> <?= $row->namaMobil ?></td>
                                <td style="width: 100;"><?= $row->jenisBbm ?></td>
                                <td style="width: 100;">Rp.<?= number_format(floatval($row->biayaBbm), 0, ',', '.')  ?></td>
                                <td style="width: 100;"><?= tgl_indo($row->tanggalBbm) ?></td>
                                <td style="width: 100;"><?= $row->tujuanBbm ?></td>
                                <td style="width: 100;"><a href="#m_buktitf" data-toggle="modal">Klik Untuk Melihat</a></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idBbm) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idBbm) ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="hapus"><i class="uil uil-trash-alt"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="m_buktitf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/pelanggan') ?>" method="post" target="_blank">
                    <img src="<?= base_url('upload/' . $row->fotoBbm) ?>" class="mx-auto" width="250" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Print</button> -->
                </form>
            </div>
        </div>
    </div>
</div>