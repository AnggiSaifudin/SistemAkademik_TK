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

            echo form_open_multipart('siswa/update/' . $siswa['nisn']);
            ?>
            <div class="form-group">
                <label>Nisn</label>
                <input name="nisn" class="form-control" value="<?= $siswa['nisn']; ?>" placeholder="Nisn">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input name="nama_siswa" class="form-control" value="<?= $siswa['nama_siswa']; ?>" placeholder="Nama siswa">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="ttl_siswa" class="form-control" value="<?= $siswa['ttl_siswa']; ?>" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group">
                <label>JK</label>
                <select name="jk_siswa" class="form-control">
                    <option value="<?= $siswa['jk_siswa']; ?>"><?= $siswa['jk_siswa']; ?></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <!-- edit -->
            <div class="form-group">
                <label>Agama</label>
                <input name="agama" class="form-control" value="<?= $siswa['agama']; ?>" placeholder="Agama">
            </div>

            <!-- edit -->
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat_siswa" class="form-control" value="<?= $siswa['alamat_siswa']; ?>" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label>Password</label>
                <!-- uji coba -->
                <?php foreach ($siswa1 as $key => $value) { 
                    if ($key === 0) { // Menampilkan form input hanya untuk elemen pertama
                        $password = isset($siswa1['password']) ? $siswa1['password'] : '';
                ?>
                    <input type="password" name="password" value="<?= $password ?>" class="form-control" placeholder="Password" autocomplete="off">
                <?php } } ?>
                <!-- end uji coba -->
            </div>

            <div class="form-group">
                <img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>" id="gambar_load" class="img-circle" width="200px">
            </div>
            <div class="form-group">
                <label>Foto Siswa</label>
                <input type="file" name="foto_siswa" id="preview_gambar" class="form-control" placeholder="foto siswa">
            </div>


        </div>
        <div class="modal-footer justify-content-between">
            <a href="<?= base_url('siswa'); ?>" class="btn btn-danger">Close</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.card-body -->
    </div>
</div>