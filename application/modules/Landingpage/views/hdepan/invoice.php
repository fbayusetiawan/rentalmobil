<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="p-lg-5 pe-lg-0">
                    <!-- <h6 class="text-primary">Pembayaran</h6> -->
                    <h1 class="mb-4">Pembayaran</h1>
                    <p class="mb-4 pb-2">Silahkan lakukan Pembayaran dengan mengirimkan bukti transfer</p>
                    <table class="table">
                        <?php
                        $x = strtotime($row->tanggalPinjam);
                        $y = strtotime($row->tanggalKembali);
                        $jmlHari = abs(($y - $x) / (60 * 60 * 24));
                        ?>
                        <tr>
                            <th>Nama Mobil</th>
                            <td>:</td>
                            <td><?= $row->namaMobil ?> <?= $row->tahunMobil ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Sewa</th>
                            <td>:</td>
                            <td><?= tgl_indo($row->tanggalPinjam) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>:</td>
                            <td><?= tgl_indo($row->tanggalKembali) ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Sewa</th>
                            <td>:</td>
                            <td><?= $jmlHari ?> Hari</td>
                        </tr>
                        <tr>
                            <th>Harga Sewa Mobil</th>
                            <td>:</td>
                            <td>Rp.<?= number_format($row->harga * $jmlHari, 0, ',', ',') ?></td>
                        </tr>
                        <tr>
                            <th>Biaya Supir</th>
                            <td>:</td>
                            <td>Rp.<?= number_format($row->hargaSupir * $jmlHari, 0, ',', ',') ?></td>
                        </tr>

                    </table>


                </div>
            </div>
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="p-lg-5 pe-lg-0">
                    <h1 class="mb-4">Upload Bukti Transfer</h1>
                    <p class="mb-4 pb-2">Silahkan lakukan Pembayaran dengan mengirimkan bukti transfer</p>
                    <form action="<?= base_url($linkin . '/updateTransaksi/' . $this->uri->segment(4) ) ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <input type="text" name="totalHarga" hidden value="<?= ($row->harga + $row->hargaSupir) * $jmlHari ?>" id="">
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Total Harga Yang Harus Dibayar</label>
                            <input type="text" class="form-control" disabled value="Rp.<?= number_format(($row->harga + $row->hargaSupir) * $jmlHari, 0, ',', ',') ?>">
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url($linkin) ?>" class=" btn-sm btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>