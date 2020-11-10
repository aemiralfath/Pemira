<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'jurusan';
        $this->data['primary_key'] = 'id_jurusan';
    }

}

/* End of file Konfirmasi_m.php */
