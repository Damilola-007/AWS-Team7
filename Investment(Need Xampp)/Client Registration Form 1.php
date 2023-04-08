<?php
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Retrieve data from user input
if(isset($_POST['clientregister']))
{
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$password = htmlspecialchars($_POST['password']);
$passwordhash = password_hash($password, PASSWORD_DEFAULT);//Hash the password
$email = htmlspecialchars($_POST['email']);

//Retrieve all emails from database and check if user entered email is same
$select = "SELECT Email FROM client
WHERE Email = '$email'";
$run = mysql_query($select);
$count=mysql_num_rows($run);

$select1 = "SELECT Email FROM relationship_manager
WHERE Email = '$email'";
$run1 = mysql_query($select1);
$count1=mysql_num_rows($run1);

$select2 = "SELECT Email FROM product_idea_creator
WHERE Email = '$email'";
$run2 = mysql_query($select2);
$count2=mysql_num_rows($run2);

if($count>0 || $count1>0 || $count2>0)
{
    echo "<script>window.alert('This Email is already registered')</script>";
    echo "<script>window.location.assign('Client Registration Form 1.php')</script>";
}

else
{
    //Set cookies so that they will be carried to the next form
    setcookie("firstname", $firstname, time()+3600);
    setcookie("lastname", $lastname, time()+3600);
    setcookie("password", $passwordhash, time()+3600);
    setcookie("email", $email, time()+3600);

    echo "<script>
        window.location ='Client Registration Form 2.php'</script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Client Registration</title>

    <!--Check if JavaScript is enabled-->
         <noscript>
         <center><font size ="8">Please enable JavaScript to use this page!</font></center>
         <div style="display:none"></body>
         </noscript>
</head>
<body>
     <div class=e437_165>
        <div class="e437_166"></div>
        <div class=e437_167>
          <div class=e437_168>
            <div class="e437_169"></div>
            <div class="e437_170"></div>
            <div class="e437_171"></div>
          </div>
          <div class=e437_172><span  class="e437_173">Trusted Digital Investment Ideas Platform</span><span  class="e437_174">Trusted Digital Investment Ideas Platform
      </div>
        </div>
        <div class=e437_185>
          <div class="e437_186"></div>
                                               
                        <div class="v90_43"><span class="v85_26">Create an Account</span>
                        <span class="v90_39">Set up your account and start exploring investment ideas. </span>
                        </div>
                        <div class="v85_32">
                            <div class="v85_24">

                            </div><span class="v85_27">Already Have an account? <a href="Login.php">Login</a></span>
                            </div>
                            <div class="v85_28">
                                <div class="v85_29">

                                </div><span class="v85_30">Logo</span>
                                </div>
                                <h1>Password Strength Checker</h1>
                                <form action="" method="post">
                                <div class="v85_37"><label for="firstname"><span class="v85_33">First Name</span>
                                <div >
                                    <input type="text" class="v85_34" id="firstname" name="firstname" placeholder="Damilola" required>
                                    </label>

                                </div>
                                </div>
                                <div class="v85_38"><label for="lastname"><span class="v85_35">Last Name</span>
                                <div>
                                    <input type="text" class="v85_36" placeholder="Rasheed" id="lastname" name="lastname" required>
                                    
                                    </label>

                                </div>
                                </div>
                                <div class="v90_40"><label for="email"><span class="v90_41">Email Address</span>
                                 <div>
                                    <input type="email" class="v90_42" placeholder="example@gmail.com" id="email" name="email" required>
                                    </label>
                                </div>
                                </div>
                                <div class="v90_44"><label for="password"><span class="v90_45">Password</span>
                                <div>
                                    <input type="password" class="v90_46" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters " required>

                                </div>
                                    </label>
                                </div>
                                <div class="v202_6"><label for="confirmpassword"><span class="v202_7">Confirm Password</span>
                                <div>
                                       <input type="password" class="v202_8" name="confirmpassword" id="confirmpassword" required>
                                </div>
                                   </label>
                                </div>
                                <div><button class="v85_21" type= "submit" id="clientregister" name="clientregister" formmethod="post"><span  class="e440_273">NEXT</span></button></div>
                            </div>
                            </form>
                                </div>
                                </div>
                                
    <script src="js/confirmpassword.js"></script>
</body>
</html>

    