<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    protected $table = 'tbl_nilai';
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_kelas.nuptk', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('nisn', session()
                ->get('username'))
            ->get()->getRowArray();
    }







    public function daftarap($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_jadwal.nuptk', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_jadwal.id_kelas', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_jadwal.id_ta', 'left')
            // ->where('id_ta', $id_ta)
            // ->where('id_mapel=0')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            // ->where('tbl_kelas.id_ta', $id_ta)
            // ->where('tbl_jadwal.id_jadwal', $id_jadwal)

            ->get()->getResultArray();
    }

    public function add_ap($data)
    {
        $this->db->table('tbl_nilai')->insert($data);
    }
    public function DataKrs($nisn)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.nuptk = tbl_jadwal.nuptk', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('nisn', $nisn)
            // ->where('tbl_kelas.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    // ujicoba hadir
    public function detailhadir($nisn,$id_ta){
        return $this->db->table('tbl_hadir')
        ->join('tbl_guru', 'tbl_guru.nuptk = tbl_hadir.nuptk', 'left')
        ->join('tbl_kelas', 'tbl_kelas.nuptk = tbl_guru.nuptk', 'left')
        ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_hadir.nisn', 'left')
        ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
        ->where('tbl_hadir.nisn', $nisn)
        ->where('tbl_ta.id_ta', $id_ta)

        ->get()->getResultArray();
    }
    // end ujicoba hadir


    // public function delete_data($data)
    // {
    //     $this->db->table('tbl_nilai')->where('id_nilai', $data['id_nilai'])->delete($data);
    // }
}
