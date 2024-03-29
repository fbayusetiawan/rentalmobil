<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bbm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bbm_m', 'primaryModel');
    }
    public $titles = 'Bbm';
    public $vn = 'Bbm';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function detail()
    {
        $data['row'] =  $this->primaryModel->getDataById($this->uri->segment(4));
        $data['title'] = $this->titles;
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['mobil'] = $this->primaryModel->getAllMobil();
        $data['supir'] = $this->primaryModel->getSupir();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('admin/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $data['mobil'] = $this->primaryModel->getAllMobil();
        $data['supir'] = $this->primaryModel->getSupir();
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function service()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Service " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/service', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('admin/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('admin/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('fotoBbm');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
