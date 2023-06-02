<div class="col-md-12">
    <div class="card card-primary">

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="150px">Kelas</th>
                    <td width="30px">:</td>
                    <td><?= $jadwal['nama_kelas']; ?></td>
                </tr>
                <tr>
                    <th>Guru</th>
                    <td>:</td>
                    <td><?= $jadwal['nama_guru']; ?></td>
                </tr>
                <tr>
                    <th>Aspek Perkembangan</th>
                    <td>:</td>
                    <td><?= $jadwal['mapel']; ?></td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<div class="col-12">

    <a href="<?= base_url('loginguru/printnilai/' . $jadwal['id_jadwal']); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        Print Nilai
    </a>
</div>


<div class="col-sm-12">

    <?php

    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }

    ?>


    <?= form_open('loginguru1/simpannilai/' . $jadwal['id_jadwal']) ?>

    <!-- uji coba -->
<div class="form-group col-md-2"> 
    <label for="tgl_nilai">Tanggal Penilaian :</label>
    <input type="date" name="tgl_nilai" class="form-control">
</div>
<!-- akhir uji coba -->

    <table class="table table-bordered table-striped table-responsive-lg text-sm">
        <thead class=" bg-blue">
            <tr>
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Nisn</th>
                <th rowspan="2" class="text-center">Siswa</th>
                <th colspan="18" class="text-center">Penilaian</th>
            </tr>
            <tr>
                <th class="text-center" width="180px">
                    Nilai Quis(Tanya Jawab)
                </th>
                <th class="text-center" width="80px">Ketrampilan</th>
                <th class="text-center" width="80px">Kerajinan</th>
                <th class="text-center" width="80px">NA</th>
                <th class="text-center">GRADE</th>
                <th class="text-center">Deskripsi</th>

            </tr>

        </thead>

        <?php $no = 1;
        foreach ($siswa as $key => $value) {
            echo form_hidden($value['id_nilai'] . 'id_nilai', $value['id_nilai']);
        ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $value['nisn']; ?></td>
                <td class="text-center"><?= $value['nama_kelas']; ?></td>
                <td class="text-center"><?= $value['nama_siswa']; ?></td>
                <td class="text-center">


<select name="<?= $value['nisn']; ?>nilai_quis" class="form-control text-center">
    <option value="0" <?php if ($value['nilai_quis'] == '0') {
                            echo 'selected';
                        } ?>>
        0
    </option>
    <option value="1" <?php if ($value['nilai_quis'] == '1') {
                            echo 'selected';
                        } ?>>
        1
    </option>
    <option value="2" <?php if ($value['nilai_quis'] == '2') {
                            echo 'selected';
                        } ?>>
        2
    </option>
    <option value="3" <?php if ($value['nilai_quis'] == '3') {
                            echo 'selected';
                        } ?>>
        3
    </option>
    <option value="4" <?php if ($value['nilai_quis'] == '4') {
                            echo 'selected';
                        } ?>>
        4
    </option>
</select>
</td>
<td>

<select name="<?= $value['nisn']; ?>nilai_ketrampilan" class="form-control text-center">
    <option value="0" <?php if ($value['nilai_ketrampilan'] == '0') {
                            echo 'selected';
                        } ?>>
        0
    </option>
    <option value="1" <?php if ($value['nilai_ketrampilan'] == '1') {
                            echo 'selected';
                        } ?>>
        1
    </option>
    <option value="2" <?php if ($value['nilai_ketrampilan'] == '2') {
                            echo 'selected';
                        } ?>>
        2
    </option>
    <option value="3" <?php if ($value['nilai_ketrampilan'] == '3') {
                            echo 'selected';
                        } ?>>
        3
    </option>
    <option value="4" <?php if ($value['nilai_ketrampilan'] == '4') {
                            echo 'selected';
                        } ?>>
        4
    </option>
</select>
</td>
<td>

<select name="<?= $value['nisn']; ?>nilai_kerajinan" class="form-control text-center">
    <option value="0" <?php if ($value['nilai_kerajinan'] == '0') {
                            echo 'selected';
                        } ?>>
        0
    </option>
    <option value="1" <?php if ($value['nilai_kerajinan'] == '1') {
                            echo 'selected';
                        } ?>>
        1
    </option>
    <option value="2" <?php if ($value['nilai_kerajinan'] == '2') {
                            echo 'selected';
                        } ?>>
        2
    </option>
    <option value="3" <?php if ($value['nilai_kerajinan'] == '3') {
                            echo 'selected';
                        } ?>>
        3
    </option>
    <option value="4" <?php if ($value['nilai_kerajinan'] == '4') {
                            echo 'selected';
                        } ?>>
        4
    </option>
</select>

</td>
<td class="text-center">
<?= $value['na']; ?>
</td>
<td class="text-center">
<?= $value['nilai_huruf']; ?>
</td>
<td class="text-center">
<?= $value['deskripsi']; ?>
</td>

</tr>
<?php } ?>
    </table>
    <button class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan dan Proses</button>
    <?= form_close(); ?>
    <div class="col-6">
        <p>Keterangan Penilaian <br>
            <b> 1.</b> Belum Berkembang <br>
            <b> 2.</b> Mulai Berkembang Berkembang <br>
            <b> 3.</b> Berkembang Sesuai Harapan <br>
            <b> 4.</b> Berkembang Sangat Baik
        </p>
    </div>
</div>
