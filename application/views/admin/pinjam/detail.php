<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengembalian</h1>
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
                  <h3 class="card-title">Daftar Pembayaran Pengembalian</h3>
                </div>
                <div class="col-md-6 text-right">
                  <?php if ($this->session->userdata('jabatan') == 'anggota' && $bukti_peminjaman != null): ?>
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
                    <h4 class="modal-title">Pembayaran Pengembalian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php echo form_open_multipart('pengembalian/add'); ?>
                  <div class="modal-body">
                    <input type="hidden" value="<?php echo $kode_pinjam ?>" name="kode_pinjam">
                    <div class="form-group">
                      <label for="jumlah">Jumlah yang diajukan</label>
                      <input type="number" class="form-control" placeholder="0" name="jumlah_pengembalian"
                        max="<?php echo ($jumlah_pinjam + $bunga_pinjaman) - $total_pengembalian ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="bukti_pembayaran">Bukti Pembayaran</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="bukti_pembayaran" required
                          onchange="previewImage()">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
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
              <div class="row mb-3">
                <div class="col-md-3">
                  <strong>Kode Pinjam:</strong> <?php echo $kode_pinjam; ?>
                </div>
                <div class="col-md-3">
                  <strong>Jumlah Pinjam:</strong> <?php echo idrFormat($jumlah_pinjam); ?>
                </div>
                <div class="col-md-3">
                  <strong>Bunga Pinjaman:</strong> <?php echo idrFormat($bunga_pinjaman); ?>
                </div>
                <div class="col-md-3">
                  <strong>Jatuh Tempo:</strong> <?php echo $jatuh_tempo; ?>
                </div>
                <div class="col-md-3">
                  <strong>Jumlah Pengembalian:</strong>
                  <?php echo $total_pengembalian !== null ? idrFormat($total_pengembalian) : '0'; ?>
                </div>
                <div class="col-md-12">
                  <strong>Bukti Peminjaman:</strong>
                  <?php if ($bukti_peminjaman != null): ?>
                    <a href="<?php echo base_url('assets/uploads/pinjam/' . $bukti_peminjaman); ?>" target="_blank">Lihat
                      Full Gambar</a>
                  <?php endif ?>
                </div>
                <div class="col-md-12">
                  <strong>Keterangan:</strong> <?php echo $keterangan_pengajuan_pinjam; ?>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Pinjam</th>
                    <th>Jumlah Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengembalian as $p) { ?>
                    <tr>
                      <td><?php echo $p['kode_pengembalian']; ?></td>
                      <td><?php echo idrFormat($p['jumlah_pengembalian']); ?></td>
                      <td>
                        <?php
                        if ($p['status_pembayaran_pengembalian'] == 'diproses') {
                          $color = 'warning';
                        } elseif ($p['status_pembayaran_pengembalian'] == 'ditolak') {
                          $color = 'danger';
                        } else {
                          $color = 'success';
                        }
                        ?>
                        <span
                          class='badge bg-<?php echo $color; ?>'><?php echo $p['status_pembayaran_pengembalian']; ?></span>
                      </td>
                      <td>
                        <?php if ($this->session->userdata('jabatan') == 'pengurus') { ?>
                          <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#modal-lg-<?php echo $p['kode_pengembalian'] ?>"><i class="fas fa-pencil-alt"></i>
                            Manage
                          </button>
                        <?php } else { ?>
                          <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-lg-<?php echo $p['kode_pengembalian'] ?>"><i class="fas fa-eye"></i> Detail
                          </button>
                        <?php } ?>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-lg-<?php echo $p['kode_pengembalian'] ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Pengembalian</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php echo form_open('pengembalian/update/'. $p['kode_pengembalian']); ?>
                            <input type="hidden" name="kode_pengembalian" value="<?php echo $p['kode_pengembalian'] ?>">
                            <input type="hidden" name="kode_pinjam" value="<?php echo $p['kode_pinjam'] ?>">
                            <div class="form-group">
                              <label for="jumlah_pengembalian">Jumlah yang dibayarkan</label>
                              <input type="number" class="form-control" placeholder="0"
                                value="<?php echo $p['jumlah_pengembalian']; ?>" name="jumlah_pengembalian" readonly>
                            </div>
                            <div class="form-group">
                              <label for="bukti_pembayaran">Bukti Pengembalian</label><br>
                              <img id="preview"
                                src="<?php echo base_url('assets/uploads/pengembalian/' . $p['bukti_pengembalian']); ?>"
                                alt="Preview" style="max-width: 200px; max-height: 200px;"><br>
                              <a href="<?php echo base_url('assets/uploads/pengembalian/' . $p['bukti_pengembalian']); ?>"
                                target="_blank">Lihat Full Gambar</a>
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Status</label>
                              <select id="status-<?php echo $p['kode_pengembalian'] ?>" name="status_pembayaran_pengembalian"
                                class="form-control select2" style="width: 100%;" onchange="ubahKeterangan(this)" <?php echo ($this->session->userdata('jabatan') != 'pengurus') ? 'disabled' : ''; ?>>
                                <option value="diproses" <?php echo ($p['status_pembayaran_pengembalian'] == 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="ditolak" <?php echo ($p['status_pembayaran_pengembalian'] == 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                                <option value="diterima" <?php echo ($p['status_pembayaran_pengembalian'] == 'diterima') ? 'selected' : ''; ?>>Diterima</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Keterangan</label>
                              <textarea id="keterangan-<?php echo $p['kode_pengembalian'] ?>" name="keterangan_pembayaran_pengembalian"
                                class="form-control" rows="3" placeholder="Masukkan keterangan..." <?php echo ($this->session->userdata('jabatan') != 'pengurus') ? 'readonly' : ''; ?>><?php echo $p['keterangan_pembayaran_pengembalian']; ?></textarea>
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