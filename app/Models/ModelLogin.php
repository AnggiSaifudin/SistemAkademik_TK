<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model{
    public function login_user($username, $password){
        return $this->db->table('tbl_user')->where([
            'username'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_siswa($username, $password){
        return $this->db->table('tbl_siswa')->where([
            'nis'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }
    public function login_guru($username, $password){
        return $this->db->table('tbl_guru')->where([
            'nip'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }
}
