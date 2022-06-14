<?php

defined('BASEPATH') or exit('No direct script access allowed');

class users_m extends CI_Model
{

    public $namaTable = 'user';
    public $pk = 'idUsers';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save()
    {
        $object = [
            'idUsers' => uniqid(),
            'namaLengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'noWa' => $this->input->post('noWa'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'roleId' => $this->input->post('roleId'),
            'isActive' => $this->input->post('isActive'),
            'dateCreated' => time()

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $pass = $this->input->post('password');
        if (empty($pass)) :
            $object = [
                'namaLengkap' => $this->input->post('namaLengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'noWa' => $this->input->post('noWa'),
                'roleId' => $this->input->post('roleId'),
                'isActive' => $this->input->post('isActive'),
            ];
        else :
            $object = [
                'namaLengkap' => $this->input->post('namaLengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'noWa' => $this->input->post('noWa'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'roleId' => $this->input->post('roleId'),
                'isActive' => $this->input->post('isActive'),
            ];
        endif;
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
