<?php

require('connect.php');
ini_set("display_errors", "off");
if(isset($_POST['productregister']))
{
  $ProductName = htmlspecialchars($_POST['productname']);
  $ProductType = htmlspecialchars($_POST['producttype']);
  $Description = htmlspecialchars($_POST['description']);
  $Product_added_date = htmlspecialchars($_POST['productaddeddate']);
  $Status = htmlspecialchars($_POST['status']);
  $Performance_analytics = htmlspecialchars($_POST['performance']);

  $insert = "INSERT INTO investment_products(Product_Name,Product_Type,Description,Product_added_date,Status,Performance_analytics)
  VALUES ('$ProductName','$ProductType','$Description','$Product_added_date','$Status','$Performance_analytics')";

  $run= mysql_query($insert);

  if($run)
  {
    echo "<script>window.alert('Product added successfully')
    window.location ='Product Registration.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Product registration.php'</script>";
    echo mysql_error();
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
      <div class="e91_95"></div><span  class="e91_96">Home</span>
      <div class=e91_97><span  class="e91_98">Recommender</span></div><span  class="e91_99">Evaluate Ideas</span><a href="Idea registration.php"><span  class="naviIdea">Register Ideas</span></a><div class=naviProductBar><a href="Product registration.php"><span  class="naviProductBlack">Register Products</span></a></div><span  class="e91_100">Settings</span><span  class="e91_101">Messages</span>
      <div class=e91_102><span  class="e91_103">Logo</span></div>
    </div>
  </div>
<form action="Product registration.php" method="post">
                                <div class="prodreg"><label for="productname"><span class="prodreg1">Product Name</span>
                                <div >
                              <input type="text" class="prodreg2" id="productname" name="productname" placeholder="" required>
                                    </label>

                                </div>
                                </div>
                                <div class="prodreg3"><label for="producttype"><span class="prodreg4">Product Type</span>
                              <div>
                                <input type="text" class="prodreg5" placeholder="" id="producttype" name="producttype" required>
                                    
                                    </label>

                                </div>
                                </div>
                                <div class="prodreg6"><label for="description"><span class="prodreg7">Description</span>
                              <div>
                                    <textarea class="prodreg8" placeholder="" id="description" name="description" required></textarea>
                                    </label>
                                </div>
                                </div>
                                <div class="prodreg9"><label for="productaddeddate"><span class="prodreg10">Product added Date</span>
                              <div>
                                    <input type="date" class="prodreg11" name="productaddeddate" id="productaddeddate" required>

                            </div>
                                    </label>
                                </div>
                                <div class="prodreg12"><label for="status"><span class="prodreg13">Status</span>
                           <div>
                                       <input type="radio" class="prodreg14" name="status" id="status" value="Avaliable" required>
                                       <label class ="prodreg15" for="avaliable">Avaliable</label>
                                        <input type="radio" class="prodreg16" name="status" id="status" value="Not Avaliable" required>
                                        <label class ="prodreg17" for="notavailable">Not Avaliable</label>
                                </div>
                                   </label>
                                </div>

                                <div class="prodreg18"><label for="performance"><span class="prodreg19">Performance Analytics</span>
                       <div>
                                 <textarea class="prodreg20" name="performance" id="performance"></textarea>
                                </div>
                                   </label>
                                </div>
                            </div>
<button class="prodregbutton" type= "submit" id="productregister" name="productregister" formmethod="post"><span class="prodregbutton1">Add Product</span></button>
                            </form>
 
          </body>
          </html>
