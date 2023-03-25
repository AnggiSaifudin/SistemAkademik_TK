<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_siswa')->orderBy('nis', 'DESC')->get()->getResultArray();
    }
    public function detailData($nis)
    {
        return $this->db->table('tbl_siswa')
            ->where('nis', $nis)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_siswa')->where('nis', $data['nis'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_siswa')->where('nis', $data['nis'])->delete($data);
    }
    // public function ambiltgl(){
    //     $this->db->table('tbl_siswa')
    //     ->join('tbl_nilai', 'tbl_nilai.id_siswa = tbl_siswa.id_siswa', 'left');
    // }
}
