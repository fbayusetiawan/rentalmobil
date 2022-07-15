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
                            <th>Gambar Jaminan</th>
                            <th>Nama Pelanggan</th>
                            <th>Jaminan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td width="50"><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('upload/' . $row->fotoJaminan) ?>" width="100px" alt="">
                                </td>
                                <td style="width: 100;"><?= $row->namaPelanggan ?></td>
                                <td style="width: 100;"><?= $row->namaJaminan ?></td>
                                <td width="100" class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idJaminan) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="edit"><i class="uil uil-edit"></i></a>
                                        <!-- <a href="<?= base_url($linkin . '/detail/' . $row->idJaminan) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="detail"><i class="uil uil-eye"></i></a> -->
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idJaminan) ?>" id="<?= $row->namaJaminan ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="hapus"><i class="uil uil-trash-alt"></i></a>
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