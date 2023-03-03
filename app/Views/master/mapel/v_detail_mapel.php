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
                        <th class="text-center">Kode</th>
                        <th class="text-center">Mapel</th>
                        <th class="text-center">Semester</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($mapel as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value['kode_mapel']; ?></td>
                            <td class="text-center"><?= $value['mapel']; ?></td>
                            <td class="text-center"><?= $value['smt']; ?>(<?= $value['semester']; ?>)</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_mapel']; ?>">
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Aspek</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php

                echo form_open('mapel/add/' . $kelas['id_kelas']);

                ?>

                <div class="form-group">
                    <label>Kode</label>
                    <input name="kode_mapel" class="form-control" placeholder="Kode Aspek Perkembangan">
                </div>
                <div class="form-group">
                    <label>Aspek Perkembangan</label>
                    <input name="mapel" class="form-control" placeholder="Aspek Perkembangan">
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select name="smt" class="form-control">
                        <option value="">--Pilih Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
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
<?php foreach ($mapel as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_mapel']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['mapel']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('mapel/delete/' . $kelas['id_kelas'] . '/' . $value['id_mapel']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>