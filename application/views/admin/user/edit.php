<form action="<?php echo site_url('adminku/user/update') ?>" method='post' enctype="multipart/form-data" >
  <input type="hidden" name="id_user" value="<?php echo $calon['id_user'] ?>" >
  <div class="card-body">
    <div class="form-group">
      <label for="name_user">Username</label>
      <input  required type="text" class="form-control" value="<?php echo $calon['name_user'] ?>" name="name_user" id="name_user" placeholder="Username">
    </div>

    <div class="form-group">
      <label for="word_pass">Password</label>
      <input  required type="text" class="form-control" value="<?php echo $calon['word_pass'] ?>" name="word_pass" id="word_pass" placeholder="Simbol untuk no daftar">
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>