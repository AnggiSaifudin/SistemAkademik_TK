<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-left">Nama Kelas</th>
                        <th class="text-left">Guru</th>
                        <th class="text-left">Tahun Pelajaran</th>
                        <th class="text-center" width="50px">Mengajar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kelas as $key => $value) {
                    ?>

                        <tr>
                            <td class="text-center">
                                <?= $no++; ?>
                            </td>
                            <td class="text-left">
                                <?= $value['nama_kelas']; ?>
                            </td>
                            <td class="text-left">
                                <?= $value['nama_guru']; ?>
                            </td>
                            <td class="text-left"><?= $ta_aktif['ta']; ?>/<?= $ta_aktif['semester']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('jadwaltk/detail_jadwal/' . $value['id_kelas']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-calendar"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>