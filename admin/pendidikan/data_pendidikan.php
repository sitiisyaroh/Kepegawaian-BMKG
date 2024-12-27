<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="table-responsive">
    <br>
    <h4>Pencarian Data Berdasarkan Tanggal</h4>

    <form action="index.php?page=data-pendidikan" method="post">

        <div class="form-group">
            <label>Tanggal Awal</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="col-sm-5" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Akhir</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="col-sm-5" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
            </div>
        </div>

        <script type="text/javascript">
            $(function(){
                $(".datepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: false,
                });
                $("#tgl_mulai").on('changeDate', function(selected) {
                    var startDate = new Date(selected.date.valueOf());
                    $("#tgl_akhir").datepicker('setStartDate', startDate);
                    if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                        $("#tgl_akhir").val($("#tgl_mulai").val());
                    }
                });
            });
        </script>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Cari">
    </div>
    </form>
    <div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pekerjaan</h3>
	</div>
    <table id="example1" class="table table-bordered table-striped">
        <br>
        <thead>
        <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tingkat</th>
				<th>Nama Sekolah</th>
				<th>Jurusan</th>
				<th>Tahun Lulus</th>
				<th>Kota Sekolah</th>
				<th>Nama Kepala Sekolah</th>
				<th>Tanggal Ijazah</th>
				<th>File Ijazah</th>
				<th>Aksi</th>
        </tr>
        </thead>
        <?php

        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));


            $sql="select * from tb_pendidikan inner join tb_pegawai on tb_pendidikan.nip = tb_pegawai.nip where mulai between '".$tgl_awal."' and '".$tgl_akhir."' ";

        }else {
            $sql="select * from tb_pendidikan INNER JOIN tb_pegawai WHERE tb_pendidikan.nip = tb_pegawai.nip";
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nip"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["tingkat"];   ?></td>
                <td><?php echo $data["nama_sekolah"]; ?></td>
                <td><?php echo $data["jurusan"]; ?></td>
                <td><?php echo $data["tahun_lulus"];   ?></td>
                <td><?php echo $data["kota"]; ?></td>
                <td><?php echo $data["nama_kepala"]; ?></td>
                <td><?php echo date('d-m-Y', strtotime($data["tgl_up"]));   ?></td>
                <td>
                <a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a>
				</td>
                <td><a href="?page=del-pendidikan&kode=<?php echo $data['tingkat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i></td>
               
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>