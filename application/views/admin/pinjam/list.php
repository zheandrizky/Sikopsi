<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <div class="col-md-6 text-right">
                  <!-- <a class="btn btn-primary float-right" href="<?php //echo site_url('pinjam/add'); ?>">Add</a> -->
                  <?php if ($this->session->userdata('jabatan') == 'anggota'): ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-add">
                      Add
                    </button>
                  <?php endif; ?>

                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-lg-add">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart('pinjam/add'); ?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="jumlah">Jumlah yang diajukan</label>
                      <input type="number" class="form-control" placeholder="0" name="jumlah" required>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                  </div>
                  <?php echo form_close(); ?>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Pinjam</th>
                    <th>Nama</th>
                    <th>Jumlah Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pinjam as $t) { ?>
                    <tr>
                      <td><?php echo $t['kode_pinjam']; ?></td>
                      <td><?php echo $t['nama']; ?></td>
                      <td><?php echo $t['jumlah_pinjam']; ?></td>
                      <td>
                        <?php
                        if ($t['status_pengajuan_pinjam'] == 'diproses') {
                          $color = 'warning';
                        } elseif ($t['status_pengajuan_pinjam'] == 'ditolak') {
                          $color = 'danger';
                        } else {
                          $color = 'success';
                        }
                        ?>
                        <span class='badge bg-<?php echo $color; ?>'><?php echo $t['status_pengajuan_pinjam']; ?></span>
                      </td>
                      <td>

                        <button type="button" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-lg-<?php echo $t['kode_pinjam'] ?>"><i class="fas fa-pencil-alt"></i>
                          Manage
                        </button>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-lg-<?php echo $t['kode_pinjam'] ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Large Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php echo form_open('pinjam/update/' . $t['kode_pinjam']); ?>
                            <input type="hidden" name="kode_pinjam" value="<?php echo $t['kode_pinjam'] ?>">
                            <div class="form-group">
                              <label for="jumlah_pinjam">Jumlah yang dibayarkan</label>
                              <input type="number" class="form-control" placeholder="0"
                                value="<?php echo $t['jumlah_pinjam']; ?>" name="jumlah_pinjam" readonly>
                            </div>
                            <div class="form-group">
                            <label for="bukti_pembayaran">Upload Bukti</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="bukti_pembayaran"
                                        required onchange="previewImage()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <img id="preview" src="#" alt="Preview"
                                style="max-width: 200px; max-height: 200px; display: none;">
                            <div class="form-group col-sm-6">
                              <label>Status</label>
                              <select name="status_pengajuan_pinjam" class="form-control select2" style="width: 100%;">
                                <option value="diproses" <?php echo ($t['status_pengajuan_pinjam'] == 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="ditolak" <?php echo ($t['status_pengajuan_pinjam'] == 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                                <option value="diterima" <?php echo ($t['status_pengajuan_pinjam'] == 'diterima') ? 'selected' : ''; ?>>Diterima</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Textarea</label>
                              <textarea name="keterangan_pengajuan_saham" class="form-control" rows="3"
                                placeholder="Masukkan keterangan..."><?php echo $t['keterangan_pengajuan_pinjam']; ?></textarea>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                  <?php } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Kode Pinjam</th>
                    <th>Nama</th>
                    <th>Jumlah Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>