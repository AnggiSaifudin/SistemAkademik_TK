<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{

    protected $table = 'tbl_guru';

    public function allData()
    {
        return $this->db->table('tbl_guru')->orderBy('nuptk', 'DESC')->get()->getResultArray();
    }
    public function detailData($nuptk)
    {
        return $this->db->table('tbl_guru')
            ->where('nuptk', $nuptk)
            ->get()->getRowArray();
    }
    public function BioGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('nuptk', session()
                ->get('username'))
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_guru')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_guru')
        ->where('nuptk', $data['nuptk'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_guru')->where('nuptk', $data['nuptk'])->delete($data);
    }


}
