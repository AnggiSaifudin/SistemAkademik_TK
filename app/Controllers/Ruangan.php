<?php

namespace App\Controllers;

use App\Models\ModelRuangan;
use App\Models\ModelGedung;

class Ruangan extends BaseController
{

    public function __construct()
    {
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGedung = new ModelGedung();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Ruangan',
            'page' => 'master/ruangan/v_index',
            'ruangan' => $this->ModelRuangan->allData(),
        ];
        return view('tampilan', $data);
    }

    public  function add()
    {
        $data = [
            'title' => 'Add Ruangan',
            'page' => 'master/ruangan/v_add',
            'gedung' => $this->ModelGedung->allData(),
        ];
        return view('tampilan', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
        ])) {
            // jika valid
            $data = [
                'id_gedung' => $this->request->getPost('id_gedung'),
                'ruangan' => $this->request->getPost('ruangan'),
            ];
            $this->ModelRuangan->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('ruangan'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/add'));
        }
    }
    public  function edit($id_ruangan)
    {
        $data = [
            'title' => 'Edit Ruangan',
            'page' => 'master/ruangan/v_edit',
            'gedung' => $this->ModelGedung->allData(),
            'ruangan' => $this->ModelRuangan->detail_Data($id_ruangan),
        ];
        return view('tampilan', $data);
    }


    public function update($id_ruangan)
    {
        if ($this->validate([
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
        ])) {
            // jika valid
            $data = [
                'id_ruangan' => $id_ruangan,
                'id_gedung' => $this->request->getPost('id_gedung'),
                'ruangan' => $this->request->getPost('ruangan'),
            ];
            $this->ModelRuangan->edit($data);
            session()->setFlashdata('pesan', 'data berhasil diupdate');
            return redirect()->to(base_url('ruangan'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/edit/'. $id_ruangan));
        }
    }
    public function delete($id_ruangan){
        $data = [
            'id_ruangan' => $id_ruangan,
        ];
        $this->ModelRuangan->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('ruangan'));
    }
}
