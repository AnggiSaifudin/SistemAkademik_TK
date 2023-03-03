<?php

namespace App\Controllers;

use App\Models\ModelFakultas;

class Fakultas extends BaseController
{


    public function __construct()
    {
        $this->ModelFakultas = new ModelFakultas();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Fakultas',
            'page' => 'master/v_fakultas',
            'fakultas' => $this->ModelFakultas->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        $data = [
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->add($data);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to(base_url('fakultas'));
    }

    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->edit($data);
        session()->setFlashdata('pesan', 'data berhasil update');
        return redirect()->to(base_url('fakultas'));
    }
    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
        ];
        $this->ModelFakultas->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('fakultas'));
    }
}
