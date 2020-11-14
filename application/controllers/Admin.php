<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 201)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->session->unset_userdata('status');
            echo "<script>alert('you must login first');window.location = ".json_encode(site_url('login')).";</script>";
            exit;
        }

        $this->load->model('pemilih_m');
        $this->load->model('konfirmasi_m');
    }
    
    public function index()
    {
        $this->data['pemilih'] = $this->pemilih_m->get_num_row(['jurusan !=' => 0]);
        $this->data['memilih'] = $this->konfirmasi_m->get_num_row(['nim !=' => 0, 'paslon_pilihan !=' => 0]);
        $this->data['active'] = 1;
        $this->data['title'] = 'Admin | ';
        $this->data['content'] = 'main';
        $this->load->view('admin/template/template', $this->data);
    }

    public function daftar_pemilih($id=1)
    {
        $this->data['id'] = $id;
        $this->data['active'] = 2;
        $this->data['title'] = 'Admin | ';
        $this->data['content'] = 'daftar-pemilih';
        $this->load->view('admin/template/template', $this->data);
    }

    public function detail_pemilih($nim=null)
    {
        if($nim == null) {
            redirect('admin/daftar-pemilih');
            exit;
        }

        $this->data['jk'] = ['', 'Laki - laki', 'Perempuan'];
        $this->data['pemilih'] = $this->pemilih_m->getDataJoinWhere(['jurusan'], ['daftar_pemilih.jurusan = jurusan.id_jurusan'], ['nim' => $nim]);
        $this->data['active'] = 3;
        $this->data['title'] = 'Admin | ';
        $this->data['content'] = 'detail-pemilih';
        $this->load->view('admin/template/template', $this->data);
    }

    public function generateCode() {
        if(isset($this->data['username'])) {
            $unique = md5(uniqid(rand(), true));
            $key = substr($unique, strlen($unique) - 10, strlen($unique));
            $encrypt_key = $this->encryption->encrypt($key);

            $data = array(
                'nim' => $this->POST('nim'),
                'kode' => $encrypt_key,
                'date_created' => mdate('%Y-%m-%d %H:%i:%s', now('Asia/Jakarta')),
                'date_used' => null,
                'paslon_pilihan' => 0
            );
            $this->konfirmasi_m->insert($data);

            echo json_encode(array('key' => $key, 'status' => 'success'));
        } else {
            echo json_encode(array('status' => 'gagal'));
        }
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

    public function getData()
    {
        $d->type = $this->encryption->decrypt($d->type);
    }

}

/* End of file Admin.php */
