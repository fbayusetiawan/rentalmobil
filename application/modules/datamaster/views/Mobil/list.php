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
                            <th>No Plat Mobil</th>
                            <th>Nama Mobil</th>
                            <th>Pabrik Mobil</th>
                            <th>Jumlah Kursi</th>
                            <th>Status</th>
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
                                <td style="width: 100;"><?= $row->noPlat ?></td>
                                <td style="width: 100;"><?= $row->namaMobil ?></td>
                                <td style="width: 100;"><?= $row->namaMerk ?></td>
                                <td style="width: 100;"><?= $row->jumlahKursi ?></td>
                                <td style="width: 100;"><?= $row->isActive == '0' ? '<span class="badge badge-success">Tersedia</span>' : '<span class="badge badge-danger">Dirental</span>' ?></td>

                                <td width="100" class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idMobil) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/detail/' . $row->idMobil) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="detail"><i class="uil uil-eye"></i></a>
                                        <a href="<?= base_url($linkin . '/service/' . $row->idMobil) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="service"><i class="uil uil-clipboard"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idMobil) ?>" id="<?= $row->namaMobil ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="hapus"><i class="uil uil-trash-alt"></i></a>
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