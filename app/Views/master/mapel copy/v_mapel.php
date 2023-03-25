<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php

            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                            <li><?= esc($value); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>


            <?php

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }

            ?>

            <table class="table table-bordered table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Guru</th>
                        <th class="text-center">Jumlah Aspek/Kelas</th>
                        <th class="text-center">Tahun Pelajaran</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($kelas as $key => $value) {

                        $jml = $db->table('tbl_mapel')->where('id_kelas', $value['id_kelas'])->countAllResults();
                    ?>

                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value['nama_kelas']; ?></td>
                            <td class="text-center"><?= $value['nama_guru']; ?></td>
                            <td class="text-center">
                                <p">
                                    <?= $jml; ?>
                                    <br>
                                    </p>
                            </td>
                            <td class="text-center"><?= $ta_aktif['ta']; ?>/<?= $ta_aktif['semester']; ?></td>
                            <td width="150px" class="text-center">
                                <a href="<?= base_url('mapel/detail/'.$value['id_kelas']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-list"></i>
                                    Detail Aspek
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




<!-- modal delete-->
<?php foreach ($kelas as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_kelas']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['nama_kelas']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelas/delete/' . $value['id_kelas']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>