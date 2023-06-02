<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelJadwal;
use App\Models\ModelGuru;
use App\Models\ModelMapel;
use App\Models\ModelKelas;

class JadwalTk extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelGuru = new ModelGuru();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        helper('form');
    }
    public function index()
    {
$ta = $this->ModelTa->ta_aktif();
$kelas = $this->ModelKelas->allData();
        $data = [
            'title' => 'Jadwal TK',
            'page' => 'jadwaltk/v_jadwal',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'kelas' => $this->ModelKelas->allData(),
            // 'kelas1' => $this->ModelJadwal->sesuaiKelas($kelas['id_kelas'], $ta['id_ta']),
            'mapel' => $this->ModelMapel->allData(),
        ];
        return view('tampilan', $data);
    }

    public function detail_jadwal($id_kelas)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Detail Jadwal TK',
            'page' => 'jadwaltk/detail',
            'jadwal' => $this->ModelJadwal->allData($id_kelas, $ta['id_ta']),
            'mapel' => $this->ModelJadwal->ap(),
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'guru1' => $this->ModelGuru->allData(),
            'guru' => $this->ModelJadwal->gurumapel(),
        ];
        return view('tampilan', $data);
    }



    public function add($id_kelas) // terima parameter id_kelas dari URL
    {
        if ($this->validate([
            'kode_mapel' => [
                'label' => 'Aspek Perkembangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Pilih!!!',
                    // 'is_unique' => '{field} sudah ada. Pilih Aspek Perkembangan lain!!',
                ]
            ],
            'nuptk' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib Pilih!!!',
                ]
            ],
    
        ])) {
            // jika valid
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'id_kelas' => $id_kelas, // set id_kelas sesuai dengan parameter
                // 'id_ta' => $ta['id_ta'],
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'nuptk' => $this->request->getPost('nuptk'),
            ];

// mencoba 
                $kode_mapel = $this->request->getPost('kode_mapel');
                $nuptk = $this->request->getPost('nuptk');
                // 'id_kelas' = $id_kelas; // set id_kelas sesuai dengan parameter
                // 'id_ta' = $ta['id_ta'];

                $is_exist = $this->ModelJadwal
                ->select('tbl_jadwal.*, tbl_mapel.kode_mapel')
                ->join('tbl_mapel', 'tbl_mapel.kode_mapel = tbl_jadwal.kode_mapel')
                ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas')
                // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta')
                ->where('tbl_jadwal.kode_mapel', $kode_mapel)
                // ->where('tbl_kelas.id_ta.status', 1)
                ->where('tbl_jadwal.id_kelas', $id_kelas)
                ->first();

                if ($is_exist) {
                session()->setFlashdata('error', 'mapel dengan kode ' . $is_exist['kode_mapel'] . ' sudah ada ');
                return redirect()->to(base_url('jadwaltk/detail_jadwal/' . $id_kelas));
                }

                $data = [
                'kode_mapel' => $kode_mapel,
                'nuptk' => $nuptk,
                'id_kelas' => $id_kelas,// set id_kelas sesuai dengan parameter
                // 'id_ta' => $ta['id_ta'],
                ];
// akhir 

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
