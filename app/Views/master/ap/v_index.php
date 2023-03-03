<div class="col-md-12">
    <div class="card card-primary">
        <!-- /.card-header -->
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Kode Prodi</th>
                        <th>Program Studi</th>
                        <th>Aspek Perkembangan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($prodi as $key => $value) { 
                        
                        $jml = $db->table('tbl_ap')->where('id_prodi', $value['id_prodi'])->countAllResults();

                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['kode_prodi']; ?></td>
                            <td><?= $value['prodi']; ?></td>
                            <td><?= $jml; ?></td>
                            <td width="150px" class="text-center">
                                <a href="<?= base_url('ap/detail/' .$value['id_prodi']); ?>" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-list"></i>
                                     Add Aspek
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