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
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getTransaksiById($id);
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

    function updateTransaksi()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->updateTransaksi($id, $this->upload_foto());
        redirect('Landingpage/Hdepan/pembayaran');
    }

    function deleteTransaksi()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->deleteTransaksi($id);
        redirect('Landingpage/Hdepan/pembayaran');
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
}

/* End of file Login.php */
