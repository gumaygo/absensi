<?php  
$query = mysqli_query($conn,"SELECT * FROM matkul WHERE id_matkul='$id_matkul'");
if ($query) {
  $row_m = mysqli_fetch_array($query);
}else echo mysqli_error($conn);
$query_dosen = mysqli_query($conn,"SELECT * FROM dosen WHERE nid='$row_m[nid]'");
if ($query_dosen) {
  $rows_d = mysqli_fetch_array($query_dosen);
}else echo mysqli_error($conn);
?>
          <h3>
            <b>Ubah Absensi Matakuliah "<?php echo $row_m['nm_matkul']; ?>"</b>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Pencapaian</a></li>
          </ol>
       
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>
    
    <a href="index.php " class="btn btn-primary btn-lg" style="margin-right:10px;float:right;"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    
    <h5><b>Daftar Mahasiswa matakuliah "<?php echo $row_m['nm_matkul']; ?>"</b></h5>
		<p>Berikut ini adalah daftar mahasiswa anda pada matakuliah "<?php echo $row_m['nm_matkul']; ?>":
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Daftar Mahasiswa</h3>
                  <!-- tools box -->
                      
                </div>
                
                <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                ?>


                <div class="box-body">

                <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Pertemuan</th>
                          <th>NID</th>
                          <th>Nama</th>
                          <th>Hadir</th>
                          <th>Ijin</th>
                          <th>Sakit</th>
                          <th>Alfa</th>
                      </tr>
                  </thead>
                  
                  <tbody> 
                        <form action="" method="post">
                        <?php  
                        
                       
                        
                            $query_c = mysqli_query($conn,"SELECT status FROM absen_dosen 
                              WHERE id_matkul='$id_matkul' AND pertemuan=$pertemuan");
                            if ($query_c) {
                              $rowss = mysqli_fetch_array($query_c);
                            }else echo mysqli_error($conn);
                            $chaked1 = "";
                            $chaked2 = "";
                            $chaked3 = "";
                            $chaked4 = "";
                            switch ($rowss['status']) {
                              case 'Hadir':
                                $chaked1 = "checked";
                                break;
                              case 'Ijin':
                                $chaked2 = "checked";
                                break;
                              case 'Sakit':
                                $chaked3 = "checked";
                                break;
                              case 'Alfa':
                                $chaked4 = "checked";
                                break;
                              default:
                                $chaked1 = "";
                                $chaked2 = "";
                                $chaked3 = "";
                                $chaked4 = "";
                                break;
                            }
                            
                        ?>
                                <tr>
                                  <td><?php echo $pertemuan; ?></td>
                                  <td><?php echo $rows_d['nid']; ?></td>
                                  <td><?php echo $rows_d['nm_dosen']; ?></td>
                                  <td><input type="radio" value="Hadir" name="radio" <?php echo $chaked1; ?>> Hadir</td>
                                  <td><input type="radio" value="Ijin" name="radio" <?php echo $chaked2; ?>> Ijin</td>
                                  <td><input type="radio" value="Sakit" name="radio" <?php echo $chaked3; ?>> Sakit</td>
                                  <td><input type="radio" value="Alfa" name="radio" <?php echo $chaked4; ?>> Alfa</td>
                                </tr>

                               
                        
                            <tr>
                              <td colspan="7"><button class="pull-right btn btn-primary" name="simpan" style="margin-right:40px;">Simpan <i class="fa fa-save"></i></button></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>
                              <td style="display:none"></td>

                              <td style="display:none"></td>
                              
                            </tr>
                        </form>      
                    
                    </tbody>
                  </table>
                    
                
                </div>
                
                
              </div>






<script>
  $(document).ready(function() {
      $('#table').DataTable({
        "pageLength": 50
      });
   });

   $(document).ready(function(){
        $('[data-tt="tooltip"]').tooltip(); 
    });
</script>

<?php  

if (isset($_POST['simpan'])) {
  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }
  
  
  $query = mysqli_query($conn,"UPDATE absen_dosen SET status='$radio' WHERE id_matkul='$id_matkul' AND pertemuan='$pertemuan'");
   

  if ($query) {
    $_SESSION['pesan'] = "<div class='alert alert-success' style='margin-top:5px;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Berhasil Melakukan Update Absensi Dosen!
                              </div>";
    echo "<script>window.location = 'index.php?page=24&&id_matkul=$id_matkul&&nid=$nid'</script>";
  }else{
    $_SESSION['pesan'] = "<div class='alert alert-danger' style='margin-top:5px;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Gagal Melakukan Absensi Update Dosen!
                              </div>";
    echo "<script>window.location = 'index.php?page=24&&id_matkul=$id_matkul&&nid=$nid'</script>";
  }
  
}

?>