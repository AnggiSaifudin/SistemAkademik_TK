<?php

namespace App\Controllers;

use App\Models\ModelSiswa;


class Siswa extends BaseController
{

    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        helper('form');
    }
    public function index()
    {

        $data = [
            'title' => 'Siswa',
            'page' => 'master/siswa/v_index',
            'siswa' => $this->ModelSiswa->allData(),
        ];
        return view('tampilan', $data);
    }


    public function import(){

        // ujicoba
        if ($this->validate([
            'file_excel' => [
                'label' => 'file_excel',
                'rules' => 'uploaded[file_excel]',
                'errors' => [
                    'uploaded' => '{field} belum di uploaded!!!',
                ]
            ],
        ])){
             $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        if($ext=='xls'){
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach($sheet as $x => $excel){
            // skip judul tabel atau field
            // 0 itu membaca baris excel,  no 1 dianggap 0
            if($x==0){
                continue;
            }

            // Mengonversi 'nuptk' ke integer menggunakan intval
            // jika nuptk canot null berrti data wajib integer
            $nisn = intval($excel['1']);

            // Validasi data 'nuptk' sebelum penyimpanan
            if (empty($nisn)) {
                // Jika 'nuptk' kosong, abaikan baris data ini dan lanjutkan ke baris berikutnya
                continue;
            }

            // skip jika ada data yang sama
            $nisn1 = $this->ModelSiswa->cekdata($nisn);
            if($nisn == $nisn1['nisn']){
                continue;
            }

            $data = [
            'nisn'=> $nisn,
            'nama_siswa'=> $excel['2'],
            'ttl_siswa'=> $excel['3'],
            'jk_siswa'=> $excel['4'],
            'alamat_siswa'=> $excel['5'],
            // 'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
            'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
            'agama'=> $excel['7'],
            ];
            // dd($data);
            $this->ModelSiswa->nambah($data);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Di Import');
        return redirect()->to(base_url('siswa'));
        }else{
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa'));
        }

        // $file = $this->request->getFile('file_excel');
        // $ext = $file->getClientExtension();

        // if($ext=='xls'){
        //     $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        // }else{
        //     $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        // }
        // $spreadsheet = $render->load($file);
        // $sheet = $spreadsheet->getActiveSheet()->toArray();

        // foreach($sheet as $x => $excel){
        //     // skip judul tabel atau field
        //     // 0 itu membaca baris excel,  no 1 dianggap 0
        //     if($x==0){
        //         continue;
        //     }

        //     // Mengonversi 'nuptk' ke integer menggunakan intval
        //     // jika nuptk canot null berrti data wajib integer
        //     $nisn = intval($excel['1']);

        //     // Validasi data 'nuptk' sebelum penyimpanan
        //     if (empty($nisn)) {
        //         // Jika 'nuptk' kosong, abaikan baris data ini dan lanjutkan ke baris berikutnya
        //         continue;
        //     }

        //     // skip jika ada data yang sama
        //     $nisn1 = $this->ModelSiswa->cekdata($nisn);
        //     if($nisn == $nisn1['nisn']){
        //         continue;
        //     }

        //     $data = [
        //     'nisn'=> $nisn,
        //     'nama_siswa'=> $excel['2'],
        //     'ttl_siswa'=> $excel['3'],
        //     'jk_siswa'=> $excel['4'],
        //     'alamat_siswa'=> $excel['5'],
        //     // 'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
        //     'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
        //     'agama'=> $excel['7'],
        //     ];
        //     // dd($data);
        //     $this->ModelSiswa->nambah($data);
        // }
        // session()->setFlashdata('pesan', 'Data Berhasil Di Import');
        // return redirect()->to(base_url('siswa'));
    }


    // public function add()
    // {

    //     $data = [
    //         'title' => 'Add Siswa',
    //         'page' => 'master/siswa/v_add',
    //     ];
    //     return view('tampilan', $data);
    // }

    // public function insert()
    // {
    //     if ($this->validate([
    //         'nisn' => [
    //             'label' => 'Nisn',
    //             'rules' => 'required|is_unique[tbl_siswa.nisn]|min_length[10]|max_length[11]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'is_unique' => '{field} sudah ada. input Nisn lain!!',
    //                 'min_length' => 'Nisn minimal harus 10 angka',
    //                 'max_length' => 'Nisn maksimal harus 11 angka',
    //                 'numeric' => 'Nisn harus berupa angka'
    //             ]
    //         ],
    //         'nama_siswa' => [
    //             'label' => 'Nama siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'ttl_siswa' => [
    //             'label' => 'TTL Siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'jk_siswa' => [
    //             'label' => 'JK Siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'agama' => [
    //             'label' => 'Agama',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],

    //         'alamat_siswa' => [
    //             'label' => 'Alamat',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'password' => [
    //             'label' => 'Password',
    //             'rules' => 'required|min_length[8]|max_length[20]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'min_length' => 'Password minimal harus 8 karakter',
    //                 'max_length' => 'Password maksimal harus 20 karakter',
    //                 'numeric' => 'Password harus berupa angka'
    //             ]
    //         ],
    //         'foto_siswa' => [
    //             'label' => 'Foto siswa',
    //             'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
    //             'errors' => [
    //                 'uploaded' => '{field} wajib diisi!!!',
    //                 'max_size' => '{field} max 1024 kb',
    //                 'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
    //             ]
    //         ],
    //     ])) {

    //         // mengambil file foto dari form input
    //         $foto = $this->request->getFile('foto_siswa');
    //         // rename nama file foto
    //         $nama_file = $foto->getRandomName();
    //         // jika valid
    //         // $ttl = date('d M Y', strtotime($this->request->getPost('ttl_siswa')));
    //         $data = array(
    //             'nisn' => $this->request->getPost('nisn'),
    //             'nama_siswa' => $this->request->getPost('nama_siswa'),
    //             'ttl_siswa' => $this->request->getPost('ttl_siswa'),
    //             'jk_siswa' => $this->request->getPost('jk_siswa'),
    //             'agama' => $this->request->getPost('agama'),
    //             'alamat_siswa' => $this->request->getPost('alamat_siswa'),
    //             'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             'foto_siswa' => $nama_file,
    //         );
    //         // memindahkan file foto dari form input ke folder foto directory
    //         $foto->move('fotosiswa', $nama_file);
    //         $this->ModelSiswa->add($data);
    //         session()->setFlashdata('pesan', 'data berhasil ditambahkan');
    //         return redirect()->to(base_url('siswa'));
    //     } else {
    //         // jika tidak valid

    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('siswa/add'));
    //     }
    // }
    // public function edit($nisn)
    // {

    //     $data = [
    //         'title' => 'Edit Siswa',
    //         'page' => 'master/siswa/v_edit',
    //         'siswa' => $this->ModelSiswa->detailData($nisn),
    //         'siswa1' => $this->ModelSiswa->allData(),
    //     ];
    //     return view('tampilan', $data);
    // }

    // public function update($nisn)
    // {
    //     if ($this->validate([
    //         'nisn' => [
    //             'label' => 'Nisn',
    //             'rules' => 'required|is_unique[tbl_siswa.nisn,nisn,{nisn}]|min_length[10]|max_length[11]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'numeric' => 'Nisn harus berupa angka',
    //                 'min_length' => 'Nisn minimal harus 10 angka',
    //                 'max_length' => 'Nisn maksimal harus 11 angka',
    //                 'is_unique' => '{field} sudah ada. input Nisn lain!!',
    //             ]
    //         ],
    //         'nama_siswa' => [
    //             'label' => 'Nama siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'ttl_siswa' => [
    //             'label' => 'TTL Siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'jk_siswa' => [
    //             'label' => 'JK Siswa',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'agama' => [
    //             'label' => 'Agama',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],

    //         'alamat_siswa' => [
    //             'label' => 'Alamat',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'password' => [
    //             'label' => 'Password',
    //             'rules' => 'required|min_length[8]|max_length[20]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'min_length' => 'Password minimal harus 8 karakter',
    //                 'max_length' => 'Password maksimal harus 20 karakter',
    //                 'numeric' => 'Password harus berupa angka'
    //             ]
    //         ],
    //         'foto_siswa' => [
    //             'label' => 'Foto siswa',
    //             'rules' => 'max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
    //             'errors' => [
    //                 'max_size' => '{field} max 1024 kb',
    //                 'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
    //             ]
    //         ],
    //     ])) {

    //         // mengambil file foto dari form input
    //         $foto = $this->request->getFile('foto_siswa');

    //         if ($foto->getError() == 4) {
    //             // jika foto tidak diganti
    //             $data = array(
    //                 'nisn' => $this->request->getPost('nisn'),
    //                 'nama_siswa' => $this->request->getPost('nama_siswa'),
    //                 'ttl_siswa' => $this->request->getPost('ttl_siswa'),
    //                 'jk_siswa' => $this->request->getPost('jk_siswa'),
    //                 'agama' => $this->request->getPost('agama'),
    //                 'alamat_siswa' => $this->request->getPost('alamat_siswa'),
    //                 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             );
    //             $this->ModelSiswa->edit($data);
    //         } else {
    //             // menghapus foto lama yang ada difolder
    //             $siswa = $this->ModelSiswa->detailData($nisn);
    //             if ($siswa['foto_siswa'] != "") {
    //                 unlink('fotosiswa/' . $siswa['foto_siswa']);
    //             }
    //             // rename nama file foto
    //             $nama_file = $foto->getRandomName();
    //             // jika valid
    //             // $ttl = date('d M Y', strtotime($this->request->getPost('ttl_siswa')));
    //             $data = array(
    //                 'nisn' => $this->request->getPost('nisn'),
    //                 'nama_siswa' => $this->request->getPost('nama_siswa'),
    //                 'ttl_siswa' => $this->request->getPost('ttl_siswa'),
    //                 'jk_siswa' => $this->request->getPost('jk_siswa'),
    //                 'agama' => $this->request->getPost('agama'),
    //                 'alamat_siswa' => $this->request->getPost('alamat_siswa'),
    //                 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //                 'foto_siswa' => $nama_file,
    //             );
    //             // memindahkan file foto dari form input ke folder foto directory
    //             $foto->move('fotosiswa', $nama_file);
    //             $this->ModelSiswa->edit($data);
    //         }

    //         session()->setFlashdata('pesan', 'data berhasil diubah');
    //         return redirect()->to(base_url('siswa'));
    //     } else {
    //         // jika tidak valid

    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('siswa/edit/' . $nisn));
    //     }
    // }

    // public function delete($nisn)
    // {

    //     // menghapus foto lama yang ada difolder
    //     $siswa = $this->ModelSiswa->detailData($nisn);
    //     if ($siswa['foto_siswa'] != "") {
    //         unlink('fotosiswa/' . $siswa['foto_siswa']);
    //     }

    //     $data = [
    //         'nisn' => $nisn,
    //     ];
    //     $this->ModelSiswa->delete_data($data);
    //     session()->setFlashdata('pesan', 'data berhasil Hapus');
    //     return redirect()->to(base_url('siswa'));
    // }
}
