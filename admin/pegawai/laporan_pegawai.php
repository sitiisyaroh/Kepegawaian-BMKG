<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Laporan Pegawai</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<a href="./report/cetak-laporan.php" target=" _blank"
					 title="Cetak Data Pegawai"   class="btn btn-primary"> <i class="fa fa-download"> </i> Unduh Data Pegawai  </a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
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
              $no = 1;
			  $sql = $koneksi->query("SELECT nama, nip, tempat_lahir, agama,date, alamat, no_hp, status, golongan FROM tb_pegawai
			 						UNION SELECT nama, nip,  tempat_lahir, agama, date, alamat, no_hp, status, golongan FROM tb_ppnpn");
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



        </div>
    </div>
<!-- /.card-body -->