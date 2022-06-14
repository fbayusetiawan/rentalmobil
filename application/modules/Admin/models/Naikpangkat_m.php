<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Naikpangkat_m extends CI_Model
{

    public $namaTable = 'naikpangkat';
    public $pk = 'idNaikPangkat';

    function getAllData()
    {
        $this->db->join('pegawai', 'pegawai.nik = naikpangkat.nik', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = naikpangkat.pangkatDitetapkan', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = naikpangkat.golonganDitetapkan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get($this->namaTable)->result();
    }


    function getDataById($Value)
    {
        $this->db->select('naikpangkat.*, pegawai.*,pangkat.namaPangkat, golongan.namaGolongan, devisi.namaDevisi, p.namaPangkat as namaPangkatDitetapkan, g.namaGolongan as namaGolonganDitetapkan');

        $this->db->where($this->pk, $Value);
        $this->db->join('pegawai', 'pegawai.nik = naikpangkat.nik', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = pegawai.idGolongan', 'left');
        $this->db->join('pangkat as p', 'p.idPangkat = naikpangkat.pangkatDitetapkan', 'left');
        $this->db->join('golongan as g', 'g.idGolongan = naikpangkat.golonganDitetapkan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get($this->namaTable)->row();
    }


    function save()
    {
        $object = [
            'idNaikPangkat' => uniqid(),
            'nik' => $this->input->post('nik', TRUE),
            'tanggalDitetapkan' => $this->input->post('tanggalDitetapkan', TRUE),
            'pangkatDitetapkan' => $this->input->post('pangkatDitetapkan', TRUE),
            'golonganDitetapkan' => $this->input->post('golonganDitetapkan', TRUE),
            'ns' => noOtomatis('ns', 'ns', 'naikpangkat'),
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
            'tanggalDitetapkan' => $this->input->post('tanggalDitetapkan', TRUE),
            'pangkatDitetapkan' => $this->input->post('pangkatDitetapkan', TRUE),
            'golonganDitetapkan' => $this->input->post('golonganDitetapkan', TRUE),
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
