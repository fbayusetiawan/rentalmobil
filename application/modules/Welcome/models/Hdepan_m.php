<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hdepan_m extends CI_Model
{

    public $table = "mobil";
    public $pk = "idMobil";

    public function getAllData()
    {
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get($this->table)->result();
    }

    function getDataById($Value)
    {
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->table)->row();
    }

    function save()
    {
        $object = [
            'namaLengkap' => htmlspecialchars($this->input->post('namaLengkap', TRUE)),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'isi' => htmlspecialchars($this->input->post('isi', TRUE)),
        ];
        $this->db->insert('hubungi', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }
}

/* End of file user_m.php */
