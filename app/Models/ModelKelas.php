<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->orderBy('tbl_kelas.id_guru', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')->where('id_kelas', $data['id_kelas'])->delete($data);
    }

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }




    public function siswa($id_kelas)
    {
        // menampilkan siswa berdasarkan kelas
        return $this->db->table('tbl_siswa')->orderBy('id_siswa', 'DESC')
            ->where('id_kelas', $id_kelas)
            ->get()->getResultArray();
    }

    // menampilkan siswa yang belum punya kelas (no kelas)
    public function siswa_nokel()
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', null)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }


    public function jumlah($id_kelas)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    public function update_siswa($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    // public function DataKelas()
    // {
    //     return $this->db->table('tbl_kelas')
    //         ->where('id_kelas', session()->get('id_kelas'))
    //         ->get()->getRowArray();
    // }
}
