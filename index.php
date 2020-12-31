<?php
	ob_start();
	session_start();
	require_once 'dbconfig.php';
	
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: utama/index.php");
		exit;
	}
	
	if( isset($_POST['btn-login']) ) {	
		
		$uname = $_POST['uname'];
		$upass = $_POST['pass'];
		
		$uname = strip_tags(trim($uname));
		$upass = strip_tags(trim($upass));
		
		$password = hash('sha256', $upass);
		
		$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userName='$uname'");
		
		$row=mysql_fetch_array($res);
		
		$count = mysql_num_rows($res); 
		
		if( $count == 1 && $row['userPass']==$password ) {
			$_SESSION['user'] = $row['userId'];
			header("Location: utama/index.php");
		} else {
			$errMSG = "Maklumat salah! Tolong taip semula";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<style type="text/css">
		h1 {
			font-size:100px;
			margin-top: 250px;
			margin-bottom: 0px;
		}
		h3 {
			font-size:30px;
			margin-top: 10px;
			margin-bottom: 65px;
		}
		table {
			padding-top: 15px;
		}
		#loginbox {
			background-color:#FFFFFF; 
			color:#000000;
			width: 345px;
			height: 110px;
			border-radius:20px
		}
		#err {
			background-color:#FFFFFF;
			color:#000000;
			width: 500px;
			height: 20px;
			border: white solid 2px;
			border-radius:20px;
			margin-top: 20px;
		}
		a {
			text-decoration: none;
			color: white;
		}
		#infolink:hover {
			text-shadow: 0px 0px 5px white;
		}
	</style>
</head>
<body>
	<h1>e-Pendaftaran</h1>
	<h3>SMK Sultan Abdul Samad</h3>
	<div id="loginbox">
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
						<label for="pwd">Kata Laluan: </label>
					</td>
					<td>
						<input type="password" id="pwd" name="pass">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Login" name="btn-login">
					</td>
				</tr>
			</form>
		</table>
	</div>
	<?php
		if ( isset($errMSG) ) { 
	?>
	<div id="err">
	<?php 
		echo $errMSG; 
	?>
	</div>
	<?php
		}
	?>

	<h4 id="infolink"><a href="info/">Info</a></h4>
</body>
</html>