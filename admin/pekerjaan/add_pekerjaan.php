<?php include 'dbcon.php'; ?>

<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai INNER JOIN tb_pekerjaan 
		WHERE tb_pekerjaan.nip='".$_GET['kode']."'";
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
              <strong>Tambah Data Pekerjaan</strong>
                <form method="post" enctype="multipart/form-data">
                    <?php
                        // If submit button is clicked
                        if (isset($_POST['submit']))
                        {
                          // get name from the form when submitted
                          $nip = $_POST['nip'];
                          $name = $_POST['name'];
                          $jabatan = $_POST['jabatan'];
                          $date_mulai = $_POST['date_mulai'];
                          $gaji = $_POST['gaji'];
                          $pejabat = $_POST['pejabat'];
                          $nomor = $_POST['nomor'];   
                          $date_sk = $_POST['date_sk'];
 
                          if (isset($_FILES['pdf_file']['name']))
                          {  
                          // If the ‘pdf_file’ field has an attachment
                            $file_name = $_FILES['pdf_file']['name'];
                            $file_tmp = $_FILES['pdf_file']['tmp_name'];
                             
                            // Move the uploaded pdf file into the pdf folder
                            move_uploaded_file($file_tmp,"./file/".$file_name);
                            // Insert the submitted data from the form into the table
                            $insertquery =
                            "INSERT INTO tb_pekerjaan(nip,pangkat, jabatan, date_mulai, gaji,pejabat,nomor,date_sk,filename) VALUES('$nip','$name','$jabatan','$date_mulai','$gaji','$pejabat','$nomor','$date_sk','$file_name')";
                             
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
                          <label class="col-sm-3  col-form-label">Pangkat</label>
                        <div class="col-sm-9">
                        <select name="name" id="name" class="form-control" required>
						            <option >-- Pilih --</option>
                        <option >I A/ Juru Muda</option>
                        <option >I B/ Juru Muda Tingkat 1</option>
                        <option >I C/ Juru</option>
                        <option >I D/ Juru Tingkat 1</option>
                        <option >II A/ Pengatur Muda</option>
                        <option >II B/ Pengatur Muda Tingkat 1</option>
                        <option >II C/ Pengatur</option>
                        <option >II D/ Pengatur Tingkat 1</option>
                        <option >III A/ Penata Muda</option>
                        <option >III B/ Penata Muda Tingkat 1</option>
                        <option >III C/ Penata</option>
                        <option >III D/ Penata Tingkat 1</option>
                        <option >IV A/ Pembina</option>
                        <option >IV B/ Pembina Tingkat 1</option>
                        <option>IV C/ Pembina Utama Muda</option>
                        <option >IV D/ Pembina Utama Madya</option>
                        <option >IV E/ Pembina Utama</option>
                      </select>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Jabatan" name="jabatan" required>
                        </div>
                      </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Terhitung Mulai Tanggal/TMT</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Terhitung Mulai Tanggal/TMT" name="date_mulai" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">Gaji</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Gaji" name="gaji" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pejabat Penandatangan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Pejabat Penandatangan" name="pejabat" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor SK</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   placeholder="Nomor" name="nomor" required>
                           </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal SK Keluar</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"
                                   placeholder="Tanggal SK" name="date_sk" required>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-3  col-form-label">File SK</label>
                          <div class="col-sm-9">
                            <input type="file" name="pdf_file"
                                    accept=".pdf" required/>
                          </div>
                        </div>

                        <div class="card-footer">
                          <input type="submit"
                          class="btn btn-info" name="submit" value="Submit">
                          <a href="?page=view-pekerjaan&kode=<?php echo $data_cek['nip']; ?>" class="btn btn-warning">Kembali</a>
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