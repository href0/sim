<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sim extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('golongan');
        $this->load->model('jenispemohon');
        $this->load->model('simmodel', 'sim');
        if (!$this->session->userdata('login_session')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title'         => 'Daftar Pembuat SIM',
            'sub_page'      => '',
            'table'         => $this->sim->getALl(),
            'golongan'      => $this->golongan->getALl(),
            // 'username'      => $this->username_login,
            'content'       => 'sim/index'
        ];
        $this->load->view('template/master', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('no_regist', 'No Register', 'trim|required', [
            'required'      => 'No Register harus diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Namar', 'trim|required', [
            'required'      => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('golongan', 'No Register', 'trim|required', [
            'required'      => 'Golongan harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_pemohon', 'No Register', 'trim|required', [
            'required'      => 'Jenis pemohon harus diisi'
        ]);
        $this->form_validation->set_rules('tanggal', 'No Register', 'trim|required', [
            'required'      => 'Tanggal harus diisi'
        ]);
        $this->form_validation->set_rules('umur', 'No Register', 'trim|required', [
            'required'      => 'Umur harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'No Register', 'trim|required', [
            'required'      => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'No Register', 'trim|required', [
            'required'      => 'Pekerjaan harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'No Register', 'trim|required', [
            'required'      => 'Alamat harus diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'         => 'Buat SIM',
                'sub_page'      => '',
                'golongan'      => $this->golongan->getALl(),
                'jenis_pemohon' => $this->jenispemohon->getALl(),
                // 'username'      => $this->username_login,
                'content'       => 'sim/form',
                'type'          => 'add',
                'edit_sim'   => false,
            ];
            $this->load->view('template/master', $data);
        } else {
            $data = [
                'no_register'           => $this->input->post('no_regist'),
                'nama'                  => $this->input->post('nama'),
                'golongan_id'           => $this->input->post('golongan'),
                'jenis_pemohon_id'      => $this->input->post('jenis_pemohon'),
                'umur'                  => $this->input->post('umur'),
                'tanggal_pembuatan'     => $this->input->post('tanggal'),
                'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
                'pekerjaan'             => $this->input->post('pekerjaan'),
                'alamat'                => $this->input->post('alamat'),
                'status'                => 'baru'
            ];
            if ($this->sim->insert($data) > 0) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Sim berhasil dibuat</div>'
                );
                redirect('sim/index');
            }
        }
    }

    public function addgolongan()
    {

        $no_register = $this->input->post('no_register');
        $sim = $this->sim->getByNoRegister($no_register);
        $data = [
            'no_register'           => $sim['no_register'],
            'nama'                  => $sim['nama'],
            'golongan_id'           => $this->input->post('golongan'),
            'jenis_pemohon_id'      => $sim['jenis_pemohon_id'],
            'umur'                  => $sim['umur'],
            'tanggal_pembuatan'     => $sim['tanggal_pembuatan'],
            'jenis_kelamin'         => $sim['jenis_kelamin'],
            'pekerjaan'             => $sim['pekerjaan'],
            'alamat'                => $sim['alamat'],
        ];
        if ($this->sim->insert($data) > 0) {
            echo '<div class="alert alert-success" role="alert">Golongan Sim berhasil ditambahkan</div>';
        }
    }

    public function ubahstatus()
    {
        $sim_id = $this->input->post('sim_id');
        $status = $this->input->post('status');
        $data = [
            'status'     => $status
        ];
        $update = $this->sim->update($data, $sim_id);
        if ($update > 0) {
            echo '<div class="alert alert-success" role="alert">Status Sim berhasil diubah</div>';
        }
    }

    public function edit($sim_id = null)
    {


        $this->form_validation->set_rules('nama', 'Namar', 'trim|required', [
            'required'      => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('tanggal', 'No Register', 'trim|required', [
            'required'      => 'Tanggal harus diisi'
        ]);
        $this->form_validation->set_rules('umur', 'No Register', 'trim|required', [
            'required'      => 'Umur harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'No Register', 'trim|required', [
            'required'      => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'No Register', 'trim|required', [
            'required'      => 'Pekerjaan harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'No Register', 'trim|required', [
            'required'      => 'Alamat harus diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'         => 'Edit SIM',
                'sub_page'      => '',
                // 'username'      => $this->username_login,
                'content'       => 'sim/form',
                'type'          => 'edit',
                'edit_sim'   => $this->sim->getById($sim_id),
            ];
            $this->load->view('template/master', $data);
        } else {

            $data = [
                'nama'                  => $this->input->post('nama'),
                'umur'                  => $this->input->post('umur'),
                'tanggal_pembuatan'     => $this->input->post('tanggal'),
                'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
                'pekerjaan'             => $this->input->post('pekerjaan'),
                'alamat'                => $this->input->post('alamat'),
            ];
            $update = $this->sim->update($data, $sim_id);
            if ($update) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Sim berhasil diupdate</div>'
                );
                redirect('sim/edit/' . $sim_id);
            }
        }
    }

    public function delete($sim_id = null)
    {

        $delete = $this->db->where('sim_id', $sim_id)->delete('sim');
        if ($delete == 1) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">SIM berhasil dihapus</div>'
            );
            redirect('sim');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Terjadi kesalahan</div>'
            );
            redirect('sim');
        }
    }
}
