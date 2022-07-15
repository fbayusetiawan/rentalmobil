<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jaminan_m extends CI_Model
{

    public $namaTable = 'jaminan';
    public $pk = 'idJaminan';

    function getAllData()
    {
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = jaminan.idPelanggan', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getPelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save($fotoJaminan)
    {
        $object = [

            'idPelanggan' => htmlspecialchars($this->input->post('idPelanggan', TRUE)),
            'namaJaminan' => htmlspecialchars($this->input->post('namaJaminan', TRUE)),
            'fotoJaminan' => $fotoJaminan,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jaminan Disimpan</div>');
    }

    function update($Value, $fotoJaminan)
    {
        if (empty($fotoJaminan)) {
            $object = [
                'idPelanggan' => htmlspecialchars($this->input->post('idPelanggan', TRUE)),
                'namaJaminan' => htmlspecialchars($this->input->post('namaJaminan', TRUE)),
            ];
        } else {
            $object = [

                'idPelanggan' => htmlspecialchars($this->input->post('idPelanggan', TRUE)),
                'namaJaminan' => htmlspecialchars($this->input->post('namaJaminan', TRUE)),
                'fotoJaminan' => $fotoJaminan,

            ];
        }
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
