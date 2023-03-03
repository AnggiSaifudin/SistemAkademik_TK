<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            // ->join('tbl_mapel', 'tbl_mapel.id_kelas = tbl_kelas.id_kelas', 'left')
            ->where('nis', session()
                ->get('username'))
            ->get()->getRowArray();
    }

    // menampilkan mapel yang belum diambil
    // public function nomapel()
    // {
    //     return $this->db->table('tbl_jadwal')
    // // ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_krs.id_siswa', 'left')
    //                 ->where('id_mapel')
    //         ->orderBy('id_kelas', 'DESC')
    //         ->get()->getResultArray();
    // }


    // public function alldata($id_kelas)
    // {
    //     return $this->db->table('tbl_jadwal')
    //         ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
    //         ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
    //         ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
    //         ->where('id_kelas', $id_kelas)
    //         ->get()->getResultArray();
    // }

    public function daftarap($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_jadwal.id_kelas', 'left')
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
    public function DataKrs($id_siswa, $id_ta)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->where('id_siswa', $id_siswa)
            ->where('tbl_nilai.id_ta', $id_ta)
            ->get()->getResultArray();
    }


    public function delete_data($data)
    {
        $this->db->table('tbl_nilai')->where('id_nilai', $data['id_nilai'])->delete($data);
    }
    // public function update_mapel($data)
    // {
    //     $this->db->table('tbl_mapel')
    //         ->where('id_mapel', $data['id_mapel'])
    //         ->update($data);
    // }
}
