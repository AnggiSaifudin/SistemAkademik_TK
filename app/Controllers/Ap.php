<?php

namespace App\Controllers;

use App\Models\ModelAp;
use App\Models\ModelProdi;



class Ap extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAp = new ModelAp();
        $this->ModelProdi = new ModelProdi();
    }
    public function index()
    {

        $data = [
            'title' => 'Aspek Perkembangan',
            'page' => 'master/ap/v_index',
            'ap' => $this->ModelAp->allData(),
            'prodi' => $this->ModelProdi->allData(),
        ];
        return view('tampilan', $data);
    }
    public function detail($id_prodi)
    {

        $data = [
            'title' => 'Aspek Perkembangan',
            'page' => 'master/ap/detail',
            'ap' => $this->ModelAp->allDataap($id_prodi),
            'prodi' => $this->ModelProdi->detail_Data($id_prodi),
        ];
        return view('tampilan', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
            'kode_ap' => [
                'label' => 'Kode Aspek Perkembangan',
                'rules' => 'required|is_unique[tbl_ap.kode_ap]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input kode lain!!'
                ]
            ],
            'ap' => [
                'label' => 'Aspek Perkembangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'sks' => [
                'label' => 'SKS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
        ])) {
            // jika valid
            $smt = $this->request->getPost('smt');
            if ($smt == 1 || $smt == 3 || $smt == 5) {
                $semster = 'Ganjil';
            }else{
                $semster = 'Genap';
            } 

            $data = [
                'kode_ap' => $this->request->getPost('kode_ap'),
                'ap' => $this->request->getPost('ap'),
                'sks' => $this->request->getPost('sks'),
                'smt' => $this->request->getPost('smt'),
                'semester' => $semster,
                'kategori' => $this->request->getPost('kategori'),
                'id_prodi' => $id_prodi,

            ];
            $this->ModelAp->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('ap/detail/' . $id_prodi));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ap/detail/' . $id_prodi));
        }
    }

    public function delete($id_prodi,$id_ap){
        $data = [
            'id_ap' => $id_ap,
        ];
        $this->ModelAp->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('ap/detail/' . $id_prodi));
    }
}
