<table id="example1" class="table table-bordered table-striped">

    <tr class="text-center">
        <th width="50px">No</th>
        <th class="text-center">Nis</th>
        <th class="text-center">Nama siswa</th>
        <th class="text-center">Kelas</th>
        <th class="text-center">Tahun Pelajaran</th>
                <th class="text-center">Nilai Quis</th>
                <th class="text-center">Nilai Ketrampilan</th>
                <th class="text-center">Nilai Kerajinan</th>
                <th class="text-center">Nilai Akhir</th>
                <th class="text-center">GRADE</th>
                <th class="text-center">Deskripsi</th>

    </tr>

    <b>Tahun Pelajaran : <?= $ta; ?>, </b>
    <b>Semester : <?= $semester; ?>, </b>
    <b>mapel : <?= $mapel; ?>, </b>
    <b>kelas : <?= $nama_kelas; ?>, </b>
    <b>tanggal : <?= $tgl_nilai; ?></b>

    <?php $no = 1;
     foreach($laporan as $key => $value) { ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value['nis']; ?></td>
        <td><?= $value['nama_siswa']; ?></td>
        <td><?= $value['nama_kelas']; ?></td>
        <td><?= $value['mapel']; ?></td>
        <td><?= $value['nilai_quis']; ?></td>
        <td><?= $value['nilai_ketrampilan']; ?></td>
        <td><?= $value['nilai_kerajinan']; ?></td>
        <td><?= $value['na']; ?></td>
        <td><?= $value['nilai_huruf']; ?></td>
        <td><?= $value['deskripsi']; ?></td>
    </tr>
    <?php } ?>
</table>