<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_user')->orderBy('username', 'DESC')->get()->getResultArray();
    }
    public function detail_data($username)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->get()->getRowArray();
    }


    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_user')->where('username', $data['username'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_user')->where('username', $data['username'])->delete($data);
    }
    public function User(){
        return $this->db->table('tbl_user')
        ->get()->getRowArray();
    }
}
