<div class="col-md-12">
    <div class="card card-primary">
        <!-- /.card-header -->
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200px">Program Studi</th>
                    <td width="30px">:</td>
                    <td><?= $prodi['prodi']; ?></td>
                </tr>
                <tr>
                    <th>Jenjang</th>
                    <td>:</td>
                    <td><?= $prodi['jenjang']; ?></td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>:</td>
                    <td><?= $prodi['fakultas']; ?></td>
                </tr>
                <tr>
                    <th>Tahun Akademik</th>
                    <td>:</td>
                    <td><?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?>
                    </td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
</div>


<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <a href="<?= base_url('ap'); ?>" class="card-title">
                <?= $title; ?>
            </a>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                    <i class="fa-solid fa-plus"></i>
                    <b>Add</b>
                </button>
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

            <?php ?>

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
                        <th>SMT</th>
                        <th>Kode Aspek</th>
                        <th>Aspek</th>
                        <th>Kelas</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Quota</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($jadwal as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['smt']; ?></td>
                            <td><?= $value['kode_ap']; ?></td>
                            <td><?= $value['ap']; ?></td>
                            <td><?= $value['nama_kelas']; ?></td>
                            <td><?= $value['nama_guru']; ?></td>
                            <td><?= $value['hari']; ?></td>
                            <td><?= $value['waktu']; ?></td>
                            <td><?= $value['quota']; ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_jadwal']; ?>">
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


<!-- modal tambah data -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php

                echo form_open('jadwaltk/add/' . $prodi['id_prodi']);

                ?>

                <div class="form-group">
                    <label>Aspek Perkembangan</label>
                    <select name="id_ap" class="form-control">
                        <option value="">--pilih Aspek Perkembangan--</option>
                        <?php foreach ($ap as $key => $value) { ?>
                            <option value="<?= $value['id_ap']; ?>">
                                <?= $value['ap']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Guru</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--pilih guru--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru']; ?>">
                                <?= $value['nama_guru']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--pilih kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas']; ?>">
                                <?= $value['nama_kelas']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hari</label>
                            <select name="hari" class="form-control">
                                <option value="">--pilih Hari--</option>
                                <option value="senin">senin</option>
                                <option value="selasa">selasa</option>
                                <option value="rabu">rabu</option>
                                <option value="kamis">kamis</option>
                                <option value="jumat">jumat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Waktu</label>
                            <input name="waktu" class="form-control" placeholder="ex: 08:00-10:00">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Quota</label>
                    <input name="quota" placeholder="quota" class="form-control">
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close()  ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.end modal tambah data-->

<!-- modal delete-->
<?php foreach ($jadwal as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_jadwal']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['kode_ap']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('jadwaltk/delete/' . $value['id_ruangan'] . '/' . $prodi['id_prodi']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>