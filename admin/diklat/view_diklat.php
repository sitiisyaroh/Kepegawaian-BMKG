<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_diklat 
		WHERE tb_diklat.nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body >
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Riwayat Diklat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="" class="table table-bordered table-striped">
		<thead>
			<tr>
						<th>No.</th>
                        <th>Nama Kursus/ Diklat</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tempat</th>
                        <th>Tanda Lulus</th>
                        <th>Keterangan</th>
						<th>Aksi</th>
			</tr>
		</thead>
		<tbody >
		<?php
				$no = 1;
     			$sql=$koneksi->query ( "SELECT * FROM tb_diklat
				   WHERE tb_diklat.nip='".$_GET['kode']."'" );
      				  //$query_cek = mysqli_query($koneksi, $sql);
      				
					while ($data= $sql->fetch_assoc()) {
				?>

						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['kursus']; ?></td>
							<td><?php echo $data['mulai']; ?></td>
							<td><?php echo $data['selesai']; ?></td>
							<td><?php echo $data['tempat']; ?></td>
							<td><a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a></td>
							<td><?php echo $data['keterangan']; ?></td>
							<td><a href="?page=del-diklat&kode=<?php echo $data['kursus']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i></a>
								<a href="?page=edit-diklat&kode=<?php echo $data['kursus']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							</td>
						</tr>
			<?php 
					}
        	?>
		</tbody>
	</table>
	<div class="card-footer">
					<a href="?page=view-pegawai&kode=<?php echo $data_cek['nip']; ?>"  class="btn btn-warning">Kembali</a>
					<a href="./report/cetak-pendidikan.php?nip=<?php echo $data_cek['nip']; ?>" target=" _blank"
					 title="Cetak Riwayat pendidikan" class="btn btn-primary">Print</a>

					<a href="?page=add-diklat" target=" _blank"
					 title="Tambah Data Diklat" class="btn btn-primary">Tambah Data</a>

					 <a href="?page=view-pekerjaan&kode=<?php echo $data_cek['nip']; ?>" class="btn btn-warning">Selanjutnya</a>
				</div>
</body>
</html>




