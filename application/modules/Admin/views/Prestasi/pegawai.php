<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
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
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th class="text-center">Jumlah Hari Aktif Bekerja</th>
                            <th class="text-center">Hadir</th>
                            <th class="text-center">Izin</th>
                            <th class="text-center">Sakit</th>
                            <th class="text-center">Tanpa Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= $row->tahun ?></td>
                                <td><?= $row->bulan ?></td>
                                <td class="text-center"><?= $row->jumlahHariKerja ?> Hari</td>
                                <td class="text-center"><?= $row->hadir ?> Hari</td>
                                <td class="text-center"><?= $row->izin ?> Hari</td>
                                <td class="text-center"><?= $row->sakit ?> Hari</td>
                                <td class="text-center"><?= $row->tanpaKeterangan ?> Hari</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>