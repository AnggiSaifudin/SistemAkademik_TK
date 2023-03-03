<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $title; ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <!-- form -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Smt :</label>
                        <div class="col-10 input-group">
                            <select name="smt" id="smt" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Aspek Perkembangan :</label>
                        <div class="col-10 input-group">
                            <select name="mapel" id="mapel" class="form-control">
                                <option value="">Pilih Aspek Perkembangan</option>
                                <option value="sosial dan emosi">SOSIAL DAN EMOSI</option>
                                <option value="kognitif">Kognitif</option>
                                <option value="agama dan moral">Agama dan Moral</option>
                                <option value="bahasa">Bahasa</option>
                                <option value="fisik motorik">Fisik Motorik</option>
                                <option value="seni">Seni</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kelas :</label>
                        <div class="col-10 input-group">
                            <select name="nama_kelas" id="nama_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['nama_kelas']; ?>"><?= $value['nama_kelas']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal :</label>
                        <div class="col-10 input-group">
                        <input type="date" name="tgl_nilai" class="form-control" id="tgl_nilai">
                        </div>
                    </div>

                    <span class="input-group-append">
                        <button onclick="ViewTabelLaporan()" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-produk">
                            <i class="fas fa-file-alt"></i> view Laporan
                        </button>
                        <button onclick="Printlaporan()" class="btn btn-success btn-flat">
                            <i class="fas fa-print"></i> Print Laporan
                        </button>
                    </span>
                </div>

                <div class="col-sm-12">
                    <hr>
                    <div class="tabel">

                    </div>
                </div>

            </div>
            <!-- form akhir -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>
    function ViewTabelLaporan() {
        let smt = $('#smt').val();
        let tgl_nilai = $('#tgl_nilai').val();
        let mapel = $('#mapel').val();
        let nama_kelas = $('#nama_kelas').val();

        if (smt == "") {
            swal("Semester belum diisi");
        }else if (mapel == "") {
            swal("Aspek Perkembangan belum diisi");
        } else if (nama_kelas == "") {
            swal("Kelas belum diisi");
        }else if(tgl_nilai == "") {
            swal("Tanggal belum diisi");
        }else {

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/Viewlaporan') ?>",
                data: {
                    smt: smt,
                    mapel: mapel,
                    nama_kelas: nama_kelas,
                    tgl_nilai:tgl_nilai,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.tabel').html(response.data)
                    }
                }

            });
    }

    }

    function Printlaporan() {
        let smt = $('#smt').val();
        let tgl_nilai = $('#tgl_nilai').val();
        let mapel = $('#mapel').val();
        let nama_kelas = $('#nama_kelas').val();

        if (smt == "") {
            swal("Semester belum diisi");
        }else if (mapel == "") {
            swal("Aspek Perkembangan belum diisi");
        } else if (nama_kelas == "") {
            swal("Kelas belum diisi");
        }else if(tgl_nilai == "") {
            swal("Tanggal belum diisi");
        }else {
            NewWin = window.open('<?= base_url('Laporan/Printlaporan') ?>/' + smt +"/" + nama_kelas + "/" + mapel + "/" + tgl_nilai);
        }
    }
</script>

<!-- else if (ta == "") {
            swal("Tahun Akademik belum diisi");
        }  -->