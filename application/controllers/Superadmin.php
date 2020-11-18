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
        $this->load->model('jurusan_m');
        $this->load->model('log_m');

        $this->data['activity'] = '';
        
    }

    public function index()
    {
        $this->log_activity('Mengakses Dashboard Super Admin');
        $this->data['pemilih'] = $this->pemilih_m->get_num_row(['jurusan !=' => 0]);
        $this->data['memilih'] = $this->konfirmasi_m->get_num_row(['paslon_pilihan !=' => 0]);
        $this->data['active'] = 1;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'main';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function daftar_admin()
    {
        $this->log_activity('Mengakses Daftar Admin');
        $this->data['admin'] = $this->user_m->get(['role' => 201]);
        $this->data['active'] = 2;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'daftar-admin';
        $this->load->view('superadmin/template/template', $this->data);
    }
    
    public function tambah_admin()
    {
        $this->log_activity('Menambah Admin Username : '.$this->POST('Username').' | Password : '.$this->POST('password'));
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

    public function ubah_password()
    {
        if(!isset($_POST)) {
            $this->log_activity('Mengakses URL Tanpa mengisi form | Ubah Password');
            redirect('superadmin/daftar-admin');
            exit;
        }

        $this->log_activity('Mengubah Password Admin | Username : '.$this->POST('Username').' | Password : '.$this->POST('password'));
        
        $this->user_m->update($this->POST('username'), ['password' => md5($this->POST('password'))]);
        $this->flashmsg("Berhasil Merubah Password");
        redirect('superadmin/daftar-admin');
        exit;
    }

    public function hapus_admin($username = null)
    {
        if($username == null) {
            $this->log_activity('Mengakses hapus admin tanpa menambahkan username');
            redirect('superadmin/daftar-admin');
            exit;
        }

        $this->log_activity('Menghapus Akun Admin | Username : '.$username);

        $this->user_m->delete($username);
        $this->flashmsg("Berhasil Menghapus Akun");
        redirect('superadmin/daftar-admin');
        exit;
    }

    public function daftar_pemilih($id = 1)
    {
        $cond = ['', 'Belum Memilih', 'Sudah Memilih'];
        $this->log_activity('Mengakses laman daftar pemilih '.$cond[$id]);
        $this->data['jurusan'] = $this->jurusan_m->get();
        $this->data['angkatan'] = $this->db->query("SELECT MAX(`angkatan`) AS `maks`, MIN(`angkatan`) as `mins` FROM `daftar_pemilih`")->row();
        $this->data['id'] = $id;
        $this->data['active'] = 3;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'daftar-pemilih';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function detail_pemilih($nim = null)
    {
        if($nim == null) {
            $this->log_activity('Mengakses detail pemilih tanpa NIM');
            redirect('superadmin/daftar-pemilih');
            exit;
        }

        $this->log_activity('Mengakses detail pemilih | NIM : '.$nim);
        $this->data['jk'] = ['', 'Laki - laki', 'Perempuan'];
        $this->data['kode'] = $this->konfirmasi_m->get_row(['nim' => $nim]);
        $this->data['pemilih'] = $this->pemilih_m->getDataJoinWhere(['jurusan'], ['daftar_pemilih.jurusan = jurusan.id_jurusan'], ['nim' => $nim]);
        $this->log_activity('Mengakses Detail Pemilih : '.$this->data['pemilih']->nama.' | NIM : '.$nim);

        if($this->data['kode'] != null){
            $this->data['decrypt'] = $this->encryption->decrypt($this->data['kode']->kode);
        }
        $this->data['active'] = 3;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'detail-pemilih';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function timeline()
    {
        $this->load->model('timeline_m');
        $this->data['timeline'] = $this->timeline_m->get();

        $this->data['active'] = 4;
        $this->data['title'] = 'Super Admin | ';
        $this->data['content'] = 'timeline';
        $this->load->view('superadmin/template/template', $this->data);
    }

    public function updateTimeline()
    {
        $this->load->model('timeline_m');
        $this->timeline_m->update('timeline',array('status'=>$this->POST('timeline_status')));
        echo json_encode(array('status' => 'success'));
    }

    public function ekspor_excel($jurusan = null, $angkatan = null)
    {
        if(!isset($jurusan, $angkatan)) {
            redirect('superadmin/daftar-pemilih');
            exit;
        }

        $where = [];

        if($jurusan != 'all') {
            $where['jurusan'] = $jurusan;
        }

        if($angkatan != 'all') {
            $where['angkatan'] = $angkatan;
        }

        if(count($where) > 0) {
            $this->data['pemilih'] = $this->pemilih_m->getDataJoin(['jurusan'], ['daftar_pemilih.jurusan = jurusan.id_jurusan'], $where);
        } else {
            $this->data['pemilih'] = $this->pemilih_m->getDataJoin(['jurusan'], ['daftar_pemilih.jurusan = jurusan.id_jurusan']);
        }

        $this->load->view('ekspor-excel', $this->data);
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

    public function generateCode() {
        if(isset($this->data['username'])) {
            $this->log_activity($this->data['username'].' Generate Code Untuk NIM : '.$this->POST('nim'));
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
            $this->log_activity('Mencoba Mengakses Generate Code');
            echo json_encode(array('status' => 'gagal'));
        }
    }

    private function log_activity($msg)
    {
        $ip = $this->get_ip();
        $this->log_m->insert(['username' => $this->data['username'], 'ip_address' => $ip, 'keterangan' => $msg, 'waktu' => mdate('%Y-%m-%d %H:%i:%s', now('Asia/Jakarta'))]);
        $this->data['activity'] = $this->log_m->get_by_order_any_limit('id_log', 'DESC', 10);
    }

    public function get_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}

/* End of file Superadmin.php */
