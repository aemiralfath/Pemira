<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (isset($this->data['username'], $this->data['id_role']))
        {
            switch ($this->data['id_role'])
            {
                case 101:
                    redirect('superadmin');
                break;
                
                case 201:
                    redirect('Admin');
                break;
            }
            exit;
        }

        $this->load->model('user_m');
    }
    
    public function index()
    {
        if($this->POST('username') && $this->POST('password')) {
            $login = $this->user_m->get_row(['username' => $this->POST('username'), 'password' => md5($this->POST('password'))]);
            
            if($login != null) {
                $array = array(
                    'username' => $login->username,
                    'id_role' => $login->role
                );
                
                $this->session->set_userdata( $array );
                redirect('login');
            } else {
                $this->flashmsg("Username / Password salah", "warning");
            }
        }

        $this->data['title'] = "Admin | ";
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