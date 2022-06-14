<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Input Data Rekapitulasi Gaji Bulan <?= $row->bulan ?> Tahun <?= $row->tahun ?></h4>
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
                            <th>Nominal Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->namaPegawai ?></td>
                                <td><?= $data->nik ?></td>
                                <td class="text-right">Rp. <?= number_format(floatval($data->nominalGaji), 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <?php if (empty($data->idGajiDetail)) : ?>
                                            <a href="<?= base_url($linkin . '/addGajiDetail/' . $row->idGaji . '/' . $data->idPegawai) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Tambah Data Nominal Gaji"><i class="uil uil-plus"></i></a>
                                        <?php else : ?>
                                            <a href="<?= base_url($linkin . '/editGajiDetail/' . $row->idGaji . '/' . $data->idGajiDetail) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                            <a href="<?= base_url($linkin . '/deleteGajiDetail/' . $row->idGaji . '/' . $data->idGajiDetail) ?>" id="<?= $data->namaPegawai ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                            <!-- <a href="<?= base_url($linkin . '/tunjungan/' . $data->idGajiDetail) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Tambah Tunjangan"><i class="uil uil-plus"></i></a> -->
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

<script>
    function getKehadiran(idAbsen, idPegawai) {
        var hadir = $("#hadir" + idPegawai).val();
        var izin = $("#izin" + idPegawai).val();
        var sakit = $("#sakit" + idPegawai).val();
        var tk = $("#tk" + idPegawai).val();
        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/insertDetail") ?>',
            data: 'h=' + hadir + '&i=' + izin + '&s=' + sakit + '&tk=' + tk + '&idAbsen=' + idAbsen + '&idPegawai=' + idPegawai,
            success: function(data) {
                // $('#devisi').html(data)
            }
        })
    }
</script>