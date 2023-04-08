<?php
//Start the session for login
session_start();
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Check if Relationship Manager has logged in
if(!isset($_SESSION['ManagerID']))
{
  echo "<script>window.alert('Please login as Relationship Manager to access this page!')
    window.location ='Login.php'</script>";
}
//Get Investment amount for selected user
if(isset($_GET['UserID']))
{
  $UserID = $_GET['UserID'];
  $select = "SELECT * FROM client
    WHERE UserID = $UserID";
  $run = mysql_query($select);
  $row = mysql_fetch_array($run);
  $Investment_amount = $row['Investment_amount'];
}
//Get Product Price for selected idea
else if(isset($_GET['IdeasID']))
{
  $IdeasID = $_GET['IdeasID'];
  $select = "SELECT * FROM investment_products, investment_ideas
  WHERE investment_products.ProductID=investment_ideas.ProductID
  AND Ideas_ID = $IdeasID";
  $run = mysql_query($select);
  $row = mysql_fetch_array($run);
  $Product_Price = $row['Product_Price'];
}

else
{
  echo "<script>window.alert('Please access this page from Relationship Manager Dashboard!')
    window.location ='RM Dashboard.php'</script>";
}

?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Matches</title>
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
              /*
                Figma Background for illustrative/preview purposes only.
                You can remove this style tag with no consequence
              */
              body {background: #E5E5E5; }
            </style>
          
          </head>
          
          <body>
            <div class=e1_92>
  <div class="e1_93"></div>
  <?php
  //Check If investment idea has been selected
  if(isset($_GET['IdeasID']))
  {
  ?>
  <div class=e91_242><span  class="e1_95">See Profile matches for this Idea</span>
  <?php
  }
  ?>
  <?php
  //Check If client has been selected
  if(isset($_GET['UserID']))
  {
  ?>
  <div class=e91_242><span  class="e1_95">See Idea matches for this Client</span>
  <?php
  }
  ?>
  </div>
  <div class=e1_100>
    <div class="e1_101"></div>
    <div class=e1_143>
    <div class="e1_66"></div><a href="HomePage.php"><span  class="e1_69">Home</span></a>
    <a href="RM Dashboard.php"><span  class="rmprofilenavi1">Dashboard</span></a><a href="Profile.php"><span  class="e1_76">Profile</span></a><a href="Logout.php"><span  class="e1_77">Log out</span></a><span  class="e1_131">Messages</span>
    <div class=e1_71><span  class="e1_72">Logo</span></div>
  </div>
  </div>
  <div class=e91_241>
    
  </div>
  <?php
  //Check If client has been selected
  if(isset($_GET['UserID']))
  {
  ?>
  <div class=e91_238><span  class="e1_94">Selected Client</span>
  <?php
  }
  ?>

  <?php
  //Check If investment idea has been selected
  if(isset($_GET['IdeasID']))
  {
  ?>
  <div class=e91_238><span  class="e1_94">Selected Investment Idea</span>
  <?php
  }
  ?>

    <div class="e1_108"></div>
    <div class="selected_match">

    <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1">
    <thead>
  <tr>
    <?php
  //Check if client has been selected
  if(isset($_GET['UserID']))
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
  </tr>
</thead>
<tbody>
<?php
  //Put selected client ID for condition
  $UserID = $_GET['UserID'];
  //Retrieve the selected client from database
  $select1 = "SELECT * FROM client
  WHERE UserID = $UserID";
  $ret = mysql_query($select1);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Clients found! Please register at least one client!')
    window.location ='Client Registration Form 1.php'</script>";
  }

  else
  {

    $data=mysql_fetch_array($ret);
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
    echo "</tr>";
    
  }
}

//Check If Investment Idea button has been selected
  else if(isset($_GET['IdeasID']))
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
  </tr>
</thead>
<tbody>
<?php
//Put selected ideas ID for condition
$IdeasID = $_GET['IdeasID'];
//Retrieve the selected idea from database
  $select1 = "SELECT * FROM investment_ideas id
    INNER JOIN investment_products ip ON ( ip.ProductID = id.ProductID )
    WHERE Ideas_ID = $IdeasID";
  $ret = mysql_query($select1);
  $count = mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Ideas found! Please register at least one idea!')
    window.location ='Idea Registration.php'</script>";
  }

  else
  {

    $data=mysql_fetch_array($ret);
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
    echo "</tr>";
  }
}
?>
</tbody>
</table>

    </div>

  </div>
  <div class="matches_table">

  <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1">
    <thead>
  <tr>
    <?php
  //Check if investment idea has been selected
  if(isset($_GET['IdeasID']))
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
  </tr>
</thead>
<tbody>
<?php
//Get the matched clients with selected investment idea
  $select1 = "SELECT * FROM client
  WHERE investment_amount >= $Product_Price";
  $ret = mysql_query($select1);
  $count= mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Client Matches found for this Idea!')
    window.location ='RM Dashboard.php'</script>";
  }

  else
  {

  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
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
    echo "</tr>";
    
  }
  }
}

//Check If client has been selected
  else if(isset($_GET['UserID']))
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
  </tr>
</thead>
<tbody>
<?php
//Get the matched investment ideas with selected client
  $select1 = "SELECT * FROM investment_ideas id
    INNER JOIN investment_products ip ON ( ip.ProductID = id.ProductID )
    WHERE ip.Product_Price <= $Investment_amount";
  $ret = mysql_query($select1);
  $count = mysql_num_rows($ret);

  if($count==0)
  {
    echo "<script>window.alert('No Idea Matches found for this Client!')
    window.location ='RM Dashboard.php'</script>";
  }

  else
  {

  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
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
    echo "</tr>";
  }
  }
}
?>
</tbody>
</table>
</div>


<script src="js/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script src="js/Readmore_Showless.js"></script>
          </body>
          </html>