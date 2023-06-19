<div class="col-md-12">
    <div class="card card-primary">

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="150px">Kelas</th>
                    <td width="30px">:</td>
                    <td><?= $kelas['nama_kelas']; ?></td>
                </tr>
                <tr>
                    <th>Guru</th>
                    <td>:</td>
                    <td><?= $kelas['nama_guru']; ?></td>
                </tr>
                <tr>
                    <th>Tahun Pelajaran</th>
                    <td>:</td>
                    <td><?= $ta_aktif['ta']; ?>/<?= $ta_aktif['semester']; ?></td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                    <i class="fa-solid fa-plus"></i>
                    <b>Add</b>
                </button>
            </div>

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

            if (session()->getFlashdata('error')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('error');
                echo '</div>';
            }

            ?>

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
                        <th class="text-left">Kode</th>
                        <th class="text-left">Aspek</th>
                        <th class="text-left">Nama Guru</th>
                        <!-- <th class="text-center">Hari</th>
                        <th class="text-center">Waktu</th> -->
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($jadwal as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-left"><?= $value['kode_mapel']; ?></td>
                            <td class="text-left"><?= $value['mapel']; ?></td>
                            <td class="text-left"><?= $value['nama_guru']; ?></td>



                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php

                echo form_open('jadwaltk/add/' . $kelas['id_kelas']);
                // echo form_hidden('id_kelas', $id_kelas);
                ?>

                <div class="form-group">
                    <label>Aspek</label>
                    <select name="kode_mapel" class="form-control">
                        <option value="">--Pilih Aspek--</option>
                        <?php foreach ($mapel as $key => $value) { ?>
                            <option value="<?= $value['kode_mapel']; ?>">
                                <?= $value['kode_mapel']; ?>||<?= $value['mapel']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Guru</label>
                    <select name="nuptk" class="form-control">
                    <option value="">--Pilih Guru--</option>
                        <?php foreach ($guru1 as $key => $value) { ?>
                            <option value="<?= $value['nuptk']; ?>">
                                <?= $value['nama_guru']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- 
                <div class="form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        <option value="">--Pilih hari--</option>
                        <option value="senin">senin</option>
                        <option value="selasa">selasa</option>
                        <option value="rabu">rabu</option>
                        <option value="kamis">kamis</option>
                        <option value="jumat">jumat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Waktu</label>
                    <input name="waktu" class="form-control" placeholder="ex:08:00-10:00">
                </div> -->

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

    <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['mapel']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('jadwaltk/delete/' . $value['id_jadwal'] . '/' . $kelas['id_kelas']); ?>" class="btn btn-success">Delete
                    </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>