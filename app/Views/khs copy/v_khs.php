<div class="col-md-12">
    <table class=" table-striped">

        <tr>
            <td rowspan="6"><img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>" height="150px" width="100px"></td>
            <td width="150px">Tahun Akademik</td>
            <td>:</td>
            <td>
                <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
            </td>
            <td rowspan="6"></td>
        </tr>
        <tr>
            <td>Nim</td>
            <td>:</td>
            <td><?= $siswa['nim']; ?></td>
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
    <a href="<?= base_url('loginsiswa/print'); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        cetak KHS
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

    <table class="table table-bordered table-striped">
        <thead class=" bg-blue">
            <tr>
                <th>#</th>
                <th>Kode Aspek</th>
                <th>Aspek Perkembangan</th>
                <th>SMT</th>
                <th>Nama Guru</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($data_ap as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['kode_mapel']; ?></td>
                    <td><?= $value['mapel']; ?></td>
                    <td><?= $value['smt']; ?></td>
                    <td><?= $value['nama_guru']; ?></td>
                    <td><?= $value['nama_kelas']; ?></td>
                    <td><?= $value['nilai_huruf']; ?></td>
                    <td><?= $value['bobot']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>