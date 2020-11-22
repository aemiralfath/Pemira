<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index()
    {
        $this->load->library('session');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('status');
		redirect('login');
		exit;
    }

}

/* End of file Controllername.php */
