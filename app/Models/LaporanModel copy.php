<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
public function DataLaporan($smt, $nama_kelas, $mapel, $tgl_nilai){
    return $this->db->table('tbl_nilai')
    ->join('tbl_ta', 'tbl_ta.id_ta = tbl_nilai.id_ta', 'left')
    ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
    ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
    ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
    ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_nilai.id_siswa', 'left')
    ->select('tbl_siswa.nisn')
    ->select('tbl_siswa.nama_siswa')
    ->select('tbl_mapel.smt')
    ->select('tbl_kelas.nama_kelas')
    ->select('tbl_mapel.mapel')
    ->select('tbl_nilai.nilai_quis')
    ->select('tbl_nilai.nilai_ketrampilan')
    ->select('tbl_nilai.nilai_kerajinan')
    ->select('tbl_nilai.na')
    ->select('tbl_nilai.nilai_huruf')
    ->select('tbl_nilai.deskripsi')
    ->where ('tbl_kelas.nama_kelas', $nama_kelas)
    ->where ('tbl_mapel.smt', $smt)
    ->where ('tbl_mapel.mapel', $mapel)
    ->where ('tbl_nilai.tgl_nilai', $tgl_nilai)
    // ->where('tbl_ta.ta', $ta)
    // ->groupBy('tbl_nilai.id_siswa')
    ->get()->getResultArray();
}
public function Siswa(){
return $this->db->table('tbl_nilai')
->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_nilai.id_siswa', 'left')
->get()->getRowArray();
;
}

// public function Ambildata($id_siswa, $id_ta){
//     return $this->db->table('tbl_nilai')
//     ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
//     ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
//     ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
//     ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
//     ->where('id_siswa', $id_siswa)
//     ->where('tbl_nilai.id_ta', $id_ta)
//     ->get()->getResultArray();

// }


}
