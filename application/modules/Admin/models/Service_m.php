<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service_m extends CI_Model
{

    public $namaTable = 'service';
    public $pk = 'idService';

    function getAllData()
    {
        $this->db->join('mobil', 'mobil.idMobil = service.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function verif($Value, $ver)
    {
        $object = [
            'status' => $ver,

        ];
        $this->db->where('idService', $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mobil Selesai Di Servis</div>');
    }

    function getAllService()
    {
        $this->db->join('mobil', 'mobil.idMobil = service.idMobil', 'left');
        return $this->db->get('service')->result();
    }

    function getDataById($Value)
    {
        $this->db->join('mobil', 'mobil.idMobil = service.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
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
        ];
        $this->db->insert('service', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Servis Disimpan</div>');
    }

    function getDataSuratById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->join('mobil', 'mobil.idMobil = service.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    function update($Value)
    {
            $object = [
            'keterangan' => htmlspecialchars($this->input->post('keterangan', TRUE)),
            'tanggalService' => htmlspecialchars($this->input->post('tanggalService', TRUE)),
            'biayaService' => htmlspecialchars($this->input->post('biayaService', TRUE)),  
            'status' => htmlspecialchars($this->input->post('status', TRUE)),  
            ];
    
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
