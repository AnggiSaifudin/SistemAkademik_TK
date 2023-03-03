<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table class="table table-bordered table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Guru</th>
                        <th class="text-center">Tahun Angkatan</th>
                        <th class="text-center">Jadwal</th>
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
                            <td class="text-center">
                                <?= $value['nama_kelas']; ?>
                            </td>
                            <td class="text-center">
                                <?= $value['nama_guru']; ?>
                            </td>
                            <td class="text-center">
                                <?= $value['tahun']; ?>
                            </td>
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