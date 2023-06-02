<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGr extends Model
{

    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('nuptk', session()->get('username'))
            ->get()->getRowArray();
    }


    // bawaan dari Model Mapel
    // public function JadwalMapel()
    // {
    //     return $this->db->table('tbl_kelas')
    //     ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
    //     ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
    //         ->orderBy('tbl_mapel.id_kelas', 'DESC')
    //         ->get()->getResultArray();
    // }
    // akhir bawaan dari Model Mapel



    // bawaan dari Model Gr

    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->orderBy('tbl_kelas.id_guru', 'ASC')
            ->get()->getResultArray();
    }


    public function jadwalGuru($id_guru, $id_ta)
    {

        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            // ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->where('tbl_jadwal.id_guru', $id_guru)
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_nilai.id_siswa', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }

    public function simpanabsen($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }
    public function simpannilai($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }

    // akhir bawaan dari modelGr
}
