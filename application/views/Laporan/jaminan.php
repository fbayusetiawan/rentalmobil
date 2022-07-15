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
            DATA JAMINAN CV NASIR RENTAL BANJARMASIN
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; font-size: 18px;">No</th>
                            <th style="text-align:center; font-size: 18px;">Gambar</th>
                            <th style="text-align:center; font-size: 18px;">Jaminan</th>
                            <th style="text-align:center; font-size: 18px;">Nama Pelanggan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td align="center">
                                    <img src="<?= base_url('upload/' . $row->fotoJaminan) ?>" width="100px" alt="">
                                    </td>
                                    <td style="text-align:center; width: 100;"><?= $row->namaJaminan ?></td>
                                    <td style="text-align:center; width: 100;"><?= $row->namaPelanggan ?></td>
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