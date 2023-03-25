<?php

namespace App\Controllers;

use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;

class Mapel extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
    }
    public function index()
    {

        $data = [
            'title' => 'Aspek Perkembangan',
            'page' => 'master/mapel/v_mapel',
            'kelas' => $this->ModelKelas->allData(),
            'guru' => $this->ModelGuru->allData(),
            'ta_aktif' => $this->ModelTa->ta_aktif(),
        ];
        return view('tampilan', $data);
    }
    public function detail($id_kelas)
    {

        $data = [
            'title' => 'Detail Aspek Perkembangan',
            'page' => 'master/mapel/v_detail_mapel',
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'guru' => $this->ModelGuru->allData(),
            'mapel' => $this->ModelMapel->allDataMapel($id_kelas),
        ];
        return view('tampilan', $data);
    }

    public function add($id_kelas)
    {
        if ($this->validate([
            'kode_mapel' => [
                'label' => 'Kode Aspek Perkembangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    // 'is_unique' => '{field} sudah ada. input Kode Aspek lain!!'
                ]
            ],
            'mapel' => [
                'label' => 'Aspek Perkembangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    // 'is_unique' => '{field} sudah ada. input aspek lain!!'
                ]
            ],
            // 'smt' => [
            //     'label' => 'Semester',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!!!'
            //     ]
            // ],

        ])) {
            // jika valid
            // $smt = $this->request->getPost('smt');
            // if ($smt == 1 || $smt == 3) {
            //     $semester = 'Ganjil';
            // } else {
            //     $semester = 'Genap';
            // }
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'mapel' => $this->request->getPost('mapel'),
                'id_kelas' => $id_kelas,
                //'id_kelas' => $id_kelas, berfungsi untuk menambahkan di kelas pada database mapel
            ];
            $kode_mapel = $this->request->getPost('kode_mapel');
            $mapel = $this->request->getPost('mapel');

// mencontoh di chatgpt
            $is_exist = $this->ModelMapel->where('kode_mapel', $kode_mapel)
                                            ->where('id_kelas', $id_kelas)
                                            ->first();

                if ($is_exist) {
                    session()->setFlashdata('error', 'Data mapel dengan kode ' . $kode_mapel . ' sudah ada di kelas ');
                    return redirect()->to(base_url('mapel/detail/' . $id_kelas));
                }

                $data = [
                    'kode_mapel' => $kode_mapel,
                    'mapel' => $mapel,
                    'id_kelas' => $id_kelas,
                ];
// akhir chat gpt
            

            $this->ModelMapel->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('mapel/detail/' . $id_kelas));
        } 
        else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/detail/' . $id_kelas));
        }
    }

    public function delete($id_kelas, $kode_mapel)
    {
        $data = [
            'kode_mapel' => $kode_mapel,
        ];
        $this->ModelMapel->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('mapel/detail/' . $id_kelas));
    }
}
