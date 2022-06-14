<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Devisi_m extends CI_Model
{

    public $namaTable = 'devisi';
    public $pk = 'idDevisi';

    function getAllData()
    {
        $this->db->join('departemen', 'departemen.idDepartemen = ' . $this->namaTable . '.idDepartemen', 'left');

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
            'idDepartemen' => $this->input->post('idDepartemen', TRUE),
            'namaDevisi' => $this->input->post('namaDevisi', TRUE),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'idDepartemen' => $this->input->post('idDepartemen', TRUE),
            'namaDevisi' => $this->input->post('namaDevisi', TRUE),
        ];
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
