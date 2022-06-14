<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($ctrl . '/addAction') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="validationCustom01">Bidang/Aspek</label>
                <?=
                form_dropdown('bidang', $optionBidang, 'default', 'class="form-control"');
                ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Waktu</label>
                <input type="text" name="waktu" id="validationCustom01" class="form-control" required>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Ambang Gangguan</label>
                <textarea name="namaAg" class="form-control" cols="30" rows="5"></textarea>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Desa</label>
                <?= cmb_dinamis('idDesa', 'desa', 'namaDesa', 'idDesa') ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Keterangan</label>
                <textarea name="keterangan" class="form-control" cols="30" rows="5"></textarea>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>
<script>
    function showBaju() {
        var lengan = $("#lengan").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("admin/bajumasuk/ajaxbm") ?>',
            data: "lengan=" + lengan,
            success: function(data) {
                $('#data').html(data)
            }
        })

    }
</script>