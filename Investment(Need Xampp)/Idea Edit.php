<?php
//Start the session for login
session_start();
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
//Check if Product Idea Creator has logged in
if(!isset($_SESSION['CreatorID']))
{
  echo "<script>window.alert('Please login as Product Idea Creator to access this page!')
    window.location ='Login.php'</script>";
}

?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Edit Idea</title>
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
            <div class=e91_86>
  <div class=e91_92>
    <div class="e91_93"></div>
    <div class=e91_94>
      <div class="e91_95"></div><a href="HomePage.php"><span  class="e91_96">Home</span></a>
      <a href="Idea registration.php"><span  class="naviIdea">Register Ideas</span></a><div><a href="Product registration.php"><span  class="naviProduct">Register Products</span></a></div><a href="Logout.php"><span  class="e91_100">Log out</span></a><a href="Profile.php"><span  class="e91_101">Profile</span></a>
      <div class=e91_102><span  class="e91_103">Logo</span></div>
    </div>
  </div>
  <div class="edit_table">
<h1 class="heading text-center text-capitalize mb-5">List of Ideas</h1>
          <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1">
    <thead>
  <tr>
    <th>Title</th>
    <th>Author Name</th>
    <th>Abstract</th>
    <th>Published Date</th>
    <th>Expiry Date</th>
    <th>Content</th>
    <th>Product Name</th>
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
    $Product_Name = $data['Product_Name'];
    $Product_type = $data['Product_Type'];
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

    //Add Read more and show less functions for Abstract and Content
    $ID = $data['Ideas_ID'];
    echo "<td><span id='show-cutA_".$ID."'>".$AbstractCut."... </span><a href='#' id='read-moreA_".$ID."' onclick='readmoreA(".$ID.");''>Read more</a><span id='show-contentA_".$ID."' style='display:none'>".$Abstract."<a href='#' id='show-lessA_".$ID."' onclick='showlessA(".$ID.");''>Show less</a></span></td>";

    echo "<td>".$PublishDate."</td>";
    echo "<td>".$ExpiryDate."</td>";

    echo "<td><span id='show-cutC_".$ID."'>".$ContentCut."... </span><a href='#' id='read-moreC_".$ID."' onclick='readmoreC(".$ID.");''>Read more</a><span id='show-contentC_".$ID."' style='display:none'>".$Content."<a href='#' id='show-lessC_".$ID."' onclick='showlessC(".$ID.");''>Show less</a></span></td>";

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
    
    //Pass which idea needs to update or delete to registration page
    echo "<td><a href ='Idea registration.php?IdeasID=$IdeasID&Action=U'>Update</a> <br>-------
          <a href = 'Idea registration.php?IdeasID=$IdeasID&Action=D'>Delete</a></td>";
    echo "</tr>";
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