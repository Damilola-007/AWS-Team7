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
?>

<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Investment Ideas</title>
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
            <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            
            <style>
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
          
          <body>
            <div class=e1_28>
  <div class=e5_254>
    <div class="e1_30"></div><a href="HomePage.php"><span  class="e1_33">Home</span></a>
    <div class=e2_162><a href="Client Dashboard.php"><span  class="e1_34">Investment Ideas</span></a></div><span  class="e1_128">Profile</span><span  class="e1_130">Messages</span><a href="Logout.php"><span  class="e1_129">Log Out</span></a><span  class="e121_121">Settings</span>
    <div class=e1_35><span  class="e1_36">Logo</span></div>
  </div>
  <div class=e121_93>
    
      <form action="" method="post">
      <div class="client_dashboard">
          <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1">
    <thead>
  <tr>
    <th>Title</th>
    <th>Author Name</th>
    <th>Abstract</th>
    <th>Published Date</th>
    <th>Expiry Date</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Risk Rating</th>
    <th>Action</th>
    
  </tr>
</thead>
<tbody>
<?php

if(isset($_POST['btnsearch']))
{

  //Retrieve data from the database and match it with search input
    $searchword = $_POST['txtsearch'];
    $select = "SELECT DISTINCT * FROM investment_ideas id
    INNER JOIN investment_products ip ON ( ip.ProductID = id.ProductID )
    WHERE Title LIKE '%$searchword%'
    OR Author LIKE '%$searchword%'
    OR Product_Name LIKE '%$searchword%'
    OR Product_Type LIKE '%$searchword%'
    GROUP BY Ideas_ID";
    $ret = mysql_query($select);
    $count= mysql_num_rows($ret);

    if($count==0)
    {
      echo "<script>window.alert('No Results')
        window.location ='Client Dashboard.php'</script>";
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
    
    $Product_Name = $data['Product_Name'];
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
  

    //Add Read more if the text is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'Client Dashboard.php?abreadmore'>Read more</a>";
    }

    

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'Client Dashboard.php'>Show less</a></td>";
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
    echo "<td>".$Product_Name."</td>";
    echo "<td>".$Product_type."</td>";
    echo "<td>".$RiskRating."</td>";
    
    //Pass which idea to show in Investment Details page
    echo "<td><a href ='Investment Details.php?IdeasID=$IdeasID'>Details</a></td>";
    echo "</tr>";
    
  }
}
}
else
{
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
    
    $Product_Name = $data['Product_Name'];
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
  

    //Add Read more if the text is longer than 50 characters
    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'Client Dashboard.php?abreadmore'>Read more</a>";
    }

    

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'Client Dashboard.php'>Show less</a></td>";
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
    echo "<td>".$Product_Name."</td>";
    echo "<td>".$Product_type."</td>";
    echo "<td>".$RiskRating."</td>";
    
    //Pass which idea to show in Investment Details page
    echo "<td><a href ='Investment Details.php?IdeasID=$IdeasID'>Details</a></td>";
    echo "</tr>";
    
  }
}
?>
</tbody>
</table>
</div>
<div class=e121_88>
      <div class=e121_89>

      </div><button class="e121_91" type="submit" id="btnsearch" name="btnsearch" formmethod="post">Search</button>
    </div>
    <div class=e121_92>
      <Input class="e1_123" type="text" placeholder="   Search " id="txtsearch" name="txtsearch">
    </div>
    </form>
  </div>
  <div class=e121_94><span  class="e1_32">Investment Ideas</span>
    <div class="e1_153"></div>
  </div>
</div>
 <script src="js/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
          </body>
          </html>