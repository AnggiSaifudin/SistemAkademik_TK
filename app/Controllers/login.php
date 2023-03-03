<?php
namespace App\Controllers;
use App\Models\ModelLogin;
class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelLogin = new ModelLogin();
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
            if ($level == 1) {

                $cek_user = $this->ModelLogin->login_user($username, $password);
                if ($cek_user) {
                    // jika data cocok dgn database
                    session()->set('username', $cek_user['username']);
                    session()->set('password', $cek_user['password']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    // login
                    return redirect()->to(base_url('admin'));
                } else {
                    // jika data tidak cocok
                    session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                    return redirect()->to(base_url('login/index'));
                }
            } elseif ($level == 2) {
                $cek_guru = $this->ModelLogin->login_guru($username, $password);
                if ($cek_guru) {
                    // jika data cocok dgn database
                    session()->set('username', $cek_guru['nip']);
                    session()->set('password', $cek_guru['password']);
                    session()->set('nama', $cek_guru['nama_guru']);
                    session()->set('foto', $cek_guru['foto_guru']);
                    session()->set('level', $level);
                    // login
                    return redirect()->to(base_url('loginguru'));
                } else {
                    // jika data tidak cocok
                    session()->setFlashdata('pesan', 'login gagal, username atau password salah');
                    return redirect()->to(base_url('login/index'));
                }
            } elseif ($level == 3) {
                $cek_siswa = $this->ModelLogin->login_siswa($username, $password);
                if ($cek_siswa) {
                    // jika data cocok dgn database
                    session()->set('username', $cek_siswa['nis']);
                    session()->set('password', $cek_siswa['password']);
                    session()->set('nama', $cek_siswa['nama_siswa']);
                    session()->set('foto', $cek_siswa['foto_siswa']);
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
