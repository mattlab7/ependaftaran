<?php
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	
	define('DBHOST', 'hostname');
	define('DBUSER', 'username');
	define('DBPASS', 'userpass'); 
	define('DBNAME', 'ependaftaran');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
?>
	