<?php // starts a new session or resumes an existing one
 //session_start(); 
 // includes the config file which contains database credentials
 //require('connect.php'); 
//Turn off SQL related errors
//ini_set("display_errors", "off");

// checks if the form has been submitted
//if($_SERVER["REQUEST_METHOD"] == "POST") { 
  // gets the username entered by the user and escapes special characters to prevent SQL injection attacks
    //$username = mysqli_real_escape_string($conn,$_POST['username']); 
    // gets the password entered by the user and escapes special characters to prevent SQL injection attacks
    //$password = mysqli_real_escape_string($conn,$_POST['password']);  
    // selects the user id from the users table where the username and password match the ones entered by the user
    //$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'"; 
    // executes the query
    //$result = mysqli_query($conn,$sql); 
    // gets the number of rows returned by the query
    //$count = mysqli_num_rows($result); 
    // if the query returns one row, the user credentials are correct
    //if($count == 1) { 
      // stores the username in a session variable
       // $_SESSION['login_user'] = $username; 
        // redirects the user to the welcome.php page
       // header("location: welcome.php"); 
    //} else {
      // if the query returns no rows, the user credentials are incorrect
      //  $error = "Your Login Name or Password is invalid"; 

      
      
    
      // Start session to allow access to session variables
      session_start();
      
      // includes the config file which contains database credentials
        require('connect.php'); 
      //Turn off SQL related errors
     ini_set("display_errors", "off");
      
      // Check if the form has been submitted
      if($_SERVER["REQUEST_METHOD"] == "POST") {
          
          // Retrieve username and password entered by user
          $username = mysqli_real_escape_string($db,$_POST['username']);
          $password = mysqli_real_escape_string($db,$_POST['password']); 
          
          // Retrieve user information from the appropriate table based on their user type
          $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
          if ($user_type == 'Relationship Manager') {
              $table_name = 'relationship_manager';
          } else if ($user_type == 'Idea Creator') {
              $table_name = 'product_idea_creator';
          } else if ($user_type == 'Client') {
              $table_name = 'client';
          }
          
          // Query the appropriate table for the user information entered
          $sql_query = "SELECT id, username, password FROM $table_name WHERE username = '$username'";
          $result = mysqli_query($db,$sql_query);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          
          // If username and password are found in the table, set session variables and redirect to appropriate page
          $count = mysqli_num_rows($result);
          if($count == 1 && password_verify($password, $row['password'])) {
              $_SESSION['login_user'] = $username;
              $_SESSION['user_type'] = $user_type;
              if ($user_type == 'Relationship Manager') {
                  header("location: RM Dashboard.php");
              } else if ($user_type == 'Idea Creator') {
                  header("location: Idea Creator Dashboard.php");
              } else if ($user_type == 'Client') {
                  header("location: Client Dashboard.php");
              }
          } else {
              $error = "Your Login Name or Password is invalid";
          }
      }
      ?>
      
  
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
    <title>Document</title>
</head>
<body>
    <div class=e2_163>
        <div class="e2_164"></div><span  class="e2_167">Profile</span><span  class="e2_187">Product Types</span><span  class="e3_218">Industries</span><span  class="e3_194">Your preferences</span>
        <div class=e5_255>
          <div class="e2_165"></div><span  class="e2_169">Home</span>
          <div class=e2_170><span  class="e2_171">Profile</span></div><span  class="e2_172">manage Ideas</span><span  class="e2_173">Messages</span><span  class="e2_174">Settings</span><span  class="e121_122">Log Out</span>
          <div class=e2_175><span  class="e2_176">Logo</span></div>
        </div>
        <div class=e5_256>
          <div class="e2_178"></div>
          <div class="e3_242"></div><span  class="e2_179">Name</span><span  class="e3_199">Ayo Balogun</span><span  class="e3_200">32years</span><span  class="e3_201">Software Developer</span><span  class="e3_202">Introvert</span><span  class="e3_190">Age</span><span  class="e3_191">Occupation</span><span  class="e3_192">Personality</span>
          <div class=e5_267>
            <div class="e5_268"></div>
            <div class="e5_269"></div>
          </div>
        </div>
        <div class=e5_259>
          <div class="e2_189"></div>
          <div class=e3_231><span  class="e3_228">add</span></div><span  class="e3_229">Real estate</span><span  class="e3_230">Fashion</span><span  class="e3_232">Cryptocurrency</span><span  class="e3_233">Football</span><span  class="e5_263">Music</span><span  class="e5_264">Agriculture</span><span  class="e5_265">Healthcare</span><span  class="e5_266">Oil & Gas</span>
        </div>
        <div class=e5_257>
          <div class="e2_182"></div>
          <div class=e3_236><span  class="e3_193">Bonds</span>
            <div class=e3_216>
              <div class="e3_217"></div>
            </div>
          </div>
          <div class=e3_235><span  class="e3_195">Stocks</span>
            <div class=e3_219>
              <div class="e3_220"></div>
            </div>
          </div>
          <div class=e3_237><span  class="e3_196">Mutual Funds</span>
            <div class=e3_221>
              <div class="e3_222"></div>
            </div>
          </div>
          <div class=e3_238><span  class="e3_198">Mutual Funds</span>
            <div class=e3_223>
              <div class="e3_224"></div>
            </div>
          </div>
        </div>
        <div class=e5_258><span  class="e2_188">Technology</span>
          <div class="e2_186"></div><span  class="e3_239">Mobile App</span><span  class="e3_240">Web App</span><span  class="e3_241">Social Networking</span>
        </div>
      </div>
</body>
</html>

