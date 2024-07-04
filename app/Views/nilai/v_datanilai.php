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

<a href="<?= base_url('loginguru1/printnilai/'. $jadwal['id_jadwal']); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        Print Nilai
    </a>
</div>


<div class="col-sm-12">

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


    <?= form_open('loginguru1/simpannilai/'. $jadwal['id_jadwal']) ?>

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
            </tr>
            <tr>
                <th class="text-center" width="180px">
                    Deskripsi
                </th>


            </tr>

        </thead>


        <?php
// menghapus duplikasi pada array siswa
$siswa_unique = array_unique($siswa, SORT_REGULAR);

// melakukan looping pada array siswa yang sudah unik
$no = 1;
foreach ($siswa as $key => $value) {


        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-left"><?= $value['nisn']; ?></td>
            <td class="text-left"><?= $value['nama_siswa']; ?></td>
            <td class="text-left">
                <div class="form-group">
                <textarea name="<?= $value['nisn']; ?>nilai_quis" class="form-control" style="width: 900px; height: 250px;"placeholder="Masukan Deskripsi"><?= $value['nilai_quis']; ?></textarea>
                </div>
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
