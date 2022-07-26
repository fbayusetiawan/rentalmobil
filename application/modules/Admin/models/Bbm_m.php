<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bbm_m extends CI_Model
{

    public $namaTable = 'bbm';
    public $pk = 'idBbm';

    function getAllData()
    {
        $this->db->join('pegawai', 'pegawai.idPegawai = bbm.idPegawai', 'left');
        $this->db->join('mobil', 'mobil.idMobil = bbm.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getSupir()
    {
        return $this->db->get('pegawai')->result();
    }

    function getAllMobil()
    {
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        return $this->db->get('mobil')->result();
    }

    function getDataById($Value)
    {
        $this->db->join('pegawai', 'pegawai.idPegawai = bbm.idPegawai', 'left');
        $this->db->join('mobil', 'mobil.idMobil = bbm.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save($fotoBbm)
    {
        $object = [
            'idBbm' => uniqid(),
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
            'biayaBbm' => htmlspecialchars($this->input->post('biayaBbm', TRUE)),
            'jenisBbm' => htmlspecialchars($this->input->post('jenisBbm', TRUE)),
            'tanggalBbm' => htmlspecialchars($this->input->post('tanggalBbm', TRUE)),
            'tujuanBbm' => htmlspecialchars($this->input->post('tujuanBbm', TRUE)),
            'fotoBbm' => $fotoBbm
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mobil Berhasil Disimpan</div>');
    }

    function update($Value, $fotoBbm)
    {
        if (empty($fotoBbm)) {
            $object = [
                'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
                'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
                'biayaBbm' => htmlspecialchars($this->input->post('biayaBbm', TRUE)),
                'jenisBbm' => htmlspecialchars($this->input->post('jenisBbm', TRUE)),
                'tanggalBbm' => htmlspecialchars($this->input->post('tanggalBbm', TRUE)),
                'tujuanBbm' => htmlspecialchars($this->input->post('tujuanBbm', TRUE))
            ];
        } else {
            $object = [
                'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
                'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
                'biayaBbm' => htmlspecialchars($this->input->post('biayaBbm', TRUE)),
                'jenisBbm' => htmlspecialchars($this->input->post('jenisBbm', TRUE)),
                'tanggalBbm' => htmlspecialchars($this->input->post('tanggalBbm', TRUE)),
                'tujuanBbm' => htmlspecialchars($this->input->post('tujuanBbm', TRUE)),
                'fotoBbm' => $fotoBbm
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
