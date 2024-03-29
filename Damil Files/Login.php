<?php
require('connect.php');
session_start(); // Start a new or resume existing session
/*
// Database configuration
$host = 'localhost'; // Specify the host name
$username = 'your_database_username'; // Specify the database username
$password = 'your_database_password'; // Specify the database password
$database = 'your_database_name'; // Specify the database name

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database); // Create a new MySQL connection

if (!$conn) { // Check if the connection was successful
  die('Failed to connect to database: ' . mysqli_connect_error()); // Terminate the script and display the error message
}*/

// Login process
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if the request method is POST
  $email = $_POST['email']; // Get the email value from the POST data
  $password = $_POST['password']; // Get the password value from the POST data

  // Check if the user exists in the database
  $query = "SELECT * FROM users WHERE email='$email'"; // Create a SQL query to get user data
  $result = mysqli_query($conn, $query); // Execute the query and get the result

  if (mysqli_num_rows($result) === 1) { // Check if there is exactly one row returned
    $row = mysqli_fetch_assoc($result); // Get the row data as an associative array
    $hashedPassword = $row['password']; // Get the hashed password from the row data

    if (password_verify($password, $hashedPassword)) { // Verify the password using the hashed password
      // Login successful, create a session and redirect to the dashboard
      $_SESSION['email'] = $email; // Store the email in the session variable
      header('Location: Profile.php'); // Redirect the user to the dashboard page

      exit(); // Terminate the script
    } else {

      // Login failed, display an error message
      $error = 'Invalid email or password'; // Set the error message
    }
  } else {

    // Login failed, display an error message
    $error = 'Invalid email or password'; // Set the error message
  }
}

// Close the MySQL connection
//mysqli_close($conn); 

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
        <title>Client Login</title>
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
                    <span class="v91_144">Client Login</span>
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
                        <a href="Client Registration.html">Create an Account</a></span
                    >
                </div>

                <div class="v91_149">
                    <div class="v91_150"></div>
                    <span class="v91_151">Logo</span>
                </div>

                <!--Form for the login page-->
                <!--form action="">-->
                <form onsubmit="return validateForm()">
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
                    <a href="ProfileSamplePage.html">
                        <button class="v91_141" id="log-in" type="submit">
                            <span class="v91_142">NEXT</span>
                        </button>
                    </a>
                </form>
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