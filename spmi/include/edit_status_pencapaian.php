<?php 

      include "../../koneksi/koneksi.php";

$q="UPDATE `rencana` SET `status` = '".$_GET['status']."' WHERE `rencana`.`no` = 1;";
$query = mysqli_query($conn,$q);
header("Location: ../dashboard/index.php?page=31");

