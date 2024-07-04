<div class="col-md-12">
    <table class=" table-striped">

        <tr>
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


<!-- <div class="col-sm-12">
    <a href="<?= base_url('loginsiswa/print'); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        Print Aspek Perkembangan
    </a>
    <a href="<?= base_url('loginsiswa/pdf'); ?>" target="_blank" class="btn btn-xs btn-dark">
        <i class="fa fa-file-pdf"></i>
        Download
    </a>
</div> -->


<div class="col-sm-12">

    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>

    <table class="table table-bordered table-striped table-responsive-lg">
        <thead class=" bg-blue">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tahun Pelajaran</th>
                <th class="text-center">Kode Mapel</th>
                <th class="text-center">Mata Pelajaran</th>
                <th class="text-center">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data_ap as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['ta']; ?>/<?= $value['semester']; ?></td>
                    <td class="text-center"><?= $value['kode_mapel']; ?></td>
                    <td class="text-center"><?= $value['mapel']; ?></td>
                    <td class="text-left" >
                    <?= nl2br($value['nilai_quis']); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="table table-bordered table-striped table-responsive-lg">
        <thead class=" bg-blue">
            <tr>
                <th class="text-center">Ijin</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Tanpa Keterangan</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($hadir as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $value['sakit']; ?></td>
                    <td class="text-center"><?= $value['ijin']; ?></td>
                    <td class="text-center"><?= $value['tp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="col-6">
                            <p class="lead">Keterangan :</p>
                            <p>1. Belum Berkembang</p>
                            <p>2. Sudah Berkembang</p>
                            <p>3. Belum Berkembang Sesuai Harapan</p>
                            <p>4. Berkembang Sangat Baik</p>
                        </div>
</div>