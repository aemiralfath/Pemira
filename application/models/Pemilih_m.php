<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih_m extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'daftar_pemilih';
        $this->data['primary_key'] = 'nim';
    }

    function getPemilih($postData=null){

        $response = array();
  
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
  
        // // Custom search filter 
        // $searchCity = $postData['searchCity'];
        // $searchGender = $postData['searchGender'];
        // $searchName = $postData['searchName'];

        // $searchNim = $postData['searchNim'];
        // $searchNama = $postData['searchNama'];
        // $searchJurusan = $postData['searchJurusan'];
  
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (nim like '%".$searchValue."%' or 
                nama like '%".$searchValue."%' or 
                jurusan like'%".$searchValue."%' or 
                angkatan like'%".$searchValue."%') ";
        }
        // if($searchNim != ''){
        //     $search_arr[] = " nim like '%".$searchNim."%' ";
        // }
        // if($searchNama != ''){
        //     $search_arr[] = " nama like '%".$searchNama."%' ";
        // }
        // if($searchJurusan != ''){
        //     $search_arr[] = " jurusan like '%".$searchJurusan."%' ";
        // }
        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }
  
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('daftar_pemilih')->result();
        $totalRecords = $records[0]->allcount;
  
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('daftar_pemilih')->result();
        $totalRecordwithFilter = $records[0]->allcount;
  
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('daftar_pemilih')->result();
  
        $data = array();
  
        foreach($records as $record ){

            $jk = [
                1 => "Laki - laki",
                2 => "Perempuan"
            ];

            $jurusan = [
                1 => "TEKNIK INFORMATIKA",
                2 => "TEKNIK INFORMATIKA (BILINGUAL)",
                3 => "SISTEM KOMPUTER",
                4 => "SISTEM INFORMASI",
                5 => "TEKNIK KOMPUTER",
                6 => "MANAJEMEN INFORMATIKA",
                7 => "KOMPUTERISASI AKUNTANSI",
                8 => "TEKNIK KOMPUTER DAN JARINGAN",
                9 => "SISTEM INFORMASI (BILINGUAL)",
                10 => "SISTEM INFORMASI (S2 KELAS PROFESIONAL)",
                11 => "SISTEM KOMPUTER (KAMPUS PALEMBANG)",
                12 => "SISTEM INFORMASI (S1 KELAS PROFESIONAL)"
            ];
            
            $data[] = array( 
                "nim"=>$record->nim,
                "nama"=>$record->nama,
                "jenis_kelamin"=>$jk[$record->jenis_kelamin],
                "jurusan"=>$jurusan[$record->jurusan],
                "angkatan"=>$record->angkatan
            ); 
        }
  
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
  
        return $response; 
    }

    function belumMemilih($postData=null){

        $response = array();
  
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
  
        // // Custom search filter 
        // $searchCity = $postData['searchCity'];
        // $searchGender = $postData['searchGender'];
        // $searchName = $postData['searchName'];

        // $searchNim = $postData['searchNim'];
        // $searchNama = $postData['searchNama'];
        // $searchJurusan = $postData['searchJurusan'];
  
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (nim like '%".$searchValue."%' or 
                nama like '%".$searchValue."%' or 
                jurusan like'%".$searchValue."%' or 
                angkatan like'%".$searchValue."%') ";
        }
        // if($searchNim != ''){
        //     $search_arr[] = " nim like '%".$searchNim."%' ";
        // }
        // if($searchNama != ''){
        //     $search_arr[] = " nama like '%".$searchNama."%' ";
        // }
        // if($searchJurusan != ''){
        //     $search_arr[] = " jurusan like '%".$searchJurusan."%' ";
        // }
        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }
  
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('daftar_pemilih')->result();
        $totalRecords = $records[0]->allcount;
  
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('daftar_pemilih')->result();
        $totalRecordwithFilter = $records[0]->allcount;
  
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('daftar_pemilih')->result();
  
        $data = array();
  
        foreach($records as $record ){

            if($record->jenis_kelamin == 1) {
                $jk = "Laki - laki";
            } else {
                $jk = "Perempuan";
            }

            $jurusan = [
                1 => "TEKNIK INFORMATIKA",
                2 => "TEKNIK INFORMATIKA (BILINGUAL)",
                3 => "SISTEM KOMPUTER",
                4 => "SISTEM INFORMASI",
                5 => "TEKNIK KOMPUTER",
                6 => "MANAJEMEN INFORMATIKA",
                7 => "KOMPUTERISASI AKUNTANSI",
                8 => "TEKNIK KOMPUTER DAN JARINGAN",
                9 => "SISTEM INFORMASI (BILINGUAL)",
                10 => "SISTEM INFORMASI (S2 KELAS PROFESIONAL)",
                11 => "SISTEM KOMPUTER (KAMPUS PALEMBANG)",
                12 => "SISTEM INFORMASI (S1 KELAS PROFESIONAL)"
            ];
            
            $data[] = array( 
                "nim"=>$record->nim,
                "nama"=>$record->nama,
                "jk"=>$jk,
                "jurusan"=>$jurusan[$record->jurusan],
                "angkatan"=>$record->angkatan
            ); 
        }
  
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
  
        return $response; 
    }

}

/* End of file Pemilih_m.php */
