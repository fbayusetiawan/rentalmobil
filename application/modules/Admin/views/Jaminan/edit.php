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
                <form class="needs-validation" enctype="multipart/form-data" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pelanggan </label>
                        <select name="idPelanggan" required class="form-control">
                            <option value="">---Pilih Pelanggan---</option>
                            <?php foreach (callTable('pelanggan')->result() as $p) : ?>
                                <option <?= $row->idPelanggan == $p->idPelanggan ? 'selected' : '' ?> value="<?= $p->idPelanggan ?>"><?= $p->namaPelanggan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Jaminan</label>
                        <input type="text" class="form-control" name="namaJaminan" value="<?= $row->namaJaminan ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3>">
                        <img src="<?= base_url('upload/' . $row->fotoJaminan) ?>" width="300px" alt="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Jaminan</label>
                        <input type="file" class="form-control" name="fotoJaminan">
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