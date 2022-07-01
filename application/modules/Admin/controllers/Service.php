<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Service_m', 'primaryModel');
    }
    public $titles = 'Service';
    public $vn = 'Service';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function service()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllService();

        $this->template->load('template', $this->vn . '/service', $data);
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
        $data['merk'] = $this->primaryModel->getAllMobil();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function aktif()
    {
        $object = [
            'status' => '0'
        ];
        $this->db->where('idService', $this->uri->segment(4));
        $this->db->update('service', $object);
        redirect('admin/' . $this->vn);
    }

    function serviceAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->saveService($id);
        redirect('Admin/' . $this->vn . '/service');
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id);
        redirect('Admin/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Admin/' . $this->vn);
    }

    function surat()
    {
        $data['title'] = $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataSuratById($id);
        $this->load->view($this->vn . '/sk', $data);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
