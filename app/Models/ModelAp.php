<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAp extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_ap')
            ->orderBy('id_ap', 'DESC')
            ->get()->getResultArray();
    }
    public function detailData()
    {
        return $this->db->table('tbl_ap')
            ->orderBy('id_ap', 'DESC')->get()->getRowArray();
    }

    public function allDataap($id_prodi)
    {
        return $this->db->table('tbl_ap')
            ->where('id_prodi', $id_prodi)->orderBy('smt', 'ASC')->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_ap')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_ap')->where('id_ap', $data['id_ap'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_ap')->where('id_ap', $data['id_ap'])->delete($data);
    }
}
