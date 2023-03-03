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

            echo form_open('ruangan/update/'.$ruangan['id_ruangan']);

            ?>

            <div class="form-group">
                <label>Gedung</label>
                <select name="id_gedung" class="form-control">
                    <option value="<?= $ruangan['id_gedung']; ?>"><?= $ruangan['gedung']; ?></option>
                    <?php foreach ($gedung as $key => $value) { ?>
                        <option value="<?= $value['id_gedung']; ?>">
                            <?= $value['gedung']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Ruangan</label>
                <input name="ruangan" value="<?= $ruangan['ruangan']; ?>" class="form-control" placeholder="Ruangan" required>
            </div>


        </div>
        <div class="modal-footer justify-content-between">
            <a href="<?= base_url('ruangan'); ?>" class="btn btn-danger">Close</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.card-body -->
    </div>
</div>