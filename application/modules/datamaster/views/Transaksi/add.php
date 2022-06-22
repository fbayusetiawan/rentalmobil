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
                <form class="row g-4" action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="text" name="idPegawai" value="<?= $id ?>" hidden>

                    <div class="col-md-6 mt-3">
                        <label for="validationCustom01">Mobil </label>
                        <select name="idMobil" id="mobil" onchange="getMobil()" required class="form-control">
                            <option value="">Pilih Mobil</option>
                            <?php foreach (callTable('mobil')->result() as $mobil) : ?>
                                <option value="<?= $mobil->idMobil ?>"><?= $mobil->noPlat ?> - <?= $mobil->namaMobil ?> <?= $mobil->tahunMobil ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div id="listmobil"></div>
                    <div class="col-md-12 mt-3">
                        <label>Pilih Nama Pelanggan</label>
                        <select data-plugin="customselect" name="idPelanggan" required class="form-control" data-placeholder="Pilih Pelanggan">
                            <option></option>
                            <?php foreach (pelanggan() as $row) : ?>
                                <option value="<?= $row->idPelanggan ?>"><?= $row->namaPelanggan ?> - <?= $row->noKtp ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <label for="validationCustom01">Lama Sewa (Hari)</label>
                        <input type="number" class="form-control" name="hari" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="validationCustom01">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggalPeminjaman" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="validationCustom01">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tanggalKembali" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="validationCustom01">Harga Sewa</label>
                        <input type="number" class="form-control" name="harga" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="validationCustom01">Lokasi</label>
                        <input type="number" class="form-control" name="lokasi" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <button class="btn btn-primary col-md-12 mt-3" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger col-md-12 mt-1">Kembali</a>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<script>
    function getMobil() {
        var d = $("#mobil").val()
        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/getMobil") ?>',
            data: 'd=' + d,
            success: function(data) {
                $('#listmobil').html(data)
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