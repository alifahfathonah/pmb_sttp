<form action="<?php echo site_url('adminku/jurusan/update') ?>" method='post' enctype="multipart/form-data" >
  <input type="hidden" name="id_jur" value="<?php echo $calon['id_jur'] ?>" >
  <div class="card-body">
    <div class="form-group">
      <label for="nm_jur">Nama Jurusan</label>
      <input  required type="text" class="form-control" value="<?php echo $calon['nm_jur'] ?>" name="nm_jur" id="nm_jur" placeholder="Nama Lengkap">
    </div>

    <div class="form-group">
      <label for="sym">Simbol</label>
      <input  required type="text" class="form-control" value="<?php echo $calon['sym'] ?>" name="sym" id="sym" placeholder="Simbol untuk no daftar">
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>