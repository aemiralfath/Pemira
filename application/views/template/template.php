<?php 
    $this->load->view('template/title', $title, $content);
    $this->load->view($content);
    $this->load->view('template/footer');
?>