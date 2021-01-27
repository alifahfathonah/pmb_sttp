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
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
<?php $this->load->view('admin/templates/footer.php') ?>