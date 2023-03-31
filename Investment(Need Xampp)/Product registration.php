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

//Retrieve data from user input and register the product into database
if(isset($_POST['productregister']))
{
  $ProductName = htmlspecialchars($_POST['productname']);
  $ProductType = htmlspecialchars($_POST['producttype']);
  $Description = htmlspecialchars($_POST['description']);
  $Product_added_date = htmlspecialchars($_POST['productaddeddate']);
  $Status = htmlspecialchars($_POST['status']);
  $Performance_analytics = htmlspecialchars($_POST['performance']);
  $CreatorID = $_SESSION['CreatorID'];

  $insert = "INSERT INTO investment_products(Product_Name,Product_Type,Description,Product_added_date,Status,Performance_analytics,Creator_ID)
  VALUES ('$ProductName','$ProductType','$Description','$Product_added_date','$Status','$Performance_analytics','$CreatorID')";

  $run= mysql_query($insert);

  if($run)
  {
    echo "<script>window.alert('Product added successfully')
    window.location ='Product registration.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Product registration.php'</script>";
    echo mysql_error();
  }
}

//Check whether Product update or delete is needed
if (isset($_GET['ProductID']))
{
  $Action = $_GET['Action'];
  $ProductID = $_GET['ProductID'];

  if($Action=='U')
  {   
    $select = "SELECT * FROM investment_products
    WHERE ProductID='$ProductID'";
    $run = mysql_query($select) or die(mysql_error());
    $data=mysql_fetch_array($run);

    $ProductID = $data['ProductID'];
    $ProductName = $data['Product_Name'];
    $ProductType = $data['Product_Type'];
    $Description = $data['Description'];
    $ProductAddedDate = $data['Product_added_date'];
    $Status = $data['Status'];
    $PerformanceAnalytics = $data['Performance_analytics'];
  }

//Delete the product from database
  else if($Action=='D')
  {
    try
    {
    $delete = "DELETE FROM investment_products
    WHERE ProductID='$ProductID'";
    $run = mysql_query($delete);

    if($run)
    {
    echo "<script>window.alert('Product Deleted Successfully')
    window.location ='Product Edit.php'</script>";
    }

    }

    catch(Exception $e)
    {
    echo "<script>window.alert('Please delete the Idea associated with Product first!')
    window.location ='Product Edit.php'</script>";
    }
  }

//Retrieve data from user input and Update the product
if(isset($_POST['productupdate']))
{
  $ProductName = htmlspecialchars($_POST['productname']);
  $ProductType = htmlspecialchars($_POST['producttype']);
  $Description = htmlspecialchars($_POST['description']);
  $Product_added_date = htmlspecialchars($_POST['productaddeddate']);
  $Status = htmlspecialchars($_POST['status']);
  $Performance_analytics = htmlspecialchars($_POST['performance']);

  $update = "UPDATE investment_products
  SET Product_Name='$ProductName',Product_Type='$ProductType',Description='$Description',Product_added_date='$Product_added_date',Status='$Status',Performance_analytics='$Performance_analytics'
  WHERE ProductID = '$ProductID'";

  $run= mysql_query($update);

  if($run)
  {
    echo "<script>window.alert('Product updated successfully')
    window.location ='Product Edit.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Product Edit.php'</script>";
    echo mysql_error();
  }
}

}

?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Product Registration</title>
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
            <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="css/styles.css">

            
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
  <div class="e91_87"></div><span  class="e91_88">Register Product</span>
  <div class=e91_92>
    <div class="e91_93"></div>
    <div class=e91_94>
      <div class="e91_95"></div><a href="HomePage.php"><span  class="e91_96">Home</span></a>
      <a href="Idea registration.php"><span  class="naviIdea">Register Ideas</span></a><div class=naviProductBar><a href="Product registration.php"><span  class="naviProductBlack">Register Products</span></a></div><a href="Logout.php"><span  class="e91_100">Log out</span></a><span  class="e91_101">Messages</span>
      <div class=e91_102><span  class="e91_103">Logo</span></div>
    </div>
  </div>
