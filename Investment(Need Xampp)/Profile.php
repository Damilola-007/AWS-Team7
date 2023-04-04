<?php 
// Start session to allow access to session variables
session_start();
// includes the config file which contains database credentials
require('connect.php'); 
//Turn off SQL related errors

//Check if Client has logged in
if(isset($_SESSION['UserID']))
{
  $UserID = $_SESSION['UserID'];
//Retrieve the current logged in client details from database
  $select = "SELECT * FROM client
  WHERE UserID=$UserID";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

//Check if client has properly logged in
  if($count==0)
  {
    echo "<script>window.alert('Something went wrong!')
    window.location ='Login.php'</script>";
  }

  else
  {

    $data=mysql_fetch_array($ret);
    $username = $data["UserName"];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
    $email = $data['Email'];
    $password = $data['Password'];
    $phone_number = $data['Phone_Number'];
    $address = $data['Address'];
    $city = $data['City'];
    $state = $data['State'];
    $country = $data['Country'];
    $postal_code = $data['Postal_code'];
    $account_type = $data['Account_Type'];
    $investment_style = $data['Investment_style'];
    $investment_goal = $data['Investment_goal'];
    $investment_horizon = $data['Investment_horizon'];
    $occupation = $data['Employment_status'];
    $annual_income = $data['Annual_income'];
    $risk_tolerance = $data['Risk_tolerance'];
    $net_worth = $data['Net_worth'];
    $investment_amount = $data['Investment_amount'];

  }

//Check if Save Details button was clicked
  if(isset($_POST['editbutton']))
  {
    //Get the user input from the form
    $txtusername = htmlspecialchars($_POST['txtusername']);
    $txtemail = htmlspecialchars($_POST['txtemail']);
    $txtphoneno = htmlspecialchars($_POST['txtphoneno']);
    $txtoccupation = htmlspecialchars($_POST['txtoccupation']);
    $txtstyle = htmlspecialchars($_POST['txtstyle']);
    $txtgoal = htmlspecialchars($_POST['txtgoal']);
    $txthorizon = htmlspecialchars($_POST['txthorizon']);
    $txtinvestedamount = htmlspecialchars($_POST['txtinvestedamount']);
    $txtfirstname = htmlspecialchars($_POST['txtfirstname']);
    $txtlastname = htmlspecialchars($_POST['txtlastname']);
    $txtcountry = htmlspecialchars($_POST['txtcountry']);
    $txtaccount_type = htmlspecialchars($_POST['txtaccount_type']);
    $txtrisk_tolerance = htmlspecialchars($_POST['txtrisk_tolerance']);
    $txtcurrentpassword = htmlspecialchars($_POST['txtcurrentpassword']);
    $txtchangedpassword = htmlspecialchars($_POST['txtchangedpassword']);
    $passwordhash = password_hash($txtchangedpassword, PASSWORD_DEFAULT);//Hash the password

//Check the user entered old password with database password for verification
    if(password_verify($txtcurrentpassword, $password))
    {

      //Check if the user entered new password is same with database password
      if(password_verify($txtchangedpassword, $password))
      {
        echo "<script>window.alert('This password is same with current password!')
        window.location ='Profile.php'</script>";
      }

      else
      {

      if($txtchangedpassword=="")
      {
        $txtchangedpassword=$txtcurrentpassword;
        $passwordhash = password_hash($txtchangedpassword, PASSWORD_DEFAULT);//Hash the password
      }

      //Update the client entered details into database
      $update = "UPDATE client
      SET UserName='$txtusername',Email='$txtemail',Phone_Number='$txtphoneno',Employment_status='$txtoccupation',investment_style='$txtstyle',investment_goal='$txtgoal',investment_horizon='$txthorizon',investment_amount='$txtinvestedamount',First_Name='$txtfirstname',Last_Name='$txtlastname',Country='$txtcountry',Account_Type='$txtaccount_type',Risk_tolerance='$txtrisk_tolerance',Password='$passwordhash'
      WHERE UserID=$UserID";
      $run= mysql_query($update);

      if($run)
      {
        echo "<script>window.alert('Client updated successfully')
        window.location ='Profile.php'</script>";
      }

      else
      {
        echo "<script>window.alert('Something went wrong')
        window.location ='Profile.php'</script>";
        echo mysql_error();
      }
      }
    }

    else
    {
      echo "<script>window.alert('Please enter correct current password!')
      window.location ='Profile.php'</script>";
    }
  }

//Check if user has clicked Delete Account button
  if(isset($_POST['deletebutton']))
  {
    //Get user inputted current password
    $txtcurrentpassword = htmlspecialchars($_POST['txtcurrentpassword']);
    //Check the user entered current password with database password for verification
    if(password_verify($txtcurrentpassword, $password))
    {

    $delete = "DELETE FROM client
    WHERE UserID='$UserID'";
    $run = mysql_query($delete);

     if($run)
      {
        echo "<script>window.alert('Client deleted successfully')
        window.location ='HomePage.php'</script>";
        unset($_SESSION['UserID']);
      }

      else
      {
        echo "<script>window.alert('Something went wrong')
        window.location ='Profile.php'</script>";
        echo mysql_error();
      }
    }

    else
    {
      echo "<script>window.alert('Please enter correct current password!')
      window.location ='Profile.php'</script>";
    }
  }
}

