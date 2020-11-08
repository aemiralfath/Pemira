<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('user_m');
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (isset($this->data['username'], $this->data['id_role']))
        {
            if($this->data['id_role'] != 101) {
                $this->session->sess_destroy();
                $this->flashmsg("Kamu harus login dulu", "warning");
                redirect('login');
                exit;
            }
        } else {
            $this->session->sess_destroy();
            $this->flashmsg("Kamu harus login dulu", "warning");
            redirect('login');
            exit;
        }

        $this->load->model('pemilih_m');
        $this->load->model('konfirmasi_m');
        $this->load->model('user_m');
        
    }

    public function index()
    {
        $this->data['pemilih'] = $this->pemilih_m->get_num_row(['jurusan !=' => 0]);
        $this->data['memilih'] = $this->konfirmasi_m->get_num_row(['nim !=' => 0]);
        $this->data['active'] = 1;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'main';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function daftar_admin()
    {
        $this->data['admin'] = $this->user_m->get(['role' => 201]);
        $this->data['active'] = 2;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'daftar-admin';
        $this->load->view('superadmin/template/template', $this->data);
    }
    
    public function tambah_admin()
    {
        $data = [
            'username' => $this->POST('username'),
            'password' => md5($this->POST('password')),
            'role' => 201
        ];

        $cek = $this->user_m->insert($data);

        if($cek) {
            $this->flashmsg('Berhasil Menambah Admin');
        } else {
            $this->flashmsg('Gagal Menambah Admin', 'danger');
        }

        redirect('superadmin/daftar-admin');
    }

    public function daftar_pemilih($id = 1)
    {
        $this->data['id'] = $id;
        $this->data['active'] = 3;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'daftar-pemilih';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function detail_pemilih($nim = null)
    {
        if($nim == null) {
            redirect('superadmin/daftar-pemilih');
            exit;
        }

        $this->data['jk'] = ['', 'Laki - laki', 'Perempuan'];
        $this->data['pemilih'] = $this->pemilih_m->getDataJoinWhere(['jurusan'], ['daftar_pemilih.jurusan = jurusan.id_jurusan'], ['nim' => $nim]);
        $this->data['active'] = 3;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'detail-pemilih';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function listPemilih()
    {
        $postData = $this->input->post();

        $data = $this->pemilih_m->getPemilih($postData);

        echo json_encode($data);
    }

    public function belumMemilih()
    {
        $postData = $this->input->post();

        $data = $this->pemilih_m->belumMemilih($postData);

        echo json_encode($data);
    }

}

/* End of file Superadmin.php */
