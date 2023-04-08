<?php  
// Start session to allow access to session variables
session_start();
//Connect to database
require('connect.php');

echo "<script> window.alert('Logged out Successfully')</script>";
echo "<script> window.location.assign('Login.php')</script>";
// Destroy all sessions
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Check if JavaScript is enabled-->
            <noscript>
            <center><font size ="8">Please enable JavaScript to use this page!</font></center>
            <div style="display:none"></body>
            </noscript>
</head>
<body>

</body>
</html>