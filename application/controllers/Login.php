<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_m');
        $this->load->model('log_m');

        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (isset($this->data['username'], $this->data['id_role']))
        {
            switch ($this->data['id_role'])
            {
                case 101:
                    redirect('Superadmin');
                    break;

                case 201:
                    redirect('Admin');
                    break;
                
                default:
                    redirect('Logout');
            }
            exit;
        }

        $this->load->model('user_m');
    }
    
    public function index()
    {
        if($this->POST('username') && $this->POST('password')) {

            if($this->user_m->cek_login(array('username' => $this->POST('username'), 'password' => $this->POST('password')))) {
                $this->log_m->insert(array('ip_address' => $this->get_ip(), 'waktu' => mdate('%Y-%m-%d %H:%i:%s', now('Asia/Jakarta')), 'username'=>$this->POST('username')));
                redirect('login');
                exit;
            } else { 
                echo "<script>alert('Username dan Password salah');window.location = ".json_encode(site_url('login')).";</script>";
                exit;
            }
        }

        $this->data['title'] = "Login | ";
        $this->data['content'] = "login";
        $this->load->view('login', $this->data);
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