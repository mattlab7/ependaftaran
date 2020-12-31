<?php
	ob_start();
	session_start();
	require_once '../dbconfig.php';
	
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Menu Utama</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<style type="text/css">
		h1 {
			font-size:100px;
			margin-top: 250px;
			margin-bottom: 0px;
		}
		h3 {
			font-size:30px;
			margin-top: 10px;
			margin-bottom: 20px;
		}
		h4 {
			margin-top: 10px;
			margin-bottom: 0px;
			font-size:20px;
		}
		h5 {
			margin-top: 5px;
			margin-bottom: 40px;
			font-size:15px;
		}
		table {
			font-size: 18px;
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
	<h1>e-Pendaftaran</h1>
	<h3>SMK Sultan Abdul Samad</h3>
	<h4>Menu Utama</h4>
	<h5>Selamat Datang, Cikgu <?php echo $userRow['userName']; ?></h5>
	<table cellpadding="10px">
		<tr>
			<td>
				<a href="../daftar/murid">Pendaftaran Murid</a>
			</td>
			<td>
				<a href="../semak">Semakan Pangkalan Data</a>
			</td>
			<td>
				<a href="../carian">Carian Pangkalan Data</a>
			</td>
			<td>
				<a href="../daftar/akaun">Pendaftaran Akaun Pengguna</a>
			</td>
			<td>
				<a href="../logout.php?logout">Log Keluar</a>
			</td>
		</tr>
	</table>
	<p style="font-size: 18px;"><a href="../info/index.php">Info</a></p>
</body>
</html>