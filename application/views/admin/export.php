<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		th{
			text-align: center;
			/*border:solid;*/
		}
		td{
			border: solid 1px;
			vertical-align: middle;
			text-align: left;
		}
	</style>
</head>
<body>
	<?php 
	intval($tahun);
	$tahun1=$tahun+1;
	strval($tahun);
	strval($tahun1);
	$tahunFix=$tahun.'/'.$tahun1;
	?>
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data PendaftaranTahun".$tahun.".xls");
	?>
	<table >
		<tr>
			<td colspan="21" style="text-align: center;vertical-align: middle; border:none; " height="15" ><h3>Data Pendaftaran Mahasiswa Tahun <?php echo $tahunFix; ?></h3></td>
		</tr>
		<thead>
			<th style="border:solid;" >No</th>
			<th style="border:solid;" >No Daftar</th>
			<th style="border:solid;" >Nama Lengkap</th>
			<th style="border:solid;" >NISN</th>
			<th style="border:solid;" >NIK</th>
			<th style="border:solid;" >Tempat Lahir</th>
			<th style="border:solid;" >Tanggal Lahir</th>
			<th style="border:solid;" >Jenis Kelamin</th>
			<th style="border:solid;" >Agama</th>
			<th style="border:solid;" >Alamat</th>
			<th style="border:solid;" >Golongan Darah</th>
			<th style="border:solid;" >Warga Negara</th>
			<th style="border:solid;" >No Telepon</th>
			<th style="border:solid;" >Email</th>
			<th style="border:solid;" >Nama Orang Tua</th>
			<th style="border:solid;" >Telepon Orang Tua</th>
			<th style="border:solid;" >Pekerjaan Orang Tua</th>
			<th style="border:solid;" >Nama Sekolah</th>
			<th style="border:solid;" >Alamat Sekolah</th>
			<th style="border:solid;" >Pilihan Program Studi</th>
		</thead>
		<tbody>
			<?php $no=1; foreach ($calon as $value) :?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $value->no_daftar; ?></td>
				<td><?php echo $value->nm_lkp; ?></td>
				<td><?php echo $value->nisn; ?></td>
				<td><?php echo $value->nik; ?></td>
				<td><?php echo $value->tmp_lhr; ?></td>
				<td><?php echo $value->tgl_lhr; ?></td>
				<td><?php echo $value->jns_klm; ?></td>
				<td><?php echo $value->agm; ?></td>
				<td><?php echo $value->alm_lkp; ?></td>
				<td><?php echo $value->gol_drh; ?></td>
				<td><?php echo $value->wrg_ngr; ?></td>
				<td><?php echo $value->no_telp; ?></td>
				<td><?php echo $value->alm_eml; ?></td>
				<td><?php echo $value->nm_ortu; ?></td>
				<td><?php echo $value->telp_ortu; ?></td>
				<td><?php echo $value->pkrj_ortu; ?></td>
				<td><?php echo $value->nm_skl; ?></td>
				<td><?php echo $value->alm_skl; ?></td>
				<td><?php
				foreach ($jur as $v) {
					if ($v->id_jur==$value->pil) {
						echo $v->nm_jur;
					}
				}
				?></td>
			</tr>
			<?php $no+=1; endforeach ?>
		</tbody>
	</table>
</body>
</html>