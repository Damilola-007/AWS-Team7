<?php
// Start session to allow access to session variables
session_start();
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Remove Confirm re-form submission message
header("Cache-Control: no-cache, must-revalidate, max-age=0");
//Check if Login button has been pressed
if(isset($_POST['btnlogin']))
{
    $Email = htmlspecialchars($_POST['email']);
    $Password = htmlspecialchars($_POST['password']);

//Get Email from client table in database
  $select = "SELECT * FROM client
  WHERE Email = '$Email'";

  $run = mysql_query($select);
  $count = mysql_num_rows($run);
  
  //Check if user input email matches with database email
  if($count==1)
    {
        $row=mysql_fetch_array($run);

        //Check if user input password matches with database hased password
            if(password_verify($Password, $row['Password']))
            {
              $_SESSION['UserID']=$row['UserID'];

              echo "<script>window.alert('Client Login Successfully')</script>";
              echo "<script>window.location.assign('Client Dashboard.php')</script>";
            }

            else
            {
              //Check how many times userinput was wrong
                if(!isset($_SESSION['count']))
                {
                  $_SESSION['count']=1;
                }

                else
                {
                  $_SESSION['count']+=1;
                }   

                if($_SESSION['count']>=3)
                {
                  echo "<script>window.alert('Wrong Three times! Please Log in again after five minutes')</script>";
                  $_SESSION['check']=1;
                }

                else
                {
                  echo "<script>window.alert('Please enter valid credentials!')</script>";
                  echo "<script>window.location = 'Login.php'</script>";
                }
            } 

    }
    

//Run if the user input email was not in client table
  else if($count <= 0)
  {

//Get Email from relationship manager table in database 
    $select = "SELECT * FROM relationship_manager
      WHERE Email = '$Email'";

  $run = mysql_query($select);
  $count1 = mysql_num_rows($run);

//Check if user input email matches with database email
 if($count1==1)
    {

        $row=mysql_fetch_array($run);

        //Check if user input password matches with database hased password
        if(password_verify($Password, $row['Password']))
        {
          $_SESSION['ManagerID']=$row['ManagerID'];

          echo "<script>window.alert('Manager Login Successfully')</script>";
          echo "<script>window.location.assign('RM Dashboard.php')</script>";
        }

        else
            {
              //Check how many times userinput was wrong
               if(!isset($_SESSION['count']))
                {
                  $_SESSION['count']=1;
                }

                else
                {
                  $_SESSION['count']+=1;
                }   

                if($_SESSION['count']>=3)
                {
                  echo "<script>window.alert('Wrong Three times! Please Log in again after five minutes')</script>";
                  $_SESSION['check']=1;
                }

                else
                {
                  echo "<script>window.alert('Please enter valid credentials!')</script>";
                  echo "<script>window.location = 'Login.php'</script>";
                }
            } 
    }

  //Run if the user input email was not in relationship manager table
  if($count1 <= 0)
  {

    $select = "SELECT * FROM product_idea_creator
      WHERE Email = '$Email'";

  $run = mysql_query($select);
  $count2 = mysql_num_rows($run);

//Check if user input email matches with database email
  if($count2==1)
    {

        $row=mysql_fetch_array($run);

        //Check if user input password matches with database hased password
          if(password_verify($Password, $row['Password']))
            {
              $_SESSION['CreatorID']=$row['Creator_ID'];

              echo "<script>window.alert('Creator Login Successfully')</script>";
              echo "<script>window.location.assign('Product Registration.php')</script>";
            }

        else
            {
              //Check how many times userinput was wrong
                if(!isset($_SESSION['count']))
                {
                  $_SESSION['count']=1;
                }

                else
                {
                  $_SESSION['count']+=1;
                }   

                if($_SESSION['count']>=3)
                {
                  echo "<script>window.alert('Wrong Three times! Please Log in again after five minutes')</script>";
                  $_SESSION['check']=1;
                }

                else
                {
                  echo "<script>window.alert('Please enter valid credentials!')</script>";
                  echo "<script>window.location = 'Login.php'</script>";
                }
            } 

    }

  if($count2 <= 0)
  {

//Check how many times userinput was wrong
    if(!isset($_SESSION['count']))
    {
      $_SESSION['count']=1;
    }

    else
    {
      $_SESSION['count']+=1;
    }   
   
    if($_SESSION['count']>=3)
    {
      echo "<script>window.alert('Wrong Three times! Please Log in again after five minutes')</script>";
      $_SESSION['check']=1;
    }

    else
    {   
      echo "<script>window.alert('Please enter valid credentials!')</script>";
      echo "<script>window.location = 'Login.php'</script>";

    }
    
  }
    
  }
    
  }

//Check how many times userinput was wrong
  else
    {

      if(!isset($_SESSION['count']))
    {
      $_SESSION['count']=1;
    }

    else
    {
      $_SESSION['count']+=1;
    }   

    if($_SESSION['count']>=3)
    {
   
      echo "<script>window.alert('Wrong Three times! Please Log in again after five minutes')</script>";
      $_SESSION['check']=1;
    }

    
  }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://fonts.googleapis.com/css?family=Mulish&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="css/styles.css" />
        <title>Login</title>

        <!--Check if JavaScript is enabled-->
         <noscript>
         <center><font size ="8">Please enable JavaScript to use this page!</font></center>
         <div style="display:none"></body>
         </noscript>

<!--Script to prevent browser back button-->

<script type="text/javascript">window.history.forward()</script>

<!--Script for countdown timer-->
        <script type="text/javascript">

      var seconds = 300;
      
      function secondPassed() 
      {
          var minutes = Math.round((seconds - 30)/60),
          remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) 
          {
              remainingSeconds = "0" + remainingSeconds;
          }          

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;

          if (seconds == 0) 
          {
             clearInterval(countdownTimer);
             
             window.location.href = "Login.php";
          }
          else 
          {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);

  </script>

    </head>
    <body>
        <div class="v91_127">
            <div class="v91_128"></div>
            <div class="v91_129">
                <div class="v91_130"></div>
                <div class="v91_131">
                    <div class="v91_132">
                        <div class="v91_133"></div>
                        <div class="v91_134"></div>
                        <div class="v91_135"></div>
                    </div>
                    <div class="v91_136">
                        <span class="v91_137"
                            >Trusted Digital Investment Ideas Platform</span
                        >
                        
                    </div>
                </div>
            </div>
            <div class="v91_139">
                <div class="v91_140"></div>
                <div class="v210_7"></div>
                <!-- <div class="v91_141"> -->
                <!-- Achor tag for the button to display the next page(profile page)
                                    <a href="">
                                <button class="v91_141" id="log-in"><span class="v91_142">NEXT</span></button>
                            </a> -->
                <!-- </div> -->
                <div class="v91_143">
                    <span class="v91_144">Login</span>
                    <span class="v91_145"
                        >Sign in to your account and manage your investments</span
                    >
                </div>
                <div class="v91_146">
                    <div class="v91_147">
                        <!--<a href="registrationPage.html">
                <button class="v1_18" id="get-started"><span class="v1_19">GET STARTED</span></button>
                </a>-->
                    </div>

                    <span class="v91_148"
                        >Don’t Have an account?
                        <a href="HomePage.php">Create an Account</a></span
                    >
                </div>

                <div class="v91_149">
                    <div class="v91_150"></div>
                    <span class="v91_151">Logo</span>
                </div>

                <!--Form for the login page-->
                <!--form action="">-->
                <?php
                //Make the form uneditable if the user has entered wrong three times
                 if(isset($_SESSION['check']))
                  {
                ?>
                <form action="" method="post">
                <fieldset disabled>
                <span class="countdownMessage"><font size='4'> You can wait <time id = 'countdown'> 5:00 </time> minutes or try again later
                <br>You can login again after five minutes</span>
                    <div class="v91_158">
                        <label for="email"
                            ><span class="v91_159">Email Address</span>
                        </label>

                        <div>

                            <input
                                type="text"
                                class="v91_160"
                                name="email"
                                id="email"
                                placeholder="example@gmail.com"
                                required
                            />
                        </div>
                    </div>
                    <div class="v91_161">
                        <label for="password"><span class="v91_162">Password</span> </label>
                        <div>
                            <input
                                type="password"
                                class="v91_163"
                                name="password"
                                id="password"
                                required
                            />
                        </div>
                    </div>
                    <div>
                        <input
                            type="checkbox"
                            class="v210_7"
                            id="show-password"
                            onclick="showPasswordCheckbox()"
                        />
                        <div>
                            <label for="show-password" class="v210_8">Show password</label>
                        </div>
                    </div>
                    
                        <button class="v91_141" id="log-in" name="btnlogin" type="submit" formmethod="post">
                            <span class="v91_142">Login</span>
                        </button>
                    
                </form>
                <?php
                //Revert the form to editable again after waiting for 5 minutes
                unset($_SESSION['check']);
                }

                else
                {
                ?>

                <form action="" method="post">
                    <div class="v91_158">
                        <label for="email"
                            ><span class="v91_159">Email Address</span>
                        </label>

                        <div>
                            <input
                                type="email"
                                class="v91_160"
                                name="email"
                                id="email"
                                placeholder="example@gmail.com"
                                required
                            />
                        </div>
                    </div>
                    <div class="v91_161">
                        <label for="password"><span class="v91_162">Password</span> </label>
                        <div>
                            <input
                                type="password"
                                class="v91_163"
                                name="password"
                                id="password"
                                required
                            />
                        </div>
                    </div>
                    <div>
                        <input
                            type="checkbox"
                            class="v210_7"
                            id="show-password"
                            onclick="showPasswordCheckbox()"
                        />
                        <div>
                            <label for="show-password" class="v210_8">Show password</label>
                        </div>
                    </div>
                    
                        <button class="v91_141" id="log-in" name="btnlogin" type="submit" formmethod="post">
                            <span class="v91_142">Login</span>
                        </button>
                    
                </form>

                <?php

                }
                ?>
                <!-- 
                                    <input type="checkbox" id="show-password">
                                    <label for="show-password">Show password</label>
                                -->
                <!-- <span class="v210_10">Show Password</span> -->

                <!-- <div class="v85_37"><label for="firstname"><span class="v85_33">First Name</span>
                                <div >
                                    <input type="text" class="v85_34" id="firstname" name="firstnam" placeholder="Damilola" required>
                                    </label>

                                </div> -->
                <!-- 
                                    <input type="password" id="password" name="password" required>
                                          <input type="checkbox" id="show-password">
                                    <label for="show-password">Show password</label>
                                -->
                <!--
                                        <div class="v91_161"> 
                                            <input type="password" name="password" id="password" required>
                                            <label for="password"><span class="v91_162">Password</span>
                                            <input type="checkbox" id="show-password">
                                            <label for="">Show password</label>
                                            
                                        <div>  
                                            <input type="password" class="v91_163" name="password" id="password" required>
                                        </label>
                                        </div>
                                    -->
                <!--
                                        </div><input type="checkbox" name="show-password" id="show-password">
                                        <label for="show-password"><span class="v210_8">Show Password</span></label>
                                    -->
                <div>
                    <a href="" class="forgetPassword"
                        ><span class="v210_11">Forgot Password?</span></a
                    >
                </div>
            </div>
        </div>

        <script src="js/Login.js"></script>
    </body>
</html>
