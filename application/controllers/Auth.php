<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel', 'user');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $user = $this->user->getUser('username', $username);
            if ($user) {
                // check password
                if (password_verify($password, $user['password'])) {

                    $dataSession = [
                        'username'      => $user['username'],
                    ];
                    $this->session->set_userdata('login_session', $dataSession);
                    redirect('sim');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password salah</div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>'
                );
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        // logout
        // membersihkan session dan mengembalikan kehalaman login
        $this->session->unset_userdata('login_session');
        redirect('auth');
    }
}
