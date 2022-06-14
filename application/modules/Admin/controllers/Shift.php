<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Shift extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Shift_m', 'primaryModel');
    }
    public $titles = 'Shift Bulanan';
    public $vn = 'Shift';

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
        $data['data'] = $this->primaryModel->getDataPegawai($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }
    function jadwal()
    {
        $id = $this->uri->segment(4);
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['data'] = $this->primaryModel->jadwal($id);
        $this->load->view($this->vn . '/sk', $data);
    }



    // sisi pegawai
    public function pegawai()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDataByIdPegawai();

        $this->template->load('template', $this->vn . '/pegawai', $data);
    }

    // ajax 
    function getpegawai()
    {
        $no = 1;
        $hari = $_GET['hari'];
        $idShift = $_GET['idShift'];
        $devisi = $_GET['devisi'];
        $this->db->where('idDevisi', $devisi);
        $data = $this->db->get('pegawai')->result();
        echo '<table id="basic-datatable" class="table nowrap">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>Nama Pegawai</th>';
        echo '<th class="text-center">Shift</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($data as $row) :
            $this->db->where('idPegawai', $row->idPegawai);
            $this->db->where('hari', $hari);
            $this->db->where('idShift', $idShift);
            $hasil = $this->db->get('shift_detail')->row();
            if (empty($hasil->idShiftDetail)) :
                $ShiftVal = "";
            else :
                $ShiftVal = $hasil->shift;
            endif;
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $row->namaPegawai . '</td>';
            echo '<td>';
?>
            <select id="shift<?= $row->idPegawai ?>" onchange="insertshift('<?= $row->idPegawai ?>')" class="form-control">
                <option value="">Pilih Shift</option>
                <option <?= $ShiftVal == '1' ? 'selected' : '' ?> value="1">Pagi</option>
                <option <?= $ShiftVal == '2' ? 'selected' : '' ?> value="2">Malam</option>
                <option <?= $ShiftVal == '3' ? 'selected' : '' ?> value="3">Libur</option>
            </select>
<?php
            echo '</td>';
            echo '</tr>';
        endforeach;
        echo '</tbody>';
        echo '</table>';
    }

    function insertDetail()
    {
        $idPegawai = $_GET['idPegawai'];
        $idShift = $_GET['idShift'];
        $shift = $_GET['shift'];
        $hari = $_GET['hari'];

        // Validasi 
        $this->db->where('idPegawai', $idPegawai);
        $this->db->where('idShift', $idShift);
        $this->db->where('hari', $hari);
        $cek = $this->db->get('shift_detail')->num_rows();

        $object = [
            'idShift' => $idShift,
            'idPegawai' => $idPegawai,
            'shift' => $shift,
            'hari' => $hari,
        ];
        if ($cek > 0) :
            $this->db->where('idPegawai', $idPegawai);
            $this->db->where('idShift', $idShift);
            $this->db->where('hari', $hari);
            $this->db->update('shift_detail', $object);
        else :
            $this->db->insert('shift_detail', $object);
        endif;
    }
}

/* End of file Rt.php */
