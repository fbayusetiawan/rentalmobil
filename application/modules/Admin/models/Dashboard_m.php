<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    function getPegawaiAktif()
    {
        $this->db->where('isActive', '1');
        return $this->db->get('pegawai')->num_rows();
    }

    function getBerprestasi()
    {
        return $this->db->get('prestasi_detail')->num_rows();
    }
}

/* End of file */
