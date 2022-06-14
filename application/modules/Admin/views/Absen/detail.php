<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Input Data Rekapitulasi Absensi Bulan <?= $row->bulan ?> Tahun <?= $row->tahun ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIK</th>
                            <th class="text-center">Hadir</th>
                            <th class="text-center">Izin</th>
                            <th class="text-center">Sakit</th>
                            <th class="text-center">Tanpa Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $data) : ?>
                            <?php
                            $this->db->where('idPegawai', $data->idPegawai);
                            $this->db->where('idAbsen', $row->idAbsen);
                            $hasil = $this->db->get('absen_detail')->row();
                            if (empty($hasil->idAbsenDetail)) :
                                $h = '';
                                $i = '';
                                $s = '';
                                $tk = '';
                            else :
                                $h = $hasil->hadir;
                                $i = $hasil->izin;
                                $s = $hasil->sakit;
                                $tk = $hasil->tanpaKeterangan;
                            endif;
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= $data->namaPegawai ?></td>
                                <td><?= $data->nik ?></td>
                                <td><input type="text" class="form-control angka" value="<?= $h ?>" id="hadir<?= $data->idPegawai ?>" onkeyup="getKehadiran('<?= $row->idAbsen ?>','<?= $data->idPegawai ?>')"></td>
                                <td><input type="text" class="form-control angka" value="<?= $i ?>" id="izin<?= $data->idPegawai ?>" onkeyup="getKehadiran('<?= $row->idAbsen ?>','<?= $data->idPegawai ?>')"></td>
                                <td><input type="text" class="form-control angka" value="<?= $s ?>" id="sakit<?= $data->idPegawai ?>" onkeyup="getKehadiran('<?= $row->idAbsen ?>','<?= $data->idPegawai ?>')"></td>
                                <td><input type="text" class="form-control angka" value="<?= $tk ?>" id="tk<?= $data->idPegawai ?>" onkeyup="getKehadiran('<?= $row->idAbsen ?>','<?= $data->idPegawai ?>')"></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script>
    function getKehadiran(idAbsen, idPegawai) {
        var hadir = $("#hadir" + idPegawai).val();
        var izin = $("#izin" + idPegawai).val();
        var sakit = $("#sakit" + idPegawai).val();
        var tk = $("#tk" + idPegawai).val();
        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/insertDetail") ?>',
            data: 'h=' + hadir + '&i=' + izin + '&s=' + sakit + '&tk=' + tk + '&idAbsen=' + idAbsen + '&idPegawai=' + idPegawai,
            success: function(data) {
                // $('#devisi').html(data)
            }
        })
    }
</script>