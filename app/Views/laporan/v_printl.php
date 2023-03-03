<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Data Laporan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini" onload="window.print();">
    <div class="wrapper">


        <section class="content">
            <div class="container-fluid">


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">Cetak Data Laporan</p>
                            <h4>
                                <small class="float-right">Date: <?= date('d M Y'); ?></small>
                                <br>
                                <br>
                                <td><img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="float-left"><img src="<?= base_url('gambar/yayasan.png'); ?>" height="50px" width="50px" class="float-right"></td>
                                <p class="text-center">TK PUTRA VII BOJONGBATA KABUPATEN PEMALANG</p>
                                <p class="text-center">Akreditasi B</p>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>

                    <br> <!-- /.row -->
                    <p class="text-center">Jl. Gatot Subroto No.103, Bojongbata, Kec. Pemalang, Kabupaten Pemalang, Jawa Tengah 52319</p>
                    <hr color="black" />

                    <br>
                    <div class="col-12">
                        <h3 class="text-center">Data Laporan Hasil Penilaian <br>
                            Perkembangan Anak Semester <?= $ta['semester']; ?> Tahun Akademik <?= $ta['ta']; ?><br>
                            Tanggal <?php
                                    $time_tamp = strtotime($tgl_nilai);
                                    echo date('d-m-Y', $time_tamp);
                                    ?></h3>
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-6">
                            <table class="">

                                <tr>
                                    <td width="200px"><b>Penanggung Jawab</b></td>
                                    <td width="20px">:</td>
                                    <td><?= $user['nama_user']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class=" bg-blue">
                                    <tr class="text-center">
                                        <th width="50px">No</th>
                                        <th class="text-center">Nis</th>
                                        <th class="text-center">Nama siswa</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Smt</th>
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
                                            <td class="text-center"><?= $value['nis']; ?></td>
                                            <td class="text-center"><?= $value['nama_siswa']; ?></td>
                                            <td class="text-center"><?= $value['nama_kelas']; ?></td>
                                            <td class="text-center"><?= $value['smt']; ?></td>
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
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <br>
                        <!-- accepted payments column -->
                        <div class="col-md-6 text-center float-right">
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

                </div>
                <!-- /.row -->

            </div>
            <!-- /.invoice -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/halaman/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/halaman/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/halaman/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/halaman/dist/js/demo.js"></script>
</body>

</html>