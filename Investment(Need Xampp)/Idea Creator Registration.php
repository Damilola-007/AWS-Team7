<?php
// Set up database connection
require('connect.php');
ini_set("display_errors", "off");
// Retrieve the user's registration data from the form
if(isset($_POST['creator_register']))
{
  $CreatorName = htmlspecialchars($_POST['creatorname']);
  $Email = htmlspecialchars($_POST['email']);
  $Password = htmlspecialchars($_POST['password']);
  $Passwordhash = password_hash($Password, PASSWORD_DEFAULT);
  $Phone_Number = htmlspecialchars($_POST['phone_number']);
  $Website = htmlspecialchars($_POST['website']);
  $LinkedIn = htmlspecialchars($_POST['linkedin']);
  $Industry = htmlspecialchars($_POST['industry']);
  $Skills = htmlspecialchars($_POST['skills']);
  $Work_Experience = htmlspecialchars($_POST['work_experience']);
  $Education = htmlspecialchars($_POST['education']);
  
// Add additional variables for other user details here

// Store the user's registration data in the database
$insert = "INSERT INTO product_idea_creator (Creator_Name, Email, Password, Phone_Number, Website, LinkedIn, Industry, Skills, Work_Experience, Education ) 
  VALUES ('$CreatorName', '$Email', '$Passwordhash', '$Phone_Number', '$Website', '$LinkedIn', '$Industry',  '$Skills',  '$Work_Experience', '$Education')";
$run= mysql_query($insert);

if($run)
  {
    
    echo "<script>window.alert('Creator Registration successful')
    window.location ='Idea Creator Registration.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Idea Creator Registration.php'</script>";
    echo mysql_error();
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">

  <title>Idea Creator Registration</title>
</head>
<body>
  <div class=e440_250>
    <div class="e440_251"></div>
    <div class=e440_252>
      <div class=e440_253>
        <div class="e440_254"></div>
        <div class="e440_255"></div>
        <div class="e440_256"></div>
      </div>
      <div class=e440_257><span  class="e440_258">Trusted Digital Investment Ideas Platform</span><span  class="e440_259">Trusted Digital Investment Ideas Platform
  </div>
    </div>
    <div class=e440_270>
      <div class="e440_271"></div>
      <span  class="e440_281">Register as Creator</span>
      <div class=e440_282>
        <div class="e440_283"></div><span  class="e440_284">Already Have an account? Login</span>
      </div>
      <div class=e440_285>
        <div class="e440_286"></div><span  class="e440_287">Logo</span>
      </div>
      <form action="" method="post">

      <div class=e440_274>
        <div class=e440_275><label for="creatorname"><span  class="e440_276">Creator Name</span></label>
          <div>
            <input class="e440_277" type="text" name="creatorname" id="creatorname" required>
          </div>
        </div>
        <div class=e440_278><label for="linkedin"><span  class="e440_279">LinkedIn </span></label>
           <div>
            <input class="e440_280" type="text" name="linkedin" id="linkedin" required>
          </div>
        </div>
      </div>
      <div class=e440_288><label for="email"><span  class="e440_289">Email</span></label>
        <div>
          <input class="e440_290" type="email" name="email" id="email" required>
        </div>
        
        <div class=e443_5><label for="industry"><span  class="e443_6">Industry</span></label>
          <div>
            <input class="e443_7" type="text" name="industry" id="industry" required>
          </div>
        </div>
        
      </div>
      <div class=e440_291><span  class="e440_292">Password</span>
        <div>
            <input class="e440_293" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Please enter at least one lowercase and uppercase character with number between 8 to 16 characters " required>
          </div>
      </div>
      <div class="creatreg"><label for="confirmpassword"><span  class="creatreg2">Confirm Password</span></label>
        <div>
          <input class="creatreg3" type="password" name="confirmpassword" id="confirmpassword" required>
        </div>
      </div>
      <div class=e440_297><label for="phone_number"><span  class="e440_298">Phone Number</span></label>
        <div>
          <input class="creatreg4" type="text" name="phone_number" id="phone_number" required>
        </div>
      </div>
      <div class="creatreg5"><span  class="creatreg6">Website</span>
        <div>
          <input class="creatreg7" type="text" name="website" id="website" required>
        </div>
      </div>
      <div class="e440_303"></div>
      <div class="creatreg8"><label for="skills"><span  class="creatreg9">Skills</span></label>
        <div>
          <textarea class="creatreg10" name="skills" id="skills" required></textarea>
        </div>
      </div>
      <div class="creatreg11"><label for="work_experience"><span  class="creatreg12">Work Experience</span></label>
        <div>
          <textarea class="creatreg13" name="work_experience" id="work_experience" required></textarea>
        </div>
      </div>
      <div class="creatreg14"><span  class="creatreg15">Education</span>
        <div>
          <textarea class="creatreg16" name="education" id="education" required></textarea>
        </div>
      </div>
      <div class=e440_272><button type= "submit" id="creator_register" name="creator_register" formmethod="post"><span  class="e440_273">SUBMIT</span></button></div>
    </div>
  </div>
</form>
  <script src="js/confirmpassword.js"></script>
</body>
</html>