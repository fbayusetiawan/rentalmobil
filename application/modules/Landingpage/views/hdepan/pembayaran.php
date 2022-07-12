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
                    <h1 class="mb-4">Daftar Transaksi</h1>
                    <p class="mb-4 pb-2">Silahkan lakukan Pembayaran dengan menakan tombol Klik Untuk Bayar.</p>
                    <?= $this->session->flashdata('message'); ?>
                    <table id="basic-datatable" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Mobil</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Upload Bukti Transfer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($row as $data) : ?>
                                <?php
                                $x = strtotime($data->tanggalPinjam);
                                $y = strtotime($data->tanggalKembali);
                                $jmlHari = abs(($y - $x) / (60 * 60 * 24));
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->namaPelanggan ?></td>
                                    <td><?= $data->namaMobil ?></td>
                                    <td><?= tgl_indo($data->tanggalPinjam) ?></td>
                                    <td><?= tgl_indo($data->tanggalKembali) ?></td>
                                    <!-- <td>
                                        <a href="<?= base_url($linkin . '/invoice/' . $data->idTransaksi) ?>" class="btn btn-info btn-sm" data-toggle="tooltip">Klik untuk Bayar</a>
                                    </td> -->
                                    <td>
                                        <?php if ($data->statusTransaksi == 0) {
                                            echo '<a href="' . base_url($linkin . '/invoice/' . $data->idTransaksi) . '" class="btn btn-info btn-sm" data-toggle="tooltip">Klik untuk Bayar</a>';
                                        } else {
                                            echo '<a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip">Menunggu Konfirmasi</a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url($linkin . '/deleteTransaksi/' . $data->idTransaksi) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
</div>