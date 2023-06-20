<style>
                    table, td, th {
                        border : 1px solid #333;
                    }
                    table{
                        width: 100%;
                        border-collapse: collapse;
                        text-align: center;
                    }
                    td, th{
                        padding: 2px;
                    }
                    th{
                        background-color: #CCC;
                    }
                    .kiri, .gmb_kiri{
                        float: left;
                        text-align: center;
                    }
                    .kanan, .gmb_kanan {
                        float: right;
                        text-align: center;
                    }
                    .tanggal_download{
                        float: right;
                    }
                    .title, .tk, .akreditasi, .jalan, .judul{
                        text-align: center;
                    }
                   </style>
                   
                   <div class="row">
                        <div class="col-12">
                            <p class="title">Cetak Data Laporan</p>
                            <h4>
                                <small class="tanggal_download">Date: <?= date('d M Y'); ?></small>
                                <br>
                                <br>
                                <img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="gmb_kiri"><img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="gmb_kanan">
                                <p class="tk">TK PUTRA VII BOJONGBATA KABUPATEN PEMALANG</p>
                                <p class="akreditasi">Akreditasi B</p>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>

                    <br> <!-- /.row -->
                    <p class="jalan">Jl. Gatot Subroto No.103, Bojongbata, Kec. Pemalang, Kabupaten Pemalang, Jawa Tengah 52319</p>
                    <hr color="black" />

                    <br>
                    <div class="col-12">
                        <h3 class="judul">Data Laporan Hasil Penilaian <br>
                            Perkembangan Anak Semester <?= $semester; ?> Tahun Pelajaran <?= $ta; ?><br>
                            Tanggal <?php
                                    $time_tamp = strtotime($tgl_nilai);
                                    echo date('d-m-Y', $time_tamp);
                                    ?></h3>
                    </div>

                   <!-- Table row -->
                            <table class="table">
                                <thead class=" bg-blue">
                                    <tr>
                                        <th width="50px">No</th>
                                        <th class="text-center">Nisn</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Mata Pelajaran</th>
                                        <th class="text-center">Nilai Quis</th>
                                        <th class="text-center">Nilai Ketrampilan</th>
                                        <th class="text-center">Nilai Kerajinan</th>
                                        <th class="text-center">Nilai Akhir</th>
                                        <th class="text-center">GRADE</th>
                                        <th class="text-center">Deskripsi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($printlaporan as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $value['nisn']; ?></td>
                                            <td class="text-center"><?= $value['nama_siswa']; ?></td>
                                            <td class="text-center"><?= $value['nama_kelas']; ?></td>
                                                                                    <td class="text-center"><?= $value['mapel']; ?></td>
                                            <td class="text-center"><?= $value['nilai_quis']; ?></td>
                                            <td class="text-center"><?= $value['nilai_ketrampilan']; ?></td>
                                            <td class="text-center"><?= $value['nilai_kerajinan']; ?></td>
                                            <td class="text-center"><?= $value['na']; ?></td>
                                            <td class="text-center"><?= $value['nilai_huruf']; ?></td>
                                            <td class="text-center"><?= $value['deskripsi']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
               <br>
               <br>
                            <div class="kiri">
                            Mengetahui,<br>
                            Kepala Sekolah <br>
                            <br>
                            <br>
                            <br>ttd
                            <br>
                            <br>
                            <b>Suningsih S.Pd</b> <br>
                        </div>
                        <!-- /.col -->
                        <div class="kanan">
                            Pemalang, <?php 
                                            $time_tamp = strtotime($tgl_nilai);
                                            echo date('d-m-Y', $time_tamp);
                            ?><br>
                            Penanggung Jawab <br>
                            <br>
                            <br>
                            <br>ttd
                            <br>
                            <br>
                            <b><?= session()->get('nama') ?></b><br>

                        </div>