<table class="table table-bordered table-striped">
    <tr class="bg-blue">
        <th>No</th>
        <!-- <th>Hari</th> -->
        <th>Aspek Perkembangan</th>
        <!-- <th>Kelas</th> -->
        <th>kelas</th>
        <th>Tahun Pelajaran</th>
    </tr>
    <?php
    $no = 1;
    foreach ($jadwal as $key => $value) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['mapel']; ?></td>
            <td><?= $value['nama_kelas']; ?></td>


            <td><?= $ta['ta']; ?>/<?= $ta['semester']; ?></td>
        <?php } ?>
        </tr>
</table>