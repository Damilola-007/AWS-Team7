<?php
//Start the session for login
session_start();
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Remove Confirm re-form submission message
header("Cache-Control: no-cache, must-revalidate, max-age=0");
//Check if Relationship Manager has logged in
if(!isset($_SESSION['ManagerID']))
{
  echo "<script>window.alert('Please login as Relationship Manager to access this page!')
    window.location ='Login.php'</script>";
}

//Reload the page so the cookies are properly enabled for first time user
if(!isset($_COOKIE['dash']))
{
  header( "refresh:0;url=RM Dashboard.php" );
}

?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Dashboard</title>
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

            <script src="js/table-sort.js"></script>
            
            <style>
            /* Change button color based on what has been clicked */
            <?php
              if($_COOKIE["dash"]=="client")
                {

                  echo ".dash_client_button{background-color:rgba(0, 0, 0, 1); color:white;}";
                  echo ".dash_idea_button{background-color:rgba(0, 0, 0, 0); color:black;}";
                           

                }
                if($_COOKIE["dash"]=="idea")
                {
                  echo ".dash_client_button{background-color:rgba(0, 0, 0, 0); color:black;}";
                  echo ".dash_idea_button{background-color:rgba(0, 0, 0, 1); color:white;}";
                  
                }
            
              if(isset($_POST['client']))
              {

              echo ".dash_client_button{background-color:rgba(0, 0, 0, 1); color:white;}";
              echo ".dash_idea_button{background-color:rgba(0, 0, 0, 0); color:black;}";

              //set dash cookie as client
              setcookie("dash", "client", time()+3600);     

              }
              if(isset($_POST['idea']))
              {
              echo ".dash_client_button{background-color:rgba(0, 0, 0, 0); color:black;}";
              echo ".dash_idea_button{background-color:rgba(0, 0, 0, 1); color:white;}";

              //set dash cookie as idea
              setcookie("dash", "idea", time()+3600);
              }

              //Change button color when search button is pressed
              if(isset($_POST['btnsearch']))
              {
                if($_COOKIE["dash"]=="client")
                {

                  echo ".dash_client_button{background-color:rgba(0, 0, 0, 1); color:white;}";
                  echo ".dash_idea_button{background-color:rgba(0, 0, 0, 0); color:black;}";
                           

                }
                if($_COOKIE["dash"]=="idea")
                {
                  echo ".dash_client_button{background-color:rgba(0, 0, 0, 0); color:black;}";
                  echo ".dash_idea_button{background-color:rgba(0, 0, 0, 1); color:white;}";
                  
                }
              }
            ?>
              /*
                Figma Background for illustrative/preview purposes only.
                You can remove this style tag with no consequence
              */
              body {background: #E5E5E5; }
            </style>

           <script type="text/javascript">
             
             function enterkey()
             {
              // Get the input field
              var input = document.getElementById("txtsearch");

              // Execute a function when the user presses a key on the keyboard
              input.addEventListener("keypress", function(event) {
                // If the user presses the "Enter" key on the keyboard
                if (event.key === "Enter") {
                  // Cancel the default action, if needed
                  event.preventDefault();
                  // Trigger the button element with a click
                  document.getElementById("btnsearch").click();
                }
              });
             }

           </script>
          
          </head>
          
          <body onload="enterkey()">
          
            <div class=e1_64>
  <div class="e1_65"></div><span  class="e1_78">Explore clients and investments ideas to match</span>
  <div class=e1_74>
    <div class="e1_66"></div><a href="HomePage.php"><span  class="e1_69">Home</span></a>
    <div class=e1_125><a href="RM Dashboard.php"><span  class="e1_70">Dashboard</span></a></div><a href="Profile.php"><span  class="e1_76">Profile</span></a><a href="Logout.php"><span  class="e1_77">Log out</span></a><span  class="e1_131">Messages</span>
    <div class=e1_71><span  class="e1_72">Logo</span></div>
  </div>
  <div class=e91_243><span  class="e1_68">RM Dashboard</span>
    <div class="e1_75"></div>
  </div>

  <div class="dashboard_table">
          <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1" id="table">
    <thead>
  <tr>
  <?php
  //Check if client button has been clicked
  if(isset($_POST['client']))
  {
    
  ?>

    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Postal Code</th>
    <th>Account Type</th>
    <th>Investment Style</th>
    <th>Investment Goal</th>
    <th>Investment Horizon</th>
    <th>Employment Status</th>
    <th>Annual Income</th>
    <th>Risk Tolerance</th>
    <th>Net Worth</th>
    <th>Investment Amount</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
//Retrieve the clients from database
  $select = "SELECT * FROM client";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Clients found! Please register at least one client!')
    window.location ='Client Registration Form 1.php'</script>";
  }

  else
  {

  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
    $email = $data["Email"];
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

    echo "<tr>";
    echo "<td>".$firstname."</td>";
    echo "<td>".$lastname."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$phone_number."</td>";
    echo "<td>".$address."</td>";
    echo "<td>".$city."</td>";
    echo "<td>".$state."</td>";
    echo "<td>".$country."</td>";
    echo "<td>".$postal_code."</td>";
    echo "<td>".$account_type."</td>";
    echo "<td>".$investment_style."</td>";
    echo "<td>".$investment_goal."</td>";
    echo "<td>".$investment_horizon."</td>";
    echo "<td>".$occupation."</td>";
    echo "<td>£".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>£".$net_worth."</td>";
    echo "<td>£".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.php?UserID=$UserID'>Match</a></td>";
    echo "</tr>";
    
  }
  }
}

