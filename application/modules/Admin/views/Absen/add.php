<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="card">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Input Data Absensi Pegawai
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
                        for ($i = 2022; $i < $thn + 3; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>Submit</button>
            </form>
        </div>
    </div>

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

    ?>

    <div class="alert alert-info mt-4" role="alert">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

    <!-- Table -->
    <form action="<?= base_url('Admin/Absen/actionAbsen'); ?>" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th width="8%">Hadir</th>
                    <th width="8%">Sakit</th>
                    <th width="8%">Alpa</th>
                </tr>
                <?php $no = 1;
                foreach ($absen as $a) : ?>
                    <tr>
                        <input type="text" name="bulan[]" class="form-control" value="<?= $bulanTahun; ?>" hidden>
                        <input type="text" name="nik[]" class="form-control" value="<?= $a->nik ?>" hidden>
                        <input type="text" name="idPegawai[]" class="form-control" value="<?= $a->idPegawai ?>" hidden>
                        <input type="text" name="idJabatan[]" class="form-control" value="<?= $a->idJabatan ?>" hidden>
                        <td><?= $no++; ?></td>
                        <td><?= $a->nik ?></td>
                        <td><?= $a->namaPegawai ?></td>
                        <td><?= $a->namaJabatan ?></td>
                        <td>
                            <input type="number" name="hadir[]" class="form-control" value="0">
                        </td>
                        <td>
                            <input type="number" name="sakit[]" class="form-control" value="0">
                        </td>
                        <td>
                            <input type="number" name="alpa[]" class="form-control" value="0">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php if (empty($absen)) : ?>
                <div class="alert alert-danger text-center" role="alert">Data tidak ditemukan.</div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>