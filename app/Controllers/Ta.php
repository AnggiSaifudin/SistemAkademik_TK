<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Tahun Akademik',
            'page' => 'master/v_ta',
            'ta' => $this->ModelTa->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTa->add($data);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to(base_url('ta'));
    }
    public function edit($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTa->edit($data);
        session()->setFlashdata('pesan', 'data berhasil di Ubah');
        return redirect()->to(base_url('ta'));
    }
    public function delete($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
        ];
        $this->ModelTa->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('ta'));
    }

    // setting tahun akademik
    public function setting()
    {
        $data = [
            'title' => 'Setting Tahun Akademik',
            'page' => 'setting/v_set_ta',
            'ta' => $this->ModelTa->allData(),
        ];
        return view('tampilan', $data);
    }

    public function set_status_ta($id_ta)
    {
        // reset status ta
        $this->ModelTa->reset_status_ta();
        // set status ta
        $data = [
            'id_ta' => $id_ta,
            'status' => 1
        ];
        $this->ModelTa->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Akademik berhasil di ganti');
        return redirect()->to(base_url('ta/setting'));
    }

}
