<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($ctrl . '/editGajiDetailAction/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="validationCustom01">Nominal Gaji</label>
                <input type="text" name="nominalGaji" value="<?= $row->nominalGaji ?>" required class="form-control uang">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>