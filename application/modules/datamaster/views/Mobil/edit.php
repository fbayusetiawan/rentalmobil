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
                <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomer KTP </label>
                        <input type="text" class="form-control nip" value="<?= $row->nik ?>" name="nik" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap </label>
                        <input type="text" class="form-control" value="<?= $row->namaPegawai ?>" name="namaPegawai" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tempat Lahir </label>
                        <input type="text" class="form-control" value="<?= $row->tempatLahir ?>" name="tempatLahir" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Lahir </label>
                        <input type="date" class="form-control" value="<?= $row->tanggalLahir ?>" name="tanggalLahir" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Kelamin </label>
                        <?= form_dropdown('jk', fd_jk(), $row->jk, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status Kepegawaian </label>
                        <?= form_dropdown('statusKepegawaian', fd_kepegawaian(), $row->statusKepegawaian, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="validationCustom01">Departemen </label>
                        <select name="departemen" id="departemen" onchange="getDevisi()" required class="form-control">
                            <option value="">Pilih Departemen</option>
                            <?php foreach (callTable('departemen')->result() as $departemen) : ?>
                                <option value="<?= $departemen->idDepartemen ?>"><?= $departemen->namaDepartemen ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div id="devisi"></div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Golongan </label>
                        <select name="idGolongan" required class="form-control">
                            <option value="">Pilih Golongan</option>
                            <?php foreach (callTable('golongan')->result() as $golongan) : ?>
                                <option <?= $row->idGolongan == $golongan->idGolongan ? 'selected' : '' ?> value="<?= $golongan->idGolongan ?>"><?= $golongan->namaGolongan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pangkat </label>
                        <select name="idPangkat" required class="form-control">
                            <option value="">Pilih Pangkat</option>
                            <?php foreach (callTable('pangkat')->result() as $pangkat) : ?>
                                <option <?= $row->idPangkat == $pangkat->idPangkat ? 'selected' : '' ?> value="<?= $pangkat->idPangkat ?>"><?= $pangkat->namaPangkat ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jabatan </label>
                        <select name="idJabatan" required class="form-control">
                            <option value="">Pilih Jabatan</option>
                            <?php foreach (callTable('jabatan')->result() as $jabatan) : ?>
                                <option <?= $row->idJabatan == $jabatan->idJabatan ? 'selected' : '' ?> value="<?= $jabatan->idJabatan ?>"><?= $jabatan->namaJabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomer WhatsApp </label>
                        <input type="text" value="<?= $row->noWa ?>" class="form-control wa" name="noWa" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Alamat </label>
                        <input type="text" class="form-control" value="<?= $row->alamat ?>" name="alamat" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Mulai Bekerja </label>
                        <input type="date" class="form-control" value="<?= $row->tanggalMulaiBekerja ?>" name="tanggalMulaiBekerja" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Username <small id="info"></small> </label>
                        <input type="text" class="form-control" value="<?= $row->username ?>" onkeyup="cekUser()" id="username" minlength="6" name="username" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Password </label>
                        <input type="text" class="form-control" name="password">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto </label>
                        <input type="file" class="form-control" name="foto">
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