<form action="" method="post">
                                <div class="prodreg"><label for="productname"><span class="prodreg1">Product Name</span>
                                <div >
                              <input type="text" class="prodreg2" id="productname" name="productname" value="<?php if (isset($_GET['ProductID'])) {echo $ProductName;} ?>" placeholder="" required>
                                    </label>

                                </div>
                                </div>
                                <div class="prodreg3"><label for="producttype"><span class="prodreg4">Product Type</span>
                              <div>
                                <input type="text" class="prodreg5" placeholder="" id="producttype" name="producttype" value="<?php if (isset($_GET['ProductID'])) {echo $ProductType;} ?>" required>
                                    
                                    </label>

                                </div>
                                </div>
                                <div class="prodreg6"><label for="description"><span class="prodreg7">Description</span>
                              <div>
                                    <textarea class="prodreg8" placeholder="" id="description" name="description" required><?php if (isset($_GET['ProductID'])) {echo $Description;} ?></textarea>
                                    </label>
                                </div>
                                </div>
                                <div class="prodreg9"><label for="productaddeddate"><span class="prodreg10">Product added Date</span>
                              <div>
                                    <input type="date" class="prodreg11" name="productaddeddate" id="productaddeddate" value="<?php if (isset($_GET['ProductID'])) {echo $ProductAddedDate;} ?>" required>

                            </div>
                                    </label>
                                </div>
                                <div class="prodreg12"><label for="status"><span class="prodreg13">Status</span>
                           <div>
                          <?php
                            if(isset($_GET['ProductID']))
                            {
                              if($Status=="Avaliable")
                              {
                                echo '<input type="radio" class="prodreg14" name="status" id="status" value="Avaliable" checked required>';
                                echo '<label class ="prodreg15" for="avaliable">Avaliable</label>';
                                echo '<input type="radio" class="prodreg16" name="status" id="status" value="Not Avaliable" required>';
                                echo '<label class ="prodreg17" for="notavailable">Not Avaliable</label>';
                              }

                              else
                              {
                                echo '<input type="radio" class="prodreg14" name="status" id="status" value="Avaliable" required>';
                                echo '<label class ="prodreg15" for="avaliable">Avaliable</label>';
                                echo '<input type="radio" class="prodreg16" name="status" id="status" value="Not Avaliable" checked required>';
                                echo '<label class ="prodreg17" for="notavailable">Not Avaliable</label>';
                              }

                              
                            }

                            else
                              {
                                echo '<input type="radio" class="prodreg14" name="status" id="status" value="Avaliable" required>';
                                echo '<label class ="prodreg15" for="avaliable">Avaliable</label>';
                                echo '<input type="radio" class="prodreg16" name="status" id="status" value="Not Avaliable" required>';
                                echo '<label class ="prodreg17" for="notavailable">Not Avaliable</label>';
                              }

                          ?>
                                      
                                </div>
                                   </label>
                                </div>

                                <div class="prodreg18"><label for="performance"><span class="prodreg19">Performance Analytics</span>
                       <div>
                                 <textarea class="prodreg20" name="performance" id="performance"><?php if (isset($_GET['ProductID'])) {echo $PerformanceAnalytics;} ?></textarea>
                                </div>
                                   </label>
                                </div>
                            </div>

                            <?php

                            if(isset($_GET['ProductID']))
                            {
                              echo '<button class="prodregbutton" type= "submit" id="productupdate" name="productupdate" formmethod="post"><span class="prodregbutton1"><font size="4">Update Product</font></span></button>';
                            }

                            else
                            {
                              echo '<button class="prodregbutton" type= "submit" id="productregister" name="productregister" formmethod="post"><span class="prodregbutton1">Add Product</span></button>';
                            }

                            ?>
                            </form>
                            <a href="Product Edit.php">
<button class="prodeditbutton"><span class="prodeditbutton1">Edit Product</span></button>
</a>
 
          </body>
          </html>