<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('siswa/add'); ?>" class="btn btn-tool">
                    <i class="fa-solid fa-plus"></i>
                    <b>Add</b>
                </a>
            </div>
            <!-- /.card-tools -->
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

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <!-- <th>Password</th> -->
                        <th>Foto</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nis']; ?></td>
                            <td><?= $value['nama_siswa']; ?></td>
                            <!-- <td width="150px"><?= $value['ttl_siswa']; ?></td> -->
                            <td><?= date('d F Y', strtotime($value['ttl_siswa'])); ?></td>
                            <td><?= $value['jk_siswa']; ?></td>
                            <td><?= $value['agama']; ?></td>
                            <td><?= $value['alamat_siswa']; ?></td>
                            <!-- <td><?= str_repeat('*', strlen($value['password'])); ?></td> -->
                            <!-- <td><?= $value['password']; ?></td> -->

                            <td class="text-center"><img src="<?= base_url('fotosiswa/' . $value['foto_siswa']); ?>" class="img-circle" alt="User Image" width="50px"></td>
                            <td width="150px" class="text-center">
                                <a href="<?= base_url('siswa/edit/' . $value['nis']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['nis']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
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
<?php foreach ($siswa as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['nis']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['nama_siswa']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('siswa/delete/' . $value['nis']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>