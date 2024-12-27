<?php 
	if(isset($_GET['kode'])) {
		$sql_cek = "SELECT * FROM tb_pengguna WHERE nip='".$_GET['kode']."'";
		$query_cek = mysqli_query ($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

	} ?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Diri</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']?>" readonly>
				</div>
			</div>

			
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
			
<?php

    if (isset ($_POST['Simpan'])){
        $sql_simpan = "INSERT INTO tb_pegawai (nip, id_pengguna) VALUES (
            '".$_POST['nip']."',
			'".$_POST['id_pengguna']."',
			)";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Diri Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pegawai';
          }
      })</script>";
	}
	}
	
	
     //selesai proses simpan data
