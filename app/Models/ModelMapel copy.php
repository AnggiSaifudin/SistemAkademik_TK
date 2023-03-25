<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{
    protected $table = 'tbl_mapel';

    public function allData()
    {
        return $this->db->table('tbl_mapel')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
        ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->orderBy('kode_mapel', 'DESC')
            ->get()->getResultArray();
    }

    public function allDataMapel($id_kelas)
    {
        return $this->db->table('tbl_mapel')
            ->where('id_kelas', $id_kelas)
            ->orderBy('smt', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_mapel')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_mapel')->where('kode_mapel', $data['kode_mapel'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_mapel')->where('kode_mapel', $data['kode_mapel'])->delete($data);
    }
}
