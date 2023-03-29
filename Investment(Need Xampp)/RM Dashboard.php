<?php
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");

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
    <div class="e1_66"></div><span  class="e1_69">Home</span>
    <div class=e1_125><a href="RM Dashboard.php"><span  class="e1_70">Dashboard</span></a></div><span  class="e1_76">Evaluate Ideas</span><span  class="e1_77">Settings</span><span  class="e1_131">Messages</span>
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
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
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
    echo "<td>".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>".$net_worth."</td>";
    echo "<td>".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.html?UserID=$UserID&Action=M'>Match</a></td>";
    echo "</tr>";
    
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
    <th>Product Type</th>
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
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
    $Instruments = $data['Instruments'];
    $Currency = $data['Currency'];
    $MajorSector = $data['Major_Sector'];
    $MinorSector = $data['Minor_Sector'];
    $Region = $data['Region'];
    $Country = $data['Country'];

    //Add Read more if the text is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'RM Dashboard.php?abreadmore'>Read more</a>";
    }

    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50) . "... <a href = 'RM Dashboard.php?conreadmore'>Read more</a>";
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Abstract) > 50)
    {
      echo "<td>".$AbstractCut."</td>";
    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if(isset($_GET['conreadmore']) && strlen($Content) > 50)
    {
      echo "<td>".$Content."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Content) > 50)
    {
      echo "<td>".$ContentCut."</td>";
    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_type."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.html?IdeasID=$IdeasID&Action=U'>Match</a></td>";
    echo "</tr>";
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
    OR Address LIKE '%$searchword%'
    OR City LIKE '%$searchword%'
    OR State LIKE '%$searchword%'
    OR Country LIKE '%$searchword%'
    OR Postal_code LIKE '%$searchword%'
    OR Account_Type LIKE '%$searchword%'
    OR Investment_style LIKE '%$searchword%'
    OR Investment_goal LIKE '%$searchword%'
    OR Investment_horizon LIKE '%$searchword%'
    OR Employment_status LIKE '%$searchword%'";
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
    echo "<td>".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>".$net_worth."</td>";
    echo "<td>".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.html?UserID=$UserID&Action=M'>Match</a></td>";
    echo "</tr>";
  }
}

}

//Check if the user has clicked Investment Ideas button before clicking Search button
  if($dash == "idea")
  {

    //Retrieve data from the database and match it with search input
    $searchword = $_POST['txtsearch'];
    $select = "SELECT DISTINCT * FROM investment_products, investment_ideas
    WHERE investment_products.ProductID=investment_ideas.ProductID
    AND Title LIKE '%$searchword%'
    OR Author LIKE '%$searchword%'
    OR Product_Type LIKE '%$searchword%'
    OR Currency LIKE '%$searchword%'
    OR Major_Sector LIKE '%$searchword%'
    OR Minor_Sector LIKE '%$searchword%'
    OR Region LIKE '%$searchword%'
    OR Country LIKE '%$searchword%'";
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
    <th>Product Type</th>
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
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
    $Instruments = $data['Instruments'];
    $Currency = $data['Currency'];
    $MajorSector = $data['Major_Sector'];
    $MinorSector = $data['Minor_Sector'];
    $Region = $data['Region'];
    $Country = $data['Country'];

    //Add Read more if the text is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'RM Dashboard.php?abreadmore'>Read more</a>";
    }

    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50) . "... <a href = 'RM Dashboard.php?conreadmore'>Read more</a>";
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Abstract) > 50)
    {
      echo "<td>".$AbstractCut."</td>";
    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if(isset($_GET['conreadmore']) && strlen($Content) > 50)
    {
      echo "<td>".$Content."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Content) > 50)
    {
      echo "<td>".$ContentCut."</td>";
    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_type."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.html?IdeasID=$IdeasID&Action=U'>Match</a></td>";
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
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
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
    echo "<td>".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>".$net_worth."</td>";
    echo "<td>".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.html?UserID=$UserID&Action=M'>Match</a></td>";
    echo "</tr>";
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
    <th>Product Type</th>
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
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
    $Instruments = $data['Instruments'];
    $Currency = $data['Currency'];
    $MajorSector = $data['Major_Sector'];
    $MinorSector = $data['Minor_Sector'];
    $Region = $data['Region'];
    $Country = $data['Country'];

    //Add Read more if the text is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'RM Dashboard.php?abreadmore'>Read more</a>";
    }

    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50) . "... <a href = 'RM Dashboard.php?conreadmore'>Read more</a>";
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Abstract) > 50)
    {
      echo "<td>".$AbstractCut."</td>";
    }

    else
    {
      echo "<td>".$Abstract."</td>";
    }

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    if(isset($_GET['conreadmore']) && strlen($Content) > 50)
    {
      echo "<td>".$Content."<br><a href = 'RM Dashboard.php'>Show less</a></td>";
    }

    else if(strlen($Content) > 50)
    {
      echo "<td>".$ContentCut."</td>";
    }

    else
    {
      echo "<td>".$Content."</td>";
    }

    echo "<td>".$Product_type."</td>";
    echo "<td>".$RiskRating."</td>";
    echo "<td>".$Instruments."</td>";
    echo "<td>".$Currency."</td>";
    echo "<td>".$MajorSector."</td>";
    echo "<td>".$MinorSector."</td>";
    echo "<td>".$Region."</td>";
    echo "<td>".$Country."</td>";
    
    //Pass which idea to show in Matches page
    echo "<td><a href ='Matches.html?IdeasID=$IdeasID&Action=U'>Match</a></td>";
    echo "</tr>";
  }
}
//Default table which shows on first load without any cookies. This is to prevent empty page.
if(!isset($_COOKIE["dash"]))
{
?>
<th>First Name</th>
    <th>Last Name</th>
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
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $UserID = $data['UserID'];
    $firstname = $data["First_Name"];
    $lastname = $data["Last_Name"];
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
    echo "<td>".$annual_income."</td>";
    echo "<td>".$risk_tolerance."</td>";
    echo "<td>".$net_worth."</td>";
    echo "<td>".$investment_amount."</td>";
    
    //Pass which client to show in Matches page
    echo "<td><a href ='Matches.html?UserID=$UserID&Action=M'>Match</a></td>";
    echo "</tr>";
    setcookie("dash", "client", time()+3600); 
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
          </body>
          </html>
