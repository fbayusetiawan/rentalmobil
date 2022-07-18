<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{

    public $namaTable = 'transaksi';
    public $pk = 'idTransaksi';

    function getAllData()
    {
        
        $this->db->join('mobil', 'mobil.idMobil = '. $this->namaTable . '.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = '. $this->namaTable . '.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = '. $this->namaTable . '.idPegawai', 'left');
        $this->db->where('statusTransaksi', '1');
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataAccept()
    {
        
        $this->db->join('mobil', 'mobil.idMobil = '. $this->namaTable . '.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = '. $this->namaTable . '.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = '. $this->namaTable . '.idPegawai', 'left');
        $this->db->where('statusTransaksi', '2');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataKembali()
    {

        $this->db->join('mobil', 'mobil.idMobil = ' . $this->namaTable . '.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = ' . $this->namaTable . '.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = ' . $this->namaTable . '.idPegawai', 'left');
        $this->db->where('statusTransaksi', '3');

        return $this->db->get($this->namaTable)->result();
    }

    function getCar($idTransaksi)
    {
        // $idTransaksi = $this->getIdMobil($Value);
        $this->db->where('idTransaksi', $idTransaksi);
        return $this->db->get('transaksi')->row();
    }

    function getIdMobil($idMobil)
    {
        $this->db->where('idMobil', $idMobil);
        return $this->db->get('mobil')->row();
    }

    function getAllMobil()
    {
        return $this->db->get('merk')->result();
    }

    function getDataById($Value)
    {
        $this->db->join('mobil', 'mobil.idMobil = ' . $this->namaTable . '.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = ' . $this->namaTable . '.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = ' . $this->namaTable . '.idPegawai', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function setuju($idTransaksi)
    {
        $idMobil = $this->getCar($idTransaksi);
        $object = [
            'statusTransaksi' => '2'
        ];
        $object2 = [
            'isActive' => '1'
        ];
        $this->db->where('idTransaksi', $idTransaksi);
        $this->db->update('transaksi', $object);

        $this->db->where('idMobil', $idMobil->idMobil);
        $this->db->update('mobil', $object2);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Transaksi Berhasil Disimpan</div>');
    }

    function batal($idTransaksi)
    {
        $idMobil = $this->getCar($idTransaksi);
        $object = [
            'statusTransaksi' => '1'
        ];
        $object2 = [
            'isActive' => '0'
        ];
        $this->db->where('idTransaksi', $idTransaksi);
        $this->db->update('transaksi', $object);

        $this->db->where('idMobil', $idMobil->idMobil);
        $this->db->update('mobil', $object2);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Transaksi Dibatalkan</div>');
    }

    function selesai($idTransaksi)
    {
        $idMobil = $this->getCar($idTransaksi);
        $object = [
            'tanggalSelesai' => $this->input->post('tanggalSelesai'),
            'statusTransaksi' => '3'
        ];
        $object2 = [
            'isActive' => '0'
        ];
        $this->db->where('idTransaksi', $idTransaksi);
        $this->db->update('transaksi', $object);

        $this->db->where('idMobil', $idMobil->idMobil);
        $this->db->update('mobil', $object2);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mobil Sudah Selesai Di Rental</div>');
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
