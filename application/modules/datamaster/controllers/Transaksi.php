<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_m', 'primaryModel');
    }
    public $titles = 'Transaksi Rental';
    public $vn = 'Transaksi';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function accept()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataAccept();
        $this->template->load('template', $this->vn . '/accept', $data);
    }

    public function selesai()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataKembali();
        $this->template->load('template', $this->vn . '/selesai', $data);
    }

    function setuju()
    {
        $idTransaksi = $this->uri->segment(4);
        $this->primaryModel->setuju($idTransaksi);
        redirect('datamaster/' . $this->vn . '/accept');
    }

    function batal()
    {
        $idTransaksi = $this->uri->segment(4);
        $this->primaryModel->batal($idTransaksi);
        redirect('datamaster/' . $this->vn);
    }

    function actionSelesai()
    {
        $idTransaksi = $this->uri->segment(4);
        $this->primaryModel->selesai($idTransaksi);
        redirect('datamaster/' . $this->vn . '/selesai');
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

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('datamaster/' . $this->vn);
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
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('datamaster/' . $this->vn);
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

    function getMobil()
    {
        $d = $_GET['d'];
        $this->db->where('idMobil', $d);
        $this->db->join('merk', 'merk.idMerkMobil = mobil.idMerkMobil', 'left');
               
        $data = $this->db->get('mobil')->result();
        echo '<div class="col-md-6 mt-3">';
        // echo '<label for="validationCustom01">Devisi </label>';
        echo '<figure class="figure">';
        foreach ($data as $mobil) :
        echo '<img src="' . base_url() . 'upload/'. $mobil->foto .' " class="figure-img img-fluid rounded" width="500px" alt="...">';
        echo '<figcaption class="figure-caption">Nama Mobil : '. $mobil->namaMerk .' '. $mobil->namaMobil .'</figcaption>';
        echo '<figcaption class="figure-caption">No Plat : '. $mobil->noPlat .'</figcaption>';
        echo '<figcaption class="figure-caption">Tahun : '. $mobil->tahunMobil .'</figcaption>';
        echo '<figcaption class="figure-caption">AC : '. fd_ac($mobil->ac) .'</figcaption>';
        endforeach;
        echo '</figure>';
        echo '</div>';
    }
}

/* End of file */
