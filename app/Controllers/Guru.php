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
                $nuptk = intval($excel['1']);
                // $password = intval($excel['6']);
    
                // Validasi data 'nuptk' sebelum penyimpanan
                if (empty($nuptk)) {
                    // Jika 'nuptk' kosong, abaikan baris data ini dan lanjutkan ke baris berikutnya
                    continue;
                }
    
                // skip jika ada data yang sama
                $nuptk1 = $this->ModelGuru->cekdata($nuptk);
                if($nuptk == $nuptk1['nuptk']){
                    continue;
                }
    
                $data = [
                'nuptk'=> $nuptk,
                'nama_guru'=> $excel['2'],
                'ttl'=> $excel['3'],
                'jk'=> $excel['4'],
                'alamat'=> $excel['5'],
                'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
                // 'password'=> $excel['6'],
                ];
                // dd($data);
                $this->ModelGuru->nambah($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Di Import');
            return redirect()->to(base_url('guru'));
        }else{
            // jika tidak valid

            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru'));
        }
// end ujicoba



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
        //     $nuptk = intval($excel['1']);
        //     // $password = intval($excel['6']);

        //     // Validasi data 'nuptk' sebelum penyimpanan
        //     if (empty($nuptk)) {
        //         // Jika 'nuptk' kosong, abaikan baris data ini dan lanjutkan ke baris berikutnya
        //         continue;
        //     }

        //     // skip jika ada data yang sama
        //     $nuptk1 = $this->ModelGuru->cekdata($nuptk);
        //     if($nuptk == $nuptk1['nuptk']){
        //         continue;
        //     }

        //     $data = [
        //     'nuptk'=> $nuptk,
        //     'nama_guru'=> $excel['2'],
        //     'ttl'=> $excel['3'],
        //     'jk'=> $excel['4'],
        //     'alamat'=> $excel['5'],
        //     'password'=> password_hash($excel['6'],PASSWORD_DEFAULT),
        //     // 'password'=> $excel['6'],
        //     ];
        //     // dd($data);
        //     $this->ModelGuru->nambah($data);
        // }
        // session()->setFlashdata('pesan', 'Data Berhasil Di Import');
        // return redirect()->to(base_url('guru'));
    }

    // public function add()
    // {

    //     $data = [
    //         'title' => 'Guru',
    //         'page' => 'master/guru/v_add',
    //         'guru' => $this->ModelGuru->allData(),
    //     ];
    //     return view('tampilan', $data);
    // }

    // public function insert()
    // {
    //     if ($this->validate([
    //         'nuptk' => [
    //             'label' => 'Nuptk',
    //             'rules' => 'required|is_unique[tbl_guru.nuptk]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'is_unique' => '{field} sudah ada. input Nuptk lain!!',
    //                 'numeric' => 'Nuptk harus berupa angka'
    //             ]
    //         ],
    //         'nama_guru' => [
    //             'label' => 'Nama Guru',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'ttl' => [
    //             'label' => 'TTL',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'jk' => [
    //             'label' => 'JK',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],

    //         'alamat' => [
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
    //         'foto_guru' => [
    //             'label' => 'Foto Guru',
    //             'rules' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
    //             'errors' => [
    //                 'uploaded' => '{field} wajib diisi!!!',
    //                 'max_size' => '{field} max 1024 kb',
    //                 'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
    //             ]
    //         ],
    //     ])) {

    //         // mengambil file foto dari form input
    //         $foto = $this->request->getFile('foto_guru');
    //         // rename nama file foto
    //         $nama_file = $foto->getRandomName();
    //         // jika valid
    //         // $ttl = date('d M Y', strtotime($this->request->getPost('ttl')));
    //         $data = array(
    //             // 'kode_guru' => $this->request->getPost('kode_guru'),
    //             'nuptk' => $this->request->getPost('nuptk'),
    //             'nama_guru' => $this->request->getPost('nama_guru'),
    //             'ttl' => $this->request->getPost('ttl'),
    //             'jk' => $this->request->getPost('jk'),
    //             'alamat' => $this->request->getPost('alamat'),
    //             'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             'foto_guru' => $nama_file,
    //         );
    //         // memindahkan file foto dari form input ke folder foto directory
    //         $foto->move('fotoguru', $nama_file);
    //         $this->ModelGuru->add($data);
    //         session()->setFlashdata('pesan', 'data berhasil ditambahkan');
    //         return redirect()->to(base_url('guru'));
    //     } else {
    //         // jika tidak valid

    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('guru/add'));
    //     }
    // }

    // public function edit($nuptk)
    // {

    //     $data = [
    //         'title' => 'Edit Guru',
    //         'page' => 'master/guru/v_edit',
    //         'guru' => $this->ModelGuru->detailData($nuptk),
    //         'guru1' => $this->ModelGuru->allData(),
    //     ];
    //     return view('tampilan', $data);
    // }

    // public function update($nuptk)
    // {
    //     if ($this->validate([
    //         'nuptk' => [
    //             'label' => 'Nuptk',
    //             'rules' => 'required|is_unique[tbl_guru.nuptk,nuptk,{nuptk}]|numeric',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //                 'is_unique' => '{field} sudah ada. input Nuptk lain!!',
    //                 'numeric' => 'Nuptk harus berupa angka'
    //             ]
    //         ],
    //         'nama_guru' => [
    //             'label' => 'Nama Guru',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'ttl' => [
    //             'label' => 'TTL',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],
    //         'jk' => [
    //             'label' => 'JK',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!!!',
    //             ]
    //         ],


    //         'alamat' => [
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
    //         'foto_guru' => [
    //             'label' => 'Foto Guru',
    //             'rules' => 'max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
    //             'errors' => [
    //                 'max_size' => '{field} max 1024 kb',
    //                 'mime_in' => '{field} wajib format foto png,jpg,JPEG,GIF,ICO!!!'
    //             ]
    //         ],
    //     ])) {
    //         // mengambil file foto dari form input
    //         $foto = $this->request->getFile('foto_guru');

    //         if ($foto->getError() == 4) {
    //             // jika foto tidak diganti
    //             $data = array(

    //                 // 'kode_guru' => $this->request->getPost('kode_guru'),
    //                 'nuptk' => $this->request->getPost('nuptk'),
    //                 'nama_guru' => $this->request->getPost('nama_guru'),
    //                 'ttl' => $this->request->getPost('ttl'),
    //                 'jk' => $this->request->getPost('jk'),
    //                 'alamat' => $this->request->getPost('alamat'),
    //                 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             );

    //             $this->ModelGuru->edit($data);
    //         } else {
    //             // menghapus foto lama yang ada difolder
    //             $guru = $this->ModelGuru->detailData($nuptk);
    //             if ($guru['foto_guru'] != "") {
    //                 unlink('fotoguru/' . $guru['foto_guru']);
    //             }
    //             // rename nama file foto
    //             $nama_file = $foto->getRandomName();
    //             // jika valid
    //             // $ttl = date('d M Y', strtotime($this->request->getPost('ttl')));
    //             $data = array(

    //                 // 'kode_guru' => $this->request->getPost('kode_guru'),
    //                 'nuptk' => $this->request->getPost('nuptk'),
    //                 'nama_guru' => $this->request->getPost('nama_guru'),
    //                 'ttl' => $this->request->getPost('ttl'),
    //                 'jk' => $this->request->getPost('jk'),
    //                 'alamat' => $this->request->getPost('alamat'),
    //                 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //                 'foto_guru' => $nama_file,
    //             );
    //             // memindahkan file foto dari form input ke folder foto directory
    //             $foto->move('fotoguru', $nama_file);
    //             $this->ModelGuru->edit($data);
    //         }

    //         session()->setFlashdata('pesan', 'data berhasil diubah');
    //         return redirect()->to(base_url('guru'));
    //     } else {
    //         // jika tidak valid

    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('guru/edit/' . $nuptk));
    //     }
    // }

    // public function delete($nuptk)
    // {

    //     // menghapus foto lama yang ada difolder
    //     $guru = $this->ModelGuru->detailData($nuptk);
    //     if ($guru['foto_guru'] != "") {
    //         unlink('fotoguru/' . $guru['foto_guru']);
    //     }

    //     $data = [
    //         'nuptk' => $nuptk,
    //     ];
    //     $this->ModelGuru->delete_data($data);
    //     session()->setFlashdata('pesan', 'data berhasil Hapus');
    //     return redirect()->to(base_url('guru'));
    // }
}
