<div class="col-md-12">
    <div class="card card-primary">
        <!-- /.card-header -->
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th class="text-center">Fakultas</th>
                        <th class="text-center">Kode Prodi</th>
                        <th class="text-center">Program Studi</th>
                        <th class="text-center">Jenjang</th>
                        <th class="text-center">Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($prodi as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['fakultas']; ?></td>
                            <td><?= $value['kode_prodi']; ?></td>
                            <td><?= $value['prodi']; ?></td>
                            <td><?= $value['jenjang']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('jadwaltk/detail_jadwal/' . $value['id_prodi']); ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-calendar"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>