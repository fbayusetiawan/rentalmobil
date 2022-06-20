<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{

    public $namaTable = 'transaksi';
    public $pk = 'idTransaksi';

    function getAllData()
    {
        $this->db->join('mobil', 'mobil.idMobil = '. $this->namaTable . '.idMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = '. $this->namaTable . '.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = '. $this->namaTable . '.idPegawai', 'left');
        return $this->db->get($this->namaTable)->result();
    }
    function getAllMobil()
    {
        return $this->db->get('merk')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save()
    {
        $object = [
            'idTransaksi' => uniqid(),
            'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'idPelanggan' => htmlspecialchars($this->input->post('idPelanggan', TRUE)),
            'hari' => htmlspecialchars($this->input->post('hari', TRUE)),
            'tanggalPinjam' => htmlspecialchars($this->input->post('tanggalPinjam', TRUE)),
            'tanggalKembali' => htmlspecialchars($this->input->post('tanggalKembali', TRUE)),
            'harga' => htmlspecialchars($this->input->post('harga', TRUE)),
            'denda' => htmlspecialchars($this->input->post('denda', TRUE)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', TRUE)),
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mobil Berhasil Disimpan</div>');
    }

    function update($Value)
    {
            $object = [

            'idMobil' => htmlspecialchars($this->input->post('idMobil', TRUE)),
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'idPelanggan' => htmlspecialchars($this->input->post('idPelanggan', TRUE)),
            'hari' => htmlspecialchars($this->input->post('hari', TRUE)),
            'tanggalPinjam' => htmlspecialchars($this->input->post('tanggalPinjam', TRUE)),
            'tanggalKembali' => htmlspecialchars($this->input->post('tanggalKembali', TRUE)),
            'harga' => htmlspecialchars($this->input->post('harga', TRUE)),
            'denda' => htmlspecialchars($this->input->post('denda', TRUE)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', TRUE)),
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),

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
