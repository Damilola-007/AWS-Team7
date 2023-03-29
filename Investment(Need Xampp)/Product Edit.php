<?php
//Connect to database
require('connect.php');
//Turn off SQL related errors
ini_set("display_errors", "off");
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
      <div class="e91_95"></div><span  class="e91_96">Home</span>
      <div class=e91_97><span  class="e91_98">Recommender</span></div><span  class="e91_99">Evaluate Ideas</span><a href="Idea registration.php"><span  class="naviIdea">Register Ideas</span></a><div><a href="Product registration.php"><span  class="naviProduct">Register Products</span></a></div><span  class="e91_100">Settings</span><span  class="e91_101">Messages</span>
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
    <th>Performance Analytics</th>
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
    $PerformanceAnalytics = $data['Performance_analytics'];
  //Add Read more if the text is longer than 50 characters
    if (strlen($Description) > 50) 
    {
      $DescriptionCut = substr($Description, 0, 50) . "... <a href = 'Product Edit.php?dereadmore'>Read more</a>";
    }

    echo "<tr>";
    echo "<td>".$ProductName."</td>";
    echo "<td>".$ProductType."</td>";

  //Replace Read more with Show less if Read more is clicked
    if(isset($_GET['dereadmore']) && strlen($Description) > 50)
    {
      echo "<td>".$Description."<br><a href = 'Product Edit.php'>Show less</a></td>";
    }

    else if(strlen($Description) > 50)
    {
      echo "<td>".$DescriptionCut."</td>";
    }

    else
    {
      echo "<td>".$Description."</td>";
    }

    echo "<td>".$ProductAddedDate."</td>";
    echo "<td>".$Status."</td>";
    echo "<td>".$PerformanceAnalytics."</td>";

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
          </body>
          </html>