<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_m', 'primaryModel');
    }


    function absen()
    {
        $bulan = $this->input->post('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->primaryModel->absensi($bulan);
        $this->load->view('laporan/absen', $data);
    }

    function cuti()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['data'] = $this->primaryModel->cuti($dari, $sampai);
        $this->load->view('laporan/cuti', $data);
    }

    function naikpangkat()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['data'] = $this->primaryModel->naikpangkat($dari, $sampai);
        $this->load->view('laporan/naikpangkat', $data);
    }

    function prestasi()
    {
        $bulan = $this->input->post('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->primaryModel->prestasi($bulan);
        $this->load->view('laporan/prestasi', $data);
    }

    function mutasi()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['data'] = $this->primaryModel->mutasi($dari, $sampai);
        $this->load->view('laporan/mutasi', $data);
    }

    function teguran()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['data'] = $this->primaryModel->teguran($dari, $sampai);
        $this->load->view('laporan/teguran', $data);
    }

    function gaji()
    {
        $bulan = $this->input->post('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->primaryModel->gaji($bulan);
        $this->load->view('laporan/gaji', $data);
    }
}

/* End of file Laporan.php */
