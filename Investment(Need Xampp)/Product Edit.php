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
          
            <title>Edit Product</title>
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
<h1 class="heading text-center text-capitalize mb-5">List of Products</h1>
          <table class="table-sort table-arrows remember-sort" align="center" cellpadding="20" border="1">
    <thead>
  <tr>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Description</th>
    <th>Product Added Date</th>
    <th>Status</th>
    <th>Product Price</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
//Retrieve the products from database
  $select = "SELECT * FROM investment_products";
  $ret = mysql_query($select);
  $count= mysql_num_rows($ret);
  for($i=0; $i<$count; $i++)
  {
    $data=mysql_fetch_array($ret);
    $ProductID = $data['ProductID'];
    $ProductName = $data['Product_Name'];
    $ProductType = $data['Product_Type'];
    $Description = $data['Description'];
    $ProductAddedDate = $data['Product_added_date'];
    $Status = $data['Status'];
    $ProductPrice = $data['Product_Price'];

  //Cut the Description if the text is longer than 50 characters
    if (strlen($Description) > 50) 
    {
      $DescriptionCut = substr($Description, 0, 50);
    }

    echo "<tr>";
    echo "<td>".$ProductName."</td>";
    echo "<td>".$ProductType."</td>";

    if (strlen($Description) > 50) 
    {

  //Add Read more and show less functions for Description
    $ID = $data['ProductID'];
    echo "<td><span id='show-cutD_".$ID."'>".$DescriptionCut."... </span><a href='#' id='read-moreD_".$ID."' onclick='readmoreD(".$ID.");''>Read more</a><span id='show-contentD_".$ID."' style='display:none'>".$Description."<a href='#' id='show-lessD_".$ID."' onclick='showlessD(".$ID.");''>Show less</a></span></td>";
    }

    else
    {
      echo "<td>".$Description."</td>"; 
    }

    echo "<td>".$ProductAddedDate."</td>";
    echo "<td>".$Status."</td>";
    echo "<td>£".$ProductPrice."</td>";

    //Pass which product needs to update or delete to registration page
    echo "<td><a href ='Product registration.php?ProductID=$ProductID&Action=U'>Update</a> <br>-------
          <a href = 'Product registration.php?ProductID=$ProductID&Action=D'>Delete</a></td>";
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