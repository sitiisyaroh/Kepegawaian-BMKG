<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_pekerjaan 
		WHERE tb_pekerjaan.nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pekerjaan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>Pangkat</th>
						<th>Jabatan</th>
						<th>Terhitung Mulai Tanggal/TMT </th>
						<th>Gaji Pokok</th>
						<th>Pejabat Sesuai SK</th>
						<th>Nomor SK</th>
						<th>Tanggal SK</th>
						<th>Berkas SK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
     			$sql=$koneksi->query ( "SELECT * FROM tb_pekerjaan
				   WHERE tb_pekerjaan.nip='".$_GET['kode']."'" );
      				  //$query_cek = mysqli_query($koneksi, $sql);
      				
					while ($data= $sql->fetch_assoc()) {
				?>



					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['pangkat']; ?>
						</td>
						<td>
							<?php echo $data['jabatan']; ?>
						</td>
						<td>
							<?php echo $data['date_mulai']; ?>
						</td>
						<td>
							<?php echo $data['gaji']; ?>
						</td>
						<td>
							<?php echo $data['pejabat']; ?>
						</td>
						<td>
							<?php echo $data['nomor']; ?>
						</td>
						<td>
							<?php echo $data['date_sk']; ?>
						</td>
						<td>
						<a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a>
						</td>
						<td>
						<a href="?page=del-pekerjaan&kode=<?php echo $data['nomor']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i></a>
								<a href="?page=edit-pekerjaan&kode=<?php echo $data['filename']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>

					<?php
					}
            ?>
				</tbody>
				</tfoot>
			</table>
			<div class="card-footer">
					<a href="?page=view-pegawai&kode=<?php echo $data_cek['nip']; ?>"  class="btn btn-warning">Kembali</a>
					<a href="./report/cetak-pekerjaan.php?nip=<?php echo $data_cek['nip']; ?>" target=" _blank"
					 title="Cetak Riwayat Pekerjaan" class="btn btn-primary">Print</a>

					 <a href="?page=add-pekerjaan" target=" _blank"
					 title="Tambah Data Pekerjaan" class="btn btn-primary">Tambah Data</a>

					 <a href="?page=view-keluarga&kode=<?php echo $data_cek['nip']; ?>" class="btn btn-warning">Selanjutnya</a>
				</div>
		</div>
	</div>
	<!-- /.card-body -->