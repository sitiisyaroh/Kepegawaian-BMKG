<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_ppnpn WHERE id_pegawai='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="<?php echo $data_cek['id_pegawai']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['jenis_kelamin'] == "P") echo "<option value='P' selected>P</option>";
                else echo "<option value='P'>P</option>";

                if ($data_cek['jenis_kelamin'] == "L") echo "<option value='L' selected>L</option>";
                else echo "<option value='L'>L</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="date" name="date" value="<?php echo $data_cek['date']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data_cek['agama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bagian</label>
				<div class="col-sm-4">
					<select name="status" id="status" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['status'] == "Sopir") echo "<option value='Sopir' selected>Sopir</option>";
                else echo "<option value='Sopir'>Sopir</option>";

                if ($data_cek['status'] == "Security") echo "<option value='Security' selected>Security</option>";
                else echo "<option value='Security'>Security</option>";

				if ($data_cek['status'] == "Kebersihan") echo "<option value='Kebersihan' selected>Kebersihan</option>";
                else echo "<option value='Kebersihan'>Kebersihan</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Pegawai</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto" accept=".jpg">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="index.php" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_ppnpn SET
			nama='".$_POST['nama']."',
			jenis_kelamin='".$_POST['jenis_kelamin']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			date='".$_POST['date']."',
			agama='".$_POST['agama']."',
			email='".$_POST['email']."',
			alamat='".$_POST['alamat']."',
			no_hp='".$_POST['no_hp']."',
			status='".$_POST['status']."',
			foto='".$nama_file."'		
            WHERE id_pegawai='".$_POST['id_pegawai']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_ppnpn SET
		nama='".$_POST['nama']."',
		jenis_kelamin='".$_POST['jenis_kelamin']."',
		tempat_lahir='".$_POST['tempat_lahir']."',
		date='".$_POST['date']."',
		agama='".$_POST['agama']."',
		email='".$_POST['email']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		status='".$_POST['status']."'
		WHERE id_pegawai='".$_POST['id_pegawai']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-ppnpn';
            }
        })</script>";
    }
}

