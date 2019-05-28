<?php
if(isset($_POST["export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data1adil.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('idMurid', 'namaMurid', 'kpMurid', 'alamat', 'penjagaMurid', 'namaPenjaga', 'telefonPenjaga'));  
      $query = "SELECT idMurid, namaMurid, kpMurid, alamat, penjagaMurid, namaPenjaga, telefonPenjaga FROM datamurid WHERE kelas = '1 Adil'";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>