<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supir_m extends CI_Model
{

    public $namaTable = 'pegawai';
    public $pk = 'idPegawai';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save($foto)
    {
        $object = [
            'idPegawai' => htmlspecialchars($this->input->post('idPegawai', TRUE)),
            'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
            'noIndukKepegawaian' => htmlspecialchars($this->input->post('noIndukKepegawaian', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            // 'username' => htmlspecialchars($this->input->post('username', TRUE)),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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

        if (empty($foto)) {
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'noIndukKepegawaian' => htmlspecialchars($this->input->post('noIndukKepegawaian', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                // 'username' => htmlspecialchars($this->input->post('username', TRUE)),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
          }  else {
            $object = [

                'namaPegawai' => htmlspecialchars($this->input->post('namaPegawai', TRUE)),
                'noIndukKepegawaian' => htmlspecialchars($this->input->post('noIndukKepegawaian', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                // 'username' => htmlspecialchars($this->input->post('username', TRUE)),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'foto' => $foto,

            ];
        }
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
