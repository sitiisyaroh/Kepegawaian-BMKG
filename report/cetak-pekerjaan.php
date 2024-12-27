<?php
	include "../inc/koneksi.php";
	
	$nip = $_GET['nip'];
?>
<center><h5>RIWAYAT PEKERJAAN</h5></center>


	<table border="1" class="content" cellpadding="2" style="font-weight: normal; border-collapse: collapse; border: none;">
	<thead>
		<tr>
			<th rowspan="2" style="width: 10px;">No</th>
			<th rowspan="2" style="width: 100px;">Instansi/ Perusahaan</th>
			<th rowspan="2" style="width: 80px;">Pangkat</th>
			<th rowspan="2" style="width: 80px;">Jabatan</th>
			<th colspan="2" style="width: 100px;">Masa Kerja</th>
			<th rowspan="2" style="width: 50px;">Gaji Pokok</th>
			<th colspan="3" style="width: 150px;">Surat Keputusan</th>
		</tr>

		<tr>				
				<th style="width: 100px;">Terhitung Mulai Tanggal/TMT</th>
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

    <script>
		window.print();
	</script>
        </div>
    </div>
<!-- /.card-body -->                        