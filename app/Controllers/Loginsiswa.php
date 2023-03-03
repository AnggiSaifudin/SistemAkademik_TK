<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelTa;
use App\Models\ModelKrs;
use App\Models\ModelKelas;
use App\Models\LaporanModel;

class loginsiswa extends BaseController
{

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
        $this->LaporanModel = new LaporanModel();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Siswa',
            'page' => 'v_dashboard_siswa',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
        ];
        return view('tampilan', $data);
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('foto');
        session()->remove('level');
        session()->remove('nama');

        session()->setFlashdata('sukses', 'logout sukses');
        return redirect()->to(base_url('login/index'));
    }

    public function absensi()
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Absensi',
            'page' => 'absen/v_absen_siswa',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
            'data_ap' => $this->ModelKrs->DataKrs($siswa['id_siswa'], $ta['id_ta']),
        ];
        return view('tampilan', $data);
    }

    public function khs()
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Hasil Penilaian',
            'page' => 'khs/v_khs',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
            'krs' => $this->ModelKrs->daftarap($ta['id_ta']),
            'data_ap' => $this->ModelKrs->DataKrs($siswa['id_siswa'], $ta['id_ta']),
        ];
        return view('tampilan', $data);
    }
    public function print()
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Cetak Penilaian',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
            'krs' => $this->ModelKrs->daftarap($ta['id_ta']),
            'tgl_nilai' => $this->LaporanModel->Siswa(),
            'data_ap' => $this->ModelKrs->DataKrs($siswa['id_siswa'], $ta['id_ta']),
        ];
        return view('khs/v_print_r', $data);
    }
}
