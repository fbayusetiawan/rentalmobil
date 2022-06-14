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
            <img src="<?= base_url() ?>/assets/images/dinas.png" align="left" width="65">
            <font size="4">PEMERINTAH KOTA BANJARMASIN</font> <br>
            <font size="5">DINAS PERINDUSTRIAN DAN PERDAGANGAN</font> <br>
            <font size="2"> Jl. Brigjend. H. Hasan Baseri. Komplek Simp. Sei, Gg. Tangga Jalur II No.03, Alalak Utara, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70125</font>
        </b><br>
    </p>
    <hr size="1px" color="black">
    <hr size="4px" color="black">

    <h3>
        <center>
            PRESTASI PEGAWAI BULAN <?= strtoupper($bulan) ?>
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
                            <th style="text-align:center; font-size: 18px;">Prestasi yang di dapat</th>
                            <th style="text-align:center; font-size: 18px;">Nilai Kerajinan</th>
                            <th style="text-align:center; font-size: 18px;">Nilai Kehadiran</th>
                            <th style="text-align:center; font-size: 18px;">Nilai Perilaku</th>
                            <th style="text-align:center; font-size: 18px;">Nilai Profesionalisme</th>
                            <th style="text-align:center; font-size: 18px;">Nilai Tanggung Jawab</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row->namaPegawai ?></td>
                                <td><?= $row->nik ?></td>
                                <td><?= $row->prestasiDiraih ?></td>
                                <td><?= $row->kerajinan ?></td>
                                <td><?= $row->kehadiran ?></td>
                                <td><?= $row->perilaku ?></td>
                                <td><?= $row->profesional ?></td>
                                <td><?= $row->tanggungJawab ?></td>
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
            <td align="center">Kepala Dinas <br><br><br></td>
        </tr>
        <tr>
            <td align="center"></td>
            <td></td>
            <td align="center"><b><u> Dr. H. Abdul Haris, M.Si</u><br> NIP. 198011252000121003</b></td>
        </tr>
    </table>
</body>

</html>