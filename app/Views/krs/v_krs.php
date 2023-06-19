<div class="col-md-12">
    <table class=" table-striped">

        <tr>
            <td rowspan="6"><img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>" height="150px" width="100px"></td>
            <td width="150px">Tahun Pelajaran</td>
            <td>:</td>
            <td>
                <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
            </td>
            <td rowspan="6"></td>
        </tr>
        <tr>
            <td>Nisn</td>
            <td>:</td>
            <td><?= $siswa['nisn']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $siswa['nama_siswa']; ?></td>
        </tr>
        <tr>
            <td>Guru</td>
            <td>:</td>
            <td><?= $siswa['nama_guru']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $siswa['nama_kelas']; ?></td>
        </tr>

    </table>
    <br>
</div>


<div class="col-sm-12">
    <a href="<?= base_url('krs/print'); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        cetak Aspek
    </a>
</div>


<div class="col-sm-12">


    <table class="table table-bordered table-striped table-responsive-lg">
        <thead class=" bg-blue">
            <tr>
                <th class="text-left">No</th>
                <th>Kode Aspek</th>
                <th>Aspek Perkembangan</th>
                <th>Kelas</th>
                <th>guru</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($krs as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['kode_mapel']; ?></td>
                    <td><?= $value['mapel']; ?></td>
                    <td><?= $value['nama_kelas']; ?></td>
                    <td><?= $value['nama_guru']; ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

