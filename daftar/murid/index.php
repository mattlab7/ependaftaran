<?php
ob_start();
session_start();

include_once '../../dbconfig.php';
if( !isset($_SESSION['user']) ) {
		header("Location: ../../index.php");
		exit;
	}

if(isset($_POST['btn-signup'])) {
		
	$sname = trim($_POST['studentname']);
	$skp = trim($_POST['studentkp']);
	$sclass = trim($_POST['studentclass']);
	$address = trim($_POST['studentaddress']);
	$parent = trim($_POST['parent']);
	$pname = trim($_POST['parentname']);
	$pcontact = trim($_POST['parentcontact']);
	
	$sname = strip_tags($sname);
	$skp = strip_tags($skp);
	$sclass = strip_tags($sclass);
	$address = strip_tags($address);
	$parent = strip_tags($parent);
	$pname = strip_tags($pname);
	$pcontact = strip_tags($pcontact);
		
		$query = "INSERT INTO datamurid(namaMurid,kpMurid,kelas,alamat,penjagaMurid,namaPenjaga,telefonPenjaga) VALUES('$sname','$skp','$sclass','$address','$parent','$pname','$pcontact')";
		$res = mysql_query($query);
		
		if ($res) {
			$errMSG = "Maklumat dihantar";
		} else {
			$errMSG = "Maaf, kami tidak boleh memproses, sila cuba lagi kemudian.";	
		}	
			
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Pendaftaran Murid</title>
	<meta name="author" content="Matthew John">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="../../main.css">
	<style type="text/css">
		h3 {
			font-size: 15px;
			margin-bottom: 10px;
		}	
		h1 {
			margin-top: 10px;
			margin-bottom: 45px;
		}
		#registerbox {
			width: 430px;
			height: 320px;
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
		<h3 style="margin-top: 120px;"><a href="../../">e-Pendaftaran</a></h3>
		<h1>Pendaftaran Murid</h1>
		<div id="registerbox">
		<table>
				<form method="POST" autocomplete="off">
					<tr>
						<td>
							<b>Maklumat Murid</b>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td>
							<label for="sname">Nama Penuh: </label>
						</td>
						<td>
							<input type="text" id="sname" name="studentname">
						</td>
					</tr>
					<tr>
						<td>
							<label for="skp">No. Kad Pengenalan: </label>
						</td>
						<td>
							<input type="text" id="skp" name="studentkp">
						</td>
					</tr>
					<tr>
						<td>
							<label for="class">Kelas</label>
						</td>
						<td>
							<select name="studentclass" id="class">
								<option value="exampleoption">Pilih satu</option>
								<option value="1 Adil">1 Adil</option>
								<option value="1 Bakti">1 Bakti</option>
								<option value="1 Cekap">1 Cekap</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="alamat">Alamat</label>
						</td>
						<td>
							<input name="studentaddress" id="alamat" type="text">
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td>
							<b>Maklumat Penjaga</b>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td>
							<label for="pen">Ibu/Bapa/Penjaga</label>
						</td>
						<td>
							<select name="parent" id="pen">
								<option value="2sel">Pilih satu</option>
								<option value="Ibu">Ibu</option>
								<option value="Bapa">Bapa</option>
								<option value="Penjaga">Penjaga</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="name">Nama Penuh</label>
						</td>
						<td>
							<input name="parentname" id="namep" type="text">
						</td>
					</tr>
					<tr>
						<td>
							<label for="contact">No. Telefon</label>
						</td>
						<td>
							<input name="parentcontact" id="contact" type="text">
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
	</center>
</body>
</html>