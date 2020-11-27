<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_vote_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'log_pemilihan';
        $this->data['primary_key'] = 'id_log';
    }

    function getLog($postData=null){

        $response = array();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];

        $search_arr = array(" keterangan like '%Vote Untuk NIM%' ");
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (keterangan like '%".$searchValue."%' or 
                waktu like '%".$searchValue."%') ";
        }

        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }

        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('log_pemilihan')->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('log_pemilihan')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('log_pemilihan')->result();

        $data = array();

        foreach($records as $record ){
            
            $data[] = array( 
                "kode_konfirmasi"=>$this->encryption->decrypt($record->kode_konfirmasi),
                "keterangan"=>$record->keterangan,
                "waktu"=>$record->waktu
            ); 
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response; 
    }

}

/* End of file Log_m.php */
