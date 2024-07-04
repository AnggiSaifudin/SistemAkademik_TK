<?php

namespace App\Controllers;
use App\Models\ModelDAdmin;
class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelDAdmin = new ModelDAdmin();
    }
    public function index()
    {

$data = [
    'title' => 'Dashboard',
    'page' => 'master/v_admin',
    'jml_siswa' => $this->ModelDAdmin->jml_siswa(),
    'jml_guru' => $this->ModelDAdmin->jml_guru(),
    'jml_kelas' => $this->ModelDAdmin->jml_kelas(),
    'jml_mapel' => $this->ModelDAdmin->jml_mapel(),
    'jml_user' => $this->ModelDAdmin->jml_user(),
];
        return view('tampilan', $data);
    }



}
