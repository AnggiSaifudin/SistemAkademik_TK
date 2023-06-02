<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model{
    // protected $table = 'tbl_user';
    // protected $tbl_guru = 'tbl_guru';
    // protected $tbl_siswa = 'tbl_siswa';
    public function login_user($username, $password){
        return $this->db->table('tbl_user')->where([
            'username'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_siswa($username, $password){
        return $this->db->table('tbl_siswa')->where([
            'nisn'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }
    public function login_guru($username, $password){
        return $this->db->table('tbl_guru')->where([
            'nuptk'=> $username,
            'password' => $password
        ])->get()->getRowArray();
    }
    // uji coba
    public function verify_password($username, $password, $level)
    {
        $hashed_password = '';
    
        // select hashed password from corresponding table based on user level
        switch ($level) {
            case 1:
                $user = $this->db->table('tbl_user')->where('username', $username)->get()->getRow();
                $hashed_password = $user ? $user->password : '';
                break;
            case 2:
                $guru = $this->db->table('tbl_guru')->where('nuptk', $username)->get()->getRow();
                $hashed_password = $guru ? $guru->password : '';
                break;
            case 3:
                $siswa = $this->db->table('tbl_siswa')->where('nisn', $username)->get()->getRow();
                $hashed_password = $siswa ? $siswa->password : '';
                break;
        }
    
        // verify password
        if (!empty($hashed_password) && password_verify($password, $hashed_password)) {
            // if password matches, return the corresponding user data
            switch ($level) {
                case 1:
                    return $this->db->table('tbl_user')->where('username', $username)->get()->getRowArray();
                case 2:
                    return $this->db->table('tbl_guru')->where('nuptk', $username)->get()->getRowArray();
                case 3:
                    return $this->db->table('tbl_siswa')->where('nisn', $username)->get()->getRowArray();
            }
        }
    
        return false;
    }
    // end uji coba
}
