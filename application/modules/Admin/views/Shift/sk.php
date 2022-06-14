<?php
$no = 1;
$now = date('Y-m-d');
$fd_shift = [
    '1' => "Pagi",
    '2' => "malam",
    '3' => "Libur",
]
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
    <style>
        .text-center {
            text-align: center !important;
        }
    </style>
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
    <p class="text-center">
        <b>
            <U>
                <FONT size="4">JADWAL SHIFT</FONT>
            </U>
    </p>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <br>
                <br><br><br>
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Bulan</th>
                            <th>Nama Pegawai</th>
                            <th class="text-center">Devisi</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->bulan ?></td>
                                <td><?= $row->namaPegawai ?></td>
                                <td><?= $row->namaDevisi ?></td>
                                <td><?= $row->hari ?></td>
                                <td><?= $fd_shift[$row->shift] ?></td>
                            </tr>
                        <?php endforeach ?>
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