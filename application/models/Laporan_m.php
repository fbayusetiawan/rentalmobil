<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
    function mobil()
    {
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get('mobil')->result();
    }

    function supir()
    {
        return $this->db->get('pegawai')->result();
    }

    function pelanggan()
    {
        // $this->db->where('dateCreated BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        return $this->db->get('pelanggan')->result();
    }

    function transaksi()
    {
        $this->db->join('mobil', 'mobil.idMobil = transaksi.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = transaksi.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = transaksi.idPegawai', 'left');
        $this->db->where('statusTransaksi', '2');
        return $this->db->get('transaksi')->result();
    }

    function transaksiSelesai()
    {
        $this->db->join('mobil', 'mobil.idMobil = transaksi.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = transaksi.idPelanggan', 'left');
        $this->db->join('pegawai', 'pegawai.idPegawai = transaksi.idPegawai', 'left');
        $this->db->where('statusTransaksi', '3');
        return $this->db->get('transaksi')->result();
    }

    function jaminan()
    {
        // $this->db->where('dateCreated BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pelanggan', 'pelanggan.idPelanggan = jaminan.idPelanggan', 'left');
        return $this->db->get('jaminan')->result();
    }

    function bbm()
    {
        $this->db->join('pegawai', 'pegawai.idPegawai = bbm.idPegawai', 'left');
        $this->db->join('mobil', 'mobil.idMobil = bbm.idMobil', 'left');
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
        return $this->db->get('bbm')->result();
    }

}

/* End of file Laporan_m.php */
