<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_m extends CI_Model
{

    public $table = "user";
    public $pk = "idUser";
    public $namaTable = "pelanggan";
    public $primkey = "idPelanggan";

    public function getDataByUser($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get($this->table)->row();
    }

    public function getDataByPegawai($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get('pelanggan')->row();
    }

    public function savePelanggan()
    {
        $object = [

            'idPelanggan' => uniqid(),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'keyPas' => htmlspecialchars($this->input->post('keyPas', TRUE)),
            'noKtp' => htmlspecialchars($this->input->post('noKtp', TRUE)),
            'namaPelanggan' => htmlspecialchars($this->input->post('namaPelanggan', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'domisili' => htmlspecialchars($this->input->post('domisili', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
            'dateCreated' => time(),
            'roleId' => '3',
            'isActive' => '1'
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }
}


/* End of file user_m.php */
