<form action="<?php echo site_url('adminku/pendaftaran/update') ?>" method='post' enctype="multipart/form-data" >
  <input type="hidden" name="id_dftr" value="<?php echo $calon['id_dftr'] ?>" >
  <div class="card-body">
    <div class="form-group">
      <label for="nm_lkp">Nama Lengkap</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['nm_lkp'] ?>" name="nm_lkp" id="nm_lkp" placeholder="Nama Lengkap">
    </div>

    <div class="form-group">
      <label for="nisn">NISN</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['nisn'] ?>" name="nisn" id="nisn" placeholder="NISN">
    </div>

    <div class="form-group">
      <label for="nik">NIK</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['nik'] ?>" name="nik" id="nik" placeholder="NIK">
    </div>

    <div class="form-group">
      <label for="tmp_lhr">Tempat Lahir</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['tmp_lhr'] ?>" name="tmp_lhr" id="tmp_lhr" placeholder="Tempat Lahir">
    </div>

    <div class="form-group">
      <label for="tgl_lhr">Tanggal Lahir</label>
      <input style="text-transform:uppercase" required type="date" class="form-control" value="<?php echo $calon['tgl_lhr'] ?>" name="tgl_lhr" id="tgl_lhr" placeholder="Tanggal Lahir">
    </div>


    <div class="form-group">
      <label for="jns_klm">Jenis Kelamin</label>
      <select class="custom-select form-control" name="jns_klm" id="jns_klm">
        <option <?php echo $calon['jns_klm']=='L' ? 'selected':''; ?> value="L" >Laki-laki</option>
        <option <?php echo $calon['jns_klm']=='P' ? 'selected':''; ?> value="P" >Perempuan</option>
      </select>
    </div>

    <div class="form-group">
      <label for="agm">Agama</label>
      <select class="custom-select form-control" name="agm" id="agm">
        <option <?php echo $calon['agm']=='ISLAM' ? 'selected':''; ?> value="ISLAM" >ISLAM</option>
        <option <?php echo $calon['agm']=='KRISTEN' ? 'selected':''; ?> value="KRISTEN" >KRISTEN</option>
        <option <?php echo $calon['agm']=='KATHOLIK' ? 'selected':''; ?> value="KATHOLIK" >KATHOLIK</option>
        <option <?php echo $calon['agm']=='HINDU' ? 'selected':''; ?> value="HINDU" >HINDU</option>
        <option <?php echo $calon['agm']=='BUDHA' ? 'selected':''; ?> value="BUDHA" >BUDHA</option>
        <option <?php echo $calon['agm']=='KONGHUCU' ? 'selected':''; ?> value="KONGHUCU" >KONGHUCU</option>
      </select>
    </div>

    <div class="form-group">
      <label for="alm_lkp">Alamat Lengkap</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['alm_lkp'] ?>" name="alm_lkp" id="alm_lkp" placeholder="Alamat Lengkap">
    </div>

    <div class="form-group">
      <label for="gol_drh">Golongan Darah</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['gol_drh'] ?>" name="gol_drh" id="gol_drh" placeholder="Golongan Darah">
    </div>

    <div class="form-group">
      <label for="wrg_ngr">Warga Negara</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['wrg_ngr'] ?>" name="wrg_ngr" id="wrg_ngr" placeholder="Warga Negara">
    </div>

    <div class="form-group">
      <label for="no_telp">No Telepon</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['no_telp'] ?>" name="no_telp" id="no_telp" placeholder="No Telepon">
    </div>

    <div class="form-group">
      <label for="alm_eml">Alamat Email</label>
      <input required type="email" class="form-control" value="<?php echo $calon['alm_eml'] ?>" name="alm_eml" id="alm_eml" placeholder="Alamat Email">
    </div>

    <div class="form-group">
      <label for="nm_ortu">Nama Orang Tua</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['nm_ortu'] ?>" name="nm_ortu" id="nm_ortu" placeholder="Nama Orang Tua">
    </div>

    <div class="form-group">
      <label for="telp_ortu">Telepon Orang Tua</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['telp_ortu'] ?>" name="telp_ortu" id="telp_ortu" placeholder="Telepon Orang Tua">
    </div>

    <div class="form-group">
      <label for="pkrj_ortu">Pekerjaan Orang Tua</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['pkrj_ortu'] ?>" name="pkrj_ortu" id="pkrj_ortu" placeholder="Pekerjaan Orang Tua">
    </div>

    <div class="form-group">
      <label for="nm_skl">Nama Sekolah</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['nm_skl'] ?>" name="nm_skl" id="nm_skl" placeholder="Nama Sekolah">
    </div>

    <div class="form-group">
      <label for="alm_skl">Alamat Sekolah</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['alm_skl'] ?>" name="alm_skl" id="alm_skl" placeholder="Alamat Sekolah">
    </div>

    <div class="form-group">
      <label for="jrs_skl">Jurusan Sekolah</label>
      <input style="text-transform:uppercase" required type="text" class="form-control" value="<?php echo $calon['jrs_skl'] ?>" name="jrs_skl" id="jrs_skl" placeholder="Jurusan Sekolah">
    </div>

    <div class="form-group">
      <label for="pil">Pilihan Jurusan</label>
      <select class="custom-select form-control" name="pil" id="pil">
        <?php foreach ($jur as $value) :?>
          <option <?php echo $calon['pil']==$value->id_jur ? 'selected':''; ?> value="<?php echo $value->id_jur ?>" ><?php echo $value->nm_jur; ?></option>
        <?php endforeach ?>
      </select>
    </div>
<!-- 
    <div class="form-group">
      <label for="photo">Foto</label>
      <input name="photo" type="file" class="form-control" id="photo" placeholder="Foto">
      <br>
      <div class="input-group-prepend">
          <a href="<?= site_url('uploads/').$calon['photo'];?>" target="_blank" class="btn btn-outline-secondary" type="button">View Photo</a>
      </div>
    </div>
 -->
 <!--    <div class="form-check">
      <label class="form-check-label" for="exampleCheck1">
        <p>*Maksimal ukuran foto 900kb</p>
        <p>*Format file jpg</p>
      </label>
    </div>
  </div> -->
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>