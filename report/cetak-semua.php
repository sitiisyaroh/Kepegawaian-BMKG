<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=daftar-nominatif.xls");
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Stasiun Klimatologi Semarang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered" border="1" align="1">
				<thead>
					<tr>
						<th>No</th>
						<th>NAMA</th>
						<th>NIP</th>
						<th>PANGKAT GOLONGAN</th>
						<th>Terhitung Mulai Tanggal/TMT</th>
						<th>JABATAN</th>
					</tr>
				</thead>
				<tbody>

					<?php
                    include "../inc/koneksi.php";
              $no = 1;
			  $sql = $koneksi->query("SELECT tb_pegawai.nip, tb_pegawai.nama, tb_pegawai.pangkat, tb_pegawai.status, tb_pekerjaan.date_mulai from tb_pegawai inner join tb_pekerjaan on tb_pegawai.nip = tb_pekerjaan.nip");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['nip']; ?>
						</td>
						<td>
							<?php echo $data['pangkat']; ?>
						</td>
						<td>
							<?php echo $data['date_mulai']; ?>
						</td>
						<td>
							<?php echo $data['pejabat']; ?>
						</td>
						<td>
							<?php echo $data['status']; ?>
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