<?php
ob_start();
session_start();

include_once '../dbconfig.php';
if( !isset($_SESSION['user']) ) {
		header("Location: ../index.php");
		exit;
	}
?>
<?php


if(isset($_POST['search']))
{
    $id = $_POST['studentic'];
    
    $connect = mysqli_connect("localhost", "root", "","ependaftaran");
    
    $query = "SELECT * FROM `datamurid` WHERE `kpMurid` = $id LIMIT 1";
    
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $idm = $row['idMurid'];
        $sname = $row['namaMurid'];
        $ic = $row['kpMurid'];
        $class = $row['kelas'];
        $addr = $row['alamat'];
        $parent = $row['penjagaMurid'];
        $pname = $row['namaPenjaga'];
        $pcontact = $row['telefonPenjaga'];
      }  
    }
    else {
        $fail = "Tidak wujud";
        $idm = 'N/A';
        $sname = 'N/A';
        $ic = 'N/A';
        $class = 'N/A';
        $addr = 'N/A';
        $parent = 'Ibu/Bapa/Penjaga';
        $pname = 'N/A';
        $pcontact = 'N/A';
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Pendaftaran - Pendaftaran Murid</title>
	<meta name="author" content="Matthew John">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<style type="text/css">
		h3 {
			font-size: 15px;
			margin-bottom: 10px;
		}	
		h1 {
			margin-top: 10px;
			margin-bottom: 45px;
		}
		#search {
			width: 430px;
			height: 100px;
			background-color:#FFFFFF;
			color:#000000;
			border-radius:20px;
			padding-top: 0px;
			margin-bottom: 15px;
		}
		#result {
			width: 900px;
			height: 300px;
			background-color:#FFFFFF;
			color:#000000;
			border-radius:20px;
			padding-top: 10px;
			padding-left: 15px;
			padding-right: 15px;
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
		<div id="search">
		<table>
			<form method="POST">
			<tr>
				<td>
					No. Kad Pengenalan: 
				</td>
				<td>
					<input type="text" name="studentic">
				</td>
			</tr>
		</table>
			<input type="submit" name="search" value="Cari">
		</form>
		</div>
		<?php if ( isset($result) ) { ?>
		<div id="result">
			<?php echo $fail ?>
			<table cellpadding="5px">
                	<tr>
                   	 <td>
                   	 	ID Murid: 
                   	 </td>
                   	 <td>
                   	 	<?php echo $idm;?>
                   	 </td>
                	</tr>
                	<tr>
                		<td>
                			Nama Murid: 
                		</td>
                		<td>
                			<?php echo $sname;?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			No. Kad Pengenalan: 
                		</td>
                		<td>
                			<?php echo $ic;?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Kelas: 
                		</td>
                		<td>
                			<?php echo $class;?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Alamat: 
                		</td>
                		<td>
                			<?php echo $addr;?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			<?php echo $parent;?>: 
                		</td>
                		<td>
                			<?php echo $pname;?>
                		</td>
                	</tr>
                	<tr>
                		<td>
                			Telefon Penjaga: 
                		</td>
                		<td>
                			<?php echo $pcontact;?>
                		</td>
                	</tr>
                </table>
		</div>
	<?php
		}
	?>
	</center>
</body>
</html>