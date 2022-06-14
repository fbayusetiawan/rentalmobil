<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen_m extends CI_Model
{

    public $namaTable = 'kehadiran';
    public $pk = 'idKehadiran';

    public function getAbsen($bulanTahun)
    {
        $this->db->select('*');
        $this->db->from('kehadiran');
        $this->db->join('pegawai', 'pegawai.idPegawai = kehadiran.idPegawai');
        $this->db->join('jabatan', 'jabatan.idJabatan = kehadiran.idJabatan');
        $this->db->where('kehadiran.bulan', $bulanTahun);
        return $this->db->get()->result();
    }

    public function InputjoinPegawaiJabatan($bulanTahun)
    {
        return $this->db->query("
			SELECT pegawai.*, jabatan.namaJabatan FROM pegawai 
			INNER JOIN jabatan ON pegawai.idJabatan = jabatan.idJabatan 
			WHERE NOT EXISTS (SELECT * FROM kehadiran 
			WHERE bulan = '$bulanTahun' AND pegawai.nik = kehadiran.nik)")->result();
    }

    public function tambah_batch($data)
    {
        $jumlahData = count($data);
        // var_dump($jumlahData); die;
        if ($jumlahData > 0) {
            $this->db->insert_batch('kehadiran', $data);
        }
    }
}

/* End of file */
