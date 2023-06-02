<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGr extends Model
{
    protected $table = 'tbl_nilai';
    protected $primaryKey = 'id_nilai';
    protected $allowedFields = [
        'id_jadwal',
        // 'id_ta',
        'nisn',
        'nilai_quis',
        'nilai_ketrampilan',
        'nilai_kerajinan',
        'na',
        'nilai_huruf',
        'deskripsi',
        'tgl_nilai',
    ];
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
    //         ->orderBy('tbl_mapel.id_kelas', 'DESC')
    //         ->get()->getResultArray();
    // }
    // akhir bawaan dari Model Mapel



    // bawaan dari Model Gr

    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_kelas.nuptk', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->orderBy('tbl_kelas.nuptk', 'ASC')
            ->get()->getResultArray();
    }


    public function jadwalGuru($nuptk, $id_ta)
    {

        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_jadwal.nuptk', 'left')
            // ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->where('tbl_jadwal.nuptk', $nuptk)
            ->where('tbl_kelas.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_jadwal.nuptk', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }
// kode dibawah ini salah satu id_nilai atau nis duplikat tetapi didatabase tersimpan yg benar
    // public function siswa($id_jadwal)
    // {
    //     return $this->db->table('tbl_jadwal')
    //     ->join('tbl_nilai', 'tbl_nilai.id_jadwal = tbl_jadwal.id_jadwal', 'left')
    //     ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
    //     ->join('tbl_siswa', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas', 'left')
    //     // ->join('tbl_nilai', 'tbl_nilai.nis = tbl_siswa.nis', 'left')
    //     ->where('tbl_jadwal.id_jadwal', $id_jadwal)
    //     ->groupBy('tbl_siswa.nis')
    //     ->get()->getResultArray();  
    // }
    // end 
// kode dibawah ini nis null
    // public function siswa($id_jadwal)
    // {
    //     return $this->db->table('tbl_siswa')
    //     ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
    //     ->join('tbl_jadwal', 'tbl_jadwal.id_kelas = tbl_kelas.id_kelas', 'left')
    //     ->join('tbl_nilai', 'tbl_nilai.nis = tbl_siswa.nis AND tbl_nilai.id_jadwal = tbl_jadwal.id_jadwal', 'left')
    //     ->where('tbl_jadwal.id_jadwal', $id_jadwal)
    //     ->where('tbl_siswa.nis IS NOT NULL')
    //     ->groupBy('tbl_siswa.nis')
    //     ->get()->getResultArray();  
    // }
    // end ini nis null
    // kode lumayan benar
    public function siswa($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->join('tbl_siswa', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas', 'left')
        ->join('tbl_nilai', 'tbl_nilai.nisn = tbl_siswa.nisn AND tbl_nilai.id_jadwal = tbl_jadwal.id_jadwal', 'left')
        ->where('tbl_jadwal.id_jadwal', $id_jadwal)
        ->select('tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_nilai.nilai_quis, tbl_nilai.nilai_ketrampilan, tbl_nilai.nilai_kerajinan, tbl_nilai.na, tbl_nilai.nilai_huruf, tbl_nilai.deskripsi')
        ->groupBy('tbl_siswa.nisn')
        ->get()->getResultArray();  
    }
        // end kode lumayan benar

    // public function getNilaiSiswa($id_jadwal) {
    //     $query = $this->db->table('tbl_nilai')
    //     ->join('tbl_siswa', 'tbl_siswa.nis = tbl_nilai.nis', 'left')
    //     ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
    //     ->where('tbl_nilai.id_jadwal', $id_jadwal)
    //     // ->where('tbl_siswa.nis')
    //     // ->groupBy(['tbl_nilai.nis', 'tbl_nilai.id_jadwal'])
    //     ->get()
    //     ->getResultArray();
    // }
    // public function simpannilai($data)
    // {
    //     foreach ($data as $nilai) {
    //         $is_exist = $this->getNilaiSiswa($nilai['id_jadwal'], $nilai['nis']);
    //         if (is_array($is_exist) && count($is_exist) > 0) {
    //             $this->updateNilai($nilai, $is_exist['nis'], $nilai['id_jadwal']);
    //         } else {
    //             $this->db->table('tbl_nilai')
    //                 ->insert($nilai);
    //         }
    //     }
    // }
    // public function updateNilai($data, $id_nilai, $id_jadwal)
    // {
    //     $this->db->table('tbl_nilai')
    //         ->where('id_nilai', $id_nilai)
    //         ->where('id_jadwal', $id_jadwal)
    //         ->update($data);
    // }

    public function getNilaiSiswa($id_jadwal, $nisn, $group_by = null) {
        $query = $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn', 'left')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
            ->where('tbl_nilai.id_jadwal', $id_jadwal)
            ->where('tbl_nilai.nisn', $nisn);
        if ($group_by != null) {
            $query->groupBy($group_by);
        }
        return $query->get()->getRow('id_nilai');
    }
    
    public function simpannilai($data)
    {
        foreach ($data as $nilai) {
            $is_exist = $this->getNilaiSiswa($nilai['id_jadwal'], $nilai['nisn']);
            if ($is_exist) {
                $this->updateNilai($nilai, $is_exist, $nilai['id_jadwal']);
            } else {
                $this->db->table('tbl_nilai')
                    ->insert($nilai);
            }
        }
    }
    
    public function updateNilai($data, $id_nilai, $id_jadwal)
    {
        $this->db->table('tbl_nilai')
            ->where('id_nilai', $id_nilai)
            ->where('id_jadwal', $id_jadwal)
            ->update($data);
    }

    // akhir bawaan dari modelGr
}
