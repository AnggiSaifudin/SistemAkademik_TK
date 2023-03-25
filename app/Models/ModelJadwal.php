<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{

    protected $table = 'tbl_jadwal';

    public function allData($id_kelas, $id_ta)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_jadwal.id_ta', 'left')
            ->join('tbl_guru', 'tbl_guru.nip = tbl_jadwal.nip', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->where('tbl_jadwal.id_ta', $id_ta)
            // ->orderBy('tbl_mapel.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function ap()
    {
        return $this->db->table('tbl_mapel')
            // ->join('tbl_jadwal', 'tbl_jadwal.id_mapel = tbl_mapel.id_mapel','left')
            // ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->get()->getResultArray();
        
        // menampilkan query yang dihasilkan
        // dd($this->db->getLastQuery());
    }
    public function gurumapel()
    {
        return $this->db->table('tbl_guru')
            ->get()->getRowArray();
    }


    public function add($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }

    
}
