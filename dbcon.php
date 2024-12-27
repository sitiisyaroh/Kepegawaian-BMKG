<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'data_pegawai3';
 
    $con = mysqli_connect($host, $user, $password, $database);
 
    if (!$con){
        ?>
            <script>alert("Connection Unsuccessful!!!");</script>
        <?php
    }
?>