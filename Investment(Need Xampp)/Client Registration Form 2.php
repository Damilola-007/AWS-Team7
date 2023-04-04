<?php
//Turn off SQL related errors
ini_set("display_errors", "off");
//Retrieve data from user input
if(isset($_POST['clientregister']))
{
$phone_number = htmlspecialchars($_POST['Phone']);
$address = htmlspecialchars($_POST['Address']);
$city = htmlspecialchars($_POST['City']);
$state = htmlspecialchars($_POST['State']);
$country = htmlspecialchars($_POST['country']);
$postal_code = htmlspecialchars($_POST['postcode']);

//Set cookies so that they will be carried to the next form
setcookie("phone_number", $phone_number, time()+3600);
setcookie("address", $address, time()+3600);
setcookie("city", $city, time()+3600);
setcookie("state", $state, time()+3600);
setcookie("country", $country, time()+3600);
setcookie("postal_code", $postal_code, time()+3600);

echo "<script>
    window.location ='Client Registration Form 3.php'</script>";
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
          <span  class="e437_190">Complete your account</span>
          <div class=e437_192>
            <div class="e437_193"></div><span  class="e437_194">Already Have an account? <a href="Login.php">Login</a></span>
          </div>
          <div class=e437_195>
            <div class="e437_196"></div><span  class="e437_197">Logo</span>
          </div>
          <form action="" method="post">
          <div class=e437_189>
          </div>
          
          <div class=e437_198><label for="Address"><span  class="e437_199">Address</span>
            <div>
              <textarea class="e437_200" id="address" name="Address" tabindex="1" required></textarea>
            </label>
            </div>
          </div>
          <div class=e437_201><label for="City"><span  class="e437_202">City</span>
            <div>
              <input class="e437_203"type="text" id="City" name="City" tabindex="2" required placeholder="Cambridge">
            </label>
            </div>
          </div>
          <div class=e437_204><label for="State"><span  class="e437_205">State</span>
            <div>
              <input class="e437_206" type="text" id="State" name="State" tabindex="3" required placeholder="">
            </label>
            </div>
          </div>
          <div class=e437_207><label for="country"><span  class="e437_208">Country</span>
            <div>
              <input class="e437_209" type="text" id="country" name="country" tabindex="4" required placeholder="">
            </label>
            </div>
          </div>
          <div class=e437_210><label for="Phone"><span  class="e437_211">Phone No</span> </label>
            <div>
              <input class="e437_212" type="number" id="Phone" name="Phone" tabindex="6" required placeholder="+Country Code">
            
            </div>
          </div>
          <div class=e440_235><label for="postcode"><span  class="e440_236">Postcode</span>
            <div>
              <input class="e440_237" type="text" id="postcode" name="postcode" tabindex="5" required placeholder="">
            </label>
            </div>
          </div>
          <div><button class=e437_187 type="submit" name="clientregister" formmethod="post"><span  class="e440_273"> NEXT</span></button></div>
        </div>
      </div>
    </form>
      <script src="js/registrationPage2country.js"></script>

</body>
</html>