//Check If Investment Idea button has been clicked
  else if(isset($_POST['idea']))
  {
    
?>
    <th>Title</th>
    <th>Author Name</th>
    <th>Abstract</th>
    <th>Published Date</th>
    <th>Expiry Date</th>
    <th>Content</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Product Price</th>
    <th>Risk Rating</th>
    <th>Instruments</th>
    <th>Currency</th>
    <th>Major Sector</th>
    <th>Minor Sector</th>
    <th>Region</th>
    <th>Country</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
//Retrieve the ideas from database
  $select = "SELECT * FROM investment_products, investment_ideas
  WHERE investment_products.ProductID=investment_ideas.ProductID";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Ideas found! Please register at least one idea!')
    window.location ='Idea Registration.php'</script>";
  }

  else
  {

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

    //Cut the Abstract if it is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50);
    }

    //Cut the Content if it is longer than 50 characters
    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50);
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    if (strlen($Abstract) > 50) 
    {

    //Add Read more and show less functions for Abstract and Content
    $ID = $data['Ideas_ID'];
    echo "<td><span id='show-cutA_".$ID."'>".$AbstractCut."... </span><a href='#' id='read-moreA_".$ID."' onclick='readmoreA(".$ID.");''>Read more</a><span id='show-contentA_".$ID."' style='display:none'>".$Abstract."<a href='#' id='show-lessA_".$ID."' onclick='showlessA(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if (strlen($Content) > 50) 
    {

    echo "<td><span id='show-cutC_".$ID."'>".$ContentCut."... </span><a href='#' id='read-moreC_".$ID."' onclick='readmoreC(".$ID.");''>Read more</a><span id='show-contentC_".$ID."' style='display:none'>".$Content."<a href='#' id='show-lessC_".$ID."' onclick='showlessC(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_Name."</td>";
    echo "<td>".$Product_type."</td>";
    echo "<td>£".$Product_Price."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.php?IdeasID=$IdeasID'>Match</a></td>";
    echo "</tr>";
  }
  }
}

