<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index()
    {
        $this->load->library('session');
        $this->load->model('log_m');
        $this->log_activity($this->session->userdata('username'), 'logout');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('status');
		redirect('login');
		exit;
    }

    private function log_activity($username, $msg)
    {
        $ip = $this->get_ip();
        $this->log_m->insert(['username' => $username, 'ip_address' => $ip, 'keterangan' => $msg, 'waktu' => mdate('%Y-%m-%d %H:%i:%s', now('Asia/Jakarta'))]);
    }

    public function get_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

}

/* End of file Controllername.php */
