<?php

namespace App\Controllers;

use App\Models\Model_Gedung;

class Gedung extends BaseController
{


    public function __construct()
    {
        $this->Model_Gedung = new Model_Gedung();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Gedung',
            'page' => 'master/v_gedung',
            'gedung' => $this->ModelGedung->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        $data = [
            'gedung' => $this->request->getPost('gedung'),
        ];
        $this->ModelGedung->add($data);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to(base_url('gedung'));
    }

    public function edit($id_gedung)
    {
        $data = [
            'id_gedung' => $id_gedung,
            'gedung' => $this->request->getPost('gedung'),
        ];
        $this->ModelGedung->edit($data);
        session()->setFlashdata('pesan', 'data berhasil update');
        return redirect()->to(base_url('gedung'));
    }
    public function delete($id_gedung)
    {
        $data = [
            'id_gedung' => $id_gedung,
        ];
        $this->ModelGedung->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('gedung'));
    }
}
