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
            BUKTI SERVICE MOBIL
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                Berhubung dengan adanya bukti service mobil ini,
                Pemilik CV Rental Nasir Banjarmasin dengan ini menyatakan bahwa:
                <br>
                <table cellspacing="0" width="100%">

                    <tr>
                        <td>Mobil</td>
                        <td>:</td>
                        <td><?= $row->namaMobil ?></td>
                    </tr>
                    <tr>
                        <td>Jenis MObil</td>
                        <td>:</td>
                        <td><?= $row->namaMerk ?></td>
                    </tr>
                    <tr>
                        <td>No Plat</td>
                        <td>:</td>
                        <td><?= $row->noPlat ?></td>
                    </tr>
                    <tr>
                        <td>Warna Mobil</td>
                        <td>:</td>
                        <td><?= $row->warnaMobil ?></td>
                    </tr>
                </table>
                <br>
                Telah <b>SELESAI DISERVIS</b> dengan keterangan servis yaitu "<b><?= $row->keterangan ?></b>".
                Dan biaya service sebesar <b>Rp.<?= number_format(floatval($row->biayaService), 0, ',', '.')  ?></b>. 
                Maka dengan adanya bukti service ini maka mobil dapat beroperasi kembali.
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