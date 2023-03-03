<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>


            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }

            ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th class="text-center">Tahun Akademik</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ta as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['ta']; ?></td>
                            <td><?= $value['semester']; ?></td>
                            <td class="text-center">
                                <?php if ($value['status'] == 0) {
                                    echo '<p class="label bg-red">Non-Aktif</p>';
                                } else {
                                    echo '<p class="label bg-green">Aktif</p>';
                                }
                                ?>
                            </td>
                            <td width="150px" class="text-center">
                                <?php if ($value['status'] == 0) { ?>
                                    <a href="<?= base_url('ta/set_status_ta/'. $value['id_ta']); ?>" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-check"></i>
                                        Aktifkan
                                    </a>
                                <?php } ?>
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




