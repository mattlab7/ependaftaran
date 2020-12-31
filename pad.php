<?php
include('dbconfig.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysql_query("DELETE FROM datamurid WHERE idMurid=$id") or die(mysql_error());

    header("Location: semak/index.php");
} else {
    header("Location: semak/index.php");
}?>