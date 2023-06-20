<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid" src="<?= base_url('fotoguru/' . $guru['foto_guru']); ?>" height="400px">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<div class="col-md-6">
    <!-- About Me Box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Biodata <?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-responsive">
                <tr>
                    <th width="250px">Nama Guru</th>
                    <th width="50px">:</th>
                    <td><?= $guru['nama_guru']; ?></td>
                </tr>
                <tr>
                    <th>NUPTK</th>
                    <th>:</th>
                    <td><?= $guru['nuptk']; ?></td>
                </tr>
                <!-- <tr>
                    <th>E-Mail</th>
                    <th>:</th>
                    <td>-</td>
                </tr> -->
                <tr>
                    <th>TTL</th>
                    <th>:</th>
                    <!-- <td><?= $guru['alamat']; ?>,<?= $guru['ttl']; ?></td> -->
                    <td><?= $guru['alamat']; ?>,<?= date('d M Y', strtotime($guru['ttl'])); ?></td>
                    <!-- <td>
                    <?= $guru['alamat']; ?>,
                                <?php
                                $tanggalLahir = $guru['ttl'];

                                $formatTanggal = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                                $tanggalLahirIndonesia = $formatTanggal->format(strtotime($tanggalLahir));

                                echo $tanggalLahirIndonesia;
                                ?>
                            </td> -->
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>