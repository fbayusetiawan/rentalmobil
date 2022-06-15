<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function totalMobil()
    {
        $query = $this->db->get('mobil');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
   
}

/* End of file */
