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
        <h4 class="mb-1 mt-0">Edit Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" enctype="multipart/form-data" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">No Identitas <small>(KTP, SIM, dll)</small> </label>
                        <input type="text" class="form-control" name="noKtp" value="<?= $row->noKtp ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap </label>
                        <input type="text" class="form-control" name="namaPelanggan" value="<?= $row->namaPelanggan ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Kelamin </label>
                        <?= form_dropdown('jk', fd_jk(), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Alamat </label>
                        <input type="text" class="form-control" name="alamat" value="<?= $row->alamat ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">No. Telpon </label>
                        <input type="text" class="form-control" name="noTelp" value="<?= $row->noTelp ?>" required>
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
<script>
    function getDevisi() {
        var d = $("#departemen").val()
        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/getDevisi") ?>',
            data: 'd=' + d,
            success: function(data) {
                $('#devisi').html(data)
            }
        })
    }

    function cekUser() {
        var user = $("#username").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/Pegawai/cekUser") ?>',
            data: "user=" + user,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>