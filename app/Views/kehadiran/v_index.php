

<div class="col-md-12">

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

    <?= form_open('loginguru1/simpanhadir') ?>
<table class="table table-bordered table-striped table-responsive-lg text-sm">
    <thead class="bg-blue">
        <tr>
            <th rowspan="2" class="text-center">No</th>
            <th rowspan="2" class="text-center">Nisn</th>
            <th rowspan="2" class="text-center">Siswa</th>
            <th colspan="3" class="text-center">Kehadiran</th>
        </tr>
        <tr>
            <th class="text-center" width="180px">Sakit (Hari)</th>
            <th class="text-center" width="80px">Ijin (Hari)</th>
            <th class="text-center" width="80px">Tanpa Keterangan (Hari)</th>
        </tr>
    </thead>
    <tbody>
    <?php
// menghapus duplikasi pada array siswa
$siswa_unique = array_unique($get_kelas, SORT_REGULAR);

// melakukan looping pada array siswa yang sudah unik
$no = 1;
foreach ($get_kelas as $key => $value) {


        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-left"><?= $value['nisn']; ?></td>
            <td class="text-left"><?= $value['nama_siswa']; ?></td>
            <td class="text-left">
                <div class="form-group">
                <input name="<?= $value['nisn']; ?>sakit" class="form-control" value="<?= $value['sakit']; ?>"></input>
                </div>
            </td>
            <td class="text-left">
            <div class="form-group">
                <input name="<?= $value['nisn']; ?>ijin" class="form-control"value="<?= $value['ijin']; ?>"></input>
                </div>
            </td>
            <td class="text-left">
            <div class="form-group">
                <input name="<?= $value['nisn']; ?>tp" class="form-control"value="<?= $value['tp']; ?>"></input>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan dan Proses</button>
<?= form_close(); ?>
</div>