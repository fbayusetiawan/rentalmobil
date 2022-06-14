<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
    }

    public function index()
    {
        $this->load->view('login/list');
    }

    public function logon()
    {
        $username = $this->input->post('user', TRUE);
        $password = $this->input->post('password', TRUE);

        if (!empty($userData = $this->register_m->getDataByUser($username))) :
            $userData  = $this->register_m->getDataByUser($username);
        else :
            $userData = $this->register_m->getDataByPegawai($username);
        endif;

        if ($userData) :
            if ($userData->isActive == 1) :
                if (password_verify($password, $userData->password)) :

                    if ($userData->roleId == 1) :
                        $data = [
                            'idUser' => $userData->idUsers,
                            'namaLengkap' => $userData->namaLengkap,
                            'noWa' => $userData->noWa,
                            'username' => $userData->username,
                            'foto' => $userData->foto,
                            'roleId' => $userData->roleId,
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin/Dashboard');
                    elseif ($userData->roleId == 2) :

                        $data = [
                            'idUser' => $userData->idUsers,
                            'namaLengkap' => $userData->namaLengkap,
                            'noWa' => $userData->noWa,
                            'username' => $userData->username,
                            'foto' => $userData->foto,
                            'roleId' => $userData->roleId,
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin/Dashboard');
                    elseif ($userData->roleId == 3) :

                        $data = [
                            'idUser' => $userData->idPegawai,
                            'namaLengkap' => $userData->namaPegawai,
                            'noWa' => $userData->noWa,
                            'username' => $userData->username,
                            'foto' => $userData->foto,
                            'roleId' => $userData->roleId,
                        ];
                        $this->session->set_userdata($data);
                        redirect('Admin/Dashboard');
                    else :
                        redirect('Auth/Login');
                    endif;
                else :
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
                    redirect('Auth/login');
                endif;
            else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Akun Anda Belum Aktif!</div>');
                redirect('Auth/login');
            endif;
        else :
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
            redirect('Auth/login');
        endif;
    }
}

/* End of file Login.php */
