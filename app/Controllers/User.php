<?php

namespace App\Controllers;

use App\Models\ModelUser;


class User extends BaseController
{

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'User',
            'page' => 'setting/v_user',
            'user' => $this->ModelUser->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!!!',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} Sudah Ada. Input Yang Lain!!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi!!!',
                    'max_size' => '{field} max 1024 kb',
                    'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
                ]
            ],
        ])) {

            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            // rename nama file foto
            $nama_file = $foto->getRandomName();
            // jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            // memindahkan file foto dari form input ke folder foto directory
            $foto->move('foto', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($username)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} Sudah Ada. Input Yang Lain!!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [

                    'max_size' => '{field} max 1024 kb',
                    'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
                ]
            ],
        ])) {
            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data = array(
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            } else {
                // menghapus foto lama yang ada difolder
                $user = $this->ModelUser->detail_data($username);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                // rename nama file foto
                $nama_file = $foto->getRandomName();
                // jika valid
                $data = array(
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto directory
                $foto->move('foto', $nama_file);
                $this->ModelUser->edit($data);
            }

            session()->setFlashdata('pesan', 'data berhasil diubah');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($username)
    {

        // menghapus foto lama yang ada difolder
        $user = $this->ModelUser->detail_data($username);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }

        $data = [
            'username' => $username,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('user'));
    }
}
