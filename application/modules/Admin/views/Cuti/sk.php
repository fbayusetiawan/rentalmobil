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
                <FONT size="4">SURAT AKTIF KEMBALI</FONT>
            </U> <br>
            <FONT size="3">NOMOR <?= $row->ns ?>/MP/<?= $row->br ?>/<?= $row->ts ?></FONT> <br><br><br>
        </b>
    </p>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                Berhubungan dengan habisnya masa cuti yang diberikan,
                Direktur Rumah Sakit Umum Daerah Sultan Suriansyah dengan ini menyatakan bahwa:
                <br>
                <table cellspacing="0" width="100%">

                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $row->namaPegawai ?></td>
                    </tr>
                    <tr>
                        <td>Nomer Induk Pegawai</td>
                        <td>:</td>
                        <td><?= $row->noIndukKepegawaian ?></td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $row->tempatLahir . ', ' . tgl_indo($row->tanggalLahir) ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= fd_jk($row->jk) ?></td>
                    </tr>
                    <tr>
                        <td>Pangkat/Golongan</td>
                        <td>:</td>
                        <td><?= $row->namaPangkat . '/' . $row->namaGolongan ?></td>
                    </tr>
                </table>
                <br>
                Telah <b>AKTIF</b> kembali bekerja di Instansi Rumah Sakit Umum Daerah Sultan Suriansyah.
                demikian surat pemberitahuan ini, agar dapat digunakan sebagai mana mestinya.
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