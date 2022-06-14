<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_m', 'primaryModel');
    }
    public $titles = 'Pegawai';
    public $vn = 'Pegawai';

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
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function getDevisi()
    {
        $d = $_GET['d'];
        $this->db->where('idDepartemen', $d);
        $data = $this->db->get('devisi')->result();
        echo '<div class="form-group mb-3">';
        echo '<label for="validationCustom01">Devisi </label>';
        echo '<select name="idDevisi"  required class="form-control">';
        echo '    <option value="">Pilih Devisi</option>';
        foreach ($data as $devisi) :
            echo '        <option value="' . $devisi->idDevisi . '"> ' . $devisi->namaDevisi . ' </option>';
        endforeach;
        echo '</select>';
        echo '<div class="invalid-feedback">';
        echo    'Harus dipilih!';
        echo '</div>';
        echo '</div>';
    }

    function cekUser()
    {
        $user = $_GET['user'];
        $this->db->where('username', $user);
        $row = $this->db->get('pegawai')->row();

        if (empty($row->username)) :
            echo "<span class='text-success'>Tersedia</span>";
        else :
            echo "<span class='text-danger'>Tidak Tersedia</span>";
        endif;
    }
}

/* End of file */
