<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
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
                <table id="basic-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIK</th>
                            <th>Devisi</th>
                            <th>Kesalahan</th>
                            <th>Hukuman</th>
                            <th>Pada Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= $row->namaPegawai ?></td>
                                <td><?= $row->nik ?></td>
                                <td><?= $row->namaDevisi ?></td>
                                <td><?= $row->kesalahan ?></td>
                                <td><?= $row->hukuman ?></td>
                                <td><?= tgl_indo($row->tanggalTeguran) ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/sk/' . $row->idTeguran) ?>" class="btn btn-info btn-sm" target="_blank" data-toggle="tooltip" title="Cetak SK"><i class="uil uil-postcard"></i></a>
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idTeguran) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idTeguran) ?>" id="<?= $row->namaPegawai ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
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