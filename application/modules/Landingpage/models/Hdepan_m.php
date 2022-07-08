<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hdepan_m extends CI_Model
{

    public $table = "mobil";
    public $pk = "idMobil";

    public function getAllData()
    {
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get($this->table)->result();
    }

    public function getAllCustomer()
    {
        // $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get('pelanggan')->result();
    }

    function getDataById($Value)
    {
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->table)->row();
    }

    function save()
    {
        $object = [
            'namaLengkap' => htmlspecialchars($this->input->post('namaLengkap', TRUE)),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'isi' => htmlspecialchars($this->input->post('isi', TRUE)),
        ];
        $this->db->insert('hubungi', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function saveTransaksi()
    {
        $object = [
            'idTransaksi' => uniqid(),
            'idPelanggan' => $this->session->userdata('idPelanggan'),
            'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'tanggalPinjam' => htmlspecialchars($this->input->post('tanggalPinjam', TRUE)),
            'tanggalKembali' => htmlspecialchars($this->input->post('tanggalKembali', TRUE)),
            'harga' => htmlspecialchars($this->input->post('harga', TRUE)),
            'denda' => htmlspecialchars($this->input->post('denda', TRUE)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', TRUE)),
            'isActive' => '0'
        ];

        $this->db->insert('transaksi', $object);
        // $this->db->update('mobil', $object2, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }
}

/* End of file user_m.php */
