<table class="table table-bordered table-striped">
    <tr class="bg-blue">
        <th>No</th>
        <th>Hari</th>
        <th>Mapel</th>
        <!-- <th>Kelas</th> -->
        <th>Guru</th>
        <th>Tahun</th>
    </tr>
    <?php
    $no = 1;
    foreach ($jadwal as $key => $value) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['hari']; ?>,<?= $value['waktu']; ?></td>
            <td><?= $value['mapel']; ?></td>

            <td><?= $value['nama_guru']; ?></td>
            <td><?= $ta['ta']; ?>/<?= $ta['semester']; ?></td>
        <?php } ?>
        </tr>
</table>