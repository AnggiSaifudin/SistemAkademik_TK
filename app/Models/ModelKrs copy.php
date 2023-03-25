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
            ->join('tbl_guru', 'tbl_guru.nip = tbl_kelas.nip', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->where('nis', session()
                ->get('username'))
            ->get()->getRowArray();
    }







    public function daftarap($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_jadwal.nip', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_siswa', 'tbl_siswa.nis = tbl_jadwal.id_kelas', 'left')
            // ->where('id_ta', $id_ta)
            // ->where('id_mapel=0')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            // ->where('tbl_jadwal.id_jadwal', $id_jadwal)

            ->get()->getResultArray();
    }

    public function add_ap($data)
    {
        $this->db->table('tbl_nilai')->insert($data);
    }
    public function DataKrs($nis, $id_ta)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_jadwal.nip', 'left')
            ->where('nis', $nis)
            ->where('tbl_nilai.id_ta', $id_ta)
            ->get()->getResultArray();
    }


    public function delete_data($data)
    {
        $this->db->table('tbl_nilai')->where('id_nilai', $data['id_nilai'])->delete($data);
    }
}
