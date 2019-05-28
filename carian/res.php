<?php
include_once '../dbconfig.php';
if(isset($_POST['search']))
{
   	$valueToSearch = $_POST['studentic'];

    $query = "SELECT * FROM datamurid WHERE kpMurid = '$valueToSearch'";
    $search_result = $query;
    
}?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Pendaftaran Murid</title>
	<meta name="author" content="Matthew John">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<style type="text/css">
		h3 {
			font-family: 'Calamity Sans Regular';
			font-size: 15px;
			margin-bottom: 10px;
		}	
		h1 {
			margin-top: 10px;
			margin-bottom: 45px;
		}
		#result {
			font-family: 'Calamity Sans Regular';
			width: 430px;
			height: 300px;
			background-color:#FFFFFF;
			color:#000000;
			border-radius:20px;
			padding-top: 0px;
		}
		table {
			padding-top: 32px;
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
		<h3 style="margin-top: 120px;"><a href="../">e-Pendaftaran</a></h3>
		<h1>Carian Pangkalan Data</h1>
		<div id="result">
			<?php while($row = mysqli_fetch_array($search_result)):?>
				<table>
                	<tr>
                   	 <td>
                   	 	ID Murid: 
                   	 </td>
                   	 <td>
                   	 	<?php echo $row['idMurid'];?>
                   	 </td>
                	</tr>
                	<tr>
                		<td>
                			Nama Murid: 
                		</td>
                		<td>
                			<?php echo $row['namaMurid'];?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			No. Kad Pengenalan: 
                		</td>
                		<td>
                			<?php echo $row['kpMurid'];?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Kelas: 
                		</td>
                		<td>
                			<?php echo $row['kelas'];?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Alamat: 
                		</td>
                		<td>
                			<?php echo $row['alamat'];?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			<?php echo $row['penjagaMurid'];?>: 
                		</td>
                		<td>
                			<?php echo $row['namaPenjaga'];?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Telefon Penjaga: 
                		</td>
                		<td>
                			<?php echo $row['telefonPenjaga'];?>
                		</td>
                	</tr>
                <?php endwhile;?>
                </table>
		</div>
	</center>
</body>
</html>