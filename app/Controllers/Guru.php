<?php

namespace App\Controllers;

use App\Models\ModelGuru;


class Guru extends BaseController
{

    public function __construct()
    {
        $this->ModelGuru = new ModelGuru();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Guru',
            'page' => 'master/guru/v_index',
            'guru' => $this->ModelGuru->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'Guru',
            'page' => 'master/guru/v_add',
            'guru' => $this->ModelGuru->allData(),
        ];
        return view('tampilan', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'kode_guru' => [
                'label' => 'Kode Guru',
                'rules' => 'required|is_unique[tbl_guru.kode_guru]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input Kode Guru lain!!',
                ]
            ],
            'nip' => [
                'label' => 'Nip',
                'rules' => 'required|is_unique[tbl_guru.nip]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input NIP lain!!',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'ttl' => [
                'label' => 'TTL',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'jk' => [
                'label' => 'JK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],

            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi!!!',
                    'max_size' => '{field} max 1024 kb',
                    'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
                ]
            ],
        ])) {

            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');
            // rename nama file foto
            $nama_file = $foto->getRandomName();
            // jika valid
            $data = array(
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'ttl' => $this->request->getPost('ttl'),
                'jk' => $this->request->getPost('jk'),
                'alamat' => $this->request->getPost('alamat'),
                'password' => $this->request->getPost('password'),
                'foto_guru' => $nama_file,
            );
            // memindahkan file foto dari form input ke folder foto directory
            $foto->move('fotoguru', $nama_file);
            $this->ModelGuru->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to(base_url('guru'));
        } else {
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/add'));
        }
    }

    public function edit($nip)
    {

        $data = [
            'title' => 'Edit Guru',
            'page' => 'master/guru/v_edit',
            'guru' => $this->ModelGuru->detailData($nip),
        ];
        return view('tampilan', $data);
    }

    public function update($nip)
    {
        if ($this->validate([
            'kode_guru' => [
                'label' => 'Kode Guru',
                'rules' => 'required|is_unique[tbl_guru.kode_guru,nip,{nip}]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input Kode Guru lain!!',
                ]
            ],
            'nip' => [
                'label' => 'Nip',
                'rules' => 'required|is_unique[tbl_guru.nip,nip,{nip}]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'is_unique' => '{field} sudah ada. input Nip lain!!',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'ttl' => [
                'label' => 'TTL',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'jk' => [
                'label' => 'JK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],


            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!'
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => '{field} max 1024 kb',
                    'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
                ]
            ],
        ])) {
            // mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');

            if ($foto->getError() == 4) {
                // jika foto tidak diganti
                $data = array(

                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'ttl' => $this->request->getPost('ttl'),
                    'jk' => $this->request->getPost('jk'),
                    'alamat' => $this->request->getPost('alamat'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelGuru->edit($data);
            } else {
                // menghapus foto lama yang ada difolder
                $guru = $this->ModelGuru->detailData($nip);
                if ($guru['foto_guru'] != "") {
                    unlink('fotoguru/' . $guru['foto_guru']);
                }
                // rename nama file foto
                $nama_file = $foto->getRandomName();
                // jika valid
                $data = array(

                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'ttl' => $this->request->getPost('ttl'),
                    'jk' => $this->request->getPost('jk'),
                    'alamat' => $this->request->getPost('alamat'),
                    'password' => $this->request->getPost('password'),
                    'foto_guru' => $nama_file,
                );
                // memindahkan file foto dari form input ke folder foto directory
                $foto->move('fotoguru', $nama_file);
                $this->ModelGuru->edit($data);
            }

            session()->setFlashdata('pesan', 'data berhasil diubah');
            return redirect()->to(base_url('guru'));
        } else {
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/edit/' . $nip));
        }
    }

    public function delete($nip)
    {

        // menghapus foto lama yang ada difolder
        $guru = $this->ModelGuru->detailData($nip);
        if ($guru['foto_guru'] != "") {
            unlink('fotoguru/' . $guru['foto_guru']);
        }

        $data = [
            'nip' => $nip,
        ];
        $this->ModelGuru->delete_data($data);
        session()->setFlashdata('pesan', 'data berhasil Hapus');
        return redirect()->to(base_url('guru'));
    }
}
