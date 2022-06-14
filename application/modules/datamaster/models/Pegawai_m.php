<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_m extends CI_Model
{

    public $namaTable = 'pegawai';
    public $pk = 'idPegawai';

    function getAllData()
    {
        // $this->db->join('devisi', 'devisi.idDevisi = ' . $this->namaTable . '.idDevisi', 'left');
        // $this->db->join('departemen', 'departemen.idDepartemen = devisi.idDepartemen', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = ' . $this->namaTable . '.idJabatan', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        // $this->db->join('pangkat', 'pangkat.idPangkat = ' . $this->namaTable . '.idPangkat', 'left');
        // $this->db->join('golongan', 'golongan.idGolongan = ' . $this->namaTable . '.idGolongan', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = ' . $this->namaTable . '.idJabatan', 'left');
        // $this->db->join('devisi', 'devisi.idDevisi = ' . $this->namaTable . '.idDevisi', 'left');
        // $this->db->join('departemen', 'departemen.idDepartemen = devisi.idDepartemen', 'left');
        return $this->db->get($this->namaTable)->row();
    }


    function save($foto)
    {
        $object = [
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'noIndukKepegawaian' => htmlspecialchars($this->input->post('noIndukKepegawaian', TRUE)),
            'tanggalMulaiBekerja' => htmlspecialchars($this->input->post('tanggalMulaiBekerja', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'statusKepegawaian' => htmlspecialchars($this->input->post('statusKepegawaian', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'roleId' => '3',
            'isActive' => '1',
            'foto' => $foto,
            'helpNumber' => noOtomatis('helpNumber', 'helpNumber', 'pegawai')
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if (empty($foto) && empty($pass)) :
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'tanggalMulaiBekerja' => htmlspecialchars($this->input->post('tanggalMulaiBekerja', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'statusKepegawaian' => htmlspecialchars($this->input->post('statusKepegawaian', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),


            ];
        elseif (empty($foto) && !empty($pass)) :
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'tanggalMulaiBekerja' => htmlspecialchars($this->input->post('tanggalMulaiBekerja', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'statusKepegawaian' => htmlspecialchars($this->input->post('statusKepegawaian', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            ];
        elseif (!empty($foto) && empty($pass)) :
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'tanggalMulaiBekerja' => htmlspecialchars($this->input->post('tanggalMulaiBekerja', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'statusKepegawaian' => htmlspecialchars($this->input->post('statusKepegawaian', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'foto' => $foto,

            ];
        else :
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'tanggalMulaiBekerja' => htmlspecialchars($this->input->post('tanggalMulaiBekerja', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'statusKepegawaian' => htmlspecialchars($this->input->post('statusKepegawaian', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'foto' => $foto,

            ];
        endif;
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
