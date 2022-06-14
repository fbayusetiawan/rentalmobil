<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Absen_m', 'primaryModel');
    }
    public $titles = 'Absen Bulanan';
    public $vn = 'Absen';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }
        $data['absen'] = $this->primaryModel->getAbsen($bulanTahun);
        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function add()
    {
        $data['title'] = 'Input Absensi';
        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['absen'] = $this->primaryModel->InputjoinPegawaiJabatan($bulanTahun);
        $this->template->load('template', $this->vn . '/add', $data);
    }

    public function actionAbsen()
    {
        $post = $this->input->post();
        // var_dump($post); die;
        foreach ($post['bulan'] as $key => $value) {
            if ($post['bulan'][$key] != null || $post['nik'][$key] != null) {
                $data[] =
                    [
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'idPegawai' => $post['idPegawai'][$key],
                        'idJabatan' => $post['idJabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alpa' => $post['alpa'][$key]
                    ];
            }
        }
        $this->primaryModel->tambah_batch($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Kehadiran <strong>Berhasil Ditambahkan.</strong></div>');
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
        $data['data'] = $this->primaryModel->getDataPegawai($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function insertDetail()
    {
        $hadir = $_GET['h'];
        $izin = $_GET['i'];
        $sakit = $_GET['s'];
        $tk = $_GET['tk'];
        $idPegawai = $_GET['idPegawai'];
        $idAbsen = $_GET['idAbsen'];

        // Validasi 
        $this->db->where('idPegawai', $idPegawai);
        $this->db->where('idAbsen', $idAbsen);
        $cek = $this->db->get('absen_detail')->num_rows();

        $object = [
            'idAbsen' => $idAbsen,
            'idPegawai' => $idPegawai,
            'hadir' => $hadir,
            'izin' => $izin,
            'sakit' => $sakit,
            'tanpaKeterangan' => $tk,
            'tanggalInput' => date('Y-m-d'),
        ];
        if ($cek > 0) :
            $this->db->where('idPegawai', $idPegawai);
            $this->db->where('idAbsen', $idAbsen);
            $this->db->update('absen_detail', $object);
        else :
            $this->db->insert('absen_detail', $object);
        endif;
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
