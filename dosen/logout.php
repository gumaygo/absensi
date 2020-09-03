<?php  
session_start();
unset($_SESSION['dosen']);
session_destroy ();
header("location:../index.php");
?>