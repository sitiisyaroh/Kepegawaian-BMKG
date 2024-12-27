<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
	include "inc/koneksi.php";
	
	$sql = $koneksi->query("SELECT * from tb_profil");
	while ($data= $sql->fetch_assoc()) {
	
	$nama=$data['nama_profil'];
	}

		
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Pegawai BMKG</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>
								<?php echo $nama; ?>
							</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> DATA PEGAWAI BMKG  </span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
			

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level=="Administrator"){
						?>

				<!-- Sidebar user (optional) -->
						<div class="user-panel mt-2 pb-2 mb-2 d-flex">
							<div class="image">
								<img src="dist/img/user.png" class="img-circle elevation-1" >
							</div>
							<div class="info">
								<a href="index.php" class="d-block">
									<?php echo $data_nama; ?>
								</a>
								<span class="badge badge-success">
									<?php echo $data_level; ?>
								</span>
							</div>
						</div>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="?page=data-pegawai" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Pegawai
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-ppnpn" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data PPNPN
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-diklat" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Diklat
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pekerjaan" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Pekerjaan
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pendidikan" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Data Pendidikan
								</p>
							</a>
						</li>

						<li class="nav-header">Setting</li>
						<li class="nav-item">
							<a href="?page=data-profil" class="nav-link">
								<i class="nav-icon far fa fa-flag"></i>
								<p>
									Profil Perusahaan
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon far fa-user"></i>
								<p>
									Pengguna Sistem
								</p>
							</a>
						</li>

						<?php
          				} 
						elseif($data_level=="User"){
          				?>
							
							<?php	
							$sql_cek = "SELECT * FROM tb_pegawai 
							INNER JOIN tb_pengguna WHERE tb_pegawai.id_pengguna='$_SESSION[ses_id]'
							";
       						$query_cek = mysqli_query($koneksi, $sql_cek);
							$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

							$sql_cek1 = "SELECT * FROM tb_pengguna  WHERE id_pengguna='$_SESSION[ses_id]'
							";
       						$query_cek1 = mysqli_query($koneksi, $sql_cek1);
							$data_cek1 = mysqli_fetch_array($query_cek1,MYSQLI_BOTH);
							{ ?>

						<!-- Sidebar user (optional) -->
						<div class="user-panel mt-2 pb-2 mb-2 d-flex">
							<div class="image">
								<img src="foto/<?=$data_cek['foto']?>" class="img-circle elevation-1" >
							</div>
							<div class="info">
								<a href="index.php" class="d-block">
									<?php echo $data_nama; ?>
								</a>
								<span class="badge badge-success">
									<?php echo $data_level; ?>
								</span>
							</div>
						</div>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=edit-pegawai&kode=<?php echo $data_cek['nip']; ?>" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Edit Profil
								</p>
							</a>
						</li>

						<li class="nav-item"> 
							<a href="?page=view-pegawai&kode=<?php echo $data_cek['nip']; ?>" class="nav-link">
								<i class="nav-icon far fa fa-users"></i>
								<p>
									Detail Profil
								</p>
							</a>
						</li>
							<?php
								}
							?>
						<li class="nav-header">Setting</li>
						<li class="nav-item">
						<a href="?page=edit-pengguna&kode=<?php echo $data_cek1['id_pengguna']; ?>" class="nav-link">
								<i class="nav-icon far fa fa-flag"></i>
								<p>
									Personalia
								</p>
							</a>
						</li>

						<?php
							}
							elseif($data_level=="PPNPN"){
								?>
								  
								  <?php	
								  $sql_cek = "SELECT * FROM tb_ppnpn 
								  INNER JOIN tb_pengguna WHERE tb_ppnpn.id_pengguna='$_SESSION[ses_id]'
								  ";
									 $query_cek = mysqli_query($koneksi, $sql_cek);
								  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

								  $sql_cek1 = "SELECT * FROM tb_pengguna  WHERE id_pengguna='$_SESSION[ses_id]'";
       							  $query_cek1 = mysqli_query($koneksi, $sql_cek1);
								  $data_cek1 = mysqli_fetch_array($query_cek1,MYSQLI_BOTH);
								  { ?>
	  
							  <!-- Sidebar user (optional) -->
							  <div class="user-panel mt-2 pb-2 mb-2 d-flex">
								  <div class="image">
									  <img src="foto/<?=$data_cek['foto']?>" class="img-circle elevation-1" >
								  </div>
								  <div class="info">
									  <a href="index.php" class="d-block">
										  <?php echo $data_nama; ?>
									  </a>
									  <span class="badge badge-success">
										  <?php echo $data_level; ?>
									  </span>
								  </div>
							  </div>
	  
							  <li class="nav-item">
								  <a href="index.php" class="nav-link">
									  <i class="nav-icon fas fa-tachometer-alt"></i>
									  <p>
										  Dashboard
									  </p>
								  </a>
							  </li>
	  
							  <li class="nav-item">
								  <a href="?page=edit-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>" class="nav-link">
									  <i class="nav-icon far fa fa-users"></i>
									  <p>
										  Edit Profil
									  </p>
								  </a>
							  </li>
	  
							  <li class="nav-item"> 
								  <a href="?page=view-ppnpn&kode=<?php echo $data_cek['id_pegawai']; ?>" class="nav-link">
									  <i class="nav-icon far fa fa-users"></i>
									  <p>
										  Detail Profil
									  </p>
								  </a>
							  </li>
								  <?php
									  }
								  ?>
							  <li class="nav-header">Setting</li>
							  <li class="nav-item">
								<a href="?page=edit-pengguna&kode=<?php echo $data_cek1['id_pengguna']; ?>" class="nav-link">
								<i class="nav-icon far fa fa-flag"></i>
								<p>
									Personalia
								</p>
								</a>
						</li>
							  <?php
								  }
							  ?>
						

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              	case 'admin':
                  include "home/admin.php";
                  break;
				case 'user':
					include "home/user.php";
					break;

				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'add-ppnpn':
					include "admin/pengguna/add_ppnpn.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;

				//Asrama
				case 'data-pegawai':
					include "admin/pegawai/data_pegawai.php";
					break;
				case 'add-pegawai':
					include "admin/pegawai/add_pegawai.php";
					break;
				case 'edit-pegawai':
					include "admin/pegawai/edit_pegawai.php";
					break;
				case 'del-pegawai':
					include "admin/pegawai/del_pegawai.php";
					break;
				case 'view-pegawai':
					include "admin/pegawai/view_pegawai.php";
					break;
				case 'data-semua':
					include "admin/pegawai/data_semua.php";
					break;
				case 'laporan-pegawai':
					include "admin/pegawai/laporan_pegawai.php";
					break;
				case 'add-pendidikan':
					include "admin/pendidikan/add_pendidikan.php";
					break;
				case 'view-pendidikan':
					include "admin/pendidikan/view_pendidikan.php";
					break;
				case 'add-pekerjaan':
					include "admin/pekerjaan/add_pekerjaan.php";
					break;
				case 'view-pekerjaan':
					include "admin/pekerjaan/view_pekerjaan.php";
					break;
				case 'add-keluarga':
					include "admin/keluarga/add_keluarga.php";
					break;
				case 'view-keluarga':
					include "admin/keluarga/view_keluarga.php";
					break;
				case 'add-diklat':
					include "admin/diklat/add_diklat.php";
					break;
				case 'view-diklat':
					include "admin/diklat/view_diklat.php";	
					break;
				case 'data-diklat':
					include "admin/diklat/data_diklat.php";	
					break;
				case 'del-diklat':
					include "admin/diklat/del_diklat.php";	
					break;
				case 'edit-diklat':
					include "admin/diklat/edit_diklat.php";	
					break;
				case 'del-keluarga':
					include "admin/keluarga/del_keluarga.php";	
					break;
				case 'edit-keluarga':
					include "admin/keluarga/edit_keluarga.php";	
					break;
				case 'del-pekerjaan':
					include "admin/pekerjaan/del_pekerjaan.php";	
					break;
				case 'edit-pekerjaan':
					include "admin/pekerjaan/edit_pekerjaan.php";	
					break;
				case 'del-pendidikan':
					include "admin/pendidikan/del_pendidikan.php";	
					break;
				case 'edit-pendidikan':
					include "admin/pendidikan/edit_pendidikan.php";	
					break;
				case 'data-pekerjaan':
					include "admin/pekerjaan/data_pekerjaan.php";	
					break;
				case 'data-pendidikan':
					include "admin/pendidikan/data_pendidikan.php";	
					break;

				//Asrama
				case 'data-ppnpn':
					include "admin/ppnpn/data_ppnpn.php";
					break;
				case 'add-ppnpn':
					include "admin/ppnpn/add_ppnpn.php";
					break;
				case 'edit-ppnpn':
					include "admin/ppnpn/edit_ppnpn.php";
					break;
				case 'del-ppnpn':
					include "admin/ppnpn/del_ppnpn.php";
					break;
				case 'view-ppnpn':
					include "admin/ppnpn/view_ppnpn.php";
					break;
				case 'add-keluarga-ppnpn':
					include "admin/keluarga_ppnpn/add_keluarga.php";
					break;
					case 'edit-keluarga-ppnpn':
						include "admin/keluarga_ppnpn/edit_keluarga.php";
						break;	
				case 'view-keluarga-ppnpn':
					include "admin/keluarga_ppnpn/view_keluarga.php";
					break;
				case 'add-pendidikan-ppnpn':
					include "admin/pendidikan_ppnpn/add_pendidikan.php";
					break;
				case 'view-pendidikan-ppnpn':
					include "admin/pendidikan_ppnpn/view_pendidikan.php";
					break;
					case 'edit-pendidikan-ppnpn':
						include "admin/pendidikan_ppnpn/edit_pendidikan.php";
						break;

				//Profil
				case 'data-profil':
					include "admin/profil/data_profil.php";
					break;
				case 'edit-profil':
					include "admin/profil/edit_profil.php";
					break;

			
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
          elseif($data_level=="User"){
              include "home/user.php";
              }
			  elseif($data_level=="PPNPN"){
				include "home/ppnpn.php";
				}
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="#">
					<strong> TU Jaya Jaya Jaya</strong>
				</a>
				All rights reserved.
			</div>
			<b>Created 2023</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>