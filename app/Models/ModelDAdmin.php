<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDAdmin extends Model
{
public function jml_siswa(){
    return $this->db->table('tbl_siswa')
    ->countAll();
    ;
}
public function jml_guru(){
    return $this->db->table('tbl_guru')
    ->countAll();
    ;
}
public function jml_kelas(){
    return $this->db->table('tbl_kelas')
    ->countAll();
    ;
}
public function jml_mapel(){
    return $this->db->table('tbl_mapel')
    ->countAll();
    ;
}
public function jml_user(){
    return $this->db->table('tbl_user')
    ->countAll();
    ;
}
}