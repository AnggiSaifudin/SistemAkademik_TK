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

            echo form_open('prodi/insert');

            ?>

            <div class="form-group">
                <label>Fakultas</label>
                <select name="id_fakultas" class="form-control">
                    <?php foreach ($fakultas as $key => $value) { ?>
                        <option value="<?= $value['id_fakultas']; ?>"><?= $value['fakultas']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode Program Studi</label>
                <input name="kode_prodi" class="form-control" placeholder="Kode Program Studi">
            </div>
            <div class="form-group">
                <label>Program Studi</label>
                <input name="prodi" class="form-control" placeholder="Program Studi">
            </div>
            <div class="form-group">
                <label>Jenjang</label>
                <select name="jenjang" class="form-control">
                    <option value="">--pilih jenjang--</option>
                    <option value="D1">Diploma 1</option>
                    <option value="D2">Diploma 2</option>
                    <option value="D3">Diploma 3</option>
                    <option value="S1">Strata 1</option>

                </select>
            </div>

            <div class="form-group">
                <label>Ketua Prodi</label>
                <select name="kaprodi" class="form-control">
                    <option value="">--pilih Ketua Prodi--</option>
                    <?php foreach ($guru as $key => $value) { ?>
                        <option value="<?= $value['nama_guru']; ?>"><?= $value['nama_guru'];  ?></option>
                    <?php } ?>
                </select>
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