else
{
if(isset($_POST['btnsearch']))
{
  $dash = $_COOKIE["dash"];

  //Check if the user has clicked Client button before clicking Search button
  if($dash == "client")
  {

//Retrieve data from the database and match it with search input
    $searchword = $_POST['txtsearch'];
    $select = "SELECT * FROM client
    WHERE First_Name LIKE '%$searchword%'
    OR Last_Name LIKE '%$searchword%'
    OR Email LIKE '%$searchword%'
    OR Address LIKE '%$searchword%'
    OR City LIKE '%$searchword%'
    OR State LIKE '%$searchword%'
    OR Country LIKE '%$searchword%'
    OR Postal_code LIKE '%$searchword%'
    OR Account_Type LIKE '%$searchword%'
    OR Investment_style LIKE '%$searchword%'
    OR Investment_goal LIKE '%$searchword%'
    OR Investment_horizon LIKE '%$searchword%'
    OR Employment_status LIKE '%$searchword%'
    OR Risk_tolerance LIKE '%$searchword%'";
    $ret = mysql_query($select);
    $count= mysql_num_rows($ret);

    if($count==0)
    {
      echo "<script>window.alert('No Results')
        window.location ='RM Dashboard.php'</script>";
    }
else
{
?>

    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Postal Code</th>
    <th>Account Type</th>
    <th>Investment Style</th>
    <th>Investment Goal</th>
    <th>Investment Horizon</th>
    <th>Employment Status</th>
    <th>Annual Income</th>
    <th>Risk Tolerance</th>
    <th>Net Worth</th>
    <th>Investment Amount</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
  
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
    $email = $data["Email"];
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

    echo "<tr>";
    echo "<td>".$firstname."</td>";
    echo "<td>".$lastname."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$phone_number."</td>";
    echo "<td>".$address."</td>";
    echo "<td>".$city."</td>";
    echo "<td>".$state."</td>";
    echo "<td>".$country."</td>";
    echo "<td>".$postal_code."</td>";
    echo "<td>".$account_type."</td>";
    echo "<td>".$investment_style."</td>";
    echo "<td>".$investment_goal."</td>";
    echo "<td>".$investment_horizon."</td>";
    echo "<td>".$occupation."</td>";
    echo "<td>£".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>£".$net_worth."</td>";
    echo "<td>£".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.php?UserID=$UserID'>Match</a></td>";
    echo "</tr>";
  }
}

}

//Check if the user has clicked Investment Ideas button before clicking Search button
  if($dash == "idea")
  {

    //Retrieve data from the database and match it with search input
    $searchword = $_POST['txtsearch'];
    $select = "SELECT DISTINCT * FROM investment_ideas id
    INNER JOIN investment_products ip ON ( ip.ProductID = id.ProductID )
    WHERE Title LIKE '%$searchword%'
    OR Author LIKE '%$searchword%'
    OR Product_Name LIKE '%$searchword%'
    OR Product_Type LIKE '%$searchword%'
    OR Instruments LIKE '%$searchword%'
    OR Currency LIKE '%$searchword%'
    OR Major_Sector LIKE '%$searchword%'
    OR Minor_Sector LIKE '%$searchword%'
    OR Region LIKE '%$searchword%'
    OR Country LIKE '%$searchword%'
    GROUP BY Ideas_ID";
    $ret = mysql_query($select);
    $count= mysql_num_rows($ret);

    if($count==0)
    {
      echo "<script>window.alert('No Results')
        window.location ='RM Dashboard.php'</script>";
    }
else
{
?>

    <th>Title</th>
    <th>Author Name</th>
    <th>Abstract</th>
    <th>Published Date</th>
    <th>Expiry Date</th>
    <th>Content</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Product Price</th>
    <th>Risk Rating</th>
    <th>Instruments</th>
    <th>Currency</th>
    <th>Major Sector</th>
    <th>Minor Sector</th>
    <th>Region</th>
    <th>Country</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php

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

    //Cut the Abstract if it is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50);
    }

    //Cut the Content if it is longer than 50 characters
    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50);
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    if (strlen($Abstract) > 50) 
    {

    //Add Read more and show less functions for Abstract and Content
    $ID = $data['Ideas_ID'];
    echo "<td><span id='show-cutA_".$ID."'>".$AbstractCut."... </span><a href='#' id='read-moreA_".$ID."' onclick='readmoreA(".$ID.");''>Read more</a><span id='show-contentA_".$ID."' style='display:none'>".$Abstract."<a href='#' id='show-lessA_".$ID."' onclick='showlessA(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if (strlen($Content) > 50) 
    {

    echo "<td><span id='show-cutC_".$ID."'>".$ContentCut."... </span><a href='#' id='read-moreC_".$ID."' onclick='readmoreC(".$ID.");''>Read more</a><span id='show-contentC_".$ID."' style='display:none'>".$Content."<a href='#' id='show-lessC_".$ID."' onclick='showlessC(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_Name."</td>";
    echo "<td>".$Product_type."</td>";
    echo "<td>£".$Product_Price."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.php?IdeasID=$IdeasID'>Match</a></td>";
    echo "</tr>";
  }
}
  }

}
else
{
if($_COOKIE["dash"]=="client")
{
?>
<th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Postal Code</th>
    <th>Account Type</th>
    <th>Investment Style</th>
    <th>Investment Goal</th>
    <th>Investment Horizon</th>
    <th>Employment Status</th>
    <th>Annual Income</th>
    <th>Risk Tolerance</th>
    <th>Net Worth</th>
    <th>Investment Amount</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>

<?php
//Retrieve the clients from database
  $select = "SELECT * FROM client";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Clients found! Please register at least one client!')
    window.location ='Client Registration Form 1.php'</script>";
  }

  else
  {

  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
    $email = $data["Email"];
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

    echo "<tr>";
    echo "<td>".$firstname."</td>";
    echo "<td>".$lastname."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$phone_number."</td>";
    echo "<td>".$address."</td>";
    echo "<td>".$city."</td>";
    echo "<td>".$state."</td>";
    echo "<td>".$country."</td>";
    echo "<td>".$postal_code."</td>";
    echo "<td>".$account_type."</td>";
    echo "<td>".$investment_style."</td>";
    echo "<td>".$investment_goal."</td>";
    echo "<td>".$investment_horizon."</td>";
    echo "<td>".$occupation."</td>";
    echo "<td>£".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>£".$net_worth."</td>";
    echo "<td>£".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.php?UserID=$UserID'>Match</a></td>";
    echo "</tr>";
  }
  }
}

