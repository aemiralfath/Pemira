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
        $this->data['active'] = 2;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'daftar-admin';
        $this->load->view('superadmin/template/template', $this->data);
    }

}

/* End of file Superadmin.php */
