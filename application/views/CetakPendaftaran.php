<!DOCTYPE html>
<html>
<head>
	<title>Bukti Daftar</title>
	<style type="text/css">
		body{
			font-family: Arial, sans-serif;
			font-size: 16px;
		}
		table{
			border-collapse: collapse;
			width: 100%;
		}
		table.bordered td, table.bordered th{
			border: 1px solid #000;
			padding: 5px;
		}
	</style>
</head>
<body>
	<?php 
	$tahun=$calon['ta'];
	intval($tahun);
	$tahun1=$tahun+1;
	strval($tahun);
	strval($tahun1);
	$tahunFix=$tahun.'/'.$tahun1;
	?>
	<div style="text-align: center;" >
		<img src="<?= base_url('assets/head_cetak.jpg') ;?>" style="width: 90%; height: auto;">
		<!-- <hr style="margin-top: -10px; border: solid 2px;" > -->
		<hr style="margin-top: -5px;" >
		<p style="font-size: 16px;font-weight: bold;" >
			BUKTI PENDAFTARAN ONLINE CALON MAHASISWA BARU
			<br>
			TAHUN PELAJARAN <?php echo $tahunFix ?>
		</p>
	</div>
	<table style="font-size: 12px;" >
		<tr>
			<td style=" width:300px; padding-bottom: 10px;" >NO PENDAFTARAN ONLINE</td>
			<td style="padding-bottom: 10px;" ><?php echo $calon['no_daftar']; ?></td>
			<td rowspan="5" style=" width:300px; padding-bottom: 10px; text-align: center;" >
				<img width="150" style="margin-left: -45px;" src="<?php echo base_url('assets/qr/').$calon['no_daftar'].'.png'?>">
			</td>
		</tr>
		<tr>
			<td style=" width:300px; padding-bottom: 10px" >NAMA CALON MAHASISWA</td>
			<td style="padding-bottom: 10px" ><?php echo $calon['nm_lkp']; ?></td>
		</tr>
		<tr>
			<td style=" width:300px; padding-bottom: 10px;" >NISN</td>
			<td style="padding-bottom: 10px;" ><?php echo $calon['nisn']; ?></td>
		</tr>
		<tr>
			<td style=" width:300px; padding-bottom: 10px" >NIK (NO. IDENTITAS KEPENDUDUKAN)</td>
			<td style="padding-bottom: 10px" ><?php echo $calon['nik']; ?></td>
		</tr>
		<tr>
			<td style=" width:300px; padding-bottom: 10px;" >JENIS KELAMIN</td>
			<td style="padding-bottom: 10px;" >
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
			<td style=" width:300px; padding-bottom: 10px" >TEMPAT / TANGGAL LAHIR</td>
			<td style="padding-bottom: 10px" >
				<?php
				$bulan=['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
				$getBulan=substr($calon['tgl_lhr'], 5, 2);
				$bulanFix=$bulan[intval($getBulan)-1];
				echo $calon['tmp_lhr'].', '.substr($calon['tgl_lhr'], -2).' '.$bulanFix.' '.substr($calon['tgl_lhr'], 0, 4);
				?>
			</td>
		</tr>
		<tr>
			<td style=" width:300px; padding-bottom: 10px;" >NO TELP/HP CALON MAHASISWA</td>
			<td style="padding-bottom: 10px;" ><?php echo $calon['no_telp']; ?></td>
		</tr>
	</table>
	<br>
	<table style="margin-top: 25px; font-size: 12px;">
		<tbody>
			<tr>
				<td style=" width:300px; padding-bottom: 10px" >AGAMA</td>
				<td style="padding-bottom: 10px" ><?php echo ucfirst($calon['agm']); ?></td>
			</tr>
			<tr>
				<td style=" width:300px; padding-bottom: 10px" >ALAMAT CALON MAHASISWA</td>
				<td style="padding-bottom: 10px" ><?php echo $calon['alm_lkp']; ?></td>
			</tr>
			<tr>
				<td style=" width:300px; padding-bottom: 10px" >ASAL SEKOLAH</td>
				<td style="padding-bottom: 10px" ><?php echo $calon['nm_skl']; ?></td>
			</tr>
			<tr>
				<td style=" width:300px; padding-bottom: 10px" >NAMA ORANG TUA</td>
				<td style="padding-bottom: 10px" ><?php echo $calon['nm_ortu']; ?></td>
			</tr>
			<tr>
				<td style=" width:300px; padding-bottom: 10px;" >PEKERJAAN ORTU</td>
				<td style="padding-bottom: 10px;" ><?php echo $calon['pkrj_ortu']; ?></td>
			</tr>
			<tr>
				<td style=" width:300px; padding-bottom: 10px" >PAKET PILIHAN JURUSAN</td>
				<td style="padding-bottom: 10px" >
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
				<td style="vertical-align:middle;" >
					<div style="width:3cm; height: 4cm; border: solid 2px; text-align: center; line-height: 150px; "><p style="vertical-align: middle;" >Tempel foto 3x4</p></div>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table style="font-size: 12px;" >
		<tbody>
			<tr>
				<td style="text-align: center; " >
					<p>Mengetahui, <br>Orang Tua / Wali</p>
					<br><br><br>
					<p>(.................................)</p>
				</td>
				<td width="50%" style="text-align: center;">
					<p>Pati, <?php echo date('d').' ' ?><?php $bulan=['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; echo $bulan[intval(date('m'))-1].' '.date('Y'); ?><br>
					Calon Mahasiswa Baru</p>
					<br><br><br>	
					<p>(<?php echo $calon['nm_lkp']; ?>)</p>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>