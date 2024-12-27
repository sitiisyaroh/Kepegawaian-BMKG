<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="container">
    <br>
    <h4>Pencarian Data Berdasarkan Tanggal</h4>

    <form action="index.php?page=data-diklat" method="post">

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
			<i class="fa fa-table"></i> Data Diklat</h3>
	</div>
    <table id="example1" class="table table-bordered table-striped">
        <br>
        <thead>
        <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Nama Kursus/ Diklat</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tempat</th>
                <th>Tanda Lulus</th>
                <th>Keterangan</th>
                <th>Aksi</th>
        </tr>
        </thead>
        <?php

        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));


            $sql="select * from tb_diklat inner join tb_pegawai on tb_diklat.nip = tb_pegawai.nip where mulai between '".$tgl_awal."' and '".$tgl_akhir."' ";

        }else {
            $sql="select * from tb_diklat INNER JOIN tb_pegawai WHERE tb_diklat.nip = tb_pegawai.nip";
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
                <td><?php echo $data["kursus"];   ?></td>
                <td><?php echo date('d-m-Y', strtotime($data["mulai"]));   ?></td>
                <td><?php echo date('d-m-Y', strtotime($data["selesai"]));   ?></td>
                <td><?php echo $data["tempat"]; ?></td>
                <td>
                <a href="DownloadFile.php?filename=<?=$data['filename']?>">Download</a>
				</td>
                <td><?php echo $data["keterangan"]; ?></td>
                <td><a href="?page=del-diklat&kode=<?php echo $data['kursus']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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