<?php $this->load->view('admin/templates/header.php') ?>
<?php if ($this->session->flashdata('message')!=null):?>
  <div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="mr-auto">Sukses</strong>
        <small></small>
        <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="toast-body"><?php echo $this->session->flashdata('message'); ?></div>
    </div>
  </div>
<?php endif ?>
<?php if ($this->session->flashdata('errPE')!=null):?>
  <div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="mr-auto"><?php echo $this->session->flashdata('errPE'); ?></strong>
        <small></small>
        <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="toast-body"><?php echo $this->session->flashdata('message'); ?></div>
    </div>
  </div>
<?php endif ?>
<section class="content">

  <!-- Default box -->
  <div class="card <?php echo $this->session->flashdata('error')==null ? 'collapsed-card':'' ?>">
    <div class="card-header">
      <h3 class="card-title">Tambah Pendaftaran</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo site_url('adminku/pendaftaran/post') ?>" method='post' enctype="multipart/form-data" >
          <div class="card-body">
            <?php if ($this->session->flashdata('error')!=null):?>
              <div class="alert alert-danger">
                <?php print_r($this->session->flashdata('error')); ?>
              </div>
            <?php endif; ?>
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
                  <label for="jrs_skl">Jurusan Sekolah</label>
                  <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['jrs_skl']:'' ?>" name="jrs_skl" id="jrs_skl" placeholder="Jurusan Sekolah">
                </div>

                <div class="form-group">
                  <label for="pil">Pilihan Jurusan</label>
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
                <!-- </form> -->
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pendaftar</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <div class="card-body">
              <table id="tableDaftar" class="table table-bordered table-striped">
                <thead>
                  <th>No Daftar</th>
                  <th>Nama Lengkap</th>
                  <th>NISN</th>
                  <th>Pilihan Jurusan</th>
                  <th>Actions</th>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo site_url('adminku/pendaftaran/excell') ?>" class="btn btn-primary">Export Excell</a>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
        <!-- modal -->

        <div class="modal fade" id="modal-detail">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modalDataDetail">
                <!-- <p>One fine body&hellip;</p> -->
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- endmodal -->
        <!-- modal -->

        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modalDataEdit">
                <!-- <p>One fine body&hellip;</p> -->
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- endmodal -->
        <script>
          var tabel=null;
          $(document).ready(function() {
            tabel=$('#tableDaftar').DataTable({
              "ajax": {
                url : "<?php echo site_url("adminku/pendaftaran/getAll")?>",
                type : 'GET'
              },
            });
          });
          function detail(id){
            let data={
              src:id
            };
            $.ajax({
              url: "<?php echo site_url('daftar/cek') ?>",
              type:'post',
              data:data,
              success: function(result){
                $("#modalDataDetail").html(result);
              }
            });
          };
          function edit(id){
            let data={
              id:id,
            }
            $.ajax({
              url: "<?php echo site_url('adminku/pendaftaran/edit') ?>",
              type:'post',
              data:data,
              success: function(result){
                $("#modalDataEdit").html(result);
              }
            });
          };
          function hapus(id){
            var confirm=window.confirm('Yakin?');
            if (confirm) {
              let data={
                id:id,
              };
              $.ajax({
                url: "<?php echo site_url('adminku/pendaftaran/hapus') ?>",
                type:'post',
                data:data,
                beforeSend:function(){
                  $('#hps'+id).html('Processing <i class="fas fa-sync-alt fa-spin" ></i>');
                },
                success: function(result){
                  tabel.ajax.reload()
                }
              });
            }
          }
        </script>
        <?php $this->load->view('admin/templates/footer.php') ?>