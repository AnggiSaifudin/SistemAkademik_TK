<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelTa;
use App\Models\ModelKrs;
use App\Models\ModelMapel;
use App\Models\ModelKelas;

class Krs extends BaseController
{

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        helper('form');
    }
    public function index()
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();

        // $kelas = $this->ModelKelas->kelas();
        $data = [
            'title' => 'Mata Pelajaran',
            'page' => 'krs/v_krs',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
            'krs' => $this->ModelKrs->daftarap($siswa['id_kelas']),
            'data_ap' => $this->ModelKrs->DataKrs($siswa['id_siswa'], $ta['id_ta']),
            // 'mapel' => $this->ModelKrs->alldata($kelas['id_kelas']),
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

    public function tambah_ap($id_jadwal)
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_ta' => $ta['id_ta'],
            'id_siswa' => $siswa['id_siswa'],
        ];
        $this->ModelKrs->add_ap($data);
        session()->setFlashdata('pesan', 'Aspek Perkembangan Berhasil diTambahkan');
        return redirect()->to(base_url('krs'));
    }

    public function delete($id_nilai)
    {
        $data = [
            'id_nilai' => $id_nilai,
        ];
        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'Aspek Perkembangan berhasil dI HAPUS');
        return redirect()->to(base_url('krs'));
    }

    public function Print()
    {
        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Print Mata Pelajaran',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'siswa' => $this->ModelKrs->DataSiswa(),
            'data_ap' => $this->ModelKrs->DataKrs($siswa['id_siswa'], $ta['id_ta']),
        ];
        return view('krs/v_print_krs', $data);
    }

    // public function remove_mapel($id_mapel, $id_kelas)
    // {
    //     // menambahkan siswa ke kelas
    //     $data = [
    //         'id_mapel' => $id_mapel,
    //         'id_kelas' => null,
    //     ];
    //     $this->ModelKrs->update_mapel($data);
    //     session()->setFlashdata('pesan', 'data siswa berhasil dihapus dari kelas');
    //     return redirect()->to(base_url('krs'));
    // }
}
