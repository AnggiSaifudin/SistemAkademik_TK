<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGr extends Model
{
    protected $table = 'tbl_nilai';
    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->where('nip', session()->get('username'))
            ->get()->getRowArray();
    }


    // bawaan dari Model Mapel
    // public function JadwalMapel()
    // {
    //     return $this->db->table('tbl_kelas')
    //     ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
    //         ->orderBy('tbl_mapel.id_kelas', 'DESC')
    //         ->get()->getResultArray();
    // }
    // akhir bawaan dari Model Mapel



    // bawaan dari Model Gr

    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_kelas.nip', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->orderBy('tbl_kelas.nip', 'ASC')
            ->get()->getResultArray();
    }


    public function jadwalGuru($nip, $id_ta)
    {

        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_jadwal.nip', 'left')
            // ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->where('tbl_jadwal.nip', $nip)
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_jadwal.nip', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tbl_nilai', 'tbl_nilai.id_jadwal = tbl_jadwal.id_jadwal', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->join('tbl_siswa', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas', 'left')
        ->where('tbl_jadwal.id_jadwal', $id_jadwal)
        // ->where('tbl_siswa.id_kelas', $id_kelas)
        ->get()->getResultArray();
    }

    // public function simpanabsen($data)
    // {
    //     $this->db->table('tbl_nilai')
    //         ->where('id_nilai', $data['id_nilai'])
    //         ->update($data);
    // }

    public function getNilaiSiswa($id_jadwal) {
        $query = $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nis = tbl_nilai.nis')
            ->where('tbl_nilai.id_jadwal', $id_jadwal) // menambahkan kondisi ini
            ->get();
        return $query->getResultArray();
    }
    public function simpannilai($data)
    {
        $this->db->table('tbl_nilai')
            // ->where('id_nilai', $data['id_nilai'])
            ->insert($data);
    }
    public function updateNilai($data, $id_nilai, $id_jadwal)
    {
        $query = $this->db->table('tbl_nilai')
        ->where('id_nilai', $id_nilai)
        ->where('id_jadwal', $id_jadwal) // menambahkan kondisi ini
        ->update($data);
    return $query;
    }

    // akhir bawaan dari modelGr
}
