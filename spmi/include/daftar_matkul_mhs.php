<?php  
$query = mysqli_query($conn,"SELECT * FROM mahasiswa WHERE nim='$nim'");
if ($query) {
  $rows = mysqli_fetch_array($query);
}else echo mysqli_error($conn);
?>


          <h3>
            <b>Daftar Matkul "<?php echo $rows['nm_mhs']; ?>"</b>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Matkul</a></li>
          </ol>
       
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

    <a href="index.php?page=16" class="btn btn-primary btn-lg" style="margin-right:10px;float:right;"><i class="fa fa-reply"></i> Kembali</a>

		<h5><b>Daftar Matakuliah</b></h5>
		<p>Berikut ini adalah daftar matakuliah yang terdaftar di database Polinela:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-book"></i>
                  <h3 class="box-title">Matkul</h3>
                  <!-- tools box -->
                      
                </div>
                
                <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                ?>


                <div class="box-body">

                  <table id="table" class="row-border" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Matkul</th>
                            <th>Nama Matkul</th>
                            <th>hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>No</th>
                            <th>ID Matkul</th>
                            <th>Nama Matkul</th>
                            <th>hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                    <?php  

                    $query = mysqli_query($conn,"SELECT a.*,b.*,c.* FROM detil_matkul a,matkul b,dosen c WHERE nim='$nim' AND a.id_matkul=b.id_matkul AND b.nid = c.nid");
                    if ($query) {
                      $no = 1;
                      while ($rows = mysqli_fetch_array($query)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $rows['id_matkul']; ?></td>
                        <td><?php echo $rows['nm_matkul']; ?></td>
                        <td><?php echo $rows['hari']; ?></td>
                        <td><?php echo $rows['jam_mulai']; ?></td>
                        <td><?php echo $rows['jam_selesai']; ?></td>
                        <td><?php echo $rows['ruangan']; ?></td>
                        <td><?php echo $rows['nm_dosen']; ?></td>
                        <td><a href="index.php?page=18&&nim=<?php echo $nim; ?>&&id_matkul=<?php echo $rows['id_matkul']; ?>" class="btn btn-success"><i class="fa fa-user"></i> Lihat Absensi</a></td>
                      </tr>

                      <div class="modal fade" id="confirm-delete_<?php echo $rows['id_matkul'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      Hapus Data Matakuliah
                                  </div>
                                  <div class="modal-body">
                                      Apakah anda yakin menghapus data Matakuliah ini?
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                      <a class="btn btn-danger btn-ok" id="<?php echo $rows['id_matkul'] ;?>" href="../include/hapus_matkul.php?id_matkul=<?php echo $rows['id_matkul']; ?>">Hapus</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php
                      }
                    }

                    ?>
                    </tbody>
                  </table>
                </div>
                
                
              </div>


<script>
  $(document).ready(function() {
      $('#table').DataTable();
  } );

   $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-edit_"+id;
      $("#"+modal_id).modal('hide');
    });

</script>