<?php include 'dbcon.php'; ?>

<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_pendidikan 
		WHERE tb_pendidikan.nip='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <strong>Tambah Data</strong>
                <form method="post" enctype="multipart/form-data">
                    <?php
                        // If submit button is clicked
                        if (isset($_POST['submit']))
                        {
                          // get name from the form when submitted
                          $nip = $_POST['nip'];
                          $tingkat = $_POST['tingkat'];
                          $name = $_POST['name'];
                          $jurusan = $_POST['jurusan'];
                          $tahun_lulus = $_POST['tahun_lulus'];
                          $kota = $_POST['kota']; 
                          $nama_kepala = $_POST['nama_kepala'];
                          $tgl_up = $_POST['tgl_up'];                  
 
                          if (isset($_FILES['pdf_file']['name']))
                          {  
                          // If the ‘pdf_file’ field has an attachment
                            $file_name = $_FILES['pdf_file']['name'];
                            $file_tmp = $_FILES['pdf_file']['tmp_name'];
                             
                            // Move the uploaded pdf file into the pdf folder
                            move_uploaded_file($file_tmp,"./file/".$file_name);
                            // Insert the submitted data from the form into the table
                            $insertquery =
                            "INSERT INTO tb_pendidikan(nip,tingkat,nama_sekolah,jurusan,tahun_lulus,kota,nama_kepala,tgl_up,filename) VALUES('$nip','$tingkat','$name','$jurusan','$tahun_lulus','$kota','$nama_kepala','$tgl_up','$file_name')";
                             
                            // Execute insert query
                            $iquery = mysqli_query($con, $insertquery);     
 
                                if ($iquery)
                               {                            
                    ?>                                             
                                  <div class=
                                "alert alert-success alert-dismissible fade show text-center">
                                    <a class="close" data-dismiss="alert" aria-label="close">
                                      ×
                                    </a>
                                    <strong>Success!</strong> Data submitted successfully.
                                  </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                  <div class=
                                "alert alert-danger alert-dismissible fade show text-center">
                                    <a class="close" data-dismiss="alert" aria-label="close">
                                      ×
                                    </a>
                                    <strong>Failed!</strong> Try Again!
                                  </div>
                                <?php
                                }
                            }
                            else
                            {
                              ?>
                                <div class=
                                "alert alert-danger alert-dismissible fade show text-center">
                                  <a class="close" data-dismiss="alert" aria-label="close">
                                      ×
                                  </a>
                                  <strong>Failed!</strong> File must be uploaded in PDF format!
                                </div>
                              <?php
                            }// end if
                        }// end if
                    ?>
                     
                     <div class="card-body">

                        <div class="form-group row">
                         <label class="col-sm-3  col-form-label">NIP</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your NIP" name="nip" value="<?php echo $data_cek['nip']?>" readonly>
                          </div> 
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tingkat Pendidikan</label>
                          <div class="col-sm-9">
                          <select name="tingkat" id="tingkat" class="form-control" required>
                                    <option >-- Pilih --</option>
                                    <option >SD </option>
                                    <option >SMP</option>
                                    <option >SMA</option>
                                    <option >S1</option>
                                    <option >S2</option>
                                    <option >S3</option>
                                    <option >Profesi</option>
                                    <option >D-IV</option>
                          </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Nama Sekolah</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Nama Sekolah" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Jurusan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Jurusan" name="jurusan" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tahun Lulus</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Tahun Lulus" name="tahun_lulus" required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">Kota</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Kota" name="kota"required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Nama Kepala Sekolah</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Enter your Nama Kepala Sekolah" name="nama_kepala" required>
                             </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tanggal Ijazah</label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Enter your Tanggal Ijazah" name="tgl_up" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label class="col-sm-3  col-form-label">File Ijazah</label>
                          <div class="col-sm-9">
                            <input type="file" name="pdf_file"
                                    accept=".pdf" required/>
                         </div>
                        </div>

                        <div class="card-footer">
                              <input type="submit"
                                    class="btn btn-info" name="submit" value="Submit">
                                    <a href="?page=view-pendidikan&kode=<?php echo $data_cek['nip']; ?>" class="btn btn-warning">Kembali</a>
                          </div>
                    </div>
                </form>
            </div>           
             
                        </tbody>
                      </table>               
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>