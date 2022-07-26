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
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logorental.png">
</head>

<body>
    <p align="center">
        <b>
            <img src="<?= base_url() ?>/assets/images/logorental.png" align="left" width="65">
            <!-- <font size="4">CV NASIR RENTAL</font> <br> -->
            <font size="5">CV NASIR RENTAL BANJARMASIN</font> <br>
            Jl. Banjar Permai IV No.185, RT.05/RW.01, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70248
        </b><br>
    </p>
    <hr size="1px" color="black">
    <hr size="4px" color="black">

    <h3>
        <center>
            DATA MOBIL CV NASIR RENTAL BANJARMASIN
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <!-- <th>Gambar Mobil</th> -->
                            <th>Nama Mobil</th>
                            <th>Jenis BBM</th>
                            <th>Biaya BBM</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td width="50"><?= $no++ ?></td>
                                <!-- <td>
                                    <img src="<?= base_url('upload/' . $row->fotoMobil) ?>" width="100px" alt="">
                                </td> -->
                                <td style="width: 100;"><?= $row->namaMerk ?> <?= $row->namaMobil ?></td>
                                <td style="width: 100;"><?= $row->jenisBbm ?></td>
                                <td style="width: 100;">Rp.<?= number_format(floatval($row->biayaBbm), 0, ',', '.')  ?></td>
                                <td style="width: 100;"><?= tgl_indo($row->tanggalBbm) ?></td>
                                <td style="width: 100;"><?= $row->tujuanBbm ?></td>
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
            <td align="center">Pemilik <br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center">Nasir, S.E</td>
        </tr>
    </table>
</body>

</html>