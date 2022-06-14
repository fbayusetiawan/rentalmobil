<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    function absensi($Bulan)
    {
        $this->db->where('bulan', $Bulan);
        $this->db->join('pegawai', 'pegawai.idPegawai = absen_detail.idPegawai', 'left');
        $this->db->join('absen', 'absen.idAbsen = absen_detail.idAbsen', 'left');
        return $this->db->get('absen_detail')->result();
    }

    function cuti($dari, $sampai)
    {
        $this->db->where('tanggalPengajuan BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.idPegawai = cuti.idPegawai', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get('cuti')->result();
    }

    function naikpangkat($dari, $sampai)
    {
        $this->db->where('tanggalDitetapkan BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.nik = naikpangkat.nik', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = naikpangkat.pangkatDitetapkan', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = naikpangkat.golonganDitetapkan', 'left');
        return $this->db->get('naikpangkat')->result();
    }

    function teguran($dari, $sampai)
    {
        $this->db->where('tanggalTeguran BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.nik = teguran.nik', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get('teguran')->result();
    }

    function mutasi($dari, $sampai)
    {
        $this->db->where('tanggalMutasi BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->select('mutasi.*,pegawai.namaPegawai,devisi.namaDevisi,d.namaDevisi as namaDevisiTujuan');
        $this->db->join('pegawai', 'pegawai.nik = Mutasi.nik', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        $this->db->join('devisi as d', 'd.idDevisi = mutasi.devisiTujuan', 'left');
        return $this->db->get('mutasi')->result();
    }

    function gaji($Bulan)
    {
        $this->db->where('bulan', $Bulan);
        $this->db->join('pegawai', 'pegawai.idPegawai = gaji_detail.idPegawai', 'left');
        $this->db->join('gaji', 'gaji.idGaji = gaji_detail.idGaji', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');
        return $this->db->get('gaji_detail')->result();
    }

    function prestasi($Bulan)
    {
        $this->db->where('bulan', $Bulan);
        $this->db->join('pegawai', 'pegawai.nik = prestasi_detail.nik', 'left');
        $this->db->join('prestasi', 'prestasi.idPrestasi = prestasi_detail.idPrestasi', 'left');
        return $this->db->get('prestasi_detail')->result();
    }
}

/* End of file Laporan_m.php */
