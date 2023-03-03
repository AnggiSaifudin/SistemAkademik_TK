<?php

namespace App\Controllers;

use App\Models\ModelRuangan;
use App\Models\ModelKelas;
use App\Models\ModelProdi;
use App\Models\ModelFakultas;
use App\Models\ModelGuru;

class Prodi extends BaseController
{

    public function __construct()
    {
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelKelas = new ModelKelas();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Mata Pelajaran',
            'page' => 'master/prodi/v_index',
            'prodi' => $this->ModelProdi->allData(),
            'kelas'=> $this->ModelKelas->allData(),
        ];
        return view('tampilan', $data);
    }
    public  function add()
    {
        $data = [
            'title' => 'Add Mata Pelajaran',
            'page' => 'master/prodi/v_add',
            'fakultas' => $this->ModelFakultas->allData(),
            'guru' => $this->ModelGuru->allData(),
        ];
        return view('tampilan', $data);
    }
    public function insert()
    {
        if ($this->validate([
            'kode_prodi' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input kode lain!!'
                ]
            ],
            'prodi' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],

        ])) {
            // jika valid
            $data = [
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'prodi' => $this->request->getPost('prodi'),
            ];
            $this->ModelProdi->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('prodi'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/add'));
        }
    }

    public  function edit($id_prodi)
    {
        $data = [
            'title' => 'Edit Mata Pelajaran',
            'page' => 'master/prodi/v_edit',
            'fakultas' => $this->ModelFakultas->allData(),
            'prodi' => $this->ModelProdi->detail_Data($id_prodi),
            'guru' => $this->ModelGuru->allData(),
        ];
        return view('tampilan', $data);
    }

    public function update($id_prodi)
    {
        if ($this->validate([

            'prodi' => [
                'label' => 'Prodi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],

        ])) {
            // jika valid
            $data = [
                'id_prodi' => $id_prodi,
                'prodi' => $this->request->getPost('prodi'),
            ];
            $this->ModelProdi->edit($data);
            session()->setFlashdata('pesan', 'data berhasil diupdate');
            return redirect()->to(base_url('prodi'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/' . $id_prodi));
        }
    }
    public function delete($id_prodi)
    {
        $data = [
            'id_prodi' => $id_prodi,
        ];
        $this->ModelProdi->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('prodi'));
    }
}