else if(isset($_SESSION['ManagerID']))
{

  $ManagerID = $_SESSION['ManagerID'];
//Retrieve the current logged in relationship manager details from database
  $select = "SELECT * FROM relationship_manager
  WHERE ManagerID=$ManagerID";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

//Check if relationship manager has properly logged in
  if($count==0)
  {
    echo "<script>window.alert('Something went wrong!')
    window.location ='Login.php'</script>";
  }

  else
  {

    $data=mysql_fetch_array($ret);
    $managername = $data["Manager_Name"];
    $password = $data["Password"];
    $email = $data["Email"];
    $bio = $data['Biography'];
    $phone_number = $data['Phone_Number'];
    $location = $data['Location'];

  }

  //Check if Save Details button was clicked
  if(isset($_POST['editbutton']))
  {
    //Get the user input from the form
    $txtmanagername = htmlspecialchars($_POST['txtmanagername']);
    $txtemail = htmlspecialchars($_POST['txtemail']);
    $txtphoneno = htmlspecialchars($_POST['txtphoneno']);
    $txtlocation = htmlspecialchars($_POST['txtlocation']);
    $txabio = htmlspecialchars($_POST['txabio']);
    $txtcurrentpassword = htmlspecialchars($_POST['txtcurrentpassword']);
    $txtchangedpassword = htmlspecialchars($_POST['txtchangedpassword']);
    $passwordhash = password_hash($txtchangedpassword, PASSWORD_DEFAULT);//Hash the password

//Check the user entered old password with database password for verification
    if(password_verify($txtcurrentpassword, $password))
    {

      //Check if the user entered new password is same with database password
      if(password_verify($txtchangedpassword, $password))
      {
        echo "<script>window.alert('This password is same with current password!')
        window.location ='Profile.php'</script>";
      }

      else
      {

      if($txtchangedpassword=="")
      {
        $txtchangedpassword=$txtcurrentpassword;
        $passwordhash = password_hash($txtchangedpassword, PASSWORD_DEFAULT);//Hash the password
      }

      //Update the relationship manager entered details into database
      $update = "UPDATE relationship_manager
      SET Manager_Name='$txtmanagername',Email='$txtemail',Phone_Number='$txtphoneno',Location='$txtlocation',Biography='$txabio', Password='$passwordhash'
      WHERE ManagerID=$ManagerID";
      $run= mysql_query($update);

      if($run)
      {
        echo "<script>window.alert('Manager updated successfully')
        window.location ='Profile.php'</script>";
      }

      else
      {
        echo "<script>window.alert('Something went wrong')
        window.location ='Profile.php'</script>";
        echo mysql_error();
      }
      }
    }

    else
    {
      echo "<script>window.alert('Please enter correct current password!')
      window.location ='Profile.php'</script>";
    }
  }

//Check if user has clicked Delete Account button
  if(isset($_POST['deletebutton']))
  {
    //Get user inputted current password
    $txtcurrentpassword = htmlspecialchars($_POST['txtcurrentpassword']);
    //Check the user entered current password with database password for verification
    if(password_verify($txtcurrentpassword, $password))
    {

    $delete = "DELETE FROM relationship_manager
    WHERE ManagerID='$ManagerID'";
    $run = mysql_query($delete);

     if($run)
      {
        echo "<script>window.alert('Manager deleted successfully')
        window.location ='HomePage.php'</script>";
        unset($_SESSION['UserID']);
      }

      else
      {
        echo "<script>window.alert('Something went wrong')
        window.location ='Profile.php'</script>";
        echo mysql_error();
      }
    }

    else
    {
      echo "<script>window.alert('Please enter correct current password!')
      window.location ='Profile.php'</script>";
    }
  }


}

