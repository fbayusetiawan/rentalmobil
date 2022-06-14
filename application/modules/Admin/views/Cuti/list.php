<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <!-- <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li> -->
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data Riwayat <?= $title ?></h4>
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
                            <th>Tanggal Pengajuan</th>
                            <th>Alasan</th>
                            <th>Dari & Sampai Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= tgl_indo($row->tanggalPengajuan) ?></td>
                                <td><?= $row->alasanCuti ?></td>
                                <td><?= tgl_indo($row->dariTanggal) . ' s/d ' . tgl_indo($row->sampaiTanggal) ?> </td>
                                <td><?= fd_cuti($row->verify) ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <?php if ($row->verify == '2') : ?>
                                            <a href="<?= base_url($linkin . '/aktif/' . $row->idCuti) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Aktif"><i class="uil uil-puzzle-piece"></i></a>
                                        <?php elseif ($row->verify == '4') : ?>
                                            <a href="<?= base_url($linkin . '/surat/' . $row->idCuti) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Cetak Surat"><i class="uil uil-postcard"></i></a>
                                        <?php endif; ?>
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