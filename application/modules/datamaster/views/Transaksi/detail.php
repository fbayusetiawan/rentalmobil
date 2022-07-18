<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- <img src="<?= base_url('upload/' . $row->foto) ?>" width="200" class="mb-5" alt=""> -->
                <table width="100%">
                    <?php
                    $x = strtotime($row->tanggalPinjam);
                    $y = strtotime($row->tanggalKembali);
                    $jmlHari = abs(($y - $x) / (60 * 60 * 24));
                    ?>
                    <tr>
                        <th width="25%">No. Identitas</th>
                        <th>: <?= $row->noKtp ?></th>
                    </tr>
                    <tr>
                        <th width="25%">Nama Lengkap</th>
                        <th>: <?= $row->namaPelanggan ?></th>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>: <?= fd_jk($row->jk) ?></th>
                    </tr>
                    <tr>
                        <th>Nomer Telepon</th>
                        <th>: <?= $row->noTelp ?></th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>: <?= $row->alamat ?></th>
                    </tr>
                    <tr>
                        <th>Mobil Yang Disewa</th>
                        <th>: <?= $row->namaMerk ?> <?= $row->namaMobil ?> - <?= $row->tahunMobil ?></th>
                    </tr>
                    <tr>
                        <th>Tanggal Rental</th>
                        <th>: <?= tgl_indo($row->tanggalPinjam) ?> - <?= tgl_indo($row->tanggalKembali) ?></th>
                    </tr>
                    <tr>
                        <th>Harga Sewa Mobil</th>
                        <th>: Rp.<?= number_format($row->harga, 0, ',', ',') ?> x <?= $jmlHari ?> Hari = Rp.<?= number_format($row->harga * $jmlHari, 0, ',', ',') ?></th>
                    </tr>
                    <tr>
                        <th>Harga Sewa Supir</th>
                        <th>: Rp.<?= number_format($row->hargaSupir, 0, ',', ',') ?> x <?= $jmlHari ?> Hari = Rp.<?= number_format($row->hargaSupir * $jmlHari, 0, ',', ',') ?></th>
                    </tr>
                </table>
                <!-- <br>
                <a href="<?= base_url($linkin) ?>"><button type="button" class="btn btn-danger btn-sm">Kembali</button></a> -->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url('upload/' . $row->fotoMobil) ?>" width="280" class="mb-5" alt="">
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- <img src="<?= base_url('upload/' . $row->foto) ?>" width="200" class="mb-5" alt=""> -->
                <table width="100%">
                    <tr>
                        <th width="25%">Foto KTP</th>
                        <th>:
                            <a href="#m_fotoktp" data-toggle="modal">Klik Untuk Melihat</a>
                    </tr>
                    <tr>
                        <th width="25%">Foto SIM</th>
                        <th>:
                            <a href="#m_fotosim" data-toggle="modal">Klik Untuk Melihat</a>
                    </tr>
                    <tr>
                        <th width="25%">Bukti Transfer</th>
                        <th>:
                            <a href="#m_buktitf" data-toggle="modal">Klik Untuk Melihat</a>
                    </tr>

                </table>
                <br>
                <?php
                if ($row->statusTransaksi == 1) {
                ?>
                    <a href="<?= base_url($linkin . '/setuju/' . $this->uri->segment(4)) ?>"><button type="button" class="btn btn-primary btn-sm">Setujui</button></a>
                <?php  } elseif ($row->statusTransaksi == 2) { ?>
                    <a href="#m_tanggalSelesai" data-toggle="modal"><button type="button" class="btn btn-success btn-sm">Selesai Rental</button></a>
                    <a href="<?= base_url($linkin . '/batal/' . $this->uri->segment(4)) ?>"><button type="button" class="btn btn-warning btn-sm">Batalkan Transaksi</button></a>
                <?php } else { ?>
                    <a href="<?= base_url($linkin . '/batal/' . $this->uri->segment(4)) ?>"><button type="button" class="btn btn-warning btn-sm">Batalkan Transaksi</button></a>
                <?php }
                ?>
                <a href="<?= base_url($linkin) ?>"><button type="button" class="btn btn-danger btn-sm">Kembali</button></a>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Harga Sewa</span>
                        <!-- <a href="<?= base_url('Posyandu/Bumil/New') ?>"> -->
                        <h2 class="mb-0 text-info">Rp.<?= number_format($row->totalHarga, 0, ',', ',') ?></h2>
                        <!-- </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row-->

<!-- Modal -->
<div class="modal fade" id="m_fotoktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto KTP Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/pelanggan') ?>" method="post" target="_blank">
                    <img src="<?= base_url('upload/' . $row->fotoKtp) ?>" width="250" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Print</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="m_fotosim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto SIM Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/pelanggan') ?>" method="post" target="_blank">
                    <img src="<?= base_url('upload/' . $row->fotoSim) ?>" width="250" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Print</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="m_buktitf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/pelanggan') ?>" method="post" target="_blank">
                    <img src="<?= base_url('upload/' . $row->fotoTransaksi) ?>" width="250" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Print</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="m_tanggalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengembalian Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url($linkin . '/actionSelesai/' . $this->uri->segment(4)) ?>" method="post" target="_blank">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tanggalSelesai">
                    </div>
                    <input type="text" value="<?= $row->dendaMobil ?>" hidden name="dendaTransaksi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>