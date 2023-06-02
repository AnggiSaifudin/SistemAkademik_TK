
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
                        <label class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                        <div class="col-10 input-group">
                            <select name="ta" id="ta" class="form-control">
                                <option value="">Pilih Tahun Pelajaran</option>
                                <?php for($i = date('Y'); $i>= date('Y')-10; $i--) { 
                            $tahun_awal = $i-1;
                            $tahun_akhir = $i;
                            $tahun = $tahun_awal .'/'.$tahun_akhir; ?>
<option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Semester</label>
                        <div class="col-10 input-group">
                            <select name="semester" id="semester" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Aspek Perkembangan :</label>
                        <div class="col-10 input-group">
                            <select name="mapel" id="mapel" class="form-control">
                                <option value="">Pilih Aspek Perkembangan</option>
                                <option value="sosial dan emosi">Sosial dan Emosi</option>
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
                        <input type="text" name="tgl_nilai" class="form-control" id="tgl_nilai" placeholder="yyyy-mm-dd">
                        </div>
                    </div>

                    <span class="input-group-append">
                        <button onclick="ViewTabelLaporan()" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-produk">
                            <i class="fas fa-file-alt"></i> view Laporan
                        </button>
                        <!-- <button onclick="Printlaporan()" class="btn btn-success btn-flat">
                            <i class="fas fa-print"></i> Print Laporan
                        </button> -->
                        <button onclick="Printpdf()" class="btn btn-success btn-flat">
                        <i class="fa-solid fa-file-pdf"></i> Ekspor PDF
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

    <!-- link datepicker  -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Javascript Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js">
    </script>
    <!-- Javascript Bootstrap Datepicker -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>
<script type="text/javascript">
        $('#tgl_nilai').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
    </script>
<!-- end link datepicker  -->

<script>
    function ViewTabelLaporan() {
        let semester = $('#semester').val();
        let ta = $('#ta').val();
        let tgl_nilai = $('#tgl_nilai').val();
        let mapel = $('#mapel').val();
        let nama_kelas = $('#nama_kelas').val();

        if(ta == ""){
            swal("Tahun Pelajaran belum diisi");
        }else if (semester == "") {
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
                    semester: semester,
                    ta: ta,
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

    // function Printlaporan() {
    //     let semester = $('#semester').val();
    //     let ta = $('#ta').val();
    //     let tgl_nilai = $('#tgl_nilai').val();
    //     let mapel = $('#mapel').val();
    //     let nama_kelas = $('#nama_kelas').val();

    //     if(ta == ""){
    //         swal("Tahun Pelajaran belum diisi");
    //     }else if (semester == "") {
    //         swal("Semester belum diisi");
    //     }else if (mapel == "") {
    //         swal("Aspek Perkembangan belum diisi");
    //     } else if (nama_kelas == "") {
    //         swal("Kelas belum diisi");
    //     }else if(tgl_nilai == "") {
    //         swal("Tanggal belum diisi");
    //     }else {
    //         NewWin = window.open('<?= base_url('Laporan/Printlaporan') ?>/' + nama_kelas + "/" + mapel + "/" + tgl_nilai + "/" + semester + "/" + ta);
    //     }
    // }

    function Printpdf() {
        let semester = $('#semester').val();
        let ta = $('#ta').val();
        let tgl_nilai = $('#tgl_nilai').val();
        let mapel = $('#mapel').val();
        let nama_kelas = $('#nama_kelas').val();

        if(ta == ""){
            swal("Tahun Pelajaran belum diisi");
        }else if (semester == "") {
            swal("Semester belum diisi");
        }else if (mapel == "") {
            swal("Aspek Perkembangan belum diisi");
        } else if (nama_kelas == "") {
            swal("Kelas belum diisi");
        }else if(tgl_nilai == "") {
            swal("Tanggal belum diisi");
        }else {
            NewWin = window.open('<?= base_url('Laporan/Printpdf') ?>/' + nama_kelas + "/" + mapel + "/" + tgl_nilai + "/" + semester + "/" + ta);
        }
    }
</script>

