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

    function saveService()
    {
        $object = [
            'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', TRUE)),
            'tanggalService' => htmlspecialchars($this->input->post('tanggalService', TRUE)),
            'biayaService' => htmlspecialchars($this->input->post('biayaService', TRUE)),
            'status' => '1'
        ];
        $this->db->insert('service', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Servis Disimpan</div>');
    }

    function save($foto)
    {
        $object = [
            'idMobil' => uniqid(),
            'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
            'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
            'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
            'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
            'ac' => htmlspecialchars($this->input->post('ac', TRUE)),
            'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
            'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
            'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE)),
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),
            'driver' => '0',
            'keyCar' => '0',
            'foto' => $foto
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mobil Berhasil Disimpan</div>');
    }

    function update($Value, $fotoMobil)
    {
        if (empty($fotoMobil)) {
            $object = [
                'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
                'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
                'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
                'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
                'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
                'ac' => htmlspecialchars($this->input->post('ac', TRUE)),
                'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
                'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),
                'driver' => htmlspecialchars($this->input->post('driver', TRUE)),
                'keyCar' => htmlspecialchars($this->input->post('keyCar', TRUE)),
                'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE))
            ];
        } else {
            $object = [

                'namaMobil' => htmlspecialchars($this->input->post('namaMobil', TRUE)),
                'idMerkMobil' => htmlspecialchars($this->input->post('idMerkMobil', TRUE)),
                'noPlat' => htmlspecialchars($this->input->post('noPlat', TRUE)),
                'tahunMobil' => htmlspecialchars($this->input->post('tahunMobil', TRUE)),
                'jumlahKursi' => htmlspecialchars($this->input->post('jumlahKursi', TRUE)),
                'ac' => htmlspecialchars($this->input->post('ac', TRUE)),
                'warnaMobil' => htmlspecialchars($this->input->post('warnaMobil', TRUE)),
                'hargaSewa' => htmlspecialchars($this->input->post('hargaSewa', TRUE)),
                'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),
                'driver' => htmlspecialchars($this->input->post('driver', TRUE)),
                'keyCar' => htmlspecialchars($this->input->post('keyCar', TRUE)),
                'fotoMobil' => $fotoMobil,

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
