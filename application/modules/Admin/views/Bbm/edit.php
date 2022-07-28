<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($ctrl . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Edit Data</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" enctype="multipart/form-data" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Supir</label>
                        <?= cmb_dinamis('idPegawai', 'pegawai', 'namaPegawai', 'idPegawai', $selected = $row->idPegawai, '') ?>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Mobil</label>
                        <?= cmb_dinamis('idMobil', 'mobil', 'namaMobil', 'idMobil', $selected = $row->idMobil, '') ?>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Bahan Bakar Mesin </label>
                        <?= form_dropdown('jenisBbm', fd_jenisBbm(), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal</label>
                        <input type="date" class="form-control" name="tanggalBbm" value="<?= $row->tanggalBbm ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tujuan</label>
                        <input type="text" class="form-control" name="tujuanBbm" value="<?= $row->tujuanBbm ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Biaya BBM</label>
                        <input type="text" class="form-control" name="biayaBbm" value="<?= $row->biayaBbm ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Bukti Nota BBM</label>
                        <input type="file" class="form-control" name="fotoBbm" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn-sm btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>