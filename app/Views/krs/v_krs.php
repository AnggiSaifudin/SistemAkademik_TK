<div class="col-md-12">
    <table class=" table-striped">

        <tr>
            <td rowspan="6"><img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>" height="150px" width="100px"></td>
            <td width="150px">Tahun Akademik</td>
            <td>:</td>
            <td>
                <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
            </td>
            <td rowspan="6"></td>
        </tr>
        <tr>
            <td>Nis</td>
            <td>:</td>
            <td><?= $siswa['nis']; ?></td>
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
    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add">
        <i class="fa fa-plus"></i>
        tambah Aspek Perkembangan
    </button>
    <a href="<?= base_url('krs/print'); ?>" target="_blank" class="btn btn-xs btn-success">
        <i class="fa fa-print"></i>
        cetak Aspek
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
                <th>#</th>
                <th>Kode Aspek</th>
                <th>Aspek Perkembangan</th>
                <th>Kelas</th>
                <th>SMT</th>
                <th>guru</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($data_ap as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['kode_mapel']; ?></td>
                    <td><?= $value['mapel']; ?></td>
                    <td><?= $value['nama_kelas']; ?></td>
                    <td><?= $value['smt']; ?></td>
                    <td><?= $value['nama_guru']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_nilai']; ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<!-- modal tambah data aspek perkembangan -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Aspek Perkembangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kode Aspek</th>
                            <th class="text-center">Aspek Perkembangan</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">guru</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db = \Config\Database::connect();
                        foreach ($krs as $key => $value) {
                            $jml = $db->table('tbl_krs')->where('id_jadwal', $value['id_jadwal'])->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['kode_mapel']; ?></td>
                                <td class="text-center"><?= $value['mapel']; ?></td>
                                <td class="text-center"><?= $value['nama_kelas']; ?></td>
                                <td class="text-center"><?= $value['smt']; ?></td>
                                <td class="text-center"><?= $value['nama_guru']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('krs/tambah_ap/' . $value['id_jadwal']); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
<!-- /.end modal tambah data -->

<!-- modal delete-->
<?php foreach ($data_ap as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_nilai']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    apakah anda yakin ingin menghapus <b><?= $value['kode_mapel']; ?>.?</b>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('krs/delete/' . $value['id_nilai']); ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

<?php } ?>