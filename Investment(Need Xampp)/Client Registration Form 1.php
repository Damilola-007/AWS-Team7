<?php
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

//Set cookies so that they will be carried to the next form
setcookie("firstname", $firstname, time()+3600);
setcookie("lastname", $lastname, time()+3600);
setcookie("password", $passwordhash, time()+3600);
setcookie("email", $email, time()+3600);

echo "<script>
    window.location ='Client Registration Form 2.php'</script>";

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
</head>
<body>
    <div class="v85_5">
        <div class="v85_6">

        </div>
        <div class="v85_7">
            <div class="v85_8">

            </div>
            <div class="v85_9">
                <div class="v85_10">
                    <div class="v85_11">

                    </div>
                    <div class="v85_12">

                    </div>
                    <div class="v85_13">

                    </div>
                    </div>
                    <div class="v85_14"><span class="v85_15">Trusted Digital Investment Ideas Platform</span>
                    
                    </div>
                    </div>
                    </div>
                    <div class="v85_17">
                        <div class="v85_18">

                        </div>
                        <!-- <div class="v85_21">
                              <button class="v85_22" type="submit" onclick="displayVerificationMessage()">
                                <span class="v85_21"></span>NEXT</span></button>
                            </div>
                        --> 
                        <!--<div class="v85_21"> 
                            --Code to display welcome message after registration-->
                            <!--  <a href="verification.html">
                             <! <button class="v85_22" type="submit" onclick="displayVerificationMessage()">--
                              <button class="v85_22" type="submit" >
                                <span class="v85_21"></span>NEXT</span>
                              </button>
                            </a> 
                          </div>-->
                        
                        
                        <!-- <div id="message"></div> -->
                                               
                        <div class="v90_43"><span class="v85_26">Create an Account</span>
                        <span class="v90_39">Set up your account and start exploring investment ideas. </span>
                        </div>
                        <div class="v85_32">
                            <div class="v85_24">

                            </div><span class="v85_27">Already Have an account? <a href="login.html">Login</a></span>
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
                                    <!--<p id="password-message"></p>
                                    <div id="password-requirements" class="password-requirements">
                                      <ul>
                                        <li class="invalid">At least 8 characters</li>
                                        <li class="invalid">At least one uppercase letter</li>
                                        <li class="invalid">At least one lowercase letter</li>
                                        <li class="invalid">At least one number</li>
                                        <li class="invalid">At least one special character (!@#$%^&*)</li>
                                      </ul>
                                    </div>
                                    <div id="password-strength" class="password-strength">
                                      <span class="weak">Weak</span>
                                      <span class="medium">Medium</span>
                                      <span class="strong">Strong</span>
                                    </div>-->

                                </div>
                                    </label>
                                </div>
                                <div class="v202_6"><label for="confirmpassword"><span class="v202_7">Confirm Password</span>
                                <div>
                                       <input type="password" class="v202_8" name="confirmpassword" id="confirmpassword" required>
                                </div>
                                   </label>
                                </div>
                                <div class="v85_21">
                                <!--Code to display welcome message after registration-->
                              
                                <!-- <button class="v85_22" type="submit" onclick="displayVerificationMessage()">-->
                                 <button class="v85_22" type="submit" name="clientregister" formmethod="post">
                                   <span class="v85_21"></span>NEXT</span>
                                 </button>
                              
                                </div>
                            </div>
                            

                                                 
                                     <!--
                            <div class="v85_21">
                                <a href="verification.html">
                                  <button class="v85_22" type="submit" onclick="displayVerificationMessage()">
                                    <span class="v85_21"></span>NEXT</span>
                                  </button>
                                </a>
                              </div>

                            -->
                            </form>
                                </div>
                                </div>
                                
    <!-- <script src="verificationPage.js"></script> -->
    <script src="js/confirmpassword.js"></script>
    <script src="js/storeRegistration.js"></script>
</body>
</html>

    