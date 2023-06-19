<table class="table table-bordered table-striped table-responsive-md">
    <tr class="bg-blue">
        <th width="50px" class="text-center">No</th>
        <th class="text-left">Aspek Perkembangan</th>
        <th class="text-left">kelas</th>
        <th class="text-left">Tahun Pelajaran</th>
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