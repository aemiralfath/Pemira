<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'daftar_pemilih';
        $this->data['primary_key'] = 'nim';
    }

}

/* End of file Pemilih_m.php */
