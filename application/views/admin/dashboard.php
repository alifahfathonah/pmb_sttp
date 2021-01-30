<?php $this->load->view('admin/templates/header.php') ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $tahun['tahun']; ?>/<span style="font-weight: normal; font-size: 20px" ><?php echo $tahun['tahun']+1; ?></span></h3>

            <p>Tahun Ajar</p>
          </div>
          <div class="icon">
            <i class="ion ion-calendar"></i>
          </div>
          <a href="<?php echo site_url('adminku/ta') ?>" class="small-box-footer"><i class="fas fa-calendar"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo count($pendaftaran) ?><sup style="font-size: 20px">siswa</sup></h3>

            <p>Pendaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo site_url('adminku/pendaftaran') ?>" class="small-box-footer"><i class="ion ion-person-add"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= count($jurusan) ?></h3>

            <p>Jurusan</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-left"></i>
          </div>
          <a href="<?php echo site_url('adminku/jurusan') ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= count($users) ?></h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="<?php echo site_url('adminku/user') ?>" class="small-box-footer"><i class="fas fa-user"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <?php foreach ($jurusan as $value):?>
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php $tot=0; foreach ($pendaftaran as $v) {
                if ($v->pil==$value->id_jur) {
                  $tot+=1;
                }
              } echo $tot?><span style="font-weight: normal; font-size: 20px" > Orang</span></h3>

              <p>Pendaftar Jurusan <?php echo $value->nm_jur; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo site_url('adminku/ta') ?>" class="small-box-footer"><i class="fas fa-person"></i></a>
          </div>
        <?php endforeach ?>

      </div>
      <section class="col-lg-7 connectedSortable ui-sortable">
        <div class="card">
          <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Jumlah Pendaftar per Tahun
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <canvas id="chLine" height="300" style="height: 300px; display: block; width: 900px;" width="900" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor" width="0"></canvas>
            </div>
          </div>
        </div><!-- /.card-body -->
      </div>
    </section>


  </div>   
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
  /* chart.js chart examples */

// chart colors
var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

/* large line chart */
var chLine = document.getElementById("chLine");
var chartData = {
  labels: [<?php foreach ($allTahun as $value) {
    echo "'".$value->tahun."',";
  } ?>],
  datasets: [
  {
    data: [
    <?php foreach ($allTahun as $value) {
      $tot=0; 
      foreach ($calon as $v) {
        if ($v->ta==$value->tahun) {
          $tot+=1;
        }
      };
      echo "'".$tot."',";
    } ?>
    ],
    backgroundColor: colors[3],
    borderColor: colors[1],
    borderWidth: 4,
    pointBackgroundColor: colors[1]
  }]
};

if (chLine) {
  new Chart(chLine, {
    type: 'line',
    data: chartData,
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  });
}
</script>
<?php $this->load->view('admin/templates/footer.php') ?>