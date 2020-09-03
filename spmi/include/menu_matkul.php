

          <h1>
            <b>Absensi Mata Kuliah</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i>Absensi Matkul</a></li>
          </ol>
       
    

    <h5><b><?php echo date("l, M Y"); ?></b></h5>
    <hr>

    <h5><b>Daftar Absensi Matakuliah</b></h5>
    <p>Berikut ini adalah daftar absensi matakuliah yang terdaftar di database Polinela:
    </p>
    <br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Absensi Matkul</h3>
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
                            <th>Rencana judul</th>
                            <th>Rencana topik</th>
                            <th>judul</th>
                            <th>topik</th>
                            <!-- <th></th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <!-- <th>No</th>
                            <th>ID Matkul</th>
                            <th>Nama Matkul</th>
                            <th>hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
                            <th>Aksi</th> -->
                    </tfoot>
                    <tbody>
                    <?php  

                    $query = mysqli_query($conn,"select matkul.* , rencana.*  , absen_dosen.* FROM matkul , rencana , absen_dosen WHERE matkul.id_matkul = rencana.id_matkul and rencana.rancana_pertemuan = absen_dosen.pertemuan order by matkul.id_matkul , rencana.rancana_pertemuan ");
                    if ($query) {
                      $no = 1;
                      while ($rows = mysqli_fetch_array($query)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $rows['id_matkul']; ?></td>
                        <td><?php echo $rows['nm_matkul']; ?></td>
                        <td><?php echo $rows['rencana_judul']; ?></td>
                        <td><?php echo $rows['rencana_topik']; ?></td>
                        <td><?php echo $rows['judul']; ?></td>
                        <td><?php echo $rows['topik']; ?></td>
                        <td><?php echo $rows['status2']; ?></td>
                        
                        <?php

if ( $rows['status2'] == '0'  ) { ?>

  <td><a href="../include/edit_status_pencapaian.php?status=1&&id_matkul=<?php echo $rows['no']; ?>" class="btn btn-primary">Tercapai</a></td>
                      
                      <td><a href="edit_status_pencapaian.php?status=2&&id_matkul=<?php echo $rows['id_matkul']; ?>" class="btn btn-danger "> Tidak Tercapai</a></td>

<?php } elseif ( $rows['status2'] == '1'  )  { ?>


<td><a href="" disabled class="btn btn-primary">Tercapai</a></td>


 <?php }
 elseif ( $rows['status2'] == '2'  )  { ?>


<td><a href="edit_status_pencapaian.php?status=2&&id_matkul=<?php echo $rows['id_matkul']; ?>" disabled class="btn btn-danger">Tidak Tercapai</a></td>


 <?php } ?>


                         ?>

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