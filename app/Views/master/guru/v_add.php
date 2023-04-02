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

            echo form_open_multipart('guru/insert');

            ?>
            <div class="form-group">
                <label>NIP</label>
                <input name="nip" class="form-control" placeholder="Nip" >
            </div>
            <div class="form-group">
                <label>Nama Guru</label>
                <input name="nama_guru" class="form-control" placeholder="Nama Guru" >
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="ttl" class="form-control" placeholder="Tanggal Lahir" >
            </div>
            <div class="form-group">
                <label>JK</label>
                <select name="jk" class="form-control">
                    <option value=""> --Pilih Jenis Kelamin-- </option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>

                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Alamat" >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
            </div>

            <div class="form-group">
                <img src="<?= base_url('fotoguru/default.png'); ?>" id="gambar_load" width="200px">
            </div>
            <div class="form-group">
                <label>Foto Guru</label>
                <input type="file" name="foto_guru" id="preview_gambar" class="form-control" placeholder="foto guru">
            </div>


        </div>
        <div class="modal-footer justify-content-between">
            <a href="<?= base_url('guru'); ?>" class="btn btn-danger">Close</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.card-body -->
    </div>
</div>


