<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_m', 'primaryModel');
    }
    public $titles = 'Dashboard';
    public $vn = 'Dashboard';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['totalMobil'] = $this->primaryModel->totalMobil();
        // $data['prestasi'] = $this->primaryModel->getBerprestasi();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    function add()
    {
        $data['optionBidang'] = $this->primaryModel->bidang();
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {
        $this->primaryModel->save();
        redirect('admin/' . $this->vn);
    }

    function edit()
    {
        $data['optionBidang'] = $this->primaryModel->bidang();
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id);
        redirect('admin/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('admin/' . $this->vn);
    }
}

/* End of file Rt.php */
