<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
            $sql_hapus1 = "DELETE FROM tb_pegawai WHERE id_pengguna='".$_GET['kode']."'";
            $query_hapus1 = mysqli_query($koneksi, $sql_hapus1);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengguna';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengguna';
                    }
                })</script>";
            }
        }

