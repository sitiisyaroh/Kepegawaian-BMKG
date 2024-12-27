<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_ppnpn INNER JOIN tb_pendidikan 
		WHERE tb_pendidikan.id_pegawai='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pendidikan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>NO</th>
						<th>Tingkat</th>
						<th>Nama Sekolah</th>
						<th>Jurusan</th>
						<th>Tahun Lulus</th>
						<th>Kota Sekolah</th>
						<th>Nama Kepala Sekolah</th>
						<th>Tanggal Update</th>
						<th>File Ijazah</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$no = 1;
     			$sql=$koneksi->query ( "SELECT * FROM tb_pendidikan
				   WHERE tb_pendidikan.id_pegawai='".$_GET['kode']."'" );
      				  //$query_cek = mysqli_query($koneksi, $sql);
      				
					while ($data= $sql->fetch_assoc()) {
				?>



					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['tingkat']; ?>
						</td>
						<td>
							<?php echo $data['nama_sekolah']; ?>
						</td>
						<td>
							<?php echo $data['jurusan']; ?>
						</td>
						<td>
							<?php echo $data['tahun_lulus']; ?>
						</td>
						<td>
							<?php echo $data['kota']; ?>
						</td>
						<td>
							<?php echo $data['nama_kepala']; ?>
						</td>
						<td>
							<?php echo $data['tgl_up']; ?>
						</td>
						<td>
						<a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a>
						</td>
						<td>
						<a href="?page=del-pendidikan&kode=<?php echo $data['tingkat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i></a>
								<a href="?page=edit-pendidikan&kode=<?php echo $data['nama_sekolah']; ?>" 
								title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i></a>
						</td>
					</tr>

					<?php
					}
            ?>
				</tbody>
				</tfoot>
			</table>
			<div class="card-footer">
					<a href="?page=view-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>"  class="btn btn-warning">Kembali</a>

					 <a href="?page=add-pendidikan-ppnpn" target=" _blank"
					 title="Tambah Data Pendidikan" class="btn btn-primary">Tambah Data</a>
					 <a href="./report/cetak-pendidikan.php?id_pegawai=<?php echo $data_cek['id_pegawai']; ?>" target=" _blank"
					 title="Cetak Riwayat Pendididkan" class="btn btn-primary">Print</a>
					 <a href="?page=view-keluarga-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>" class="btn btn-warning">Selanjutnya</a>
				</div>
		</div>
	</div>
	<!-- /.card-body -->