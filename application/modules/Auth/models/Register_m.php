<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_m extends CI_Model
{

    public $table = "user";
    public $pk = "idUser";

    public function getDataByUser($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get($this->table)->row();
    }

    public function getDataByPegawai($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get('pegawai')->row();
    }
}

/* End of file user_m.php */
