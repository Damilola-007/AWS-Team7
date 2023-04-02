<?php
// Set up database connection
require('connect.php');
ini_set("display_errors", "off");
// Retrieve the user's registration data from the form
if(isset($_POST['clientregister']))
{
$firstname = $_COOKIE["firstname"];
$lastname = $_COOKIE["lastname"];
$username = $_POST["username"];
$password = $_COOKIE["password"];
$email = $_COOKIE['email'];
$phone_number = $_COOKIE['phone_number'];
$address = $_COOKIE['address'];
$city = $_COOKIE['city'];
$state = $_COOKIE['state'];
$country = $_COOKIE['country'];
$postal_code = $_COOKIE['postal_code'];
$account_type = htmlspecialchars($_POST['account_type']);
$investment_style = htmlspecialchars($_POST['investment_style']);
$investment_goal = htmlspecialchars($_POST['investment_goal']);
$investment_horizon = htmlspecialchars($_POST['investment_horizon']);
$occupation = htmlspecialchars($_POST['occupation']);
$annual_income = htmlspecialchars($_POST['annual_income']);
$risk_tolerance = htmlspecialchars($_POST['risk_tolerance']);
$net_worth = htmlspecialchars($_POST['net_worth']);
$investment_amount = htmlspecialchars($_POST['investment_amount']);
$created_at = date("Y-m-d H:i:s");

// Store the user's registration data in the database
$insert = "INSERT INTO client (First_Name, Last_Name, UserName, Password, Email, Investment_horizon, Address, City, State, Country, Postal_code, Phone_Number, Employment_status, Investment_goal, Risk_tolerance, Investment_style, Investment_amount, Annual_income, Net_worth, Account_Type, Created_at ) VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$investment_horizon', '$address',  '$city',  '$state', '$country', '$postal_code', '$phone_number', '$occupation', '$investment_goal', '$risk_tolerance', '$investment_style', '$investment_amount', '$annual_income', '$net_worth', '$account_type', '$created_at')";
$run= mysql_query($insert);

if($run)
  {
    //Remove cookies from the browser to improve security
    setcookie("firstname", "", time()-3600);
    setcookie("lastname", "", time()-3600);
    setcookie("password", "", time()-3600);
    setcookie("email", "", time()-3600);
    setcookie("phone_number", "", time()-3600);
    setcookie("address", "", time()-3600);
    setcookie("city", "", time()-3600);
    setcookie("state", "", time()-3600);
    setcookie("country", "", time()-3600);
    setcookie("postal_code", "", time()-3600);
    echo "<script>window.alert('Client Registration successful')
    window.location ='Login.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Client Registration Form 3.php'</script>";
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

  <title>Client Registration</title>
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
      <form action="" method="post">
      <div><button class=e440_272 type= "submit" id="clientregister" name="clientregister" formmethod="post"><span  class="e440_273">SUBMIT</span></button></div>
      <div class=e440_274>
        <div class=e440_275><label for="username"><span  class="e440_276">UserName</span></label>
          <div>
            <input class="e440_277" type="text" name="username" id="username" tabindex="1" required>
          </div>
        </div>
        <div class=e440_278><label for="occupation"><span  class="e440_279">Occupation </span></label>
           <div>
            <input class="e440_280" type="text" name="occupation" id="occupation" tabindex="2" required>
          </div>
        </div>
      </div><span  class="e440_281">Complete your account</span>
      <div class=e440_282>
        <div class="e440_283"></div><span  class="e440_284">Already Have an account? <a href="Login.php">Login</a></span>
      </div>
      <div class=e440_285>
        <div class="e440_286"></div><span  class="e440_287">Logo</span>
      </div>
      <div class=e440_288><label for="investment_goal"><span  class="e440_289">Investment Goal</span></label>
        <div>
          <input class="e440_290" type="text" name="investment_goal" id="investment_goal" tabindex="3" required>
        </div>
        <!--
        <div class=e443_5><label for="personality"><span  class="e443_6">Personality</span></label>
          <div>
            <input class="e443_7" type="text" name="personality" id="personality">
          </div>
        </div>
        -->
      </div>
      <div class=e440_291><span  class="e440_292">Risk Tolerance</span>
        <div>
          <select class="e440_293" name="risk_tolerance" id="risk_tolerance" tabindex="4" required>
            <option value=""></option>
            <Option value="conservative">Conservative</Option>
            <option value="moderate">Moderate</option>
            <option value="aggressive">Aggressive</option>

        </select>
        </div>
      </div>
      <div class=e440_294><label for="investment_style"><span  class="e440_295">Investment Style</span></label>
        <div>
          <input class="e440_296" type="text" name="investment_style" id="investment_style" tabindex="5" required>
        </div>
      </div>
      <div class=e440_297><label for="annual_income"><span  class="e440_298">Annual Income</span></label>
        <div>
          <input class="e440_299" type="number" name="annual_income" id="annual_income" tabindex="6" required>
        </div>
      </div>
      <div class=e440_300><span  class="e440_301">Account Type</span>
        <div>
          <select class="e440_302" name="account_type" id="account_type" tabindex="7" required>
            <option value=""></option>
            <Option value="individual">Individual</Option>
            <option value="joint">Joint</option>
            <option value="corporate">Corporate</option>

        </select>
        </div>
      </div>
      <div class="e440_303"></div>
      <div class=e440_304><label for="investment_amount"><span  class="e440_305">Investment Amount</span></label>
        <div>
          <input class="e440_306" type="number" name="investment_amount" id="investment_amount" tabindex="8" required>
        </div>
      </div>
      <div class=e440_307><label for="net_worth"><span  class="e440_308">Net worth</span></label>
        <div>
          <input class="e440_309" type="number" name="net_worth" id="net_worth" tabindex="9" required>
        </div>
      </div>
      <div class=e440_313><span  class="e440_314">Investment Horizon</span>
        <div>
          <select class="e440_315" name="investment_horizon" id="investment_horizon" tabindex="10" required>
            <option value=""></option>
            <Option value="short_term">Short-term</Option>
            <option value="long_term">Long-term</option>
                    </select>
        </div>
      </div>
      <!--
      <div class=e443_10><span  class="e443_11">Gender</span>
        <div>
          <select class="e443_12" name="gender" id="gender">
            <option value=""></option>
            <Option value="male">Male</Option>
            <option value="female">Female</option>
            <option value="Prefer_not_to_say">Prefer not to say</option>

        </select></div>
      </div>
    -->
    </div>
  </div>
</form>
  <script src="js/storeRegistration.js"></script>
</body>
</html>