<?php
if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $bulanTahun = $bulan . $tahun;
} else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan . $tahun;
}

$no = 1;

?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Filter Data Absensi Pegawai
            </div>
            <div class="card-body">
                <form class="form-inline" method="post" action="">
                    <div class="form-group mb-2">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control ml-2">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control ml-2">
                            <option value="">-- Pilih Tahun --</option>
                            <?php $thn = date('Y');
                            for ($i = 2020; $i < $thn + 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    <?php if (empty($gaji)) : ?>
                        <button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print"></i> Cetak Daftar Gaji</button>
                    <?php else : ?>
                        <a href="<?= base_url('admin/gaji/cetak?bulan=') . $bulan . '&tahun=' . $tahun; ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="alert alert-info mt-4" role="alert">Menampilkan Data Gaji Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table table id="basic-datatable" class="table nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jabatan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tj.Transport</th>
                                    <th>Tk. Makan</th>
                                    <th>Potongan</th>
                                    <th>Total Gaji</th>
                                </tr>
                            </thead>
                            <?php foreach ($potongan as $pot) {
                                $alpa = $pot->jumlahPotongan;
                            } ?>
                            <?php foreach ($gaji as $row) : ?>
                                <?php $potongan = $row->alpa * $alpa ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nik ?></td>
                                    <td><?= $row->namaPegawai ?></td>
                                    <td><?= $row->namaJabatan ?></td>
                                    <td>Rp.<?= get_rupiah($row->gapok) ?></td>
                                    <td>Rp.<?= get_rupiah($row->tjTransport) ?></td>
                                    <td>Rp.<?= get_rupiah($row->tjMakan) ?></td>
                                    <td>Rp.<?= get_rupiah($potongan) ?></td>
                                    <td>Rp.<?= get_rupiah($row->gapok + $row->tjTransport + $row->tjMakan - $potongan) ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>


                    </div>
                </div>
            </div>
        </div>