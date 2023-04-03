 <?php
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Retrieve data from user input
 if(isset($_POST['rmregister']))
 {
   $ManagerName = htmlspecialchars($_POST['managername']);
   $EmailAddress = htmlspecialchars($_POST['email']);
   $Password = htmlspecialchars($_POST['password']);
   $Passwordhash = password_hash($Password, PASSWORD_DEFAULT);//Hash the password
   $PhoneNumber = htmlspecialchars($_POST['phonenumber']);
   $Location = htmlspecialchars($_POST['location']);
   $Bio = htmlspecialchars($_POST['bio']);
 
//Retrieve all emails from database and check if user entered email is same
$select = "SELECT Email FROM client
WHERE Email = '$EmailAddress'";
$run = mysql_query($select);
$count=mysql_num_rows($run);

$select1 = "SELECT Email FROM relationship_manager
WHERE Email = '$EmailAddress'";
$run1 = mysql_query($select1);
$count1=mysql_num_rows($run1);

$select2 = "SELECT Email FROM product_idea_creator
WHERE Email = '$EmailAddress'";
$run2 = mysql_query($select2);
$count2=mysql_num_rows($run2);

if($count>0 || $count1>0 || $count2>0)
{
    echo "<script>window.alert('This Email is already registered')</script>";
    echo "<script>window.location.assign('RM Registration.php')</script>";
}

   else
   {

   $insert = "INSERT INTO relationship_manager(Manager_Name,Email,Password,Phone_Number,Location,Biography)
   VALUES ('$ManagerName','$EmailAddress','$Passwordhash','$PhoneNumber','$Location','$Bio')";
 
   $run= mysql_query($insert);
 
   if($run)
   {
     echo "<script>window.alert('RM Registration successful')
      window.location ='Login.php'</script>";
   }
 
   else
   {
     echo "<script>window.alert('Something went wrong')
     window.location ='Product registration.php'</script>";
     echo mysql_error();
   }
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
    <title>Relationship Manager Registration</title>

    <!--Check if JavaScript is enabled-->
            <noscript>
            <center><font size ="8">Please enable JavaScript to use this page!</font></center>
            <div style="display:none"></body>
            </noscript>
</head>
<body>
    <div class=e396_29>
        <div class="e396_30"></div>
        <div class=e396_31>
          <div class=e396_32>
            <div class="e396_33"></div>
            <div class="e396_34"></div>
            <div class="e396_35"></div>
          </div>
          <div class=e396_36><span  class="e396_37">Trusted Digital Investment Ideas Platform</span><span  class="e396_38">Trusted Digital Investment Ideas Platform</span></div>
        </div>
        <div class=e396_49>
          <div class="e396_50"></div>
          <div class="e420_4"></div>
          <div class="e420_9"></div>
          <div class="e420_7">

          <form action="" method="post">

          <div><button class=e396_51 type= "submit" id="rmregister" name="rmregister" formmethod="post"><span  class="e396_52">SUBMIT</span></button></div>
          <div class=e396_53><span  class="e396_54">Create an Account</span><span  class="e396_55">Set up your account and start exploring investment ideas. </span></div>
          <div class=e396_56>
            <div class="e396_57"></div><span  class="e396_58">Already Have an account? <a href="Login.php">Login</a></span>
          </div>
          <div class=e396_59>
            <div class="e396_60"></div><span  class="e396_61">Logo</span>
          </div>

          <div class="rmform1"><span  class="rmform2">Manager Name</span></div>
          <div> <input class="rmform3" type="text" name="managername" id="managername" tabindex="1" required=""></div>

          <div class=e396_68><span  class="e396_69">Email Address</span></div>
          <div> <input class="e396_70" type="email" name="email" id="email" tabindex="2" required=""></div>

          <div  class=e396_71><span  class="e396_72">Password</span>
            <div> <input class="e396_73" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters " tabindex="3" required> </div>
          </div>

          <div class=e396_74><span  class="e396_75">Confirm Password</span>
            <div> <input class="e396_76" type="password" name="confirmpassword" id="confirmpassword" tabindex="4" required></div>

            <div><input class="e420_5" type="" name="location" id="location" tabindex="6" required></div>
          </div>
          <div> 

          <textarea class="e420_6" name="bio" id="bio" tabindex="7" required></textarea></div>
          <div> 

          <span  class="e420_12">Phone number </span>
      </span><input class="e420_8" name="phonenumber" id="phonenumber" tabindex="5" required></div>

      <span  class="e420_17">Location</span><span  class="e420_20">Bio</span>

      </form>
        </div> </div>
      </div>
      </div>
              
                                
    <!-- <script src="verificationPage.js"></script> -->
    <script src="js/confirmpassword.js"></script>
    <script src="storeRegistration.js"></script>
</body>
</html>

    