//Check if anyone has logged in
else
{
  echo "<script>window.alert('Please login to access this page!')
    window.location ='Login.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Profile</title>

    <!--Check if JavaScript is enabled-->
            <noscript>
            <center><font size ="8">Please enable JavaScript to use this page!</font></center>
            <div style="display:none"></body>
            </noscript>
</head>
<body>
    <div class=e2_163>
      
        <?php
        //Show Client form if client has logged in 
          if(isset($_SESSION['UserID']))
          {

          echo '<div class="e2_164"></div><span  class="e2_167">Profile</span><span  class="e2_187">Investments Related</span><span class="e3_218">Others</span>
            <div class=e5_255>';  
           
          echo '<div class="e1_30"></div><a href="HomePage.php"><span  class="e1_33">Home</span></a>
                <div class="profilebar"><a href="Client Dashboard.php"><span  class="profilenavi">Investment Ideas</span></a></div><a href="Profile.php"><span  class="profilenavi1">Profile</span></a><span  class="e1_130">Messages</span><a href="Logout.php">
                <span  class="e1_129">Log Out</span></a><span  class="e121_121">Settings</span>';

          }

          else if(isset($_SESSION['ManagerID']))
          {

            echo '<div class="e2_164"></div><span  class="e2_167">Profile</span><span  class="e2_187">Biography</span>
            <div class=e5_255>';  

            echo '<div class="e1_66"></div><a href="HomePage.php"><span  class="e1_69">Home</span></a>
                  <div class=rmprofilebar><a href="Profile.php"><span  class="rmprofilenavi">Profile</span></a></div><a href="RM Dashboard.php">
                  <span  class="rmprofilenavi1">Dashboard</span></a><a href="Logout.php"><span  class="e1_77">Log out</span></a>
                  <span  class="e1_131">Messages</span>';

          }
        ?>
    <div class=e1_35><span  class="e1_36">Logo</span></div>
        </div>
        <div class=e5_256>
          <div class="e2_178"></div>

          <!--Display the details extracted from database in eachh relevant fields-->
          <form action="" method="post">

          <?php 
          if(isset($_SESSION['UserID']))
          {

          ?>  

          <span  class="e2_179">User Name</span>

          <input type="text" class="e3_199" id="txtusername" name="txtusername" tabindex="1" style="display:none" value="<?php echo $username; ?>">

          <input type="email" class="e3_200" id="txtemail" name="txtemail" tabindex="2" style="display:none" value="<?php echo $email; ?>">

          <input type="text" class="e3_201" id="txtphoneno" name="txtphoneno" tabindex="3" style="display:none" value="<?php echo $phone_number; ?>">

          <input type="text" class="e3_202" id="txtoccupation" name="txtoccupation" tabindex="4" style="display:none" value="<?php echo $occupation; ?>">

          <span class="e3_199" id="spanusername"><?php echo $username; ?></span>

          <span  class="e3_200" id="spanemail"><?php echo $email; ?></span>

          <span  class="e3_201" id="spanphoneno"><?php echo $phone_number; ?></span>

          <span  class="e3_202" id="spanoccupation"><?php echo $occupation; ?></span>

          <span  class="e3_190">Email</span>

          <span  class="e3_191">Phone No.</span>

          <span  class="e3_192">Occupation</span>
          <div class=e5_267>
            <div class="e5_268"></div>
          </div>
        </div>
        <div class=e5_259>
          <div class="e2_189"></div>

          <span  class="profile">First Name</span>

          <span  class="e3_229" >Last Name</span>

          <span  class="e3_230" >Country</span>

          <span  class="e3_232" >Account Type</span>

          <span  class="e3_233" >Risk Tolerance</span>

          <select class="e5_263" id="txtrisk_tolerance" name="txtrisk_tolerance" tabindex="13" style="display:none">

          <!--Select the option based on Risk Tolerance in database-->
          <?php
          if($risk_tolerance=="Conservative")
          {
            echo '<option selected value="Conservative">Conservative</option>
                  <option value="Moderate">Moderate</option>
                  <option value="Aggressive">Aggressive</option>';
          }

          else if($risk_tolerance=="Moderate")
          {
            echo '<option value="Conservative">Conservative</option>
                  <option selected value="Moderate">Moderate</option>
                  <option value="Aggressive">Aggressive</option>';
          }

          else if($risk_tolerance=="Aggressive")
          {
            echo '<option value="Conservative">Conservative</option>
                  <option value="Moderate">Moderate</option>
                  <option selected value="Aggressive">Aggressive</option>';
          }
          else
          {
          ?>  

          <option value="Conservative">Conservative</option>
          <option value="Moderate">Moderate</option>
          <option value="Aggressive">Aggressive</option>

          <?php
          }
          ?>

          </select>

          <input type="text" class="profile1" id="txtfirstname" name="txtfirstname" tabindex="9" style="display:none" value="<?php echo $firstname; ?>">

          <input type="text" class="e5_264" id="txtlastname" name="txtlastname" tabindex="10" style="display:none" value="<?php echo $lastname; ?>">

          <input type="text" class="e5_265" id="txtcountry" name="txtcountry" tabindex="11" style="display:none" value="<?php echo $country; ?>">

          <select type="text" class="e5_266" id="txtaccount_type" name="txtaccount_type" tabindex="12" style="display:none">

          <!--Select the option based on Account type in database-->
          <?php
          if($account_type == "Individual")
          {
            echo '<option selected value="Individual">Individual</option>
                  <option value="Joint">Joint</option>
                  <option value="Corporate">Corporate</option>';
          }

          else if($account_type == "Joint")
          {
            echo '<option value="Individual">Individual</option>
                  <option selected value="Joint">Joint</option>
                  <option value="Corporate">Corporate</option>';
          }

          else if($account_type == "Corporate")
          {
            echo '<option value="Individual">Individual</option>
                  <option value="Joint">Joint</option>
                  <option selected value="Corporate">Corporate</option>';
          }

          else
          {
          ?>

          <option value="Individual">Individual</option>
          <option value="Joint">Joint</option>
          <option value="Corporate">Corporate</option>

          <?php
          }
          ?>

          </select>

          <span  class="e5_263" id="spanrisk_tolerance"><?php echo $risk_tolerance; ?></span>

          <span  class="profile1" id="spanfirstname"><?php echo $firstname; ?></span>

          <span  class="e5_264" id="spanlastname"><?php echo $lastname; ?></span>

          <span  class="e5_265" id="spancountry"><?php echo $country; ?></span>

          <span  class="e5_266" id="spanaccount_type"><?php echo $account_type; ?></span>
        </div>
        <div class=e5_257>
          <div class="e2_182"></div>
          <div class=e3_236><span  class="e3_193">Invested Style</span>
            <div class=e3_216>
              <input type="text" class="e3_217" id="txtstyle" name="txtstyle" tabindex="5" style="display:none" value="<?php echo $investment_style; ?>">
              <span class="e3_217" id="spanstyle"><?php echo $investment_style; ?></span>
            </div>
          </div>
          <div class=e3_235><span  class="e3_195">Invested Goal</span>
            <div class=e3_219>
              <input type="text" class="e3_220" id="txtgoal" name="txtgoal" tabindex="6" style="display:none" value="<?php echo $investment_goal; ?>">
              <span class="e3_220" id="spangoal"><?php echo $investment_goal; ?></span>
            </div>
          </div>
          <div class=e3_237><span  class="e3_196">Invested Horizon</span>
            <div class=e3_221>

              <select type="text" class="e3_222" id="txthorizon" name="txthorizon" tabindex="7" style="display:none">
              <!--Select the option based on Investment Horizon in database-->
              <?php
              if($investment_horizon == "Short-term")
              {
                echo '<option selected value="Short-term">Short-term</option>
                      <option value="Long-term">Long-term</option>';
              }

              else if($investment_horizon == "Long-term")
              {
                echo '<option value="Short-term">Short-term</option>
                      <option selected value="Long-term">Long-term</option>';
              }

              else
              {
              ?>

              <option value="Short-term">Short-term</option>
              <option value="Long-term">Long-term</option>

              <?php
              }
              ?>

              </select>

              <span class="e3_222" id="spanhorizon"><?php echo $investment_horizon; ?></span>
            </div>
          </div>
          <div class=e3_238><span  class="e3_198">Invested Amount</span>
            <div class=e3_223>
            <div class="profileinput-icon">
              <input type="number" min="500" max="<?php echo $annual_income; ?>" class="e3_224" id="txtinvestedamount" name="txtinvestedamount" tabindex="8" style="display:none" value="<?php echo $investment_amount; ?>"><b id="txtamountsymbol" style="display:none">£</b>
            </div>
              <span class="e3_224" id="spaninvestedamount">£<?php echo $investment_amount; ?></span>
            </div>
          </div>
        </div>

        <div class=e5_258><span  class="e2_188">Edit Options</span>
    <div class="e2_186"></div>

    <!--Show the current and change password input text fields on click-->
    <a href="#" onclick="changepassword()" class="e3_239" id="changepassword">Change Password</a>

    <span class="e3_240" id="currentpassword" style="display:none">Current Password</span>

    <input type="password" class="profile2" id="txtcurrentpassword" name="txtcurrentpassword" style="display:none" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters " required="">

    <span class="profile3" id="changedpassword" style="display:none">New Password</span>

    <input type="password" class="profile4" id="txtchangedpassword" name="txtchangedpassword" style="display:none" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters ">

    <!--Show all the input text fields on click-->
    <a href="#" onclick="editoptions()" class="profileEdit" id="editaccount">Edit Account</a>

    <button class="profile5" id="editbutton" name="editbutton" formmethod="post" style="display:none">Save Details</button>

    <button class="e3_241" id="deletebutton" name="deletebutton" formmethod="post" style="display:none">Delete Account</button>

    <?php

    }
//Show Relationship manager form if manager has logged in
    else if(isset($_SESSION['ManagerID']))
          {

          ?>  

          <span  class="e2_179">Name</span>

          <input type="text" class="e3_199" id="txtmanagername" name="txtmanagername" tabindex="1" style="display:none" value="<?php echo $managername; ?>">

          <input type="email" class="e3_200" id="txtemail" name="txtemail" tabindex="2" style="display:none" value="<?php echo $email; ?>">

          <input type="text" class="e3_201" id="txtphoneno" name="txtphoneno" tabindex="3" style="display:none" value="<?php echo $phone_number; ?>">

          <input type="text" class="e3_202" id="txtlocation" name="txtlocation" tabindex="4" style="display:none" value="<?php echo $location; ?>">

          <span class="e3_199" id="spanmanagername"><?php echo $managername; ?></span>

          <span  class="e3_200" id="spanemail"><?php echo $email; ?></span>

          <span  class="e3_201" id="spanphoneno"><?php echo $phone_number; ?></span>

          <span  class="e3_202" id="spanlocation"><?php echo $location; ?></span>

          <span  class="e3_190">Email</span>

          <span  class="e3_191">Phone No.</span>

          <span  class="e3_192">Location</span>
          <div class=e5_267>
            <div class="e5_268"></div>
          </div>
        </div>
        <div class=e5_259>
        </div>
        <div class=e5_257>
          <div class="rmprofilebiobox"></div>
          <textarea  class="rmprofilebio" id="txabio" name="txabio" tabindex="5" style="display:none"><?php echo $bio; ?></textarea>
          <span  class="rmprofilebio" id="spanbio"><?php echo $bio; ?></span>
          
        </div>


        <div class=e5_258><span  class="e2_188">Edit Options</span>
    <div class="e2_186"></div>

    <!--Show the current and change password input text fields on click-->
    <a href="#" onclick="changepassword()" class="e3_239" id="changepassword">Change Password</a>

    <span class="e3_240" id="currentpassword" style="display:none">Current Password</span>

    <input type="password" class="profile2" id="txtcurrentpassword" name="txtcurrentpassword" style="display:none" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters " required="">

    <span class="profile3" id="changedpassword" style="display:none">New Password</span>

    <input type="password" class="profile4" id="txtchangedpassword" name="txtchangedpassword" style="display:none" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters ">

    <!--Show all the input text fields on click-->
    <a href="#" onclick="editmanageroptions()" class="profileEdit" id="editaccount">Edit Account</a>

    <button class="profile5" id="editbutton" name="editbutton" formmethod="post" style="display:none">Save Details</button>

    <button class="e3_241" id="deletebutton" name="deletebutton" formmethod="post" style="display:none">Delete Account</button>

    <?php

    }

    ?>

    </form>
  </div>
      </div>
      <script src="js/changepassword.js"></script>
      <script src="js/EditCustomerProfile.js"></script>
      <script src="js/EditManagerProfile.js"></script>
</body>
</html>

