<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function totalMobil()
    {
        $this->db->where('isActive', '0');
        $query = $this->db->get('mobil');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function totalMobilTerpakai()
    {
        $this->db->where('isActive', '1');
        $query = $this->db->get('mobil');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function pegawai()
    {
        // $this->db->where('isActive', '1');
        $query = $this->db->get('pegawai');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function pelanggan()
    {
        // $this->db->where('isActive', '1');
        $query = $this->db->get('pelanggan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
   
}

/* End of file */
