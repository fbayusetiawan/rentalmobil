<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekapgaji_m extends CI_Model
{

    public $namaTable = 'absen';
    public $pk = 'idAbsen';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getGaji()
    {
        return $this->db->get('jabatan')->result();
    }

    function getDataPegawai($ada)
    {
        return $this->db->get('absen_detail')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getAllDataByIdPegawai()
    {
        $this->db->where('idPegawai', $this->session->userdata('idUser'));
        $this->db->join('absen', 'absen.idAbsen = absen_detail.idAbsen', 'left');
        return $this->db->get('absen_detail')->result();
    }


    function save()
    {
        $object = [
            'idAbsen' => uniqid(),
            'bulan' => $this->input->post('bulan', TRUE),
            'tahun' => date('Y'),
            'jumlahHariKerja' => $this->input->post('jumlahHariKerja', TRUE),
            'tanggalInputAbsen' => date('Y-m-d'),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }
    function update($Value)
    {
        $object = [
            'bulan' => $this->input->post('bulan', TRUE),
            'jumlahHariKerja' => $this->input->post('jumlahHariKerja', TRUE),
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
