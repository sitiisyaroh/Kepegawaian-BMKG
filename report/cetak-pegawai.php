<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip'];

	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK RIWAYAT HIDUP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<center>
			<?php
			}

			$sql_tampil = "select * from tb_pegawai where nip='$nip'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>	

	<img class="absolute" src="../foto/<?php echo $data['foto']; ?>" style="width:75px; height:100px;float:right;" />
		<h4>
		<center>
			<br>
			<br>
			DAFTAR RIWAYAT HIDUP 
			<br>
			<br>
			<br>
		</center>
		</h4>
	<h5>I. KETERANGAN PERORANGAN</h5>

	<table border="1" rowspan="2" cellpadding="2" style="border-collapse: collapse; border: none;">
		<tbody>
			<tr>
				<td style="width: 190px;">NIP</td>

				<td style="width: 450px;">
					<?php echo $data['nip']; ?>
				</td>

			</tr>
			<tr>
				<td>Nama</td>

				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>

				<td>
					<?php echo $data['jenis_kelamin']; ?>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>

				<td>
					<?php echo $data['tempat_lahir']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>

				<td>
					<?php echo date('d-m-Y', strtotime( $data['date'])); ?>
				</td>
			</tr>
			<tr>
				<td>Agama</td>

				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>
			<tr>
				<td>Email</td>

				<td>
					<?php echo $data['email']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>

				<td>
					<?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td>No HP</td>

				<td>
					<?php echo $data['no_hp']; ?>
				</td>
			</tr>
			<tr>
				<td>Bagian</td>

				<td>
					<?php echo $data['status']; ?>
				</td>
			</tr>

			<tr>
				<td>Golongan</td>

				<td>
					<?php echo $data['golongan']; ?>
				</td>
			</tr>

			<?php } ?>
		</tbody>
	</table>

	<h5>II. PENDIDIKAN</h5>

	<a>1. Pendidikan Formal</a> <br>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
		<thead>
			<tr>
				<th style="width: 10px;">No</th>
				<th style="width: 80px;">Tingkat</th>
				<th style="width: 150px;">Nama</th>
				<th style="width: 80px;">Jurusan</th>
				<th style="width: 70px;">Tahun Tanda Lulus Ijazah</th>
				<th style="width: 50px;">Tempat</th>
				<th style="width: 150px;">Nama Kepala Sekolah/ Direktur/ Dekan/ Promotor</th>
			</tr>
			
		</thead>
		
		<tbody>
		<?php
			$sql_tampil = "select * from tb_pendidikan where nip='$nip'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
			<tr>
				<td>
				<?php echo $no++; ?>
				</td>
				<td>
				<?php echo $data_cek['tingkat']; ?>
				</td>
				<td>
				<?php echo $data_cek['nama_sekolah']; ?>
				</td>
				<td>
				<?php echo $data_cek['jurusan']; ?>
				</td>
				<td>
				<?php echo $data_cek['tahun_lulus']; ?>
				</td>
				<td>
				<?php echo $data_cek['kota']; ?>
				</td>
				<td>
				<?php echo $data_cek['nama_kepala']; ?>
				</td>
			</tr>
			<?php } ?>
			
		</tbody>
	</table>

	<br>
	<a>2. Kursus/ Latihan</a> <br>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
		<thead>
			<tr>
				<th rowspan="2" style="width: 10px;">No</th>
				<th rowspan="2" style="width: 80px;">Nama Kursus/ Latihan</th>
				<th colspan="2" style="width: 160px;">Lamanya</th>
				<th rowspan="2" style="width: 120px;">Tanda Lulus/ Ijazah</th>
				<th rowspan="2" style="width: 80px;">Tempat</th>
				<th rowspan="2" style="width: 150px;">Keterangan</th>
			</tr>
			<tr>				
				<th style="width: 80px;">Tanggal Mulai</th>
				<th style="width: 80px;">Tanggal Selesai</th>
			</tr>
			
		</thead>
		
		<tbody>
		<?php
			$sql_tampil = "select * from tb_diklat where nip='$nip'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
			<tr>
				<td>
				<?php echo $no++; ?>
				</td>
				<td>
				<?php echo $data_cek['kursus']; ?>
				</td>
				<td>
				<?php echo date('d-m-Y', strtotime($data_cek['mulai'])); ?>
				</td>
				<td>
				<?php echo date('d-m-Y', strtotime($data_cek['selesai'])); ?>
				</td>
				<td>
				<?php echo $data_cek['filename']; ?>
				</td>
				<td>
				<?php echo $data_cek['tempat']; ?>
				</td>
				<td>
				<?php echo $data_cek['keterangan']; ?>
				</td>
			</tr>
			<?php } ?>
			
		</tbody>
	</table>

	<h5>III. RIWAYAT PEKERJAAN</h5>

	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Instansi/ Perusahaan</th>
			<th rowspan="2" style="width: 80px;">Pangkat</th>
			<th rowspan="2" style="width: 80px;">Jabatan</th>
			<th rowspan="2" style="width: 50px;">Terhitung Mulai Tanggal/TMT</th>
			<th rowspan="2" style="width: 50px;">Gaji Pokok</th>
			<th colspan="3" style="width: 150px;">Surat Keputusan</th>
		</tr>

		<tr>				
				
				<th style="width: 50px;">No</th>
				<th style="width: 50px;">Tanggal</th>
				<th style="width: 50px;">Pejabat Penandatangan</th>
		</tr>
		
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_pekerjaan where nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nip']; ?>
			</td>
			<td>
			<?php echo $data_cek['pangkat']; ?>
			</td>
			<td>
			<?php echo $data_cek['jabatan']; ?>
			</td>
			<td>
			<?php echo $data_cek['date_mulai']; ?>
			</td>
			<td>
			<?php echo $data_cek['gaji']; ?>
			</td>
			<td>
			<?php echo $data_cek['nomor']; ?>
			</td>
			<td>
			<?php echo $data_cek['date_sk']; ?>
			</td>
			<td>
			<?php echo $data_cek['pejabat']; ?>
			</td>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>

	<h5>III. RIWAYAT KELUARGA</h5>
	<a>1. Isteri/ Suami</a> <br>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Nama</th>
			<th rowspan="2" style="width: 80px;">Tempat Lahir</th>
			<th rowspan="2" style="width: 80px;">Tanggal Lahir</th>
			<th rowspan="2" style="width: 100px;">Tanggal Nikah</th>
			<th rowspan="2" style="width: 50px;">Pekerjaan</th>
			<th rowspan="2" style="width: 150px;">Keterangan</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_keluarga where hubungan='Isteri/ Suami' AND nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nama']; ?>
			</td>
			<td>
			<?php echo $data_cek['tempat_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_nikah']; ?>
			</td>
			<td>
			<?php echo $data_cek['pekerjaan']; ?>
			</td>
			<td>
			<?php echo $data_cek['keterangan']; ?>
			</td>
			<br>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>
	<br>

	<a>2. Anak</a>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Nama</th>
			<th rowspan="2" style="width: 80px;">Jenis Kelamin</th>
			<th rowspan="2" style="width: 80px;">Tempat Lahir</th>
			<th rowspan="2" style="width: 100px;">Tanggal Lahir</th>
			<th rowspan="2" style="width: 50px;">Pekerjaan</th>
			<th rowspan="2" style="width: 150px;">Keterangan</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_keluarga where hubungan='Anak' AND nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nama']; ?>
			</td>
			<td>
			<?php echo $data_cek['jenis_kelamin']; ?>
			</td>
			<td>
			<?php echo $data_cek['tempat_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['pekerjaan']; ?>
			</td>
			<td>
			<?php echo $data_cek['keterangan']; ?>
			</td>
			<br>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>
	<br>

	<a>3. Orang Tua Kandung</a>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Nama</th>
			<th rowspan="2" style="width: 100px;">Tanggal Lahir</th>
			<th rowspan="2" style="width: 50px;">Pekerjaan</th>
			<th rowspan="2" style="width: 150px;">Keterangan</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_keluarga where hubungan='Orang Tua Kandung' AND nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nama']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['pekerjaan']; ?>
			</td>
			<td>
			<?php echo $data_cek['keterangan']; ?>
			</td>
			<br>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>
<br>
	<a>4. Saudara Kandung</a>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Nama</th>
			<th rowspan="2" style="width: 100px;">Jenis Kelamin</th>
			<th rowspan="2" style="width: 100px;">Tanggal Lahir</th>
			<th rowspan="2" style="width: 50px;">Pekerjaan</th>
			<th rowspan="2" style="width: 150px;">Keterangan</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_keluarga where hubungan='Saudara Kandung' AND nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nama']; ?>
			</td>
			<td>
			<?php echo $data_cek['jenis_kelamin']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['pekerjaan']; ?>
			</td>
			<td>
			<?php echo $data_cek['keterangan']; ?>
			</td>
			<br>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>
	<br>
	<a>5. Bapak/ Ibu Mertua</a>
	
	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Nama</th>
			<th rowspan="2" style="width: 100px;">Tanggal Lahir</th>
			<th rowspan="2" style="width: 50px;">Pekerjaan</th>
			<th rowspan="2" style="width: 150px;">Keterangan</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$sql_tampil = "select * from tb_keluarga where hubungan='Bapak/ Ibu Mertua' AND nip='$nip'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no=1;
		while ($data_cek = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
	?>
		<tr>
			<td>
			<?php echo $no++; ?>
			</td>
			<td>
			<?php echo $data_cek['nama']; ?>
			</td>
			<td>
			<?php echo $data_cek['tanggal_lahir']; ?>
			</td>
			<td>
			<?php echo $data_cek['pekerjaan']; ?>
			</td>
			<td>
			<?php echo $data_cek['keterangan']; ?>
			</td>
			<br>
		</tr>
		<?php } ?>
		
	</tbody>
	</table>

	<script>
		window.print();
	</script>

</body>

</html>