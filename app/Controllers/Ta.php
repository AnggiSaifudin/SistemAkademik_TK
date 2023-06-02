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
            'title' => 'Tahun Pelajaran',
            'page' => 'master/v_ta',
            'ta' => $this->ModelTa->allData(),
        ];
        return view('tampilan', $data);
    }

    public function add()
    {

        $rules = [
            'ta' => [
                'label' => 'Tahun Pelajaran',
                'rules' => 'required|regex_match[/^[0-9]{4}\/[0-9]{4}$/]',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                    'regex_match' => '{field} tidak sesuai format'
                ]
            ],
            'semester' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!!!',
                ]
            ]
        ];
// ujicoba
            if ($this->validate($rules)) {
                $ta = $this->request->getPost('ta');
                $semester = $this->request->getPost('semester');
        
                if ($this->validateTaSemester($ta, $semester)) {
                    $data = [
                        'ta' => $ta,
                        'semester' => $semester,
                    ];
                    $this->ModelTa->add($data);
                    session()->setFlashdata('pesan', 'data berhasil ditambahkan');
                    return redirect()->to(base_url('ta'));
                } else {
                    // jika validasi khusus gagal
                    $errors = [
                        'ta' => 'Tahun Pelajaran sudah ada. Input Tahun Pelajaran lain dengan Semester yang berbeda!!'
                    ];
                    session()->setFlashdata('errors', $errors);
                    return redirect()->to(base_url('ta'));
                }
            } else {
                // jika tidak valid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('ta'));
            }
// end ujicoba
    //     $data = [
    //         'ta' => $this->request->getPost('ta'),
    //         'semester' => $this->request->getPost('semester'),
    //     ];
    //     $this->ModelTa->add($data);
    //     session()->setFlashdata('pesan', 'data berhasil ditambahkan');
    //     return redirect()->to(base_url('ta'));
    // }else {
    //     // jika tidak valid
    //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //     return redirect()->to(base_url('ta'));
    // }
    }

    // uji
    public function validateTaSemester(string $ta, string $semester): bool
    {
        // Mendapatkan jumlah data dengan tahun pelajaran dan semester yang sama
        $count = $this->ModelTa->where('ta', $ta)->where('semester', $semester)->countAllResults();
    
        // Mengembalikan hasil validasi berdasarkan jumlah data yang ditemukan
        return $count == 0;
    }
    // uji end

    public function edit($id_ta)
    {
        $data = $this->ModelTa->find($id_ta);
         // Mendefinisikan aturan validasi
    $rules = [
        'ta' => [
            'label' => 'Tahun Pelajaran',
            'rules' => 'required|regex_match[/^[0-9]{4}\/[0-9]{4}$/]',
            'errors' => [
                'required' => '{field} wajib diisi!!!',
                'regex_match' => '{field} tidak sesuai format'
            ]
        ],
        'semester' => [
            'label' => 'Semester',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} wajib diisi!!!',
            ]
        ]
    ];

     // Validasi data input
     if ($this->validate($rules)) {
        $ta = $this->request->getPost('ta');
        $semester = $this->request->getPost('semester');

        // Memeriksa apakah tahun pelajaran dan semester sudah ada
        if ($this->validateTaSemesterEdit($ta, $semester, $id_ta)) {
            $data['ta'] = $ta;
            $data['semester'] = $semester;

            $this->ModelTa->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('ta'));
        } else {
            // Jika validasi tahun pelajaran dan semester gagal
            $errors = [
                'ta' => 'Tahun Pelajaran sudah ada. Input Tahun Pelajaran lain dengan Semester yang berbeda!!'
            ];
            session()->setFlashdata('errors', $errors);
            return redirect()->to(base_url('ta'));
        }
    } else {
        // Jika validasi input gagal
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('ta'));
    }
}

    // ujicoba untuk edit
    public function validateTaSemesterEdit($ta, $semester, $id_ta)
{
    // Menghitung jumlah data dengan tahun pelajaran dan semester yang sama, kecuali data dengan ID yang sedang diedit
    $count = $this->ModelTa->where('ta', $ta)->where('semester', $semester)->where('id_ta !=', $id_ta)->countAllResults();

    // Mengembalikan hasil validasi berdasarkan jumlah data yang ditemukan
    return $count == 0;
}
    // end ujicoba

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
