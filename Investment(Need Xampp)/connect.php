<?php  
include("PHP7fix.php");
$host = "localhost";
$user = "root";
$pass = "";
$database = "investmentdb";
$connection = mysql_connect($host, $user, $pass)
or die ("Couldn't connect to database".mysql_error());
mysql_select_db($database);

?>