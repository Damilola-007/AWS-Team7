<?php
//Start the session for login
session_start();
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Check if Relationship Manager has logged in
if(!isset($_SESSION['UserID']))
{
  echo "<script>window.alert('Please login as Client to access this page!')
    window.location ='Login.php'</script>";
}

if(isset($_GET['IdeasID']))
{
  $Ideas_ID = $_GET['IdeasID'];
//Retrieve the ideas from database
  $select = "SELECT * FROM investment_products, investment_ideas
  WHERE investment_products.ProductID=investment_ideas.ProductID
  AND Ideas_ID=$Ideas_ID";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $IdeasID = $data['Ideas_ID'];
    $Title = $data['Title'];
    $AuthorName = $data['Author'];
    $Abstract = $data['Abstract'];
    $PublishDate = $data['Published_date'];
    $ExpiryDate = $data['Expiry_date'];
    $Content = $data['Content'];
    $Product_Name = $data['Product_Name'];
    $Product_type = $data['Product_Type'];
    $Product_Price = $data['Product_Price'];
    $RiskRating = $data['Risk_Rating'];
    $Instruments = $data['Instruments'];
    $Currency = $data['Currency'];
    $MajorSector = $data['Major_Sector'];
    $MinorSector = $data['Minor_Sector'];
    $Region = $data['Region'];
    $Country = $data['Country'];
  }
}

else
{
  echo "<script>window.alert('Please select idea first to see details!')
    window.location ='Client Dashboard.php'</script>";
}
?>

<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Investment Details</title>
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
            <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/bootstrap.css">

            <!--Check if JavaScript is enabled-->
            <noscript>
            <center><font size ="8">Please enable JavaScript to use this page!</font></center>
            <div style="display:none"></body>
            </noscript>
            
            <style>
              /*
                Figma Background for illustrative/preview purposes only.
                You can remove this style tag with no consequence
              */
              body {background: #E5E5E5; }
            </style>
          
          </head>
          
          <body>
            <div class=e90_50>

  <div class="e90_51"></div>
  <div class=e90_52><span  class="ei90_52_205_80"><?php echo $Content; ?></span></div>

  <span  class="e90_53">Investment details</span><span  class="e90_54"><?php echo $Title; ?></span>

  <span  class="e90_55"><?php echo $Product_type; ?></span><span  class="e90_56"><?php echo $RiskRating; ?></span><span  class="e90_57"><?php echo $AuthorName; ?></span>

  <span  class="e90_58">Type</span><span  class="e90_59">Title</span><span  class="e90_60">Risk Rating</span><span  class="e90_61">Author</span>

  <span  class="e90_62">Publish Date</span><span  class="e90_63">Expiry Date</span><span  class="e90_64">Currency</span>

  <span  class="e90_65">Region</span><span  class="e90_66">Country</span><span  class="e90_67">Product Name</span>

  <span  class="e90_68"><?php echo $PublishDate; ?></span><span  class="e90_69"><?php echo $ExpiryDate; ?></span><span  class="e90_70"><?php echo $Currency; ?></span>

  <span  class="e90_71"><?php echo $Region; ?></span><span  class="e90_72"><?php echo $Country; ?></span>

  <span  class="e90_73"><?php echo $Product_Name; ?></span><span  class="e90_74">Description</span>

  <span  class="investdetails">Product Price</span><span  class="investdetails1">Major Sector</span><span  class="investdetails2">Minor Sector</span><span  class="investdetails3">Instruments</span>

  <span  class="investdetails4">£<?php echo $Product_Price; ?></span><span  class="investdetails5"><?php echo $MajorSector; ?></span><span  class="investdetails6"><?php echo $MinorSector; ?></span><span  class="investdetails7"><?php echo $Instruments; ?></span>
  
  <div class=e90_75>
    <div class="e90_76"></div><a href="HomePage.php"><span  class="e1_33">Home</span></a>
    <div class="investdetailsnobar"><a href="Client Dashboard.php"><span  class="investdetailsblack">Investment Ideas</span></a></div><a href="Profile.php"><span  class="e1_128">Profile</span></a><span  class="e1_130">Messages</span><a href="Logout.php"><span  class="e1_129">Log Out</span></a><span  class="e121_121">Settings</span>
    <div class=e90_83><span  class="e90_84">Logo</span></div>
  </div>
</div>
          </body>
          </html>
