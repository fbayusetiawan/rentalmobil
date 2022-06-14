<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prestasi_m', 'primaryModel');
    }
    public $titles = 'Rekapitulasi Prestasi Pegawai Bulanan';
    public $vn = 'Prestasi';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('template', $this->vn . '/list', $data);
    }

    function add()
    {
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

    function detail()
    {
        $id = $this->uri->segment(4);
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['row'] = $this->primaryModel->getDataById($id);
        $data['detail'] = $this->primaryModel->getDataDetail($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addDetail()
    {

        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['pegawai'] = $this->primaryModel->getDataPegawai();
        $this->template->load('template', $this->vn . '/adddetail', $data);
    }

    function adddetailAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->saveDetail($id);
        redirect('admin/' . $this->vn . '/detail/' . $id);
    }

    function editDetail()
    {
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataByIdDetail($id);
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/editdetail', $data);
    }

    function editdetailAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->editDetail($id);
        redirect('admin/' . $this->vn . '/detail/' . $this->uri->segment(5));
    }

    function deleteDetail()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->deletedetail($id);
        redirect('admin/' . $this->vn . '/detail/' . $this->uri->segment(5));
    }

    // sisi pegawai
    public function pegawai()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataByIdPegawai();

        $this->template->load('template', $this->vn . '/pegawai', $data);
    }
}

/* End of file Rt.php */
