<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="<?= base_url('upload/' . $row->fotoMobil) ?>" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary"><?= $row->namaMerk ?></h6>
                    <h1 class="mb-4"><?= $row->namaMobil ?></h1>
                    <p>
                    <table class="table">

                        <tbody>
                            <tr>
                                <th scope="row">Nama Mobil</th>
                                <td>: <?= $row->namaMerk ?> <?= $row->namaMobil ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No Plat</th>
                                <td>: <?= $row->noPlat ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun</th>
                                <td>: <?= $row->tahunMobil ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Warna</th>
                                <td>: <?= $row->warnaMobil ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kursi</th>
                                <td>: <?= $row->jumlahKursi ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                    <p>
                        <!-- <a href="" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">Pemesanan</h6>
                    <h1 class="mb-4">Silahkan isi data dibawah ini untuk pemesanan</h1>
                    <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                    <form class="needs-validation" enctype="multipart/form-data" action="<?= base_url($linkin . '/transaksiAction/' . $this->uri->segment(4)) ?>" method="post">
                        <div class="row g-3">
                            <input type="text" class="form-control" name="idMobil" value="<?= $row->idMobil ?>" aria-label="Sizing example input" hidden aria-describedby="inputGroup-sizing-sm">
                            <input type="text" class="form-control" name="idPelanggan" value="<?= $this->session->userdata('idPelanggan'); ?>" hidden aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama Mobil</span>
                                <input type="text" class="form-control" value="<?= $row->namaMerk ?> <?= $row->namaMobil ?>" aria-label="Sizing example input" disabled aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Supir</label>
                                <select class="form-select" name="idPegawai" id="inputGroupSelect01">
                                    <option value="">Klik untuk Pilih Supir</option>
                                    <?php foreach (callTable('pegawai')->result() as $p) : ?>
                                        <option value="<?= $p->idPegawai ?>"><?= $p->namaPegawai ?> - Rp.<?= number_format($p->hargaSupir,0,',',',') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal Sewa</span>
                                <input type="date" class="form-control" id="tgl1" name="tanggalPinjam" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Sampai Tanggal</span>
                                <input type="date" class="form-control" id="tgl2" name="tanggalKembali" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <input type="text" class="form-control"  name="harga" value="<?= $row->hargaSewa ?>" aria-label="Sizing example input" hidden aria-describedby="inputGroup-sizing-sm">

                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <div class="p-lg-5 pe-lg-0">
                    <!-- <h6 class="text-primary">Pembayaran</h6> -->
                    <h1 class="mb-4">Pembayaran</h1>
                    <p class="mb-4 pb-2">Pembayaran dapat dilakukan melalui transfer ke no rekening yang ada dibawah.</p>
                </div>
                <div class="col-lg-12 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-80">
                        <img class="position-absolute img-fluid w-100" src="<?= base_url() ?>/assets/images/rekening.png" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const date1 = new Date('tgl1');
    const date2 = new Date('tgl2');
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    console.log(diffTime + " milliseconds");
    console.log(diffDays + " days");
</script>