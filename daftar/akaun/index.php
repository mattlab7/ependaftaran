<?php
ob_start();
session_start();

include_once '../../dbconfig.php';
if( !isset($_SESSION['user']) ) {
		header("Location: ../../index.php");
		exit;
	}

if(isset($_POST['btn-signup'])) {
		
	$uname = trim($_POST['uname']);
	$email = trim($_POST['email']);
	$upass = trim($_POST['pass']);
	
	$uname = strip_tags($uname);
	$email = strip_tags($email);
	$upass = strip_tags($upass);
	
	$password = hash('sha256', $upass);
	
	$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); 
	
	if ($count==0) {
		
		$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$uname','$email','$password')";
		$res = mysql_query($query);
		
		if ($res) {
			$errMSG = "Berjaya! Anda boleh log masuk";
		} else {
			$errMSG = "Maaf, kami tidak boleh memproses, sila cuba lagi kemudian.";	
		}	
			
	} else {
		$errMSG = "E-mel ini mempunyai rekod dalam pangkalan data, tolong gunakan e-mel yang lain.";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Pendaftaran Akaun Pengguna</title>
	<meta name="author" content="Matthew John">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="../../main.css">
	<style type="text/css">
		h3 {
			font-size: 15px;
			margin-top: 120px;
			margin-bottom: 10px;
		}
		h1 {
			margin-top: 10px;
			margin-bottom: 45px;
		}
		#registerbox {
			width: 430px;
			height: 170px;
			background-color:#FFFFFF;
			color:#000000;
			border-radius:20px;
			padding-top: 0px;
		}
		table {
			padding-top: 32px;
		}
		#err {
			margin-top: 15px;
			border: white solid 1px;
			background-color: white;
			width: 650px;
			border-radius: 20px;
			color: #000000;
		}
		a {
			text-decoration: none;
			color: #FFFFFF;
		}
		a:hover {
			text-shadow: 0px 0px 5px white;
		}
	</style>
</head>
<body>
	<center>
		<h3><a href="../../utama">e-Pendaftaran</a></h3>
		<h1>Pendaftaran Akaun Pengguna</h1>
		<div id="registerbox">
			<table>
				<form method="POST" autocomplete="off">
					<tr>
						<td>
							<label for="usr">Nama Pengguna: </label>
						</td>
						<td>
							<input type="text" id="usr" name="uname">
						</td>
					</tr>
					<tr>
						<td>
							<label for="em">Email: </label>
						</td>
						<td>
							<input type="email" name="email">
						</td>
					</tr>
					<tr>
						<td>
							<label for="pwd">Kata Laluan: </label>
						</td>
						<td>
							<input type="password" id="pwd" name="pass">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Daftar" name="btn-signup">
						</td>
					</tr>
				</form>
			</table>
		</div>
		<?php
			if ( isset($errMSG) ) {
		?>
		<div id="err">
			<?php echo $errMSG; ?>
		</div>
		<?php
			}
		?>
		</div>
	</center>
</body>
</html>