<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelTa;
use App\Models\ModelGuru;
use App\Models\ModelSiswa;
use App\Models\ModelKrs;
use App\Models\ModelGr;
use App\Models\ModelMapel;

class Loginguru extends BaseController
{

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
        $this->ModelTa = new ModelTa();
        $this->ModelGuru = new ModelGuru();
        $this->ModelGr = new ModelGr();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKrs = new ModelKrs();
        $this->ModelMapel = new ModelMapel();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Guru',
            'page' => 'v_dashboard_guru',
            'guru' => $this->ModelGr->DataGuru(),
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


    public function jadwal()
    {
        $guru = $this->ModelGr->DataGuru();
        $ta = $this->ModelTa->ta_aktif();

        $data = [
            'title' => 'Jadwal Mengajar',
            'page' => 'absen/v_jadwal_guru',
            'jadwal' => $this->ModelGr->jadwalGuru($guru['nip'], $ta['id_ta']),
            'ta' => $ta,
            'page' => 'absen/v_jadwal_guru',
        ];
        return view('tampilan', $data);
    }

    public function absenkelas()
    {
        $guru = $this->ModelGr->DataGuru();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Absen Kelas',
            'page' => 'absen/v_absen_kelas',
            'absen' => $this->ModelGr->jadwalGuru($guru['nip'], $ta['id_ta']),
        ];
        return view('tampilan', $data);
    }

    public function absensi($id_jadwal)
    {

        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Absen Siswa',
            'jadwal' => $this->ModelGr->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelGr->siswa($id_jadwal),
            'page' => 'absen/v_absensi',
        ];
        return view('tampilan', $data);
    }

    public function simpanabsen($id_jadwal)
    {
        $siswa = $this->ModelGr->siswa($id_jadwal);
        foreach ($siswa as $key => $value) {
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
                'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
                'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
                'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
                'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
                'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
                'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
                'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
                'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
                'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
                'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
                'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
                'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
                'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
                'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
                'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
                'p17' => $this->request->getPost($value['id_krs'] . 'p17'),
                'p18' => $this->request->getPost($value['id_krs'] . 'p18'),
            ];
            $this->ModelGr->simpanabsen($data);
        }

        session()->setFlashdata('pesan', 'data berhasil diUpdate');
        return redirect()->to(base_url('loginguru/absensi/' . $id_jadwal));
    }

    public function printabsen($id_jadwal)
    {
        $data = [
            'title' => 'Absen Siswa',
            'jadwal' => $this->ModelGr->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelGr->siswa($id_jadwal),
        ];
        return view('absen/v_print_absensi', $data);
    }

    public function nilaisiswa()
    {
        $ta = $this->ModelTa->ta_aktif();
        $guru = $this->ModelGr->DataGuru();
        $data = [
            'title' => 'Penilaian',
            'ta'    => $ta,
            'siswa' => $this->ModelKrs->DataSiswa(),
            'absen' => $this->ModelGr->jadwalGuru($guru['nip'], $ta['id_ta']),
            'page'    => 'nilai/v_nilai',
        ];
        return view('tampilan', $data);
    }

    public function datanilai($id_jadwal)
    {

        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Nilai Siswa',
            'jadwal' => $this->ModelGr->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelGr->siswa($id_jadwal),
            'page' => 'nilai/v_datanilai',
        ];
        return view('tampilan', $data);
    }

    public function simpannilai($id_jadwal)
    {
        $siswa = $this->ModelGr->siswa($id_jadwal);
        foreach ($siswa as $key => $value) {
            $absen = $this->request->getPost($value['id_krs'] . 'absen');
            $tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
            $uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
            $uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
            $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
            if ($na >= 85) {
                $nh = 'A';
                $bobot = '4';
            } elseif ($na < 85 && $na >= 75) {
                $nh = 'B';
                $bobot = '3';
            } elseif ($na < 75 && $na >= 65) {
                $nh = 'C';
                $bobot = '2';
            } elseif ($na < 65 && $na >= 55) {
                $nh = 'D';
                $bobot = '1`';
            } else {
                $nh = 'E';
                $bobot = '0';
            }
            $data = [
                // 'tgl_nilai' => $this->request->getPost('tgl_nilai'),
                'id_krs' => ($value['id_krs'] . 'id_krs'),
                'nilai_tugas' => $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
                'nilai_uts' => $this->request->getPost($value['id_krs'] . 'nilai_uts'),
                'nilai_uas' => $this->request->getPost($value['id_krs'] . 'nilai_uas'),
                'nilai_akhir' => number_format($na, 0),
                'nilai_huruf' => $nh,
                'bobot' => $bobot,
            ];
            $this->ModelGr->simpannilai($data);
        }

        session()->setFlashdata('pesan', 'Nilai berhasil DISIMPAN');
        return redirect()->to(base_url('loginguru/datanilai/' . $id_jadwal));
    }

    public function printnilai($id_jadwal)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Nilai Siswa',
            'jadwal' => $this->ModelGr->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelGr->siswa($id_jadwal),
        ];
        return view('nilai/v_printnilai', $data);
    }
}
