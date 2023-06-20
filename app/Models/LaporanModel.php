<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
public function DataLaporan($nama_kelas,$mapel,$tgl_nilai,$semester,$ta){
    return $this->db->table('tbl_nilai')
    ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
    ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
    ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
    ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
    ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn', 'left')
    ->select('tbl_siswa.nisn')
    ->select('tbl_siswa.nama_siswa')
    ->select('tbl_kelas.nama_kelas')
    ->select('tbl_ta.ta')
    ->select('tbl_ta.semester')
    ->select('tbl_mapel.mapel')
    ->select('tbl_nilai.nilai_quis')
    ->select('tbl_nilai.nilai_ketrampilan')
    ->select('tbl_nilai.nilai_kerajinan')
    ->select('tbl_nilai.na')
    ->select('tbl_nilai.nilai_huruf')
    ->select('tbl_nilai.deskripsi')
    ->where ('tbl_kelas.nama_kelas', $nama_kelas)
    ->where ('tbl_mapel.mapel', $mapel)
    ->where ('tbl_nilai.tgl_nilai', $tgl_nilai)
    ->where('tbl_ta.ta', $ta)
    ->where('tbl_ta.semester', $semester)
    // ->groupBy('tbl_ta.id_ta')
    ->get()->getResultArray();
}
public function Siswa(){
return $this->db->table('tbl_nilai')
->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_nilai.id_jadwal', 'left')
->join('tbl_guru', 'tbl_guru.nuptk = tbl_jadwal.nuptk', 'left')
->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn', 'left')
->get()->getRowArray();
;
}




}
