<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip'];
?>
<center><h5>RIWAYAT PENDIDIKAN</h5></center>


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

    <script>
		window.print();
	</script>
        </div>
    </div>
<!-- /.card-body -->                        