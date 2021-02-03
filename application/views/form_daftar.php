<?php $this->load->view('templates/client_header') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Form Pendaftaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <?php if ($this->session->flashdata('error')!=null):?>
              <div class="alert alert-danger">
                <?php print_r($this->session->flashdata('error')); ?>
              </div>
            <?php endif; ?>
                <!-- <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo site_url('daftar/post') ?>" method='post' >
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nm_lkp">Nama Lengkap</label>
                      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['nm_lkp'] :'' ?>" name="nm_lkp" id="nm_lkp" placeholder="Nama Lengkap">
                    </div>

                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['nisn']:'' ?>" name="nisn" id="nisn" placeholder="NISN">
                    </div>

                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['nik']:'' ?>" name="nik" id="nik" placeholder="NIK">
                    </div>

                    <div class="form-group">
                      <label for="tmp_lhr">Tempat Lahir</label>
                      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['tmp_lhr']:'' ?>" name="tmp_lhr" id="tmp_lhr" placeholder="Tempat Lahir">
                    </div>

                    <div class="form-group">
                      <label for="tgl_lhr">Tanggal Lahir</label>
                      <input style="text-transform:uppercase" required type="date" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['tgl_lhr']:'' ?>" name="tgl_lhr" id="tgl_lhr" placeholder="Tanggal Lahir">
                    </div>


                    <div class="form-group">
                      <label for="jns_klm">Jenis Kelamin</label>
                      <select class="custom-select form-control" name="jns_klm" id="jns_klm">
                        <?php if ($this->session->flashdata('input')):?>
                          <option <?php echo $this->session->flashdata('input')['jns_klm']=='L' ? 'selected':''; ?> value="L" >Laki-laki</option>
                          <option <?php echo $this->session->flashdata('input')['jns_klm']=='P' ? 'selected':''; ?> value="P" >Perempuan</option>
                          <?php else: ?>
                            <option value="L" >Laki-laki</option>
                            <option value="P" >Perempuan</option>
                          <?php endif ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="agm">Agama</label>
                        <select class="custom-select form-control" name="agm" id="agm">
                          <?php if ($this->session->flashdata('input')): ?>
                            <option <?php echo $this->session->flashdata('input')['agm']=='ISLAM' ? 'selected':''; ?> value="ISLAM" >ISLAM</option>
                            <option <?php echo $this->session->flashdata('input')['agm']=='KRISTEN' ? 'selected':''; ?> value="KRISTEN" >KRISTEN</option>
                            <option <?php echo $this->session->flashdata('input')['agm']=='KATHOLIK' ? 'selected':''; ?> value="KATHOLIK" >KATHOLIK</option>
                            <option <?php echo $this->session->flashdata('input')['agm']=='HINDU' ? 'selected':''; ?> value="HINDU" >HINDU</option>
                            <option <?php echo $this->session->flashdata('input')['agm']=='BUDHA' ? 'selected':''; ?> value="BUDHA" >BUDHA</option>
                            <option <?php echo $this->session->flashdata('input')['agm']=='KONGHUCU' ? 'selected':''; ?> value="KONGHUCU" >KONGHUCU</option>
                            <?php else: ?>
                              <option value="ISLAM" >ISLAM</option>
                              <option value="KRISTEN" >KRISTEN</option>
                              <option value="KATHOLIK" >KATHOLIK</option>
                              <option value="HINDU" >HINDU</option>
                              <option value="BUDHA" >BUDHA</option>
                              <option value="KONGHUCU" >KONGHUCU</option>
                            <?php endif ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="alm_lkp">Alamat Lengkap</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['alm_lkp']:'' ?>" name="alm_lkp" id="alm_lkp" placeholder="Alamat Lengkap">
                        </div>

                        <div class="form-group">
                          <label for="gol_drh">Golongan Darah</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['gol_drh']:'' ?>" name="gol_drh" id="gol_drh" placeholder="Golongan Darah">
                        </div>

                        <div class="form-group">
                          <label for="wrg_ngr">Warga Negara</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['wrg_ngr']:'' ?>" name="wrg_ngr" id="wrg_ngr" placeholder="Warga Negara">
                        </div>

                        <div class="form-group">
                          <label for="no_telp">No Telepon</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['no_telp']:'' ?>" name="no_telp" id="no_telp" placeholder="No Telepon">
                        </div>

                        <div class="form-group">
                          <label for="alm_eml">Alamat Email</label>
                          <input required type="email" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['alm_eml']:'' ?>" name="alm_eml" id="alm_eml" placeholder="Alamat Email">
                        </div>

                        <div class="form-group">
                          <label for="nm_ortu">Nama Orang Tua</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['nm_ortu']:'' ?>" name="nm_ortu" id="nm_ortu" placeholder="Nama Orang Tua">
                        </div>

                        <div class="form-group">
                          <label for="telp_ortu">Telepon Orang Tua</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['telp_ortu']:'' ?>" name="telp_ortu" id="telp_ortu" placeholder="Telepon Orang Tua">
                        </div>

                        <div class="form-group">
                          <label for="pkrj_ortu">Pekerjaan Orang Tua</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['pkrj_ortu']:'' ?>" name="pkrj_ortu" id="pkrj_ortu" placeholder="Pekerjaan Orang Tua">
                        </div>

                        <div class="form-group">
                          <label for="nm_skl">Nama Sekolah</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['nm_skl']:'' ?>" name="nm_skl" id="nm_skl" placeholder="Nama Sekolah">
                        </div>

                        <div class="form-group">
                          <label for="alm_skl">Alamat Sekolah</label>
                          <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['alm_skl']:'' ?>" name="alm_skl" id="alm_skl" placeholder="Alamat Sekolah">
                        </div>

                        <div class="form-group">
                          <label for="pil">Pilihan Program Studi</label>
                          <select class="custom-select form-control" name="pil" id="pil">
                            <?php if ($this->session->flashdata('input')):?>
                              <?php foreach ($jur as $value) :?>
                                <option <?php echo $this->session->flashdata('input')['pil']==$value->id_jur ? 'selected':''; ?> value="<?php echo $value->id_jur ?>" ><?php echo $value->nm_jur; ?></option>
                              <?php endforeach ?>
                              <?php else: ?>
                                <?php foreach ($jur as $value) :?>
                                  <option value="<?php echo $value->id_jur ?>" ><?php echo $value->nm_jur; ?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                            </select>
                          </div>

                          <div class="g-recaptcha" data-sitekey="6LcrSkgaAAAAAJQ4G7Y4MKkN5Zb5FtxONcgoOuvP"></div>  
                          <!--                data-sitekey silahkan disesuaikan dengan key yang anda dapat dari google  -->

                    <!-- <div class="form-group">
                      <label for="photo">Foto</label>
                      <input name="photo" type="file" required class="form-control" id="photo" placeholder="Foto">
                    </div>

                    <div class="form-check">
                      <label class="form-check-label" for="exampleCheck1">
                        <p>*Maksimal ukuran foto 900kb</p>
                        <p>*Format file jpg</p>
                      </label>
                    </div> -->
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              <!-- sini -->

              <!-- /.card -->

            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('templates/client_footer') ?>