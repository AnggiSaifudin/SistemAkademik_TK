<style>
    .table,
    .td,
    .th {
        border: 1px solid #333;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    .tabel_atas {
        border: 0;
    }

    td,
    th {
        padding: 2px;
    }

    th {
        background-color: #CCC;
    }

    .kiri,
    .gmb_kiri {
        float: left;
        text-align: center;
    }
    .kiri{
margin: 80px 0 0 0;
    }
    .kanan{
        margin: 80px 0 0 0;
    }

    .kanan,
    .gmb_kanan {
        float: right;
        text-align: center;
    }

    .rt_kiri {
        float: left;
    }

    .rt_kanan {
        float: right;
    }

    .cetak,
    .alamat,
    .judul,
    .tk,
    .akreditasi {
        text-align: center;
    }

    .tgl {
        float: right;
    }
    .keterangan{
        height:15px;
    }
    .lead {
        line-height: 10px; 
    }
</style>

    <div class="col-12">
        <p class="cetak">Laporan Hasil Penilaian Perkembangan Anak</p>
        <h4>
            <small class="tgl">Date: <?= date('d M Y'); ?></small>
            <br>
            <br>
            <img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="gmb_kiri"><img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="gmb_kanan"></td>
            <p class="tk">TK PUTRA VII BOJONGBATA KABUPATEN PEMALANG</p>
            <p class="akreditasi">Akreditasi B</p>
        </h4>
    </div>
    <p class="alamat">Jl. Gatot Subroto No.103, Bojongbata, Kec. Pemalang, Kabupaten Pemalang, Jawa Tengah 52319</p>
    <hr color="black" />
    <div class="judul">
        <h3 class="text-center">Hasil Monitoring <br>
            Perkembangan Anak</h3>
    </div>
    <div class="rt_kiri">
        <table class="tabel_atas">
            <tr>
                <td width="100px"><b>Nama Siswa</b></td>
                <td width="20px">:</td>
                <td><?= $siswa['nama_siswa']; ?></td>
            </tr>
            <tr>
                <td><b>Guru</b></td>
                <td>:</td>
                <td><?= $siswa['nama_guru']; ?></td>
            </tr>
            <tr>
                <td><b>Kelas</b></td>
                <td>:</td>
                <td><?= $siswa['nama_kelas']; ?></td>
            </tr>
        </table>
    </div>
    <div class="rt_kanan">
        <table class="">
            <tr>
                <td width="140px"><b>Tahun Pelajaran</b></td>
                <td width="20px">:</td>
                <td>
                    <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
                </td>
                <td rowspan="6"></td>
            </tr>
            <tr>
                <td><b>Nisn</b></td>
                <td>:</td>
                <td><?= $siswa['nisn']; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead class=" bg-blue">
                    <tr>
                        <th style="color:black" class="th"><b>No</b></th>
                        <th style="color:black" class="th"><b>Kode Aspek</b></th>
                        <th style="color:black" class="th"><b>Aspek Perkembangan</b></th>
                        <th style="color:black" class="th"><b>Nilai Quis</b></th>
                        <th style="color:black" class="th"><b>Ketrampilan</b></th>
                        <th style="color:black" class="th"><b>Kerajinan</b></th>
                        <th style="color:black" class="th"><b>Nilai Akhir</b></th>
                        <th style="color:black" class="th"><b>GRADE</b></th>
                        <th style="color:black" class="th"><b>Deskripsi</b></th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($data_ap as $key => $value) { ?>
                        <tr>
                            <td class="td"><?= $no++; ?></td>
                            <td class="td"><?= $value['kode_mapel']; ?></td>
                            <td class="td"><?= $value['mapel']; ?></td>
                            <td class="td"><?= $value['nilai_quis']; ?></td>
                            <td class="td"><?= $value['nilai_ketrampilan']; ?></td>
                            <td class="td"><?= $value['nilai_kerajinan']; ?></td>
                            <td class="td"><?= $value['na']; ?></td>
                            <td class="td"><?= $value['nilai_huruf']; ?></td>
                            <td class="td"><?= $value['deskripsi']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="keterangan">
        <p class="lead"><b>Keterangan :</b></p>
        <p class="lead"><b>1.</b> belum berkembang</p>
        <p class="lead"><b>2.</b> sudah berkembang</p>
        <p class="lead"><b>3.</b> belum berkembang sesuai harapan</p>
        <p class="lead"><b>4.</b> berkembang sangat baik</p>
    </div>
    <br>
    <div class="row">
        <!-- accepted payments column -->
        <div class="kiri">
            Mengetahui,<br>
            Kepala Sekolah <br>
            <br>
            <br>ttd
            <br>
            <br>
            <b>Suningsih S.Pd</b> <br>
        </div>
        <!-- /.col -->
        <div class="kanan">
            Pemalang, <?php 
                                            $time_tamp = strtotime($tgl_nilai['tgl_nilai']);
                                            echo date('d-m-Y', $time_tamp);
                            ?> <br>
            Guru Kelas <br>
            <br>
            <br>ttd
            <br>
            <br>
            <b><?= $siswa['nama_guru']; ?></b><br>

        </div>
    </div>
    <!-- /.row -->