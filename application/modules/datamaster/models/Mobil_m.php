<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_m extends CI_Model
{

    public $namaTable = 'mobil';
    public $pk = 'idMobil';

    function getAllData()
    {
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        return $this->db->get($this->namaTable)->result();
    }
    function getAllMobil()
    {
        return $this->db->get('merk')->result();
    }

    function getDataById($Value)
    {
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save($foto)
    {
        $object = [
            'idMobil' => uniqid(),
            'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
            'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
            'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
            'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
            'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
            'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
            'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE)),
            'isActive' => '1',
            'foto' => $foto
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        if (empty($foto)) {
            $object = [
                'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
                'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
                'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
                'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
                'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
                'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
                'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE))
            ];
        } else {
            $object = [

                'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
                'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
                'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
                'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
                'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
                'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
                'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE)),
                'foto' => $foto,

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
