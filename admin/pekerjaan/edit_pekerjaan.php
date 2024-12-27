<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pekerjaan WHERE filename='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Golongan/Pangkat</label>
				<div class="col-sm-5">
				<select class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat" >
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['pangkat'] == "I A/ Juru Muda") echo "<option value='I A/ Juru Muda' selected>I A/ Juru Muda</option>";
                else echo "<option value='I A/ Juru Muda'>I A/ Juru Muda</option>";

                if ($data_cek['pangkat'] == "I B/ Juru Muda Tingkat 1") echo "<option value='I B/ Juru Muda Tingkat 1' selected>I B/ Juru Muda Tingkat 1</option>";
                else echo "<option value='I B/ Juru Muda Tingkat 1'>I B/ Juru Muda Tingkat 1</option>";

				if ($data_cek['pangkat'] == "I C/ Juru") echo "<option value='I C/ Juru' selected>I C/ Juru</option>";
                else echo "<option value='I C/ Juru'>I C/ Juru</option>";

				if ($data_cek['pangkat'] == "I D/ Juru Tingkat 1") echo "<option value='I D/ Juru Tingkat 1' selected>I D/ Juru Tingkat 1</option>";
                else echo "<option value='I D/ Juru Tingkat 1'>I D/ Juru Tingkat 1</option>";

				if ($data_cek['pangkat'] == "II A/ Pengatur Muda") echo "<option value='II A/ Pengatur Muda' selected>II A/ Pengatur Muda</option>";
                else echo "<option value='II A/ Pengatur Muda'>II A/ Pengatur Muda</option>";

				if ($data_cek['pangkat'] == "II B/ Pengatur Muda Tingkat 1") echo "<option value='II B/ Pengatur Muda Tingkat 1' selected>II B/ Pengatur Muda Tingkat 1</option>";
                else echo "<option value='II B/ Pengatur Muda Tingkat 1'>II B/ Pengatur Muda Tingkat 1</option>";

				if ($data_cek['pangkat'] == "II C/ Pengatur") echo "<option value='II C/ Pengatur' selected>II C/ Pengatur</option>";
                else echo "<option value='II C/ Pengatur'>II C/ Pengatur</option>";

				if ($data_cek['pangkat'] == "II D/ Pengatur Tingkat 1") echo "<option value='II D/ Pengatur Tingkat 1' selected>II D/ Pengatur Tingkat 1</option>";
                else echo "<option value='II D/ Pengatur Tingkat 1'>II D/ Pengatur Tingkat 1</option>";

				if ($data_cek['pangkat'] == "III A/ Penata Muda") echo "<option value='III A/ Penata Muda' selected>III A/ Penata Muda</option>";
                else echo "<option value='III A/ Penata Muda'>III A/ Penata Muda</option>";

				if ($data_cek['pangkat'] == "III B/ Penata Muda Tingkat 1") echo "<option value='III B/ Penata Muda Tingkat 1' selected>III B/ Penata Muda Tingkat 1</option>";
                else echo "<option value='III B/ Penata Muda Tingkat 1'>III B/ Penata Muda Tingkat 1</option>";

				if ($data_cek['pangkat'] == "III C/ Penata") echo "<option value='III C/ Penata' selected>III C/ Penata</option>";
                else echo "<option value='III C/ Penata'>III C/ Penata</option>";

				if ($data_cek['pangkat'] == "III D/ Penata Tingkat 1") echo "<option value='III D/ Penata Tingkat 1' selected>III D/ Penata Tingkat 1</option>";
                else echo "<option value='III D/ Penata Tingkat 1'>III D/ Penata Tingkat 1</option>";

				if ($data_cek['pangkat'] == "IV A/ Pembina") echo "<option value='IV A/ Pembina' selected>IV A/ Pembina</option>";
                else echo "<option value='IV A/ Pembina'>IV A/ Pembina</option>";

				if ($data_cek['pangkat'] == "IV B/ Pembina Tingkat 1") echo "<option value='IV B/ Pembina Tingkat 1' selected>IV B/ Pembina Tingkat 1</option>";
                else echo "<option value='IV B/ Pembina Tingkat 1'>IV B/ Pembina Tingkat 1</option>";

                if ($data_cek['golongan'] == "IV C/ Pembina Utama Muda") echo "<option value='IV C/ Pembina Utama Muda' selected>IV C/ Pembina Utama Muda</option>";
                else echo "<option value='IV C/ Pembina Utama Muda'>IV C/ Pembina Utama Muda</option>";

				if ($data_cek['pangkat'] == "IV D/ Pembina Utama Madya") echo "<option value='IV D/ Pembina Utama Madya' selected>IV D/ Pembina Utama Madya</option>";
                else echo "<option value='IV D/ Pembina Utama Madya'>IV D/ Pembina Utama Madya</option>";

				if ($data_cek['pangkat'] == "IV E/ Pembina Utama") echo "<option value='IV E/ Pembina Utama' selected>IV E/ Pembina Utama</option>";
                else echo "<option value='IV E/ Pembina Utama'>IV E/ Pembina Utama</option>";
            			?>
						
					</select>
				</div>
			</div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Jabatan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Jabatan " name="jabatan" value="<?php echo $data_cek['jabatan']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Terhitung Mulai Tanggal/TMT</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal Mulai" name="date_mulai" value="<?php echo $data_cek['date_mulai']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Gaji</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Gaji" name="gaji" value="<?php echo $data_cek['gaji']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pejabat Penandatangan </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Pejabat" name="pejabat" value="<?php echo $data_cek['pejabat']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor SK</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Nomor" name="nomor" value="<?php echo $data_cek['nomor']; ?>">
                           </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal SK Keluar</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal SK" name="date_sk" value="<?php echo $data_cek['date_sk']; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">File SK</label>
                          <div class="col-sm-9">
                          <?php echo $data_cek['filename']; ?>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Ubah File SK</label>
                          <div class="col-sm-9">
                            <input type="file" name="filename"
                                    accept=".pdf" >
                          </div>
                        </div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=view-pekerjaan&kode=<?php echo $data_cek['nip']; ?>" title="Kembali" class="btn btn-secondary">Batal</a>
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

        $sql_ubah = "UPDATE tb_pekerjaan SET
			pangkat='".$_POST['pangkat']."',
			date_mulai='".$_POST['date_mulai']."',
			gaji='".$_POST['gaji']."',
			pejabat='".$_POST['pejabat']."',
			nomor='".$_POST['nomor']."',
            		date_sk='".$_POST['date_sk']."',
            		filename='".$nama_file."'	
            WHERE nomor='".$_POST['nomor']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_pekerjaan SET
		pangkat='".$_POST['pangkat']."',
		date_mulai='".$_POST['date_mulai']."',
		gaji='".$_POST['gaji']."',
		pejabat='".$_POST['pejabat']."',
		nomor='".$_POST['nomor']."',
        	date_sk='".$_POST['date_sk']."'
		WHERE nomor='".$_POST['nomor']."'";
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
                window.location = 'index.php?page=edit-pekerjaan';
            }
        })</script>";
    }
}

