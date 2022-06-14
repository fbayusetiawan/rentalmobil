<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Teguran_m extends CI_Model
{

    public $namaTable = 'teguran';
    public $pk = 'idTeguran';

    function getAllData()
    {
        $this->db->join('pegawai', 'pegawai.nik = teguran.nik', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get($this->namaTable)->result();
    }


    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->join('pegawai', 'pegawai.nik = Teguran.nik', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = pegawai.idGolongan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get($this->namaTable)->row();
    }


    function save()
    {
        $object = [
            'idTeguran' => uniqid(),
            'nik' => $this->input->post('nik', TRUE),
            'tanggalTeguran' => $this->input->post('tanggalTeguran', TRUE),
            'kesalahan' => $this->input->post('kesalahan', TRUE),
            'hukuman' => $this->input->post('hukuman', TRUE),
            'ns' => noOtomatis('ns', 'ns', 'Teguran'),
            'br' => getRomawi(date('n')),
            'ts' => date('Y'),

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'nik' => $this->input->post('nik', TRUE),
            'tanggalTeguran' => $this->input->post('tanggalTeguran', TRUE),
            'kesalahan' => $this->input->post('kesalahan', TRUE),
            'hukuman' => $this->input->post('hukuman', TRUE),
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
