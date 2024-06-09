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
                  <?php if ($this->session->userdata('jabatan') == 'anggota'): ?>
                    <a class="btn btn-primary float-right" href="<?php echo site_url('saham/add'); ?>">Add</a>
                  <?php endif; ?>

                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Saham</th>
                    <th>Nama</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($saham as $s) { ?>
                    <tr>
                      <td><?php echo $s['kode_saham']; ?></td>
                      <td><?php echo $s['nama']; ?></td>
                      <td><?php echo $s['jumlah']; ?></td>
                      <td>
                        <?php
                        if ($s['status_pembayaran_saham'] == 'diproses') {
                          $color = 'warning';
                        } elseif ($s['status_pembayaran_saham'] == 'ditolak') {
                          $color = 'danger';
                        } else {
                          $color = 'success';
                        }
                        ?>
                        <span class='badge bg-<?php echo $color; ?>'><?php echo $s['status_pembayaran_saham']; ?></span>
                      </td>
                      <td>

                        <button type="button" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-lg-<?php echo $s['kode_saham'] ?>"><i class="fas fa-pencil-alt"></i>
                          Manage
                        </button>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-lg-<?php echo $s['kode_saham'] ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Large Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php echo form_open('saham/update/' . $s['kode_saham']); ?>
                            <input type="hidden" name="kode_saham" value="<?php echo $s['kode_saham'] ?>">
                            <div class="form-group">
                              <label for="jumlah">Jumlah yang dibayarkan</label>
                              <input type="number" class="form-control" placeholder="0"
                                value="<?php echo $s['jumlah']; ?>" name="jumlah" readonly>
                            </div>
                            <div class="form-group">
                              <label for="bukti">Bukti Pembayaran</label><br>
                              <img id="preview"
                                src="<?php echo base_url('assets/uploads/saham/' . $s['bukti_pembayaran_saham']); ?>"
                                alt="Preview" style="max-width: 200px; max-height: 200px;">
                              <!-- <a href="<?php //echo base_url('assets/uploads/saham/' . $s['bukti_pembayaran_saham']); ?>"
                                target="_blank">
                                <img class="preview-image"
                                  src="<?php //echo base_url('assets/uploads/saham/' . $s['bukti_pembayaran_saham']); ?>"
                                  alt="Preview" style="max-width: 200px; max-height: 200px;">
                              </a> -->
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Status</label>
                              <select name="status_pembayaran_saham" class="form-control select2" style="width: 100%;">
                                <option value="diproses" <?php echo ($s['status_pembayaran_saham'] == 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="ditolak" <?php echo ($s['status_pembayaran_saham'] == 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                                <option value="diterima" <?php echo ($s['status_pembayaran_saham'] == 'diterima') ? 'selected' : ''; ?>>Diterima</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Textarea</label>
                              <textarea name="keterangan_pembayaran_saham" class="form-control" rows="3"
                                placeholder="Masukkan keterangan..."><?php echo $s['keterangan_pembayaran_saham']; ?></textarea>
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
                    <th>Kode Saham</th>
                    <th>Nama</th>
                    <th>Jumlah Pembayaran</th>
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