<?php

function renderForm($id, $stname, $stkp, $stclass, $staddress, $stparent, $prname, $prcontact)

{

?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Kemaskini Data Murid</title>
	<meta name="author" content="Matthew John">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">
	<style type="text/css">
		h3 {
			margin-top: 120px;
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
		<h3><a href="index.php">e-Pendaftaran</a></h3>
		<h1>Kemaskini Data Murid</h1>
		<div id="registerbox">
		<table>
				<form method="POST" autocomplete="off">
					<input type="hidden" name="id" value="<?php echo $id; ?>"/>
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
							<input type="text" value="<?php echo $stname; ?>" id="sname" name="studentname">
						</td>
					</tr>
					<tr>
						<td>
							<label for="skp">No. Kad Pengenalan: </label>
						</td>
						<td>
							<input type="text" value="<?php echo $stkp; ?>" id="skp" name="studentkp">
						</td>
					</tr>
					<tr>
						<td>
							<label for="class">Kelas</label>
						</td>
						<td>
							<select name="studentclass" id="class">
								<option value="1sel">Pilih satu</option>
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
							<input name="studentaddress" value="<?php echo $staddress; ?>" id="alamat" type="text">
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
							<input name="parentname" value="<?php echo $prname; ?>" id="namep" type="text">
						</td>
					</tr>
					<tr>
						<td>
							<label for="contact">No. Telefon</label>
						</td>
						<td>
							<input name="parentcontact" value="<?php echo $prcontact; ?>" id="contact" type="text">
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

			if ($error != '')

		{

			echo '<div id="err">'.$error.'</div>';

		}

		?>
	</center>
</body>
</html>
<?php

}


include('dbconfig.php'); 


if (isset($_POST['btn-signup']))

{


if (is_numeric($_POST['id'])) // put hidden one in form first, check website

{


$id = $_POST['id'];

$stname = mysql_real_escape_string(htmlspecialchars($_POST['studentname']));

$stkp = mysql_real_escape_string(htmlspecialchars($_POST['studentkp']));

$stclass = mysql_real_escape_string(htmlspecialchars($_POST['studentclass']));

$staddress = mysql_real_escape_string(htmlspecialchars($_POST['studentaddress']));

$stparent = mysql_real_escape_string(htmlspecialchars($_POST['parent']));

$prname = mysql_real_escape_string(htmlspecialchars($_POST['parentname']));

$prcontact = mysql_real_escape_string(htmlspecialchars($_POST['parentcontact']));




if ($stname == '' || $stkp == '' || $stclass == '' || $staddress == '' || $stparent == '' || $prname == '' || $prcontact == '')

{


$error = 'Tolong lengkapkan semua';




renderForm($id, $stname, $stkp, $stclass, $staddress, $stparent, $prname, $prcontact, $error);

}

else

{


mysql_query("UPDATE datamurid SET namaMurid='$stname', kpMurid='$stkp', kelas='$stclass', alamat='$staddress', penjagaMurid='$stparent', namaPenjaga='$prname', telefonPenjaga='$prcontact' WHERE idMurid='$id'")

or die(mysql_error());




header("Location: semak/index.php");

}

}

else

{


echo 'Error!';

}

}

else


{




if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{


$id = $_GET['id'];

$result = mysql_query("SELECT * FROM datamurid WHERE idMurid=$id")

or die(mysql_error());

$row = mysql_fetch_array($result);




if($row)

{




$stname = $row['namaMurid'];

$stkp = $row['kpMurid'];

$stclass = $row['kelas'];

$staddress = $row['alamat'];

$stparent = $row['penjagaMurid'];

$prname = $row['namaPenjaga'];

$prcontact = $row['telefonPenjaga'];


// show form

renderForm($id, $stname, $stkp, $stclass, $staddress, $stparent, $prname, $prcontact, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>