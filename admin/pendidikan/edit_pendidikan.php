<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pendidikan WHERE nama_sekolah='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Tingkat Pendidikan</label>
				<div class="col-sm-4">
					<select name="tingkat" id="tingkat" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['tingkat'] == "SD") echo "<option value='SD' selected>SD</option>";
                else echo "<option value='SD'>SD</option>";

                if ($data_cek['tingkat'] == "SMP") echo "<option value='SMP' selected>SMP</option>";
                else echo "<option value='SMP'>SMP</option>";

                if ($data_cek['tingkat'] == "SMA") echo "<option value='SMA' selected>SMA</option>";
                else echo "<option value='SMA'>SMA</option>";

                if ($data_cek['tingkat'] == "S1") echo "<option value='S1' selected>S1</option>";
                else echo "<option value='S1'>S1</option>";

                if ($data_cek['tingkat'] == "S2") echo "<option value='S2' selected>S2</option>";
                else echo "<option value='S2'>S2</option>";

                if ($data_cek['tingkat'] == "S3") echo "<option value='S3' selected>S3</option>";
                else echo "<option value='S3'>S3</option>";

                if ($data_cek['tingkat'] == "Profesi") echo "<option value='Profesi' selected>Profesi</option>";
                else echo "<option value='Profesi'>Profesi</option>";

                if ($data_cek['tingkat'] == "D-IV") echo "<option value='D-IV' selected>D-IV</option>";
                else echo "<option value='D-IV'>D-IV</option>";
            			?>
					</select>
				</div>
			</div>


                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Nama Sekolah</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Nama Sekolah" name="nama_sekolah" value="<?php echo $data_cek['nama_sekolah']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Jurusan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Jurusan" name="jurusan" value="<?php echo $data_cek['jurusan']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tahun Lulus</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Tahun Lulus" name="tahun_lulus" value="<?php echo $data_cek['tahun_lulus']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Kota</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Kota" name="kota" value="<?php echo $data_cek['kota']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Nama Kepala Sekolah</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Nama Kepala Sekolah" name="nama_kepala" value="<?php echo $data_cek['nama_kepala']; ?>">
                             </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tanggal Ijazah</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Enter your Tanggal Ijazah" name="tgl_up" value="<?php echo $data_cek['tgl_up']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Ubah File Ijazah</label>
                          <div class="col-sm-9">
                          <?php echo $data_cek['filename']; ?>"
                         </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Ubah File Ijazah</label>
                          <div class="col-sm-9">
                            <input type="file" name="filename"
                                    accept=".pdf" >
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

        $sql_ubah = "UPDATE tb_pendidikan SET
			tingkat='".$_POST['tingkat']."',
			nama_sekolah='".$_POST['nama_sekolah']."',
			jurusan='".$_POST['jurusan']."',	
			tahun_lulus='".$_POST['tahun_lulus']."',
			kota='".$_POST['kota']."',	
            nama_kepala='".$_POST['nama_kepala']."',
			tgl_up='".$_POST['tgl_up']."',	
            filename='".$nama_file."'
            WHERE nama_sekolah='".$_POST['nama_sekolah']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_pendidikan SET
		tingkat='".$_POST['tingkat']."',
			nama_sekolah='".$_POST['nama_sekolah']."',
			jurusan='".$_POST['jurusan']."',	
			tahun_lulus='".$_POST['tahun_lulus']."',
			kota='".$_POST['kota']."',	
            nama_kepala='".$_POST['nama_kepala']."',
			tgl_up='".$_POST['tgl_up']."'
		WHERE nama_sekolah='".$_POST['nama_sekolah']."'";
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
                window.location = 'index.php?page=edit-pendidikan';
            }
        })</script>";
    }
}

