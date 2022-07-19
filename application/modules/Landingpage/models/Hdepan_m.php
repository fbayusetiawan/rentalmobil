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

    function getTransaksiById($Value)
    {
        $this->db->join('mobil', 'mobil.idMobil = transaksi.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = transaksi.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = transaksi.idPegawai', 'left');
        $this->db->where('idTransaksi', $Value);
        return $this->db->get('transaksi')->row();
    }

    function getDataTransaksi()
    {
        $this->db->where('Transaksi.idPelanggan', $this->session->userdata('idPelanggan'));
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = transaksi.idPelanggan', 'left');
        $this->db->join('mobil', 'mobil.idMobil = transaksi.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMObil = mobil.idMerkMObil', 'left');
        
        return $this->db->get('transaksi')->result();
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
            'statusTransaksi' => '0'
        ];

        $this->db->insert('transaksi', $object);
        // $this->db->update('mobil', $object2, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function updateTransaksi($Value, $fotoTransaksi)
    {
        $object = [
                'fotoTransaksi' => $fotoTransaksi,
                'totalHarga' => htmlspecialchars($this->input->post('totalHarga', TRUE)),
                'statusTransaksi' => '1'
        ];
        
        $this->db->where('idTransaksi', $Value);
        $this->db->update('transaksi', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil Dilakukan, Silahkan Menunggu Konfirmasi, Jika Belum Ditindak 1x24 Jam Silahkan Hubungi 081286943078</div>');
    }

    function deleteTransaksi($Value)
    {
        $this->db->where('idTransaksi', $Value);
        $this->db->delete('transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Transaksi Berhasil Dihapus</div>');
    }
}

/* End of file user_m.php */
