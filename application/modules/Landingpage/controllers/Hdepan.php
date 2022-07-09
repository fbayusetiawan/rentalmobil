<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Hdepan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hdepan_m', 'primaryModel');
    }

    public $titles = 'Mobil';
    public $vn = 'hdepan';

    public function index()
    {
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('landingpage', $this->vn . '/list', $data);
    }

    public function kontak()
    {
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('landingpage', $this->vn . '/kontak', $data);
    }

    public function detail()
    {
        
        $data['data'] = $this->primaryModel->getAllCustomer($this->uri->segment(4));
        $data['row'] = $this->primaryModel->getDataById($this->uri->segment(4));
        $this->template->load('landingpage', $this->vn . '/detail', $data);
    }

    public function pembayaran()
    {
        $data['row'] = $this->primaryModel->getDataTransaksi();
        $this->template->load('landingpage', $this->vn . '/pembayaran', $data);
    }

    public function invoice()
    {
        $data['row'] = $this->primaryModel->getTransaksiById($this->uri->segment(4));
        $this->template->load('landingpage', $this->vn . '/invoice', $data);
    }

    function addAction()
    {
        $this->primaryModel->save();
        redirect('Welcome/Hdepan/kontak');
    }

    function transaksiAction()
    {
        $this->primaryModel->saveTransaksi();
        redirect('Landingpage/Hdepan/pembayaran');
    }

    function getTotal()
    {
        $d = $_GET['d'];
        $e = $_GET['e'];

        $data = $this->db->get('mobil')->result();

        $to_date = new DateTime($d);
        $from_date = new DateTime($e);
        $hasil = $from_date->diff($to_date);

        $ok = $hasil->d;
        var_dump($ok);
       
        echo '<div class="input-group input-group-sm mb-3">';
        echo '<span class="input-group-text" id="inputGroup-sizing-sm">Harga Sewa</span>';
        // echo '<input type="text" class="form-control" id="hargaSewa" name="harga" value="Rp. ' . number_format(floatval($total), 0, ',', '.') . '" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">';
        echo '<input type="text" class="form-control" id="hargaSewa" name="harga" value="Rp. ' . $ok . '" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">';
        echo '</div>';
    }

    
}

/* End of file Login.php */
