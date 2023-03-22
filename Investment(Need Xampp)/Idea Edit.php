<?php
require('connect.php');
ini_set("display_errors", "off");
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
  <div class="e91_88">
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

    if (strlen($Abstract) > 50) 
    {
      $AbstractCut = substr($Abstract, 0, 50) . "... <a href = 'Idea Edit.php?abreadmore'>Read more</a>";
    }

    if (strlen($Content) > 50) 
    {
      $ContentCut = substr($Content, 0, 50) . "... <a href = 'Idea Edit.php?conreadmore'>Read more</a>";
    }

    echo "<tr>";
    echo "<td>".$Title."</td>";
    echo "<td>".$AuthorName."</td>";

    if(isset($_GET['abreadmore']) && strlen($Abstract) > 50)
    {
      echo "<td>".$Abstract."<br><a href = 'Idea Edit.php'>Show less</a></td>";
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
      echo "<td>".$Content."<br><a href = 'Idea Edit.php'>Show less</a></td>";
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
          </body>
          </html>