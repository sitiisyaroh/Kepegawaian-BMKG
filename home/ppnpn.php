<?php

        $sql_cek = "SELECT * FROM tb_ppnpn 
		JOIN tb_pengguna WHERE tb_ppnpn.id_pengguna='$_SESSION[ses_id]'
		";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{

		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Pegawai</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
				readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="<?php echo $data_cek['id_pegawai']; ?>"
				readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['status']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
		}
	$sql = $koneksi->query("SELECT count(id_pegawai) as lokal from tb_ppnpn");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as putra from tb_pendidikan");
	while ($data= $sql->fetch_assoc()) {
	
		$putra=$data['putra'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(nip) as putri from tb_pekerjaan");
	while ($data= $sql->fetch_assoc()) {
	
		$putri=$data['putri'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengguna) as boyong from tb_pengguna");
	while ($data= $sql->fetch_assoc()) {
	
		$boyong=$data['boyong'];
	}
?>
<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_ppnpn INNER JOIN tb_pendidikan 
		WHERE tb_pendidikan.id_pegawai='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $lokal;  ?>
				</h3>

				<p>Jumlah Pegawai PPNPN</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $putra;  ?>
				</h3>

				<p>Riwayat Pendidikan</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="?page=view-pendidikan-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>" class="small-box-footer">Selengkapnya
			<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $putri; ?>
				</h3>

				<p>Riwayat Keluarga</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="?page=view-keluarga-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>" class="small-box-footer">Selengkapnya
			<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>