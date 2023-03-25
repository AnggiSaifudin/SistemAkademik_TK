<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelJadwal;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelKelas;

class JadwalTk extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelGuru = new ModelGuru();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Jadwal TK',
            'page' => 'jadwaltk/v_jadwal',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi' => $this->ModelProdi->allData(),
            'kelas' => $this->ModelKelas->allData(),
            'mapel' => $this->ModelMapel->allData(),
        ];
        return view('tampilan', $data);
    }

    public function detail_jadwal($id_kelas)
    {
        $data = [
            'title' => 'Detail Jadwal TK',
            'page' => 'jadwaltk/detail',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'jadwal' => $this->ModelJadwal->allData($id_kelas),
            'mapel' => $this->ModelJadwal->ap($id_kelas),
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'guru1' => $this->ModelGuru->allData(),
            'guru' => $this->ModelJadwal->gurumapel(),
        ];
        return view('tampilan', $data);
    }

    public function add($id_kelas)
    {
        if ($this->validate([
            'kode_mapel' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Pilih!!!',
                ]
            ],
            'id_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Pilih!!!',
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!!!'
                ]
            ],
            'waktu' => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih!!!'
                ]
            ],

        ])) {
            // jika valid
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                //'id_kelas' => $id_kelas, berfungsi untuk menambahkan id kelas ke tbl jadwal
                'id_kelas' => $id_kelas,
                'id_ta' => $ta['id_ta'],
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'id_guru' => $this->request->getPost('id_guru'),
                'hari' => $this->request->getPost('hari'),
                'waktu' => $this->request->getPost('waktu'),
            ];
            $this->ModelJadwal->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('jadwaltk/detail_jadwal/' . $id_kelas));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwaltk/detail_jadwal/' . $id_kelas));
        }
    }

    public function delete($id_jadwal, $id_kelas)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwal->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('jadwaltk/detail_jadwal/' . $id_kelas));
    }
}
