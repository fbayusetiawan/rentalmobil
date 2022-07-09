<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-12 quote-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="p-lg-5 pe-lg-0">
                    <!-- <h6 class="text-primary">Pembayaran</h6> -->
                    <h1 class="mb-4">Pembayaran</h1>
                    <p class="mb-4 pb-2">Silahkan lakukan Pembayaran dengan mengirimkan bukti transfer</p>
                    <table class="table">
                        <?php foreach ($row as $row) : ?>
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
                                <td><?= $row->tanggalPinjam ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Kembali</th>
                                <td>:</td>
                                <td><?= $row->tanggalKembali ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Hari Sewa</th>
                                <td>:</td>
                                <td><?= $jmlHari ?> Hari</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td>:</td>
                                <td>Rp.<?= number_format($row->harga, 0, ',', ',') ?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td>:</td>
                                <td>Rp.<?= number_format($row->harga, 0, ',', ',') ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
</div>