<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_guru')->orderBy('id_guru', 'DESC')->get()->getResultArray();
    }
    public function detailData($id_guru)
    {
        return $this->db->table('tbl_guru')
            ->where('id_guru', $id_guru)
            ->get()->getRowArray();
    }
    public function BioGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('nip', session()
                ->get('username'))
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_guru')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_guru')->where('id_guru', $data['id_guru'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_guru')->where('id_guru', $data['id_guru'])->delete($data);
    }
}
