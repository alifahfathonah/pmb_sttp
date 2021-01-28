<!-- general form elements -->
<div style="padding: 50px;" class="card card-primary">
  <?php if ($calon!=null):?>
    <table  class="table">
      <tbody>
        <tr>
          <td>NO PENDAFTARAN ONLINE</td>
          <td><?php echo $calon['no_daftar']; ?></td>
        </tr>
        <tr>
          <td>NAMA CALON MAHASISWA</td>
          <td><?php echo $calon['nm_lkp']; ?></td>
        </tr>
        <tr>
          <td>NIK (NO. IDENTITAS KEPENDUDUKAN)</td>
          <td><?php echo $calon['nik']; ?></td>
        </tr>
        <tr>
          <td  >TEMPAT / TANGGAL LAHIR</td>
          <td>
            <?php
            $bulan=['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
            $getBulan=substr($calon['tgl_lhr'], 5, 2);
            $bulanFix=$bulan[intval($getBulan)-1];
            echo $calon['tmp_lhr'].', '.substr($calon['tgl_lhr'], -2).' '.$bulanFix.' '.substr($calon['tgl_lhr'], 0, 4);
            ?>
          </td>
        </tr>
        <tr>
          <td  >AGAMA</td>
          <td><?php echo ucfirst($calon['agm']); ?></td>
        </tr>
        <tr>
          <td  >ALAMAT CALON MAHASISWA</td>
          <td><?php echo $calon['alm_lkp']; ?></td>
        </tr>
        <tr>
          <td  >ASAL SEKOLAH</td>
          <td><?php echo $calon['nm_skl']; ?></td>
        </tr>
        <tr>
          <td  >NAMA ORANG TUA</td>
          <td><?php echo $calon['nm_ortu']; ?></td>
        </tr>
        <tr>
          <td  >PAKET PILIHAN JURUSAN</td>
          <td>
            <?php 
            foreach ($jur as $value) {
              if ($value->id_jur==$calon['pil']) {
                echo $value->nm_jur;
              }
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>NISN</td>
          <td><?php echo $calon['nisn']; ?></td>
        </tr>
        <tr>
          <td>JENIS KELAMIN</td>
          <td>
            <?php
            if ($calon['jns_klm']=='L') {
              echo "Laki-laki";
            }elseif ($calon['jns_klm']=='P') {
              echo "Perempuan";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>NO TELP/HP CALON MAHASISWA</td>
          <td><?php echo $calon['no_telp']; ?></td>
        </tr>
        <tr>
          <td>PEKERJAAN ORTU</td>
          <td><?php echo $calon['pkrj_ortu']; ?></td>
        </tr>
        <tr>
          <td>
            <br>
            <a href="<?php echo site_url('daftar/cetak/').$calon['no_daftar'] ?>" target="_blank" class="btn btn-primary" >Cetak Bukti Pendaftaran</a>
          </td>
        </tr>
      </tbody>
    </table>
    <?php else: ?>
      <h1>Tidak ada data</h1>
    <?php endif  ?>
  </div>