<?php

DEFINE ('DB_USER', 'username');
DEFINE ('DB_PASSWORD', 'userpass');
DEFINE ('DB_HOST', 'hostname');
DEFINE ('DB_NAME', 'ependaftaran');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>