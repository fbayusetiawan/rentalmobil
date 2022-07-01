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
        <h4 class="mb-1 mt-0">Masukkan Data Mobil Untuk Service</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" enctype="multipart/form-data" action="<?= base_url($linkin . '/serviceAction/' . $this->uri->segment(4)) ?>" method="post">


                    <input type="text" class="form-control" name="idMobil" value="<?= $row->idMobil ?>" hidden required>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Mobil </label>
                        <input type="text" class="form-control" name="namaMobil" value="<?= $row->namaMobil ?>">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Servis</label>
                        <input type="date" class="form-control" name="tanggalService" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Biaya Service</label>
                        <input type="number" class="form-control" name="biayaService" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Keterangan Service</label>
                        <input type="text" class="form-control" name="keterangan" required>
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