<?php
$no = 1;
$now = date('Y-m-d');

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
</head>

<body>
    <p align="center">
        <b>
            <img src="<?= base_url() ?>/assets/images/logo.png" align="left" width="65">
            <font size="4">RUMAH SAKIT UMUM DAERAH</font> <br>
            <font size="5">SULTAN SURIANSYAH</font> <br>
            Jl. Rantauan Darat, Kelayan Sel., Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70234
        </b><br>
    </p>
    <hr size="1px" color="black">
    <hr size="4px" color="black">

    <h3>
        <center>
            CUTI PEGAWAI
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; font-size: 18px;">No</th>
                            <th style="text-align:center; font-size: 18px;">Nama Pegawai</th>
                            <th style="text-align:center; font-size: 18px;">NIK</th>
                            <th style="text-align:center; font-size: 18px;">Devisi</th>
                            <th style="text-align:center; font-size: 18px;">Tanggal Cuti</th>
                            <th style="text-align:center; font-size: 18px;">Alasan Cuti</th>
                            <th style="text-align:center; font-size: 18px;">Tanggal Mengajukan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row->namaPegawai ?></td>
                                <td><?= $row->nik ?></td>
                                <td><?= $row->namaDevisi ?></td>
                                <td><?= tgl_indo($row->dariTanggal) . ' s/d ' . tgl_indo($row->sampaiTanggal) ?></td>
                                <td><?= $row->alasanCuti ?></td>
                                <td><?= $row->tanggalPengajuan ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>

    <br>
    <table width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Banjarmasin, <?= tgl_indo($now) ?></td>
        </tr>
        <tr>
            <td align="center"><br><br><br></td>
            <td></td>
            <td align="center">Direktur <br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center">dr. Sukotjo Hartono <br> NIP. 198011252000121003</td>
        </tr>
    </table>
</body>

</html>