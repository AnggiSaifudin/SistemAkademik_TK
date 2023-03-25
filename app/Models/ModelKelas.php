<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_kelas.nip', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->orderBy('tbl_kelas.nip', 'ASC')
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
            ->join('tbl_guru', 'tbl_guru.nip = tbl_kelas.nip', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }




    public function siswa($id_kelas)
    {
        // menampilkan siswa berdasarkan kelas
        return $this->db->table('tbl_siswa')
        // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
        ->orderBy('nis', 'DESC')
            ->where('tbl_siswa.id_kelas', $id_kelas)
            // ->where('tbl_kelas.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    // menampilkan siswa yang belum punya kelas (no kelas)
    public function siswa_nokel()
    {
        return $this->db->table('tbl_siswa')
            ->where('id_kelas', null)
            ->orderBy('nis', 'DESC')
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
            ->where('nis', $data['nis'])
            ->update($data);
    }
    // public function DataKelas()
    // {
    //     return $this->db->table('tbl_kelas')
    //         ->where('id_kelas', session()->get('id_kelas'))
    //         ->get()->getRowArray();
    // }
}
