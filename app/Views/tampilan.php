<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

<!-- link datepicker  -->
    <!-- CSS Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<!-- end datepicker -->
    
    <!-- link js sweetalert popup laporan -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/halaman/dist/css/adminlte.min.css">
    

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url(); ?>/gambar/yayasan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAKAD TK</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <!-- menu menu Admin -->
                    <!-- jika levelnya admin tampilkan dashboard admin -->
                    <?php if (session()->get('level') == 1) { ?>

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="<?= base_url('foto/' . session()->get('foto')); ?>" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <p>
                                    <a><?= session()->get('nama') ?>
                                        /
                                    </a>
                                    <a>
                                        <?php if (session()->__get('level') == 1) {
                                            echo 'Admin';
                                        } ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="<?= base_url('admin'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gauge"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fa-solid fa-folder nav-icon"></i>
                                    <p>
                                        Data Master
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- <li class="nav-item">
                                        <a href="fakultas" class="nav-link">
                                            <i class="fa-solid fa-graduation-cap nav-icon"></i>
                                            <p>Fakultas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="gedung" class="nav-link">
                                            <i class="fa-solid fa-school nav-icon"></i>
                                            <p>Gedung</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ruangan" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Ruangan</p>
                                        </a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('prodi'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mata Pelajaran</p>
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="<?= base_url('ta'); ?>" class="nav-link">
                                        <i class="fa-solid fa-calendar-days nav-icon"></i>
                                            <p>Tahun Pelajaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('guru'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Guru</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('siswa'); ?>" class="nav-link">
                                        <i class="fa-sharp fa-solid fa-users nav-icon"></i>
                                            <p>Siswa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-graduation-cap"></i>
                                    <p>
                                        Akademik
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                        <a href="<?= base_url('kelas'); ?>" class="nav-link">
                                            <i class="fa-solid fa-landmark nav-icon"></i>
                                            <p>Kelas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('mapel'); ?>" class="nav-link">
                                        <i class="fa-solid fa-book nav-icon"></i>
                                            <p>Aspek Perkembangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('jadwaltk'); ?>" class="nav-link">
                                        <i class="fa-regular fa-calendar nav-icon"></i>
                                            <p>Mengajar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('laporan'); ?>" class="nav-link">
                                            <i class="fa-solid fa-file nav-icon"></i>
                                            <p>Laporan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gear"></i>
                                    <p>
                                        Pengaturan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('user'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Ta/setting'); ?>" class="nav-link">
                                        <i class="fa-solid fa-calendar-days nav-icon"></i>
                                            <p>Tahun Aktif</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <!-- menu menu Admin -->

                        <!-- menu menu Guru -->
                    <?php } elseif (session()->get('level') == 2) { ?>

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="<?= base_url('fotoguru/' . session()->get('foto')); ?>" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <p>
                                    <a><?= session()->get('nama') ?>
                                        /
                                    </a><a>
                                        <?php if (session()->__get('level') == 2) {
                                            echo 'Guru';
                                        } ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="<?= base_url('loginguru'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gauge"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gear"></i>
                                    <p>
                                        Akademik
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('loginguru1/jadwal'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Jadwal Mengajar</p>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('loginguru1/absenkelas'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Absen Kelas</p>
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="<?= base_url('loginguru1/nilaisiswa'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Nilai Siswa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- 
                            <li class="nav-item">
                                <a href="<?= base_url('loginguru1/nilaisiswa'); ?>" class="nav-link">
                                    <i class="fa-solid fa-user nav-icon"></i>
                                    <p>Input Perkembangan</p>
                                </a>
                            </li> -->

                            <li class="nav-item">
                                <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <!-- menu menu Guru -->

                        <!-- menu menu Siswa -->
                    <?php } elseif (session()->get('level') == 3) { ?>

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="<?= base_url('fotosiswa/' . session()->get('foto')); ?>" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <p>
                                    <a><?= session()->get('nama') ?>
                                        /
                                    </a>
                                    <a>
                                        <?php if (session()->__get('level') == 3) {
                                            echo 'Siswa';
                                        } ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="<?= base_url('loginsiswa'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gauge"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gear"></i>
                                    <p>
                                        Akademik
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('krs'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Jadwal Siswa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('loginsiswa/khs'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Hasil Penilaian</p>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('loginsiswa/absensi'); ?>" class="nav-link">
                                            <i class="fa-solid fa-user nav-icon"></i>
                                            <p>Absensi</p>
                                        </a>
                                    </li> -->
                                </ul>
                            </li>

                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa-solid fa-user nav-icon"></i>
                                    <p>Cetak Perkembangan</p>
                                </a>
                            </li> -->

                            <li class="nav-item">
                                <a href="<?= base_url('loginsiswa/logout'); ?>" class="nav-link">
                                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                    <!-- menu menu Siswa -->
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- khusus untuk menampilkan halaman semua konten -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?>
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php

                        if ($page) {
                            echo view($page);
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!-- tutup content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- khusus untuk menampilkan halaman semua konten -->




        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a>TK Putra VII Bojongbata Kabupaten Pemalang</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- jQuery -->
    <script src="<?= base_url(); ?>/halaman/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/halaman/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>/halaman/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>/halaman/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/halaman/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/halaman/dist/js/demo.js"></script>
    <!-- Page specific script -->


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(300, function() {
                $(this).remove();
            })
        }, 2000);
    </script>

    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#preview_gambar').change(function() {
            bacaGambar(this);
        });
    </script>
</body>

</html>