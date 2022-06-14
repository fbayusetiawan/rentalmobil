<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rekapgaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekapgaji_m', 'primaryModel');
    }
    public $titles = 'Rekapitulasi Gaji Bulanan';
    public $vn = 'Rekapgaji';

    public function index()
    {
        $data['title'] = 'Gaji Pegawai';
        if ((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->db->get('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT pegawai.nik,pegawai.namaPegawai,jabatan.namaJabatan,jabatan.gapok,jabatan.tjTransport,jabatan.tjMakan,kehadiran.alpa
		FROM pegawai
		INNER JOIN kehadiran ON kehadiran.nik=pegawai.nik
		INNER JOIN jabatan ON jabatan.idJabatan=pegawai.idJabatan
		WHERE kehadiran.bulan= '$bulanTahun'
		ORDER BY pegawai.namaPegawai ASC ")->result();
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
        $data['data'] = $this->primaryModel->getDataPegawai($id);
        $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
        // $data['absen'] = $this->db->get('absen_detail')->result_array();
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
