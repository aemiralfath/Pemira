<?php

$this->load->view('superadmin/template/title', $title);
$this->load->view('superadmin/template/sidebar', $title);
$this->load->view('superadmin/template/navbar', $title);
$this->load->view('superadmin/'.$content);
$this->load->view('superadmin/template/footer');


?>