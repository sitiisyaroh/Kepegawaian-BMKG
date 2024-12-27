<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_diklat WHERE kursus='".$_GET['kode']."'";
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
                          <label class="col-sm-2  col-form-label">Kursus</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control"
                                   placeholder="Kursus" id="kursus" name="kursus" value="<?php echo $data_cek['kursus']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2  col-form-label">Tanggal Mulai</label>
                          <div class="col-sm-6">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal Mulai" id="mulai" name="mulai" value="<?php echo $data_cek['mulai']; ?>">
                        </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2  col-form-label">Tanggal Selesai</label>
                          <div class="col-sm-6">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal Selesai" id="selesai" name="selesai" value="<?php echo $data_cek['selesai']; ?>">
                          </div>
                       </div>

                       <div class="form-group row">
				                  <label class="col-sm-2  col-form-label">Berkas Diklat</label>
				                 <div class="col-sm-6">
                            <?php echo $data_cek['filename']; ?>
                          </div>
                        </div>

                        <div class="form-group row">
				                  <label class="col-sm-2  col-form-label">Ubah Berkas Diklat</label>
				                 <div class="col-sm-6">
                            <input type="file" name="filename" value="<?php echo $data_cek['filename']; ?>" accept=".pdf" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Tempat</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control"
                                   placeholder="Tempat" id="tempat" name="tempat" value="<?php echo $data_cek['tempat']; ?>">
                          </div>
                       </div>

                       <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control"
                                   placeholder="Keterangan" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>">
                          </div>
                       </div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=view-diklat&kode=<?php echo $data_cek['nip']; ?>" title="Kembali" class="btn btn-secondary">Batal</a>
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

        $sql_ubah = "UPDATE tb_diklat SET
			kursus='".$_POST['kursus']."',
			mulai='".$_POST['mulai']."',
			selesai='".$_POST['selesai']."',
            filename='".$nama_file."',	
			tempat='".$_POST['tempat']."',
			keterangan='".$_POST['keterangan']."'	
            WHERE kursus='".$_POST['kursus']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_diklat SET
		kursus='".$_POST['kursus']."',
		mulai='".$_POST['mulai']."',
		selesai='".$_POST['selesai']."',
		tempat='".$_POST['tempat']."',
		keterangan='".$_POST['keterangan']."'
		WHERE kursus='".$_POST['kursus']."'";
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
                window.location = 'index.php?page=edit-diklat';
            }
        })</script>";
    }
}

