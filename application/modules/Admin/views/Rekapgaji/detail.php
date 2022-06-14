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
        <h4 class="mb-1 mt-0">Input Data Rekapitulasi Absensi Bulan <?= $row->bulan ?> Tahun <?= $row->tahun ?></h4>
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
                            <th class="text-center">Gaji Pokok</th>
                            <th class="text-center">Tunjangan Transport</th>
                            <th class="text-center">Tunjangan Makan</th>
                            <th class="text-center">Potongan</th>
                            <th class="text-center">Total Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($potongan as $p) { ?>
                            <?php $tanpaKeterangan = $p['jumlahPotongan']; ?>
                        <?php } ?>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <!-- <?php $potongan = $absen['tanpaKeterangan'] * $tanpaKeterangan; ?> -->

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->namaPegawai ?></td>
                                <td><?= $row->nik ?></td>
                                <td style="width: 100;">Rp.<?= get_rupiah($row->gapok) ?></td>
                                <td style="width: 100;">Rp.<?= get_rupiah($row->tjTransport) ?></td>
                                <td style="width: 100;">Rp.<?= get_rupiah($row->tjMakan) ?></td>
                                <td style="width: 100;">Rp.<?= get_rupiah($potongan) ?></td>
                                <td style="width: 100;">Rp.<?= get_rupiah($row->tjMakan + $row->tjTransport + $row->gapok) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>