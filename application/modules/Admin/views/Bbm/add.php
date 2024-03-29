<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Supir</label>
                        <select class="form-control" name="idPegawai">
                            <option value="">--- Pilih Nama Supir ---</option>
                            <?php foreach ($supir as $s) { ?>
                                <option value="<?php echo $s->idPegawai; ?>"><?= $s->noIndukKepegawaian ?> - <?= $s->namaPegawai ?> </option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Mobil</label>
                        <select class="form-control" name="idMobil">
                            <option value="">--- Pilih Mobil ---</option>
                            <?php foreach ($mobil as $m) { ?>
                                <option value="<?php echo $m->idMobil; ?>"><?= $m->namaMerk ?> - <?= $m->namaMobil ?> <?= $m->tahunMobil ?> </option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
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
                        <input type="date" class="form-control" name="tanggalBbm" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tujuan</label>
                        <input type="text" class="form-control" name="tujuanBbm" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Biaya BBM</label>
                        <input type="text" class="form-control" name="biayaBbm" required>
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
                    <a href="<?= base_url($linkin) ?>" class=" btn-sm btn btn-danger">Kembali</a>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>