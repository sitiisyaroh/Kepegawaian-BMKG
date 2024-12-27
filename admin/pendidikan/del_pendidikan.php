<?php

if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_pendidikan where nama_sekolah='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $file_name= $data_cek['filename'];
    if (file_exists("file/$file_name")){
        unlink("file/$file_name");
    }

    $sql_hapus = "DELETE FROM tb_pendidikan WHERE nama_sekolah='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php'
        ;}})</script>";
    }
?>