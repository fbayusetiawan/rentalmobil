<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/addDetail/' . $this->uri->segment(4)) ?>" class="btn btn-success">Tambah</a></li>
                <li><a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data Pegawai Berprestasi bulan <?= $row->bulan ?> Tahun <?= $row->tahun ?></h4>
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
                            <th>Prestasi yang di dapat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($detail as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->namaPegawai ?></td>
                                <td><?= $data->nik ?></td>
                                <td><?= $data->prestasiDiraih ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/editDetail/' . $data->idPrestasiDetail . '/' . $data->idPrestasi) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/deleteDetail/' . $data->idPrestasiDetail . '/' . $data->idPrestasi) ?>" id="<?= $data->namaPegawai ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
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