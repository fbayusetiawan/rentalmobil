<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi_m extends CI_Model
{

    public $namaTable = 'prestasi';
    public $pk = 'idPrestasi';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getDataDetail($Value)
    {
        $this->db->where('idPrestasi', $Value);
        $this->db->join('pegawai', 'pegawai.nik = prestasi_detail.nik', 'left');
        return $this->db->get('prestasi_detail')->result();
    }

    function getAllDataByIdPegawai()
    {
        $this->db->where('idPegawai', $this->session->userdata('idUser'));
        $this->db->join('absen', 'absen.idAbsen = absen_detail.idAbsen', 'left');
        return $this->db->get('absen_detail')->result();
    }

    function getDataByIdDetail($Value)
    {
        $this->db->where('idPrestasiDetail', $Value);
        $this->db->join('pegawai', 'pegawai.nik = prestasi_detail.nik', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = pegawai.idGolongan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get('prestasi_detail')->row();
    }
    function save()
    {
        $object = [
            'idPrestasi' => uniqid(),
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

    function saveDetail($Value)
    {
        $object = [
            'idPrestasi' => $Value,
            'nik' => $this->input->post('nik', TRUE),
            'prestasiDiraih' => $this->input->post('prestasiDiraih', TRUE),
            'kerajinan' => $this->input->post('kerajinan', TRUE),
            'perilaku' => $this->input->post('perilaku', TRUE),
            'kehadiran' => $this->input->post('kehadiran', TRUE),
            'profesional' => $this->input->post('profesional', TRUE),
            'tanggungJawab' => $this->input->post('tanggungJawab', TRUE),
        ];
        $this->db->insert('prestasi_detail', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }
    function editDetail($Value)
    {
        $object = [
            'nik' => $this->input->post('nik', TRUE),
            'prestasiDiraih' => $this->input->post('prestasiDiraih', TRUE),
            'kerajinan' => $this->input->post('kerajinan', TRUE),
            'perilaku' => $this->input->post('perilaku', TRUE),
            'kehadiran' => $this->input->post('kehadiran', TRUE),
            'profesional' => $this->input->post('profesional', TRUE),
            'tanggungJawab' => $this->input->post('tanggungJawab', TRUE),
        ];
        $this->db->where('idPrestasiDetail', $Value);
        $this->db->update('prestasi_detail', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function deletedetail($Value)
    {
        $this->db->where('idPrestasiDetail', $Value);
        $this->db->delete('prestasi_detail');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
