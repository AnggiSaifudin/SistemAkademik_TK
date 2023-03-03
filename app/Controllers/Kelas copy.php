<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;

class Kelas extends BaseController
{

    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        helper('form');
    }
    public function index()
    {


        $data = [
            'title' => 'Rombongan Kelas',
            'page' => 'kelas/v_kelas',
            'kelas' => $this->ModelKelas->allData(),
            'guru' => $this->ModelGuru->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_kelas' => [
                'label' => 'Nama kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'id_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input kode lain!!'
                ]
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
        ])) {
            // jika valid
            $data = [
                'nama_kelas' => $this->request->getPost('nama_kelas'),
                'id_guru' => $this->request->getPost('id_guru'),
                'tahun' => $this->request->getPost('tahun'),
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

    public function add_anggota_kelas($id_siswa, $id_kelas)
    {
        // menambahkan siswa ke kelas
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->update_siswa($data);
        session()->setFlashdata('pesan', 'data siswa berhasil ditambahkan');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }
    public function rincian_kelas($id_kelas)
    {
        $data = [
            // melihat data siswa di tabel kelas
            'title' => 'Rombongan Kelas',
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'siswa' => $this->ModelKelas->siswa($id_kelas),
            'jml' => $this->ModelKelas->jumlah($id_kelas),
            'siswa_nokel' => $this->ModelKelas->siswa_nokel(),
            'page' => 'kelas/v_rincian_kelas',
        ];
        return view('tampilan', $data);
    }
    public function remove_anggota_kelas($id_siswa, $id_kelas)
    {
        // menambahkan siswa ke kelas
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => null,
        ];
        $this->ModelKelas->update_siswa($data);
        session()->setFlashdata('pesan', 'data siswa berhasil dihapus dari kelas');
        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }
}
