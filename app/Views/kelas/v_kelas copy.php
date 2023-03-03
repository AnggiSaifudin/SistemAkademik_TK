<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>

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
                        <th>Nama Kelas</th>
                        <th>Guru</th>
                        <th>Jumlah Siswa/Kelas</th>
                        <th>Tahun Angkatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($kelas as $key => $value) {
                                                
                        $jml = $db->table('tbl_siswa')->where('id_kelas', $value['id_kelas'])->countAllResults();
                        ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_kelas']; ?></td>
                            <td><?= $value['nama_guru']; ?></td>
                            <td class="text-center">
                                <p">
                                    <?= $jml; ?>
                                    <br>
                                    <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']); ?>">siswa</a>
                                    </p>
                            </td>
                            <td><?= $value['tahun']; ?></td>
                            <td width="150px" class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_kelas']; ?>">
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
                <h4 class="modal-title">Add <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php

                echo form_open('kelas/add');

                ?>

                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input name="nama_kelas" class="form-control" placeholder="Nama kelas" required>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--pilih guru--</option>

                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru']; ?>"><?= $value['nama_guru']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Angkatan</label>
                    <select name="tahun" class="form-control">
                        <option value="">--pilih Tahun--</option>
                        <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
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