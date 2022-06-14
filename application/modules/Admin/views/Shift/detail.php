<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$fd_hari = [
    'Senin' => 'Senin',
    'Selasa' => 'Selasa',
    'Rabu' => 'Rabu',
    'Kamis' => 'Kamis',
    'Jumat' => 'Jumat',
    'Sabtu' => 'Sabtu',
    'Minggu' => 'Minggu',
];

?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><select id="hari" class="form-control" onchange="getpegawai('<?= $row->idShift ?>')">
                        <?php foreach ($fd_hari as $key => $day) : ?>
                            <option value="<?= $key ?>"><?= $day ?></option>
                        <?php endforeach ?>
                    </select></li>
                <li><select id="devisi" class="form-control" onchange="getpegawai('<?= $row->idShift ?>')">
                        <option value="">PILIH DEVISI</option>
                        <?php foreach (get_table('devisi') as $key) : ?>
                            <option value="<?= $key->idDevisi ?>"><?= $key->namaDevisi ?></option>
                        <?php endforeach ?>
                    </select></li>
                <!-- <li><a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a></li> -->
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Input Shift Jadwal Bulan <?= $row->bulan ?> Tahun <?= $row->tahun ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="tabledata"></div>
                <!-- 
                    
                        
                            
    
                        
                    
                    
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
                 -->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<script>
    function getpegawai(idShift) {
        var hari = $("#hari").val();
        var devisi = $("#devisi").val();

        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/getpegawai") ?>',
            data: 'hari=' + hari + '&devisi=' + devisi + '&idShift=' + idShift,
            success: function(data) {
                $('#tabledata').html(data)
            }
        })
    }

    function insertshift(idPegawai) {
        var shift = $("#shift" + idPegawai).val();
        var hari = $("#hari").val();
        $.ajax({
            type: 'Get',
            url: '<?= base_url($linkin . "/insertDetail") ?>',
            data: 'hari=' + hari + '&idPegawai=' + idPegawai + '&shift=' + shift + '&idShift=' + <?= $row->idShift ?>,
            success: function(data) {
                // $('#devisi').html(data)
            }
        })
    }
</script>