<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_keluarga 
		WHERE tb_keluarga.nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Keluarga</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Pekerjaan</th>
						<th>Keterangan</th>
						<th>File KK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
     			$sql=$koneksi->query ( "SELECT * FROM tb_keluarga 
                        WHERE tb_keluarga.nip='".$_GET['kode']."'" );
      				  //$query_cek = mysqli_query($koneksi, $sql);
      				
					while ($data= $sql->fetch_assoc()) {
				?>



					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['NIK']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['jenis_kelamin']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_lahir']; ?>
						</td>
						<td>
							<?php echo $data['pekerjaan']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
						<a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a>
						</td>
						<td>
						<a href="?page=del-keluarga&kode=<?php echo $data['NIK']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i></a>

								<a href="?page=edit-keluarga&kode=<?php echo $data['NIK']; ?>" title="Ubah" class="btn btn-success btn-sm">
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
					<a href="?page=add-keluarga" target=" _blank"
					 title="Tambah Data Keluarga" class="btn btn-primary">Tambah Data</a>
					 <a href="./report/cetak-keluarga.php?nip=<?php echo $data_cek['nip']; ?>" target=" _blank"
					 title="Cetak Riwayat Keluarga" class="btn btn-primary">Print</a>
				</div>
		</div>
	</div>
	<!-- /.card-body -->