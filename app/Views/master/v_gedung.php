<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data <?= $title; ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
          <i class="fa-solid fa-plus"></i>
          <b>Add</b>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <?php

      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      }

      ?>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="50px">No</th>
            <th>Gedung</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($gedung as $key => $value) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['gedung']; ?></td>
              <td width="150px" class="text-center">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_gedung']; ?>">
                  <i class="fa-solid fa-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_gedung']; ?>">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


  <!-- modal tambah data -->
  <div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Gedung</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php

          echo form_open('gedung/add');

          ?>

          <div class="form-group">
            <label>gedung</label>
            <input name="gedung" class="form-control" placeholder="Gedung" required>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close()  ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.end modal tambah data-->

  <!-- modal edit -->
  <?php foreach ($gedung as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value['id_gedung']; ?>">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Gedung</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?php

            echo form_open('gedung/edit/' . $value['id_gedung']);

            ?>

            <div class="form-group">
              <label>Gedung</label>
              <input name="gedung" value="<?= $value['gedung']; ?>" class="form-control" placeholder="Gedung" required>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          <?php echo form_close()  ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal edit-->

  <?php } ?>

  <!-- modal delete-->
  <?php foreach ($gedung as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value['id_gedung']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Delete Gedung</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            apakah anda yakin ingin menghapus <b><?= $value['gedung']; ?>.?</b>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <a href="<?= base_url('gedung/delete/' . $value['id_gedung']); ?>" class="btn btn-success">Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.end modal delete-->

  <?php } ?>

</div>
<!-- /.col -->