<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
    function mobil()
    {
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get('mobil')->result();
    }

    function supir()
    {
        return $this->db->get('pegawai')->result();
    }

    function pelanggan()
    {
        // $this->db->where('dateCreated BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        return $this->db->get('pelanggan')->result();
    }

}

/* End of file Laporan_m.php */
