<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_keluarga WHERE NIK='".$_GET['kode']."'";
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
				<div class="col-sm-6">
					<input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
  <label class="col-sm-3  col-form-label">NIK</label>
  <div class="col-sm-9">
    <input type="text" class="form-control"
           placeholder="NIK" name="NIK" value="<?php echo $data_cek['NIK']; ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3  col-form-label">Nama</label>
  <div class="col-sm-9">
    <input type="text" class="form-control"
           placeholder="Nama" name="nama" value="<?php echo $data_cek['nama']; ?>">
</div>
</div>

<div class="form-group row">
  <label class="col-sm-3  col-form-label">Jenis Kelamin</label>
  <div class="col-sm-9">
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
  <label class="col-sm-3 col-form-label">Tempat Lahir</label>
  <div class="col-sm-9">
    <input type="text" class="form-control"
           placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-9">
    <input type="date" class="form-control"
           placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir']; ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Pekerjaan</label>
  <div class="col-sm-9">
    <input type="text" class="form-control"
           placeholder="Pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 col-form-label">Keterangan</label>
  <div class="col-sm-9">
    <input type="text" class="form-control"
           placeholder="Keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>" >
  </div>
</div>

<div class="form-group row">
				                  <label class="col-sm-2  col-form-label"> File KK</label>
				                 <div class="col-sm-6">
                            <?php echo $data_cek['filename']; ?>
                          </div>
                        </div>

<div class="form-group row">
  <label class="col-sm-3  col-form-label">Ubah File KK</label>
 <div class="col-sm-9">
    <input type="file" name="filename" accept=".pdf">
  </div>
</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=view-keluarga&kode=<?php echo $data_cek['nip']; ?>" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['filename']['tmp_name'];
	$target = 'file/';
	$nama_file = @$_FILES['filename']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $file= $data_cek['filename'];
            if (file_exists("file/$file")){
            unlink("filename/$file");}

        $sql_ubah = "UPDATE tb_keluarga SET
			NIK='".$_POST['NIK']."',
			nama='".$_POST['nama']."',
			jenis_kelamin='".$_POST['jenis_kelamin']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
            pekerjaan='".$_POST['pekerjaan']."',
			keterangan='".$_POST['keterangan']."',
            filename='".$nama_file."'	
            WHERE NIK='".$_POST['NIK']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_keluarga SET
		NIK='".$_POST['NIK']."',
			nama='".$_POST['nama']."',
			jenis_kelamin='".$_POST['jenis_kelamin']."',
			tempat_lahir='".$_POST['tempat_lahir']."',
			tanggal_lahir='".$_POST['tanggal_lahir']."',
            pekerjaan='".$_POST['pekerjaan']."',
			keterangan='".$_POST['keterangan']."'
		WHERE NIK='".$_POST['NIK']."'";
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
                window.location = 'index.php?page=edit-keluarga';
            }
        })</script>";
    }
}

