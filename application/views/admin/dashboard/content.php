<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $saham_count; ?></h3>
              <p>Saham</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="<?php echo site_url('saham') ?>" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $tabungan_count; ?></h3>
              <p>Tabungan</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="<?php echo site_url('tabungan') ?>" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $pinjam_count; ?></h3>
              <p>Pinjam&Pengembalian</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-return-right"></i>
            </div>
            <a href="<?php echo site_url('pinjam') ?>" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php if ($this->session->userdata('jabatan') != 'anggota'): ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $user_count; ?></h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif ?>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 col-6">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                <?= date('Y'); ?>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Bar Chart -->
                <canvas id="bar_chart"></canvas>
              </div>
            </div><!-- /.card-body -->
          </div>
        </section>
        <section class="col-lg-6 col-6">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Total
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Doughnut Chart -->
                <canvas id="doughnut_chart"></canvas>
              </div>
            </div><!-- /.card-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Bar Chart
    let bar_chart = document.getElementById('bar_chart');
    new Chart(bar_chart, {
      type: 'bar',
      data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
          {
            label: 'Saham',
            data: <?= $saham_bar_chart ?>,
            borderWidth: 1,
            backgroundColor: '#9BD0F5'
          },
          {
            label: 'Tabungan',
            data: <?= $tabungan_bar_chart ?>,
            borderWidth: 1,
            backgroundColor: '#FFB1C1'
          },
          {
            label: 'Pinjam',
            data: <?= $pinjam_bar_chart ?>,
            borderWidth: 1,
            backgroundColor: '#A0F78D'
          },
          {
            label: 'Pengembalian',
            data: <?= $pengembalian_bar_chart ?>,
            borderWidth: 1,
            backgroundColor: '#F7D06F'
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Doughnut Chart
    let doughnut_chart = document.getElementById('doughnut_chart');
    new Chart(doughnut_chart, {
      type: 'doughnut',
      data: {
        labels: ['Saham', 'Tabungan', 'Pinjam', 'Pengembalian'],
        datasets: [{
          label: 'Total',
          data: <?= $doughnut_chart; ?>,
          backgroundColor: ['#9BD0F5', '#FFB1C1', '#A0F78D', '#F7D06F']
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>