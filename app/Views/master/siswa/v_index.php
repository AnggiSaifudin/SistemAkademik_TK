<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>

            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php 
        echo form_open_multipart('siswa/import');
        ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputFile">Import</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file_excel" class="custom-file-input" accept=".xls,.xlsx">
                                <label class="custom-file-label">Pilih file</label>
                        </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

                <?php 
                echo form_close();
                ?>

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

                <?php?>

            <?php 
            if(session()->getFlashdata('pesan')){
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <!-- <th>Password</th> -->
                        <!-- <th>Foto</th>
                        <th class="text-center">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nisn']; ?></td>
                            <td><?= $value['nama_siswa']; ?></td>
                            <!-- <td width="150px"><?= $value['ttl_siswa']; ?></td> -->
                            <!-- <td><?= date('d F Y', strtotime($value['ttl_siswa'])); ?></td> -->
                            <td>
                                <?php
                                $tanggalLahir = $value['ttl_siswa'];

                                $formatTanggal = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                                $tanggalLahirIndonesia = $formatTanggal->format(strtotime($tanggalLahir));

                                echo $tanggalLahirIndonesia;
                                ?>
                            </td>
                            <td><?= $value['jk_siswa']; ?></td>
                            <td><?= $value['agama']; ?></td>
                            <td><?= $value['alamat_siswa']; ?></td>
                            <!-- <td><?= str_repeat('*', strlen($value['password'])); ?></td> -->
                            <!-- <td><?= $value['password']; ?></td> -->

                            <!-- <td width="150px" class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['nisn']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td> -->
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
<!-- <?php foreach ($siswa as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['nisn']; ?>">
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
                    <a href="<?= base_url('siswa/delete/' . $value['nisn']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?> -->