if($_COOKIE["dash"]=="idea")
{
?>
<th>Title</th>
    <th>Author Name</th>
    <th>Abstract</th>
    <th>Published Date</th>
    <th>Expiry Date</th>
    <th>Content</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Product Price</th>
    <th>Risk Rating</th>
    <th>Instruments</th>
    <th>Currency</th>
    <th>Major Sector</th>
    <th>Minor Sector</th>
    <th>Region</th>
    <th>Country</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
//Retrieve the ideas from database
  $select = "SELECT * FROM investment_products, investment_ideas
  WHERE investment_products.ProductID=investment_ideas.ProductID";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Ideas found! Please register at least one idea!')
    window.location ='Idea Registration.php'</script>";
  }

  else
  {

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

    //Cut the Abstract if it is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50);
    }

    //Cut the Content if it is longer than 50 characters
    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50);
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    if (strlen($Abstract) > 50) 
    {

    //Add Read more and show less functions for Abstract and Content
    $ID = $data['Ideas_ID'];
    echo "<td><span id='show-cutA_".$ID."'>".$AbstractCut."... </span><a href='#' id='read-moreA_".$ID."' onclick='readmoreA(".$ID.");''>Read more</a><span id='show-contentA_".$ID."' style='display:none'>".$Abstract."<a href='#' id='show-lessA_".$ID."' onclick='showlessA(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if (strlen($Content) > 50) 
    {

    echo "<td><span id='show-cutC_".$ID."'>".$ContentCut."... </span><a href='#' id='read-moreC_".$ID."' onclick='readmoreC(".$ID.");''>Read more</a><span id='show-contentC_".$ID."' style='display:none'>".$Content."<a href='#' id='show-lessC_".$ID."' onclick='showlessC(".$ID.");''>Show less</a></span></td>";

    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_Name."</td>";
    echo "<td>".$Product_type."</td>";
    echo "<td>£".$Product_Price."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.php?IdeasID=$IdeasID'>Match</a></td>";
    echo "</tr>";
  }
  }
}
//Default table which shows on first load without any cookies. This is to prevent empty page.
if(!isset($_COOKIE["dash"]))
{
?>
<th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Country</th>
    <th>Postal Code</th>
    <th>Account Type</th>
    <th>Investment Style</th>
    <th>Investment Goal</th>
    <th>Investment Horizon</th>
    <th>Employment Status</th>
    <th>Annual Income</th>
    <th>Risk Tolerance</th>
    <th>Net Worth</th>
    <th>Investment Amount</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>

<?php
//Retrieve the clients from database
  $select = "SELECT * FROM client";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Clients found! Please register at least one client!')
    window.location ='Client Registration Form 1.php'</script>";
  }

  else
  {

  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
    $email = $data["Email"];
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

    echo "<tr>";
    echo "<td>".$firstname."</td>";
    echo "<td>".$lastname."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$phone_number."</td>";
    echo "<td>".$address."</td>";
    echo "<td>".$city."</td>";
    echo "<td>".$state."</td>";
    echo "<td>".$country."</td>";
    echo "<td>".$postal_code."</td>";
    echo "<td>".$account_type."</td>";
    echo "<td>".$investment_style."</td>";
    echo "<td>".$investment_goal."</td>";
    echo "<td>".$investment_horizon."</td>";
    echo "<td>".$occupation."</td>";
    echo "<td>£".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>£".$net_worth."</td>";
    echo "<td>£".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.php?UserID=$UserID'>Match</a></td>";
    echo "</tr>";
    setcookie("dash", "client", time()+3600); 
  }

  }
  
}
}
}
?>
</tbody>
</table>

  </div>
  <form action="" method="post">
  <div class=e1_82>
    <Input class="e1_79" type="text" placeholder="   Search " id="txtsearch" name="txtsearch">
  </div>
  <div class=e91_245>
    <div class=e1_83><span  class="e1_80"><button class="dash_client_button" id="client" name="client" formmethod="post">Clients</button></span></div>
    <div class=e1_84><span  class="e1_85"><button class="dash_idea_button" id="idea" name="idea" formmethod="post">Investment Ideas</button></span></div>
    <div class=e91_244>
      <div class=e5_273>
      </div><span  class="e5_275"><button type="submit" id="btnsearch" name="btnsearch" formmethod="post">Search</button></span>
    </div>
  </div>
  </form>
</div>
 <script src="js/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script src="js/Readmore_Showless.js"></script>
          </body>
          </html>