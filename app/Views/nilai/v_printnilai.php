<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>print Nilai Siswa</title>

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
                            <h4>
                                <i class="fas fa-file-o"></i> Rekap Nilai Siswa
                                <small class="float-right">Date: <?= date('d M Y'); ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <table class=" table-striped">


                            <tr>
                                <td width="130px">Kode</td>
                                <td width="30px" class="text-center">:</td>
                                <td><?= $jadwal['kode_mapel']; ?></td>
                            </tr>
                            <tr>
                                <td>Aspek Perkembangan</td>
                                <td class="text-center">:</td>
                                <td><?= $jadwal['mapel']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td class="text-center">:</td>
                                <td><?= $jadwal['nama_kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Guru</td>
                                <td class="text-center">:</td>
                                <td><?= $jadwal['nama_guru']; ?></td>
                            </tr>

                        </table>
                    </div>
                    <br>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered table-striped text-sm">
                                <thead class=" bg-blue">
                                    <tr>
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Nim</th>
                                        <th rowspan="2" class="text-center">Siswa</th>
                                        <th colspan="18" class="text-center">Penilaian</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" width="80px">Nilai Quis</th>
                                        <th class="text-center" width="80px">Nilai Ketrampilan</th>
                                        <th class="text-center" width="80px">Nilai Kerajinan</th>
                                        <th class="text-center">NA</th>
                                        <th class="text-center">Huruf</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Pendahuluan</th>
                                    </tr>

                                </thead>

                                <?php $no = 1;
                                foreach ($siswa as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $value['nisn']; ?></td>
                                        <td class="text-center"><?= $value['nama_siswa']; ?></td>
                                        <td class="text-center">
                                            <?= $value['nilai_quis']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['nilai_ketrampilan']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['nilai_kerajinan']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $value['na']; ?>
                                        </td>
                                        <td>
                                            <?= $value['nilai_huruf']; ?>
                                        </td>
                                        <td>
                                            <?= $value['deskripsi']; ?>
                                        </td>
                                        <td>
                                            <?= $value['pendahuluan']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Keterangan Penilaian <br>
                                <b> 1.</b> Belum Berkembang <br>
                                <b> 2.</b> Mulai Berkembang Berkembang <br>
                                <b> 3.</b> Berkembang Sesuai Harapan <br>
                                <b> 4.</b> Berkembang Sangat Baik
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">

                        </div>
                        <!-- /.col -->
                        <div class="col-6 text-center">
                            Pemalang, <?= date('d M Y'); ?> <br>
                            Guru Kelas <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <?= $jadwal['nama_guru']; ?>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a>TK Putra VII Bojongbata Kabupaten Pemalang</a>.</strong> All rights reserved.
        </footer>

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