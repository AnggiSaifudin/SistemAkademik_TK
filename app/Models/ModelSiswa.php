<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_siswa')->orderBy('nisn', 'DESC')->get()->getResultArray();
    }
    public function detailData($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_siswa')->where('nisn', $data['nisn'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_siswa')->where('nisn', $data['nisn'])->delete($data);
    }
    // public function ambiltgl(){
    //     $this->db->table('tbl_siswa')
    //     ->join('tbl_nilai', 'tbl_nilai.id_siswa = tbl_siswa.id_siswa', 'left');
    // }
}
