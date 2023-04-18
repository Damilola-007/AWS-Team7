<?php  
include("PHP7fix.php");
$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "investmentdb";
$connection = mysql_connect($host, $user, $pass)
or die ("Couldn't connect to database".mysql_error());
mysql_select_db($database);

?>
