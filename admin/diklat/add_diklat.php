<?php include 'dbcon.php'; ?>

<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_diklat 
		WHERE tb_diklat.nip='".$_GET['kode']."'";
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
              <strong>Tambah Data Kursus/Diklat</strong>
                <form method="post" enctype="multipart/form-data">
                    <?php
                        // If submit button is clicked
                        if (isset($_POST['submit']))
                        {
                          // get name from the form when submitted
                          $nip = $_POST['nip'];
                          $name = $_POST['name'];
                          $mulai = $_POST['mulai'];
                          $selesai = $_POST['selesai'];
                          $tempat = $_POST['tempat'];
                          $keterangan = $_POST['keterangan'];                  
 
                          if (isset($_FILES['pdf_file']['name']))
                          {  
                          // If the ‘pdf_file’ field has an attachment
                            $file_name = $_FILES['pdf_file']['name'];
                            $file_tmp = $_FILES['pdf_file']['tmp_name'];
                             
                            // Move the uploaded pdf file into the pdf folder
                            move_uploaded_file($file_tmp,"./file/".$file_name);
                            // Insert the submitted data from the form into the table
                            $insertquery =
                            "INSERT INTO tb_diklat(nip,kursus,mulai,selesai,filename,tempat,keterangan) VALUES('$nip','$name','$mulai','$selesai','$file_name','$tempat','$keterangan')";
                             
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
					                   <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip']?>" readonly>
				                  </div>
			                  </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Kursus</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Kursus" name="name" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tanggal Mulai</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal Mulai" name="mulai" required>
                        </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Tanggal Selesai</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal Selesai" name="selesai" required>
                          </div>
                       </div>
                        
                        <div class="form-group row">
				                  <label class="col-sm-3  col-form-label">Berkas Diklat</label>
				                 <div class="col-sm-9">
                            <input type="file" name="pdf_file" accept=".pdf" required/>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tempat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Tempat" name="tempat" required>
                          </div>
                       </div>

                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Keterangan" name="keterangan" required>
                          </div>
                       </div>

                        <div class="card-footer">
                            <input type="submit"
                                  class="btn btn-info" name="submit" value="Submit">
                              <a href="?page=view-diklat&kode=<?php echo $data_cek['nip']; ?>" class="btn btn-warning">Kembali</a>
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