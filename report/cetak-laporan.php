<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan-pegawai.xls");
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pegawai</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered" border="1" align="1">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>No HP</th>
						<th>Bagian</th>
						<th>Golongan</th>
					</tr>
				</thead>
				<tbody>

					<?php
                    include "../inc/koneksi.php";
              $no = 1;
			  $sql = $koneksi->query("SELECT nama, nip, tempat_lahir, agama,date, alamat, no_hp, status, golongan FROM tb_pegawai
			  UNION SELECT nama, nip, tempat_lahir, agama, date, alamat, no_hp, status, golongan FROM tb_ppnpn");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
						</td>
						<td>
							<?php echo $data['agama']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['no_hp']; ?>
						</td>
						<td>
							<?php echo $data['status']; ?>
						</td>
						<td>
							<?php echo $data['golongan']; ?>
						</td>
                    </tr>

                <?php
            	}
            	?>
            </tbody>
            </tfoot>
            </table>

    <script>
		window.print();
	</script>
        </div>
    </div>
<!-- /.card-body -->                        