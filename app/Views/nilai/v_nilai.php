<table class="table table-bordered table-striped">
    <tr class="bg-blue">
        <th class="text-center">No</th>
        <th class="text-center">Mapel</th>
        <th class="text-center">Kelas</th>
        <th class="text-center">Nilai</th>
    </tr>

    <?php $no = 1;
    foreach ($absen as $key => $value) { ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td class="text-center"><?= $value['mapel']; ?></td>
            <td class="text-center"><?= $value['nama_kelas']; ?></td>

            <td class="text-center">
                <a href="<?= base_url('loginguru1/datanilai/' . $value['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat">
                    <i class="fa fa-calendar"></i> Nilai
                </a>
            </td>
        </tr>
    <?php } ?>

</table>