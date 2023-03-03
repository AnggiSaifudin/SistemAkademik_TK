<table class="table table-bordered table-striped">
    <tr class="bg-blue">
        <th class="text-center">No</th>
        <th class="text-center">Aspek Perkembangan</th>
        <!-- <th class="text-center">Kelas</th> -->
        <th class="text-center">Absensi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($absen as $key => $value) { ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $value['mapel']; ?></td>

            <td class="text-center">
                <a href="<?= base_url('loginguru/absensi/' . $value['id_jadwal']); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-calendar"></i>
                    Absensi
                </a>
            </td>
        </tr>
    <?php } ?>
</table>