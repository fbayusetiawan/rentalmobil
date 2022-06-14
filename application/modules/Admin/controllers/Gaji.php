<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gaji_m', 'primaryModel');
    }
    public $titles = 'Rekapitulasi Gaji Bulanan';
    public $vn = 'Gaji';

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
        $data['data'] = $this->primaryModel->getDataGajiDetail($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addGajiDetail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/addgajidetail', $data);
    }

    function addGajiDetailAction()
    {
        $idGaji = $this->uri->segment(4);
        $idPegawai = $this->uri->segment(5);
        $this->primaryModel->addGajiDetail($idGaji, $idPegawai);
        redirect('admin/' . $this->vn . '/detail/' . $idGaji);
    }

    function editGajiDetail()
    {
        $idGajiDetail = $this->uri->segment(5);
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['row'] = $this->primaryModel->getDataGajiDetailById($idGajiDetail);
        $this->template->load('template', $this->vn . '/editgajidetail', $data);
    }

    function editGajiDetailAction()
    {
        $idGaji = $this->uri->segment(4);
        $idGajiDetail = $this->uri->segment(5);
        $this->primaryModel->editGajiDetail($idGaji, $idGajiDetail);
        redirect('admin/' . $this->vn . '/detail/' . $idGaji);
    }

    function deleteGajiDetail()
    {
        $idGaji = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $this->primaryModel->deleteGajiDetail($id);
        redirect('admin/' . $this->vn . '/detail/' . $idGaji);
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
