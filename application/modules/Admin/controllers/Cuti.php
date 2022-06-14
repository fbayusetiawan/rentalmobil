<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cuti_m', 'primaryModel');
    }
    public $titles = 'Cuti';
    public $vn = 'Cuti';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function New()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataByVerify(1);
        $this->template->load('template', $this->vn . '/new', $data);
    }

    function setujui()
    {
        $this->primaryModel->verif($this->uri->segment(4), 2);
        redirect('admin/' . $this->vn . '/New');
    }
    function tolak()
    {
        $this->primaryModel->verif($this->uri->segment(4), 3);
        redirect('admin/' . $this->vn . '/New');
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

    function aktif()
    {
        $object = [
            'verify' => '4'
        ];
        $this->db->where('idCuti', $this->uri->segment(4));
        $this->db->update('cuti', $object);
        redirect('admin/' . $this->vn);
    }

    function surat()
    {
        $data['title'] = $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataSuratById($id);
        $this->load->view($this->vn . '/sk', $data);
    }

    // sisi pegawai 
    function pengajuan()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/pengajuan', $data);
    }

    function pengajuanAction()
    {
        $this->primaryModel->pengajuan();
        redirect('admin/' . $this->vn . '/riwayat');
    }

    public function Riwayat()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataByPegawai();

        $this->template->load('template', $this->vn . '/riwayat', $data);
    }
}

/* End of file Rt.php */
