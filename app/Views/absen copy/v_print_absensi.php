<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>print Absensi</title>

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
                                <i class="fas fa-file-o"></i> Absensi Kelas
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
                                <td><?= $jadwal['kode_ap']; ?></td>
                            </tr>
                            <tr>
                                <td>Aspek Perkembangan</td>
                                <td class="text-center">:</td>
                                <td><?= $jadwal['ap']; ?></td>
                            </tr>
                            <tr>
                                <td>Jadwal</td>
                                <td class="text-center">:</td>
                                <td><?= $jadwal['kode_ap']; ?></td>
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
                                        <th colspan="18" class="text-center">pertemuan</th>
                                        <th rowspan="2">%</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($siswa as $key => $value) {
                                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nim']; ?></td>
                                            <td><?= $value['nama_siswa']; ?></td>
                                            <td>
                                                <?php if ($value['p1'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p1'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p1'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p2'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p2'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p2'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p3'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p3'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p3'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p4'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p4'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p4'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p5'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p5'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p5'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p6'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p6'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p6'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p7'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p7'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p7'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p8'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p8'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p8'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p9'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p9'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p9'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p10'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p10'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p10'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p11'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p11'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p11'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p12'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p12'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p12'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p13'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p13'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p13'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p14'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p14'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p14'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p15'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p15'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p15'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p16'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p16'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p16'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p17'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p17'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p17'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($value['p18'] == 0) { ?>
                                                    <i class="fa fa-times text-danger"></i>
                                                <?php } elseif ($value['p18'] == 1) { ?>
                                                    <i class="fa fa-info text-black"></i>
                                                <?php } elseif ($value['p18'] == 2) { ?>
                                                    <i class="fa fa-check text-success"></i>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <?php
                                                $absen = ($value['p1'] +
                                                    $value['p2'] +
                                                    $value['p3'] +
                                                    $value['p4'] +
                                                    $value['p5'] +
                                                    $value['p6'] +
                                                    $value['p7'] +
                                                    $value['p8'] +
                                                    $value['p9'] +
                                                    $value['p10'] +
                                                    $value['p11'] +
                                                    $value['p12'] +
                                                    $value['p13'] +
                                                    $value['p14'] +
                                                    $value['p15'] +
                                                    $value['p16'] +
                                                    $value['p17'] +
                                                    $value['p18']) / 36 * 100;
                                                echo number_format($absen, 0), '%';
                                                ?>

                                            </td>

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
                            <p class="lead">Keterangan :</p>
                            <p>1. belum berkembang</p>
                            <p>2. sudah berkembang</p>
                            <p>3. belum berkembang sesuai harapan</p>
                            <p>4. sangat baik</p>
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
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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