<?php
ob_start();
session_start();

include_once '../../dbconfig.php';
if( !isset($_SESSION['user']) ) {
		header("Location: ../../index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Semakan Pangkalan Data</title>
	<meta name="author" content="Matthew John">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../main.css">
	<style type="text/css">
		h3 {
			font-size: 15px;
			margin-top: 190px;
			margin-bottom: 10px;
		}
		h1 {
			margin-top: 10px;
			margin-bottom: 45px;
		}
		#datatable {
			width: 95%;
			background-color: #FFFFFF;
			color: #000000;
			border-radius: 20px;
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
		<h3><a href="../../" style="">e-Pendaftaran</a></h3>
		<h1>Semakan Pangkalan Data - 1 Bakti</h1>
		<div id="datatable">
			<?php
				require_once('../mysqli_connect.php');

				$query = "SELECT idMurid, namaMurid, kpMurid, alamat, penjagaMurid, namaPenjaga, telefonPenjaga FROM datamurid WHERE kelas = '1 Bakti'";

				$response = @mysqli_query($dbc, $query);


				if($response){
					echo '<table cellpadding="5px">
							<tr><td><b>ID</b></td>
							<td><b>Nama Murid</b></td>
							<td><b>No. Kad Pengenalan</b></td>
							<td><b>Alamat</b></td>
							<td><b>Penjaga</b></td>
							<td><b>Nama Penjaga</b></td>
							<td><b>Telefon Penjaga</b></td></tr>';

					while($row = mysqli_fetch_array($response)){

					echo '<tr><td>' . 
					$row['idMurid'] . '</td><td>' .
					$row['namaMurid'] . '</td><td>' . 
					$row['kpMurid'] . '</td><td>' .
					$row['alamat'] . '</td><td>' . 
					$row['penjagaMurid'] . '</td><td>' .
					$row['namaPenjaga'] . '</td><td>' .
					$row['telefonPenjaga'] . '</td><td>';

					echo '<a style="text-decoration: none; color: #000000;" href="../kms.php?id=' . $row['idMurid'] . '"><img src="../../assets/edit" width="32" height="32"></a></td>';

					echo '<td><a style="text-decoration: none; color: #000000;" href="../pad.php?id=' . $row['idMurid'] . '"><img src="../../assets/delete" width="32" height="32"></a></td>';

					echo '</tr>';
					}

					echo '</table>';

				} else {

					echo "Couldn't issue database query<br />";

					echo mysqli_error($dbc);

				}

				mysqli_close($dbc);
			?>
		</div>
		<h4><a href="../">Balik ke Menu Semak</a></h4>
	</center>
</body>
</html>