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
        $this->primaryModel->savePelanggan();
        redirect('auth/login');
    }
}

/* End of file register.php */
