<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi_m extends CI_Model
{

    public $namaTable = 'mutasi';
    public $pk = 'idMutasi';

    function getAllData()
    {
        $this->db->select('mutasi.*,pegawai.namaPegawai,devisi.namaDevisi,d.namaDevisi as namaDevisiTujuan');
        $this->db->join('pegawai', 'pegawai.nik = Mutasi.nik', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        $this->db->join('devisi as d', 'd.idDevisi = mutasi.devisiTujuan', 'left');
        return $this->db->get($this->namaTable)->result();
    }


    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->select('mutasi.*, pegawai.*, devisi.namaDevisi, pangkat.namaPangkat, golongan.namaGolongan,d.namaDevisi as namaDevisiTujuan');

        $this->db->join('pegawai', 'pegawai.nik = mutasi.nik', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = pegawai.idGolongan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        $this->db->join('devisi as d', 'd.idDevisi = mutasi.devisiTujuan', 'left');
        return $this->db->get($this->namaTable)->row();
    }


    function save()
    {
        $object = [
            'idMutasi' => uniqid(),
            'nik' => $this->input->post('nik', TRUE),
            'tanggalMutasi' => $this->input->post('tanggalMutasi', TRUE),
            'devisiTujuan' => $this->input->post('devisiTujuan', TRUE),
            'ns' => noOtomatis('ns', 'ns', 'mutasi'),
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
            'tanggalMutasi' => $this->input->post('tanggalMutasi', TRUE),
            'devisiTujuan' => $this->input->post('devisiTujuan', TRUE),
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
