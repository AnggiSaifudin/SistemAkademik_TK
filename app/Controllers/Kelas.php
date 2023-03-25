<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;

class Kelas extends BaseController
{

    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
        helper('form');
    }
    public function index()
    {
        // $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Rombongan Kelas',
            'page' => 'kelas/v_kelas',
            'kelas' => $this->ModelKelas->allData(),
            'guru' => $this->ModelGuru->allData(),
            'ta' => $this->ModelTa->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_kelas' => [
                'label' => 'Nama kelas',
                'rules' => 'required|is_unique[tbl_kelas.nama_kelas,id_kelas,{id_kelas}]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input nama kelas lain!!',
                ]
            ],
            'nip' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input kode lain!!'
                ]
            ],
            //             'id_ta' => [
            //     'label' => 'Tahun Pelajaran',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!!!'
            //     ]
            // ],
            // 'tahun' => [
            //     'label' => 'Tahun Pelajaran',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!!!'
            //     ]
            // ],
        ])) {
            // jika valid
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'nama_kelas' => $this->request->getPost('nama_kelas'),
                'nip' => $this->request->getPost('nip'),
                // 'id_ta' => $ta['id_ta'],
                // 'id_ta' => $this->request->getPost('id_ta'),
                // 'tahun' => $this->request->getPost('tahun'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('kelas'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('kelas'));
    }

    public function add_anggota_kelas($nis, $id_kelas)
    {
        // menambahkan siswa ke kelas
        $data = [
            'nis' => $nis,
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->update_siswa($data);
        session()->setFlashdata('pesan', 'data siswa berhasil ditambahkan');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }
    public function rincian_kelas($id_kelas)
    {
        // $ta = $this->ModelTa->ta_aktif();
        $data = [
            // melihat data siswa di tabel kelas
            'title' => 'Rombongan Kelas',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'siswa' => $this->ModelKelas->siswa($id_kelas),
            'jml' => $this->ModelKelas->jumlah($id_kelas),
            'siswa_nokel' => $this->ModelKelas->siswa_nokel(),
            'page' => 'kelas/v_rincian_kelas',
        ];
        return view('tampilan', $data);
    }
    public function remove_anggota_kelas($nis, $id_kelas)
    {
        // menambahkan siswa ke kelas
        $data = [
            'nis' => $nis,
            'id_kelas' => null,
        ];
        $this->ModelKelas->update_siswa($data);
        session()->setFlashdata('pesan', 'data siswa berhasil dihapus dari kelas');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }
}
