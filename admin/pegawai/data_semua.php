<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pegawai</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th>No</th>
						<th>NAMA</th>
						<th>NIP</th>
						<th>PANGKAT GOLONGAN</th>
						<th>TMT</th>
						<th>JABATAN</th
                        <th></th>
                        <th>FORMAL</th>
						<th>JURUSAN</th>
						<th>KURSUS PELATIHAN</th>

					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT tb_pegawai.nip, tb_pegawai.nama, tb_pegawai.golongan, tb_pekerjaan.pejabat, tb_pekerjaan.date_mulai, tb_pendidikan.tingkat, tb_pendidikan.jurusan, tb_diklat.kursus 
              from (tb_pegawai left join tb_pekerjaan on tb_pegawai.nip = tb_pekerjaan.nip) 
              left join tb_pendidikan on tb_pegawai.nip=tb_pendidikan.nip
              left join tb_diklat on tb_pegawai.nip=tb_diklat.nip");
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
							<?php echo $data['golongan']; ?>
						</td>
						<td>
							<?php echo $data['date_mulai']; ?>
						</td>
						<td>
							<?php echo $data['pejabat']; ?>
						</td>
                        <td>
							<?php echo $data['tingkat']; ?>
						</td>
                        <td>
							<?php echo $data['jurusan']; ?>
						</td>
                        <td>
							<?php echo $data['kursus']; ?>
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