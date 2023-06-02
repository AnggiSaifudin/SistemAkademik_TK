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
    <a href="<?= base_url('loginsiswa/print'); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        Print Aspek Perkembangan
    </a>
    <a href="<?= base_url('loginsiswa/pdf'); ?>" target="_blank" class="btn btn-xs btn-dark">
        <i class="fa fa-file-pdf"></i>
        Download
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
                <th class="text-center">#</th>
                <th class="text-center">Kode Mapel</th>
                <th class="text-center">Mata Pelajaran</th>
                <th class="text-center">Nilai Quis</th>
                <th class="text-center">Nilai Ketrampilan</th>
                <th class="text-center">Nilai Kerajinan</th>
                <th class="text-center">Nilai Akhir</th>
                <th class="text-center">GRADE</th>
                <th class="text-center">Deskripsi</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($data_ap as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value['kode_mapel']; ?></td>
                    <td class="text-center"><?= $value['mapel']; ?></td>
                    <td class="text-center"><?= $value['nilai_quis']; ?></td>
                    <td class="text-center"><?= $value['nilai_ketrampilan']; ?></td>
                    <td class="text-center"><?= $value['nilai_kerajinan']; ?></td>
                    <td class="text-center"><?= $value['na']; ?></td>
                    <td class="text-center"><?= $value['nilai_huruf']; ?></td>
                    <td class="text-center"><?= $value['deskripsi']; ?></td>
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