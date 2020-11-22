<?php

$this->load->view('admin/template/title', $title);
$this->load->view('admin/template/sidebar', $title);
$this->load->view('admin/template/navbar', $title);
$this->load->view('admin/'.$content);
$this->load->view('admin/template/footer');


?>