<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasi_m', 'primaryModel');
    }
    public $titles = 'Mutasi Pegawai';
    public $vn = 'Mutasi';

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

    // sisi pegawai 
    function ajaxpegawai()
    {
        $nik = $_GET['nik'];
        $this->db->where('nik', $nik);
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = pegawai.idGolongan', 'left');
        $this->db->join('devisi', 'devisi.idDevisi = pegawai.idDevisi', 'left');

        $row = $this->db->get('pegawai')->row();

        $data = [
            'namapegawai' => $row->namaPegawai,
            'ttl' => $row->tempatLahir . ', ' . tgl_indo($row->tanggalLahir),
            'pangkatgolongan' => $row->namaPangkat . '/' . $row->namaGolongan,
            'devisi' => $row->namaDevisi,
        ];
        echo json_encode($data);
    }

    function sk()
    {
        $data['title'] = $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->load->view($this->vn . '/sk', $data);
    }
}

/* End of file Rt.php */
