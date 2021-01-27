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
      <h3 class="card-title">Tambah User</h3>

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
        <form action="<?php echo site_url('adminku/user/post') ?>" method='post' enctype="multipart/form-data" >
          <div class="card-body">
            <?php if ($this->session->flashdata('error')!=null):?>
              <div class="alert alert-danger">
                <?php print_r($this->session->flashdata('error')); ?>
              </div>
            <?php endif; ?>

            <div class="form-group">
              <label for="name_user">Username</label>
              <input required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['name_user'] :'' ?>" name="name_user" id="name_user" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="word_pass">Password</label>
              <input required type="text" class="form-control" value="<?php echo $this->session->flashdata('input') ? $this->session->flashdata('input')['word_pass'] :'' ?>" name="word_pass" id="word_pass" placeholder="Password">
            </div>

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
          <th>Username</th>
          <th>Password</th>
          <th>Actions</th>
        </thead>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
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
        url : "<?php echo site_url("adminku/user/getAll")?>",
        type : 'GET'
      }
    });
  });
  function edit(id){
    let data={
      id:id,
    }
    $.ajax({
      url: "<?php echo site_url('adminku/user/edit') ?>",
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
        url: "<?php echo site_url('adminku/user/hapus') ?>",
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