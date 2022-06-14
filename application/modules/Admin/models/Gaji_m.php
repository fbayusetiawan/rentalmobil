<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_m extends CI_Model
{

    public $namaTable = 'gaji';
    public $pk = 'idGaji';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDatagajiDetail($Value)
    {
        $this->db->where('pegawai.isActive', '1');
        $this->db->where('idGaji', $Value);
        $this->db->join('pegawai', 'pegawai.idPegawai = gaji_detail.idPegawai', 'right');

        return $this->db->get('gaji_detail')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getDataGajiDetailById($idGajiDetail)
    {
        $this->db->where('idGajiDetail', $idGajiDetail);
        return $this->db->get('gaji_detail')->row();
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
            'idGaji' => uniqid(),
            'bulan' => $this->input->post('bulan', TRUE),
            'tahun' => date('Y'),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'bulan' => $this->input->post('bulan', TRUE),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function addGajiDetail($idGaji, $idPegawai)
    {
        $object = [
            'idGaji' => $idGaji,
            'idPegawai' => $idPegawai,
            'nominalGaji' => str_replace('.', '', $this->input->post('nominalGaji', TRUE)),
        ];
        $this->db->insert('gaji_detail', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function editGajiDetail($idGaji, $idGajiDetail)
    {
        $object = [
            'nominalGaji' => str_replace('.', '', $this->input->post('nominalGaji', TRUE)),
        ];
        $this->db->where('idGajidetail', $idGajiDetail);
        $this->db->update('gaji_detail', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function deleteGajiDetail($id)
    {
        $this->db->where('idGajidetail', $id);
        $this->db->delete('gaji_detail');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
