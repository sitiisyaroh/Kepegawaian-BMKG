<?php

if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_pegawai where nip='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $foto= $data_cek['foto'];
    if (file_exists("foto/$foto")){
        unlink("foto/$foto");
    }

    $sql_hapus = "DELETE FROM tb_pegawai WHERE nip='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    $sql_hapus2 = "DELETE FROM tb_pendidikan WHERE nip='".$_GET['kode']."'";
    $query_hapus2 = mysqli_query($koneksi, $sql_hapus2);

    $sql_hapus3 = "DELETE FROM tb_pekerjaan WHERE nip='".$_GET['kode']."'";
    $query_hapus3 = mysqli_query($koneksi, $sql_hapus3);

    $sql_hapus4 = "DELETE FROM tb_keluarga WHERE nip='".$_GET['kode']."'";
    $query_hapus4 = mysqli_query($koneksi, $sql_hapus4);

    $sql_hapus5 = "DELETE FROM tb_diklat WHERE nip='".$_GET['kode']."'";
    $query_hapus5 = mysqli_query($koneksi, $sql_hapus5);
    
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pegawai'
        ;}})</script>";
    }
?>