<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="text-center">
                <img class="profile-user-img img-fluid" src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']); ?>">
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
                    <th width="300px">Nama Siswa</th>
                    <th width="50px">:</th>
                    <td><?= $siswa['nama_siswa']; ?></td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <th>:</th>
                    <td><?= $siswa['nis']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <th>:</th>
                    <td><?= $siswa['jk_siswa']; ?></td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <th>:</th>
                    <td><?= $siswa['agama']; ?></td>
                </tr>
                <tr>
                    <th>Nama Kelas</th>
                    <th>:</th>
                    <td>
                        <?= $siswa['nama_kelas']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Tahun Pelajaran</th>
                    <th>:</th>
                    <td>
                        <?= $ta_aktif['ta']; ?>/ <?= $ta_aktif['semester']; ?>
                    </td>
                </tr>
        
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?= $siswa['alamat_siswa']; ?></td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>