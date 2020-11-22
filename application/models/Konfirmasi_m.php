<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'kode_konfirmasi';
        $this->data['primary_key'] = 'nim';
    }

}

/* End of file Konfirmasi_m.php */
