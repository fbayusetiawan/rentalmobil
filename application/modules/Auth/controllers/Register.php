<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_m', 'primaryModel');
    }


    public function index()
    {
        $this->load->view('register/add');
    }

    public function add_action()
    {
        $this->primaryModel->savePelanggan($this->upload_foto(), $this->upload_foto1());
        redirect('auth/login');
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('fotoKtp');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function upload_foto1()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('fotoSim');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file register.php */
