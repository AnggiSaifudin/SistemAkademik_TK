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
                    <th width="300px">Nama Guru</th>
                    <th width="50px">:</th>
                    <td><?= $guru['nama_guru']; ?></td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <th>:</th>
                    <td><?= $guru['nip']; ?></td>
                </tr>
                <tr>
                    <th>E-Mail</th>
                    <th>:</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>TTL</th>
                    <th>:</th>
                    <td><?= $guru['ttl']; ?></td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>