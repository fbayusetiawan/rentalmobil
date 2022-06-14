<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Shift_m extends CI_Model
{

    public $namaTable = 'shift';
    public $pk = 'idShift';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataPegawai()
    {
        $this->db->where('isActive', '1');
        return $this->db->get('pegawai')->result();
    }


    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getAllDataByIdPegawai()
    {
        $this->db->where('idPegawai', $this->session->userdata('idUser'));
        $this->db->join('Shift', 'Shift.idShift = Shift_detail.idShift', 'left');
        return $this->db->get('Shift_detail')->result();
    }

    function jadwal($Value)
    {
        $this->db->where('shift_detail.idShift', $Value);
        $this->db->order_by('pegawai.idDevisi', 'desc');
        $this->db->join('pegawai', 'pegawai.idPegawai = shift_detail.idPegawai', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        $this->db->join('shift', 'shift.idShift = shift_detail.idShift', 'left');
        return $this->db->get('shift_detail')->result();
    }

    function save()
    {
        $object = [
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

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
