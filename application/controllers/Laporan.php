<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_m', 'primaryModel');
    }

    function mobil()
    {
        $data['data'] = $this->primaryModel->mobil();
        $this->load->view('laporan/mobil', $data);
    }

    function supir()
    {
        $data['data'] = $this->primaryModel->supir();
        $this->load->view('laporan/supir', $data);
    }

    function transaksi()
    {
        $data['data'] = $this->primaryModel->transaksi();
        $this->load->view('laporan/transaksi', $data);
    }

    function selesai()
    {
        $data['data'] = $this->primaryModel->transaksiSelesai();
        $this->load->view('laporan/selesai', $data);
    }

    function pelanggan()
    {
        // $dari = $this->input->post('dari');
        // $sampai = $this->input->post('sampai');
        // $data['data'] = $this->primaryModel->pelanggan($dari, $sampai);
        $data['data'] = $this->primaryModel->pelanggan();
        $this->load->view('laporan/pelanggan', $data);
    }

    function jaminan()
    {
        $data['data'] = $this->primaryModel->jaminan();
        $this->load->view('laporan/jaminan', $data);
    }
}

/* End of file Laporan.php */
