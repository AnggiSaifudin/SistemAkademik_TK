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

    public function jadwalGuru($id_guru, $id_ta)
    {

        return $this->db->table('tbl_jadwal')
            ->join('tbl_ap', 'tbl_ap.id_ap = tbl_jadwal.id_ap', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_guru', $id_guru)
            ->where('tbl_jadwal.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_ap', 'tbl_ap.id_ap = tbl_jadwal.id_ap', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_nilai.id_siswa', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }

    public function simpanabsen($data)
    {
        $this->db->table('tbl_nilai')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }
    public function simpannilai($data)
    {
        $this->db->table('tbl_nilai')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }
}
