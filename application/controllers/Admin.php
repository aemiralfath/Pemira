<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if(!isset($this->data['username']) || $this->data['id_role'] != 201)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->session->unset_userdata('status');
            echo "<script>alert('you must login first');window.location = ".json_encode(site_url('login')).";</script>";
            exit;
        }
    }

    public function index()
    {
        $this->load->model("applicant_m");
        $this->data['title'] = "Admin | Dashboard";
        $this->data['content'] = "table";
        $data = $this->applicant_m->get();
        
        foreach($data as $d){
            $d->name = $this->encryption->decrypt($d->name);
            $d->birth = $this->encryption->decrypt($d->birth);
            $d->email = $this->encryption->decrypt($d->email);
            $d->no_telp = $this->encryption->decrypt($d->no_telp);
            $d->university = $this->encryption->decrypt($d->university);
            $d->major = $this->encryption->decrypt($d->major);
            $d->semester = $this->encryption->decrypt($d->semester);
            $d->skills = $this->encryption->decrypt($d->skills);
            $d->organization = $this->encryption->decrypt($d->organization);
            $d->medsos = $this->encryption->decrypt($d->medsos);
            $d->type = $this->encryption->decrypt($d->type);
        }

        $this->data['applicant'] = $data;
		$this->load->view('template/template', $this->data);
    }

    public function send($type){
        print_r($type);
        if($this->POST('submit_intern')){
            print_r($type);
            $data = array(
                'id' => null,
                'name' => $this->encryption->encrypt($this->POST('nama')),
                'email' => $this->encryption->encrypt($this->POST('email')),
                'birth' => $this->encryption->encrypt($this->POST('ttl')),
                'no_telp' => $this->encryption->encrypt($this->POST('tel')),
                'university' => $this->encryption->encrypt($this->POST('universitas')),
                'major' => $this->encryption->encrypt($this->POST('jurusan')),
                'semester' => $this->encryption->encrypt($this->POST('semester')),
                'organization' => $this->encryption->encrypt($this->POST('organisasi')),
                'skills' => $this->encryption->encrypt($this->POST('skill')),
                'medsos' => $this->encryption->encrypt($this->POST('medsos')),
                'type' => $this->encryption->encrypt($type)
            );

            $this->applicant_m->insert($data);
            echo "<script>alert('Data Berhasil disimpan!');window.location = ".json_encode(base_url()).";</script>";
        }
    }
}

/* End of file Admin.php */
