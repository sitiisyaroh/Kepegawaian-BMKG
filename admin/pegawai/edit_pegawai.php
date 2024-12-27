<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai WHERE nip='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
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
					<input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
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
                if ($data_cek['status'] == "Data Penelitian dan Informasi") echo "<option value='Data Penelitian dan Informasi' selected>Data Penelitian dan Informasi</option>";
                else echo "<option value='Data Penelitian dan Informasi'>Data Penelitian dan Informasi</option>";

                if ($data_cek['status'] == "Tata Usaha") echo "<option value='Tata Usaha' selected>Tata Usaha</option>";
                else echo "<option value='Tata Usaha'>Tata Usaha</option>";

				if ($data_cek['status'] == "Observasi") echo "<option value='Observasi' selected>Observasi</option>";
                else echo "<option value='Observasi'>Observasi</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan</label>
				<div class="col-sm-5">
				<select class="form-control" id="golongan" name="golongan" placeholder="Golongan" >
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['golongan'] == "I A/ Juru Muda") echo "<option value='I A/ Juru Muda' selected>I A/ Juru Muda</option>";
                else echo "<option value='I A/ Juru Muda'>I A/ Juru Muda</option>";

                if ($data_cek['golongan'] == "I B/ Juru Muda Tingkat 1") echo "<option value='I B/ Juru Muda Tingkat 1' selected>I B/ Juru Muda Tingkat 1</option>";
                else echo "<option value='I B/ Juru Muda Tingkat 1'>I B/ Juru Muda Tingkat 1</option>";

				if ($data_cek['golongan'] == "I C/ Juru") echo "<option value='I C/ Juru' selected>I C/ Juru</option>";
                else echo "<option value='I C/ Juru'>I C/ Juru</option>";

				if ($data_cek['golongan'] == "I D/ Juru Tingkat 1") echo "<option value='I D/ Juru Tingkat 1' selected>I D/ Juru Tingkat 1</option>";
                else echo "<option value='I D/ Juru Tingkat 1'>I D/ Juru Tingkat 1</option>";

				if ($data_cek['golongan'] == "II A/ Pengatur Muda") echo "<option value='II A/ Pengatur Muda' selected>II A/ Pengatur Muda</option>";
                else echo "<option value='II A/ Pengatur Muda'>II A/ Pengatur Muda</option>";

				if ($data_cek['golongan'] == "II B/ Pengatur Muda Tingkat 1") echo "<option value='II B/ Pengatur Muda Tingkat 1' selected>II B/ Pengatur Muda Tingkat 1</option>";
                else echo "<option value='II B/ Pengatur Muda Tingkat 1'>II B/ Pengatur Muda Tingkat 1</option>";

				if ($data_cek['golongan'] == "II C/ Pengatur") echo "<option value='II C/ Pengatur' selected>II C/ Pengatur</option>";
                else echo "<option value='II C/ Pengatur'>II C/ Pengatur</option>";

				if ($data_cek['golongan'] == "II D/ Pengatur Tingkat 1") echo "<option value='II D/ Pengatur Tingkat 1' selected>II D/ Pengatur Tingkat 1</option>";
                else echo "<option value='II D/ Pengatur Tingkat 1'>II D/ Pengatur Tingkat 1</option>";

				if ($data_cek['golongan'] == "III A/ Penata Muda") echo "<option value='III A/ Penata Muda' selected>III A/ Penata Muda</option>";
                else echo "<option value='III A/ Penata Muda'>III A/ Penata Muda</option>";

				if ($data_cek['golongan'] == "III B/ Penata Muda Tingkat 1") echo "<option value='III B/ Penata Muda Tingkat 1' selected>III B/ Penata Muda Tingkat 1</option>";
                else echo "<option value='III B/ Penata Muda Tingkat 1'>III B/ Penata Muda Tingkat 1</option>";

				if ($data_cek['golongan'] == "III C/ Penata") echo "<option value='III C/ Penata' selected>III C/ Penata</option>";
                else echo "<option value='III C/ Penata'>III C/ Penata</option>";

				if ($data_cek['golongan'] == "III D/ Penata Tingkat 1") echo "<option value='III D/ Penata Tingkat 1' selected>III D/ Penata Tingkat 1</option>";
                else echo "<option value='III D/ Penata Tingkat 1'>III D/ Penata Tingkat 1</option>";

				if ($data_cek['golongan'] == "IV A/ Pembina") echo "<option value='IV A/ Pembina' selected>IV A/ Pembina</option>";
                else echo "<option value='IV A/ Pembina'>IV A/ Pembina</option>";

				if ($data_cek['golongan'] == "IV B/ Pembina Tingkat 1") echo "<option value='IV B/ Pembina Tingkat 1' selected>IV B/ Pembina Tingkat 1</option>";
                else echo "<option value='IV B/ Pembina Tingkat 1'>IV B/ Pembina Tingkat 1</option>";

				if ($data_cek['golongan'] == "IV C/ Pembina Utama Muda") echo "<option value='IV C/ Pembina Utama Muda' selected>IV C/ Pembina Utama Muda</option>";
                else echo "<option value='IV C/ Pembina Utama Muda'>IV C/ Pembina Utama Muda</option>";

				if ($data_cek['golongan'] == "IV D/ Pembina Utama Madya") echo "<option value='IV D/ Pembina Utama Madya' selected>IV D/ Pembina Utama Madya</option>";
                else echo "<option value='IV D/ Pembina Utama Madya'>IV D/ Pembina Utama Madya</option>";

				if ($data_cek['golongan'] == "IV E/ Pembina Utama") echo "<option value='IV E/ Pembina Utama' selected>IV E/ Pembina Utama</option>";
                else echo "<option value='IV E/ Pembina Utama'>IV E/ Pembina Utama</option>";
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
					<input type="file" id="foto" name="foto"  accept=".jpg">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
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

        $sql_ubah = "UPDATE tb_pegawai SET
			nama='".$_POST['nama']."',
			jenis_kelamin='".$_POST['jenis_kelamin']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			date='".$_POST['date']."',
			agama='".$_POST['agama']."',
			email='".$_POST['email']."',
			alamat='".$_POST['alamat']."',
			no_hp='".$_POST['no_hp']."',
			status='".$_POST['status']."',
			golongan='".$_POST['golongan']."',
			foto='".$nama_file."'		
            WHERE nip='".$_POST['nip']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_pegawai SET
		nama='".$_POST['nama']."',
		jenis_kelamin='".$_POST['jenis_kelamin']."',
		tempat_lahir='".$_POST['tempat_lahir']."',
		date='".$_POST['date']."',
		agama='".$_POST['agama']."',
		email='".$_POST['email']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		status='".$_POST['status']."',	
		golongan='".$_POST['golongan']."'
		WHERE nip='".$_POST['nip']."'";
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
                window.location = 'index.php?page=edit-pegawai';
            }
        })</script>";
    }
}

