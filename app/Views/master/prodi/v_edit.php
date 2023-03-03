<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>

            <div class="card-tools">

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

            echo form_open('prodi/update/' . $prodi['id_prodi']);

            ?>

            <div class="form-group">
                <label>Kode</label>
                <input name="kode_prodi" value="<?= $prodi['kode_prodi']; ?>" class="form-control" placeholder="Kode Program Studi">
            </div>
            <div class="form-group">
                <label>Mata Pelajaran</label>
                <input name="prodi" value="<?= $prodi['prodi']; ?>" class="form-control" placeholder="Program Studi">
            </div>




        </div>
        <div class="modal-footer justify-content-between">
            <a href="<?= base_url('prodi'); ?>" class="btn btn-danger">Close</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.card-body -->
    </div>
</div>