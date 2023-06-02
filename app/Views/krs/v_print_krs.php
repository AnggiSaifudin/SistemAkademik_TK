<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Jadwal Siswa</title>

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
                                <i class="fas fa-file-o"></i> Kartu Jadwal Siswa
                                <small class="float-right">Date: <?= date('d M Y'); ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <table class=" table-striped">

                            <tr>
                                <td rowspan="6"><img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>" height="150px" width="100px"></td>
                                <td width="150px">Tahun Akademik</td>
                                <td>:</td>
                                <td>
                                    <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
                                </td>
                                <td rowspan="6"></td>
                            </tr>
                            <tr>
                                <td>Nisn</td>
                                <td>:</td>
                                <td><?= $siswa['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $siswa['nama_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Guru</td>
                                <td>:</td>
                                <td><?= $siswa['nama_guru']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?= $siswa['nama_kelas']; ?></td>
                            </tr>

                        </table>
                    </div>
                    <!-- /.row -->
                    <br>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class=" bg-blue">
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Aspek</th>
                                        <th>Aspek Perkembangan</th>
                                        <th>Kelas</th>
                                        <th>guru</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($krs as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_mapel']; ?></td>
                                            <td><?= $value['mapel']; ?></td>
                                            <td><?= $value['nama_kelas']; ?></td>
                                            <td><?= $value['nama_guru']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <!-- <p class="lead">Keterangan :</p>
                            <p>1. belum berkembang</p>
                            <p>2. sudah berkembang</p>
                            <p>3. belum berkembang sesuai harapan</p>
                            <p>4. sangat baik</p> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">

                        </div>
                        <!-- /.col -->
                        <div class="col-6 text-center">

                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer no-print">
            <div class="float-right d-none d-sm-block">

            </div>
            <strong>Copyright &copy; 2022 <a>TK Putra VII Bojongbata Kabupaten Pemalang</a>.</strong> All rights reserved.
        </footer> -->

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