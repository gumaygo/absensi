<?php  
session_start();

$error = "";

include '../koneksi/koneksi.php';

if (isset($_POST['login'])) {

	foreach ($_POST as $key => $value) {
		${$key} = $value;
	}

	$query = mysqli_query($conn, "SELECT password , role  from admin where username='$username'");

	if ($query) {

		if (mysqli_num_rows($query)>0) {
			$data  = mysqli_fetch_array($query);
			$_SESSION['role'] = $data['role'];
			if (password_verify($password,$data['password'])) {

				
				$_SESSION['admin'] = $username;
				if ($data['role'] == "root") {
					header("location:dashboard");	
				}
				elseif ($data['role'] == "spmi") 
				 { header("location:../spmi");}
				elseif ($data['role'] == "kajur") 
				 { header("location:../kajur");}

				
				exit;
			}else $error = "Password dan Email Salah!";
		}else $error = "Password dan Email Salah!";
		
	}else $error = "Password dan Email Salah!";
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
	<link rel="stylesheet" href="../materialize/css/materialize.css">
	<link href="../webcon/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
	<script src="../js/jquery-2.2.2.js"></script>
	<script src="../materialize/js/materialize.css"></script>
	<style>
		.log{
			margin-top:20px;
		}
		.h5{
			color: white;
			margin-left:-110px;
			margin-top: 100px; 
		}
	</style>
</head>
<body background="../images/background.jpg">
	<div class="container">
		<center><h5 class="h5">Sistem Absensi Kampus</h5></center>
		<div class="row log">
		    <div class="col s7 offset-s2 card-panel z-depth-3">
		      <center><h5>LOGIN ADMIN</h5></center>
		      <center><h5><?php echo "<font color='red'>$error</font>"; ?></h5></center>
		      <hr>

		      <form method="post" action="">
		        <div class="row">
		          <div class="input-field col s12">
		            <i class="mdi mdi-account prefix"></i> 
		            <input id="icon_prefix" type="text" class="validate" name="username" placeholder="USERNAME">
		          </div>

		          <div class="input-field col s12">
		            <i class="mdi mdi-key prefix"></i>
		            <input id="icon_telephone" type="password" class="validate" name="password" placeholder="PASSWORD">
		            
		          </div>
				  
		          <div class="input-field col s12">
		            <button class="btn xxy col s12 red darken-1" name="login"><i class="mdi mdi-forward left"></i>Masuk</button>
		          </div>
		          
		        </div>
		      </form>
			


		    </div>

		    <div class="col s7 offset-s2 card-panel z-depth-3"><br>
		    	
		    		<a class="waves-effect waves-light btn red darken-1 col s12" href="../" style="margin-bottom:20px;"><i class="mdi mdi-forward left"></i>Login Dosen</a>
            			
            </div>
		</div>
	</div>
</body>
</html>
