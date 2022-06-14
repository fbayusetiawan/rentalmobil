<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
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
                        <label for="validationCustom01">NIK Pegawai</label>
                        <input type="text" name="nik" id="nikid" value="<?= $row->nik ?>"" onkeyup=" getpegawai()" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Pegawai</label>
                        <input type="text" name="namaPegawai" value="<?= $row->namaPegawai ?>" readonly id="namapegawai" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tempat, Tangga Lahir</label>
                        <input type="text" name="ttl" id="ttl" value="<?= $row->tempatLahir . ', ' . $row->tanggalLahir ?>" readonly class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pangkat/Golongan</label>
                        <input type="text" name="pangkatgoongan" value="<?= $row->namaPangkat . '/' . $row->namaGolongan ?>" id="pg" readonly class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Devisi</label>
                        <input type="text" name="devisi" value="<?= $row->namaDevisi ?>" id="devisi" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Naik Pangkat Menjadi</label>
                        <div class="row">
                            <div class="col-6">
                                <?= cmb_dinamis('pangkatDitetapkan', 'pangkat', 'namaPangkat', 'idPangkat', $row->pangkatDitetapkan) ?>
                            </div>
                            <div class="col-6">
                                <?= cmb_dinamis('golonganDitetapkan', 'golongan', 'namaGolongan', 'idGolongan', $row->golonganDitetapkan) ?>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Ditetapkan</label>
                        <input type="date" name="tanggalDitetapkan" value="<?= $row->tanggalDitetapkan ?>" id="validationCustom01" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus di isi.
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
    function getpegawai() {
        var nik = $("#nikid").val();
        $.ajax({
            url: '<?= base_url("Admin/Naikpangkat/ajaxpegawai") ?>',
            data: "nik=" + nik,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#namapegawai').val(obj.namapegawai);
                $('#ttl').val(obj.ttl);
                $('#pg').val(obj.pangkatgolongan);
                $('#devisi').val(obj.devisi);
            }
        })
    }
</script>