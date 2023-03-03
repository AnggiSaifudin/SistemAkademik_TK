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

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Kode</th>
                        <th>Aspek Perkembangan</th>
                        <th>Kategori</th>
                        <th>Semester</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($ap as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['kode_ap']; ?></td>
                            <td><?= $value['ap']; ?></td>
                            <td><?= $value['kategori']; ?></td>
                            <td><?= $value['smt']; ?> (<?= $value['semester']; ?>)</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_ap']; ?>">
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
    <div class="modal-dialog modal-sm-12">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php

                echo form_open('ap/add/' . $prodi['id_prodi']);

                ?>

                <div class="form-group">
                    <label>Kode</label>
                    <input name="kode_ap" class="form-control" placeholder="Kode Aspek Perkembangan">
                </div>
                <div class="form-group">
                    <label>Aspek Perkembangan</label>
                    <input name="ap" class="form-control" placeholder="Aspek Perkembangan">
                </div>

                <div class="form-group">
                    <label>Semester</label>
                    <select name="smt" class="form-control">
                        <option value="">--pilih Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="">--pilih Kategori--</option>
                        <option value="wajib">Wajib</option>
                        <option value="pilihan">Pilihan</option>
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
<?php foreach ($ap as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_ap']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['ap']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('ap/delete/' . $prodi['id_prodi'] . '/' . $value['id_ap']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>