<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paslon extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'paslon';
        $this->data['primary_key'] = 'id_paslon';
    }

    public function getPaslon()
    {
        $paslon1 = $this->get_row(['id_paslon'=>1]);
        $paslon2 = $this->get_row(['id_paslon'=>2]);
        return [
            [
                'nomor' => $paslon1->id_paslon,
                'nama1' => $paslon1->data_cagubma,
                'foto1' => $paslon1->foto_cagubma,
                'nama2' => $paslon1->data_cawagubma,
                'foto2' => $paslon1->foto_cawagubma,
                'color' => 'e15759'
            ],
            [
                'nomor' => $paslon2->id_paslon,
                'nama1' => $paslon2->data_cagubma,
                'foto1' => $paslon2->foto_cagubma,
                'nama2' => $paslon2->data_cawagubma,
                'foto2' => $paslon2->foto_cawagubma,
                'color' => '4959d6'
            ]
        ];
    }
}
