<?php
namespace App\Controllers;
use App\Models\ModelLogin;
use App\Models\ModelUser;
use App\Models\ModelGuru;
use App\Models\ModelSiswa;
class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelLogin = new ModelLogin();
        $this->ModelUser = new ModelUser();
        $this->ModelUser = new ModelGuru();
        $this->ModelUser = new ModelSiswa();
    }
    public function index()
    {
        $data = [
            'title' => 'login'
        ];
        return view('v_login', $data);
    }
    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'level' => [
                'label' => 'level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
        ])) {
            // jika valid
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // if ($level == 1) {
            //     $cek_user = $this->ModelLogin->login_user($username, $password);
            //     if ($cek_user) {
            //         // jika data cocok dgn database
            //         session()->set('username', $cek_user['username']);
            //         session()->set('password', $cek_user['password']);
            //         session()->set('nama', $cek_user['nama_user']);
            //         session()->set('foto', $cek_user['foto']);
            //         session()->set('level', $level);
            //         // login
            //         return redirect()->to(base_url('admin'));
            //     } else {
            //         // jika data tidak cocok
            //         session()->setFlashdata('pesan', 'login gagal, username atau password salah');
            //         return redirect()->to(base_url('login/index'));
            //     }

            // } 
            if ($level == 1) {
                $user = $this->ModelLogin->verify_password($username, $password, $level);
                if ($user) {
                    // jika data cocok dgn database
                    session()->set('username', $user['username']);
                    session()->set('password', $user['password']);
                    session()->set('nama', $user['nama_user']);
                    session()->set('foto', $user['foto']);
                    session()->set('level', $level);
                    // login
                    return redirect()->to(base_url('admin'));
                } else {
                    // jika data tidak cocok
                    session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                    return redirect()->to(base_url('login/index'));
                }
            }

            elseif ($level == 2) {
                $guru = $this->ModelLogin->verify_password($username, $password, $level);
                if ($guru) {
                    // jika data cocok dgn database
                    session()->set('username', $guru['nuptk']);
                    session()->set('password', $guru['password']);
                    session()->set('nama', $guru['nama_guru']);
                    session()->set('foto', $guru['foto_guru']);
                    session()->set('level', $level);
                    // login
                    return redirect()->to(base_url('loginguru'));
                    } else {
                    // jika data tidak cocok
                    session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                    return redirect()->to(base_url('login/index'));
                    }
                }
            elseif ($level == 3) {
                $siswa = $this->ModelLogin->verify_password($username, $password, $level);
                if ($siswa) {
                // jika data cocok dgn database
                session()->set('username', $siswa['nisn']);
                session()->set('password', $siswa['password']);
                session()->set('nama', $siswa['nama_siswa']);
                session()->set('foto', $siswa['foto_siswa']);
                session()->set('level', $level);
                // login
                return redirect()->to(base_url('loginsiswa'));
                } else {
                // jika data tidak cocok
                session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                return redirect()->to(base_url('login/index'));
                }
                }              
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('login/index'));
        }
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
}
