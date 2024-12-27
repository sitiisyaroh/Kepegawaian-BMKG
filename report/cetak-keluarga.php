<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip'];
?>
<center><h5>DATA KELUARGA</h5></center>

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
        </div>
    </div>
<!-- /.card-body -->                        