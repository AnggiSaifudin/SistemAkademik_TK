<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Perkembangan</title>

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
                            <p class="text-center">Cetak Perkembangan</p>
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
                        <h3 class="text-center">Hasil Monitoring <br>
                            Perkembangan Anak</h3>
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-6">
                            <table class="">

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
                        <div class="col-6">
                            <table class="float-right">
                                <tr>
                                    <td width="140px"><b>Tahun Akademik</b></td>
                                    <td width="20px">:</td>
                                    <td>
                                        <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
                                    </td>
                                    <td rowspan="6"></td>
                                </tr>
                                <tr>
                                    <td><b>Nis</b></td>
                                    <td>:</td>
                                    <td><?= $siswa['nis']; ?></td>
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
                                    <tr>
                                        <th style="color:black" class="text-center"><b>#</b></th>
                                        <th style="color:black" class="text-center"><b>Kode Mapel</b></th>
                                        <th style="color:black" class="text-center"><b>Mata Pelajaran</b></th>
                                        <th style="color:black" class="text-center"><b>Nilai Quis</b></th>
                                        <th style="color:black" class="text-center"><b>Ketrampilan</b></th>
                                        <th style="color:black" class="text-center"><b>Kerajinan</b></th>
                                        <th style="color:black" class="text-center"><b>Nilai Akhir</b></th>
                                        <th style="color:black" class="text-center"><b>GRADE</b></th>
                                        <th style="color:black" class="text-center"><b>Deskripsi</b></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($data_ap as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= $value['kode_mapel']; ?></td>
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
                    <div class="col-6">
                        <p class="lead"><b>Keterangan :</b></p>
                        <p><b>1.</b> belum berkembang</p>
                        <p><b>2.</b> sudah berkembang</p>
                        <p><b>3.</b> belum berkembang sesuai harapan</p>
                        <p><b>4.</b> berkembang sangat baik</p>
                    </div>
                    <br>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6 text-center float-left">
                            Mengetahui,<br>
                            Kepala Sekolah <br>
                            <br>
                            <br>ttd
                            <br>
                            <br>
                            <b>Suningsih S.Pd</b> <br>
                        </div>
                        <!-- /.col -->
                        <div class="col-6 text-center">
                            Pemalang, <?= $tgl_nilai['tgl_nilai']; ?> <br>
                            Guru Kelas <br>
                            <br>
                            <br>ttd
                            <br>
                            <br>
                            <b><?= $siswa['nama_guru']; ?></b><br>

                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
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