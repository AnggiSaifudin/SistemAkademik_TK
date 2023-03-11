<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelGuru;
use App\Models\LaporanModel;
use App\Models\ModelKrs;
use App\Models\ModelTa;
use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelUser;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelGuru = new ModelGuru();
        $this->LaporanModel = new LaporanModel();
        $this->ModelKrs = new ModelKrs();
        $this->ModelTa = new ModelTa();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {

        $siswa = $this->ModelKrs->DataSiswa();
        $ta = $this->ModelTa->ta_aktif();
        $data = [

            'title' => 'Data Laporan',
            'mapel' => $this->ModelMapel->allData(),
            'ta' => $this->ModelTa->allData(),
            'kelas' => $this->ModelKelas->allData(),
            'page' => 'laporan/v_laporan',
        ];

        return view('tampilan', $data);
    }

    public function Viewlaporan()
    {
        $smt = $this->request->getPost('smt');
        $tgl_nilai = $this->request->getPost('tgl_nilai');
        // $tgl_nilai = date('d-m-Y');
        $mapel = $this->request->getPost('mapel');
        $nama_kelas = $this->request->getPost('nama_kelas');



        $data = [
            'laporan' => $this->LaporanModel->DataLaporan($smt,$nama_kelas,$mapel,$tgl_nilai),
            'smt' => $smt,
            'tgl_nilai' => $tgl_nilai,
            'mapel' => $mapel,
            'nama_kelas' => $nama_kelas,
        ];
        // dd($data);
        $response = [
            'data' => view('laporan/v_tabel_laporan', $data)
        ];
        echo json_encode($response);
    }


    public function Printpdf($smt,$nama_kelas,$mapel,$tgl_nilai)
    {
        $ta = $this->ModelTa->ta_aktif();
        // $user = $this->ModelUser->User();

        $data = [
            'title' => 'Cetak Penilaian',
            'smt' => $smt,
            'tgl_nilai' => $tgl_nilai,
            'mapel' => $mapel,
            'nama_kelas' => $nama_kelas,
            'siswa' => $this->LaporanModel->Siswa(),
            'ta' => $ta,
            'user' => $this->ModelUser->User(),
            'printlaporan' => $this->LaporanModel->DataLaporan($smt,$nama_kelas,$mapel,$tgl_nilai),

        ];
        // dd($data);
        $html = view('laporan/v_print_pdf', $data);

        // // instantiate and use the dompdf class

            $dompdf = new Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('F4', 'potrait');
            $dompdf->render();
            $dompdf->stream("Laporan Perkembangan anak.pdf", array('attachment' => false));
    }

    public function Printlaporan($smt,$nama_kelas,$mapel,$tgl_nilai)
    {
        $ta = $this->ModelTa->ta_aktif();
        // $user = $this->ModelUser->User();

        $data = [
            'title' => 'Cetak Penilaian',
            'smt' => $smt,
            'tgl_nilai' => $tgl_nilai,
            'mapel' => $mapel,
            'nama_kelas' => $nama_kelas,
            'siswa' => $this->LaporanModel->Siswa(),
            'ta' => $ta,
            'user' => $this->ModelUser->User(),
            'printlaporan' => $this->LaporanModel->DataLaporan($smt,$nama_kelas,$mapel,$tgl_nilai),

        ];
        // dd($data);
        return view('laporan/v_printl', $data);
    }
}
