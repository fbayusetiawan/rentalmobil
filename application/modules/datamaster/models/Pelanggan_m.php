<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{

    public $namaTable = 'pelanggan';
    public $pk = 'idPelanggan';

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
            'idPelanggan' => uniqid(),
            'noKtp' => htmlspecialchars($this->input->post('noKtp', TRUE)),
            'namaPelanggan' => htmlspecialchars($this->input->post('namaPelanggan', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
            'dateCreated' => htmlspecialchars($this->input->post('dateCreated', TRUE)),
            'isActive' => '1'
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'noKtp' => htmlspecialchars($this->input->post('noKtp', TRUE)),
            'namaPelanggan' => htmlspecialchars($this->input->post('namaPelanggan', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
