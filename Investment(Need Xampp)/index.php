<?php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "investmentdb";
// Check connection
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password);

$query="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$mysql_database);
$stmt->execute();
$stmt->bind_result($data);
if($stmt->fetch())
{
    echo "";
}

else
{


    $sql = "CREATE DATABASE IF NOT EXISTS investmentdb";
    if ($conn->query($sql) === TRUE) {
    $mysql_database = "investmentdb";
    }


    # MySQL with PDO_MYSQL  
    $db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);

    $query = file_get_contents("investmentdb.sql");

    $stmt = $db->prepare($query);

    if ($stmt->execute())
         echo "";
    else 
         echo "<script>window.alert('Failed to connect to database!')
    window.location ='Login.php'</script>";
  
}

//Start the session to check for login
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="css/styles.css">
        <title>Get Started Page</title>

        <!--Check if JavaScript is enabled-->
            <noscript>
            <center><font size ="8">Please enable JavaScript to use this page!</font></center>
            <div style="display:none"></body>
            </noscript>
    </head>
    <body>
        <div class="v1_2">
            <div class="v1_3">

            </div><div class="v1_4">
                <div class="v1_5">

                </div><div class="v1_6">
                    <div class="v1_7">
                        <div class="v1_8">

                        </div>
                        <div class="v1_9">

                        </div>
                        <div class="v1_10">

                        </div>
                    </div>
                    <div class="v1_11"><span class="v1_12">Trusted Digital Investment Ideas Platform</span>
                    </div>
                </div>
            </div>
            <div class="v1_14">
                <div class="v1_15">
                <span class="v1_22">Relationship Manager</span>
                </div><div class=e1_16><a href="RM Registration.php"><span  class="homepage2">Register</span></a>
                </div>
                <span class="homepage">Product Idea Creator</span>
                <div class=homepage1><a href="Idea Creator Registration.php"><span  class="homepage2">Register</span></div>
                
                <a href="Client Registration Form 1.php"><button class="v1_18" id="get-started"><span class="v1_19">GET STARTED</span></button></a>
                <div class="v1_20">

                </div>
                <div class="v1_21">

                </div>
                <span class="v1_23">Set up your Profile and Get matched with profitable investment Ideas</span>

                <!--Change Login to Logout if any user has logged in-->
                <?php

                if(isset($_SESSION['UserID']))

                {
                    echo '<span class="v1_24">Logged in as Client</span><span class="homepage3">
                    <a href="Logout.php">Log out</a></span><span class="homepage4">
                    <a href="javascript:history.go(-1)">Back</a></span>';
                }

                else if(isset($_SESSION['ManagerID']))

                {
                    echo '<span class="v1_24">Logged in as Manager</span><span class="homepage3">
                    <a href="Logout.php">Log out</a></span><span class="homepage4">
                    <a href="javascript:history.go(-1)">Back</a></span>';
                }

                else if(isset($_SESSION['CreatorID']))

                {
                    echo '<span class="v1_24">Logged in as Creator</span><span class="homepage3">
                    <a href="Logout.php">Log out</a></span><span class="homepage4">
                    <a href="javascript:history.go(-1)">Back</a></span>';
                }

                else
                {
                    echo '<span class="v1_24">Already Have an account?</span><span class="homepage3">
                    <a href="Login.php">Login</a></span>';

                }
                ?>
                <div class="v1_25">
                    <div class="v1_26">

                    </div><span class="v1_27">Logo</span>
                </div>
            </div>
        </div>
    
        </body>
        </html>
        <!-- Code injected by live-server -->
