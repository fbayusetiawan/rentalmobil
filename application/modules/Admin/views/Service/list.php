<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/edit') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
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
                            <th>Servis</th>
                            <th>Tanggal</th>
                            <th>Biaya Servis</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td width="50"><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('upload/' . $row->foto) ?>" width="100px" alt="">
                                </td>
                                <td style="width: 100;"><?= $row->namaMerk ?> <?= $row->namaMobil ?></td>
                                <td style="width: 100;"><?= $row->keterangan ?></td>
                                <td style="width: 100;"><?= tgl_indo($row->tanggalService) ?></td>
                                <td style="width: 100;">Rp.<?= number_format(floatval($row->biayaService), 0, ',', '.')  ?></td>
                                <td style="width: 100;"><?= $row->status == '0' ? '<span class="badge badge-success">Selesai Servis</span>' : '<span class="badge badge-danger">Masih di Servis</span>' ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <?php if ($row->status == '1') : ?>
                                            <a href="<?= base_url($linkin . '/aktif/' . $row->idService) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Selesai"><i class="uil uil-puzzle-piece"></i></a>
                                        <?php elseif ($row->status == '0') : ?>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idService) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                            <a href="<?= base_url($linkin . '/surat/' . $row->idService) ?>" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Cetak Bukti Servis"><i class="uil uil-postcard"></i></a>
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
<!-- end row-->