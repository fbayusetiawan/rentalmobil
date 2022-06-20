<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function callTable($table)
{
    $ci = &get_instance();
    $data = $ci->db->get($table);
    return $data;
}
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function noOtomatis($field, $as, $table)
{
    $ci = &get_instance();
    $sql = "SELECT MAX($field) as $as FROM $table";
    $result = $ci->db->query($sql)->row();
    $noUrut = $result->$as + 1;
    $kode = sprintf("%03s", $noUrut);
    return $kode;
}

function fd_agama($val = null)
{
    $option = [
        '1' => 'Islam',
        '2' => 'Kristen',
        '3' => 'Katolik',
        '4' => 'Hindu',
        '5' => 'Budha',
        '6' => 'Kong Hu Chu',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_pendidikan($val = null)
{
    $option = [
        '1' => 'Perguruan Tinggi',
        '2' => 'Akademik',
        '3' => 'SMU',
        '4' => 'SMP',
        '5' => 'SD',
        '6' => 'Tidak Sekolah',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_goldar($val = null)
{
    $option = [
        'A' => 'A',
        'B' => 'B',
        'AB' => 'AB',
        'O' => 'O',

    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_pekerjaan($val = null)
{
    $option = [
        '1' => 'TNI/POLRI',
        '1' => 'Dokter/Tenaga Kesehatan',
        '2' => 'PNS',
        '3' => 'Pegawai Swasta',
        '4' => 'Karyawan Swasta',
        '5' => 'Wiraswasta',
        '6' => 'Tidak Bekerja',
        '7' => 'Lainnya',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_jk($val = null)
{
    $option = [
        '1' => 'Laki-laki',
        '2' => 'Perempuan',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_perkawinan($val = null)
{
    $option = [
        '1' => 'Belum Menikah',
        '2' => 'Sudah Menikah',
        '3' => 'Berpisah',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_kepegawaian($val = null)
{
    $option = [
        '1' => 'PNS',
        '2' => 'Non PNS',
        '3' => 'Lainnya',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_cuti($val = null)
{
    $option = [
        '1' => 'Pengajuan',
        '2' => 'Disetujui',
        '3' => 'Ditolak',
        '4' => 'Aktif Kembali',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}
function fd_role($val = null)
{
    $option = [
        '1' => 'Admin',
        '2' => 'Keuangan',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function bulanIndo($val = null)
{
    $option = [
        'Januari' => 'Januari',
        'Februari' => 'Februari',
        'Maret' => 'Maret',
        'April' => 'April',
        'Mei' => 'Mei',
        'Juni' => 'Juni',
        'Juli' => 'Juli',
        'Agustus' => 'Agustus',
        'September' => 'September',
        'Oktober' => 'Oktober',
        'November' => 'November',
        'Desember' => 'Desember',

    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function get_table($Table)
{
    $ci = &get_instance();
    return $ci->db->get($Table)->result();
}

function get_rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function pelanggan()
{
    $ci = &get_instance();
    $data = $ci->db->get('pelanggan')->result();
    return $data;
}