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

//Retrieve data from user input and register the idea into database
if(isset($_POST['idearegister']))
{
  $Title = htmlspecialchars($_POST['ideaname']);
  $AuthorName = htmlspecialchars($_POST['author']);
  $Abstract = htmlspecialchars($_POST['abstract']);
  $PublishDate = htmlspecialchars($_POST['publishdate']);
  $ExpiryDate = htmlspecialchars($_POST['expirydate']);
  $Content = htmlspecialchars($_POST['content']);
  $Product_type = htmlspecialchars($_POST['product_type']);
  $RiskRating = htmlspecialchars($_POST['riskrating']);
  $Instruments = htmlspecialchars($_POST['instrument']);
  $Currency = htmlspecialchars($_POST['currency']);
  $MajorSector = htmlspecialchars($_POST['majorsector']);
  $MinorSector = htmlspecialchars($_POST['minorsector']);
  $Region = htmlspecialchars($_POST['region']);
  $Country = htmlspecialchars($_POST['country']);
  $CreatorID = $_SESSION['CreatorID'];

  //Retrieve data from investment products
  $select = "SELECT * FROM investment_products";
  $ret = mysql_query($select);
  $count1= mysql_num_rows($ret);
  for($i=0; $i<$count1; $i++)
  {
    $row=mysql_fetch_array($ret);
    $ProductID = $row['ProductID'];
    $ProductName = $row['Product_Name'];
    $ProductType = $row['Product_Type'];
    $Selectproduct = $ProductType. " (" .$ProductName. ")";

    //Check the user selected product type with product type from database
    if($Product_type == $Selectproduct)
    {

      $insert = "INSERT INTO investment_ideas(Title,Author,Abstract,Published_date,Expiry_date,Content,Risk_Rating,Instruments,Currency,Major_Sector,Minor_Sector,Region,Country,ProductID,Creator_ID)
      VALUES ('$Title','$AuthorName','$Abstract','$PublishDate','$ExpiryDate','$Content','$RiskRating','$Instruments','$Currency','$MajorSector','$MinorSector','$Region','$Country', '$ProductID','$CreatorID')";
      $run= mysql_query($insert);
      break;
    }

}

  if($Product_type=="No Product Types avaliable")
  {

    $insert = "INSERT INTO investment_ideas(Title,Author,Abstract,Published_date,Expiry_date,Content,Risk_Rating,Instruments,Currency,Major_Sector,Minor_Sector,Region,Country)
    VALUES ('$Title','$AuthorName','$Abstract','$PublishDate','$ExpiryDate','$Content','$RiskRating','$Instruments','$Currency','$MajorSector','$MinorSector','$Region','$Country')";

    $run= mysql_query($insert);
  }

  if($run)
  {
    echo "<script>window.alert('Idea added successfully')
    window.location ='Idea Registration.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Idea registration.php'</script>";
    echo mysql_error();
  }

  }

//Check whether Idea update or delete is needed
  if (isset($_GET['IdeasID']))
{
  $Action = $_GET['Action'];
  $IdeasID = $_GET['IdeasID'];

  if($Action=='U')
  {   
    $select = "SELECT * FROM investment_products, investment_ideas
  WHERE investment_products.ProductID=investment_ideas.ProductID 
  AND Ideas_ID='$IdeasID'";
    $run = mysql_query($select) or die(mysql_error());
    $data=mysql_fetch_array($run);

    $IdeasID = $data['Ideas_ID'];
    $Title = $data['Title'];
    $AuthorName = $data['Author'];
    $Abstract = $data['Abstract'];
    $PublishDate = $data['Published_date'];
    $ExpiryDate = $data['Expiry_date'];
    $Content = $data['Content'];
    $Product_name = $data['Product_Name'];
    $Product_type = $data['Product_Type'];
    $RiskRating = $data['Risk_Rating'];
    $Instruments = $data['Instruments'];
    $Currency = $data['Currency'];
    $MajorSector = $data['Major_Sector'];
    $MinorSector = $data['Minor_Sector'];
    $Region = $data['Region'];
    $Country = $data['Country'];
    $Selectproduct = $Product_type. " (" .$Product_name. ")";
  }

//Delete the idea from database
  else if($Action=='D')
  {
    try
    {

    $delete = "DELETE FROM investment_ideas
    WHERE Ideas_ID='$IdeasID'";
    $run = mysql_query($delete);

    if($run)
    {
    echo "<script>window.alert('Idea Deleted Successfully')
    window.location ='Idea Edit.php'</script>";
    }

    }

    catch(Exception $e)
    {
    echo "<script>window.alert('Something went wrong!')
    window.location ='Idea Edit.php'</script>";
    }
  }

//Retrieve data from user input and Update the idea
if(isset($_POST['ideaupdate']))
{
  $Title = htmlspecialchars($_POST['ideaname']);
  $AuthorName = htmlspecialchars($_POST['author']);
  $Abstract = htmlspecialchars($_POST['abstract']);
  $PublishDate = htmlspecialchars($_POST['publishdate']);
  $ExpiryDate = htmlspecialchars($_POST['expirydate']);
  $Content = htmlspecialchars($_POST['content']);
  $Product_type = htmlspecialchars($_POST['product_type']);
  $RiskRating = htmlspecialchars($_POST['riskrating']);
  $Instruments = htmlspecialchars($_POST['instrument']);
  $Currency = htmlspecialchars($_POST['currency']);
  $MajorSector = htmlspecialchars($_POST['majorsector']);
  $MinorSector = htmlspecialchars($_POST['minorsector']);
  $Region = htmlspecialchars($_POST['region']);
  $Country = htmlspecialchars($_POST['country']);
  $Updated_at = date("Y-m-d H:i:s"); 

  $select = "SELECT * FROM investment_products";
  $ret = mysql_query($select);
  $count1= mysql_num_rows($ret);
  for($i=0; $i<$count1; $i++)
  {
    $row=mysql_fetch_array($ret);
    $ProductID = $row['ProductID'];
    $ProductName = $row['Product_Name'];
    $ProductType = $row['Product_Type'];
    $Selectproduct = $ProductType. " (" .$ProductName. ")";

    //Check the user selected product type with product type from database
    if($Product_type == $Selectproduct)
    {

      $update = "UPDATE investment_ideas
      SET Title='$Title',Author='$AuthorName',Abstract='$Abstract',Published_date='$PublishDate',Expiry_date='$ExpiryDate',Content='$Content',Risk_Rating='$RiskRating',Instruments='$Instruments',Currency='$Currency',Major_Sector='$MajorSector',Minor_Sector='$MinorSector',Region='$Region',Country='$Country', ProductID='$ProductID', Updated_at='$Updated_at'
      WHERE Ideas_ID=$IdeasID";
      $run= mysql_query($update);
      break;
    }

}

  if($Product_type=="No Product Types avaliable")
  {

    $update = "UPDATE investment_ideas
      SET Title='$Title',Author='$AuthorName',Abstract='$Abstract',Published_date='$PublishDate',Expiry_date='$ExpiryDate',Content='$Content',Risk_Rating='$RiskRating',Instruments='$Instruments',Currency='$Currency',Major_Sector='$MajorSector',Minor_Sector='$MinorSector',Region='$Region',Country='$Country', Updated_at='$Updated_at'
      WHERE Ideas_ID=$IdeasID";
      $run= mysql_query($update);
  }

  if($run)
  {
    echo "<script>window.alert('Idea updated successfully')
    window.location ='Idea Edit.php'</script>";
  }

  else
  {
    echo "<script>window.alert('Something went wrong')
    window.location ='Idea Edit.php'</script>";
    echo mysql_error();
  }

  }

}
?>
<html lang="en">
          <head>
            <meta charset="utf-8">

            <?php 
            if(isset($_GET['IdeasID']))
            {

              echo '<title>Update Idea</title>';

            }

            else
            {

              echo '<title>Idea registration</title>';

            }
            ?>
          
            <meta name="description" content="Figma htmlGenerator">
            <meta name="author" content="htmlGenerator">
            <link href="https://fonts.googleapis.com/css?family=Mulish&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="css/styles.css">

            <!--Check if JavaScript is enabled-->
         <noscript>
         <center><font size ="8">Please enable JavaScript to use this page!</font></center>
         <div style="display:none"></body>
         </noscript>

            <!--Remove Duplicate Product Type Options from selection box-->
            <script type="text/javascript">
              function removeduplicate()
                {
                var mycode = {};
                $("select[id='product_type'] > option").each(function () {
                    if(mycode[this.text]) {
                        $(this).remove();
                    } else {
                        mycode[this.text] = this.value;
                    }
                });
                }
            </script>

            
            <style>
              /*
                Figma Background for illustrative/preview purposes only.
                You can remove this style tag with no consequence
              */
              body {background: #E5E5E5; }
            </style>
          
          </head>
          
          <body onload="removeduplicate()">
            <div class=e91_86>

            <?php 
            if(isset($_GET['IdeasID']))
            {

              echo '<div class="e91_87"></div><span  class="e91_88">Update Idea</span>';

            }

            else
            {

              echo '<div class="e91_87"></div><span  class="e91_88">Register Idea</span>';

            }
            ?>

  <div class=e91_92>
    <div class="e91_93"></div>
    <div class=e91_94>
      <div class="e91_95"></div><a href="HomePage.php"><span  class="e91_96">Home</span></a>
      <div class=naviIdeaBar><a href="Idea registration.php"><span  class="naviIdeaBlack">Register Ideas</span></a></div><a href="Product registration.php"><span  class="naviProduct">Register Products</span></a><a href="Logout.php"><span  class="e91_100">Log out</span></a><a href="Profile.php"><span  class="e91_101">Profile</span></a>
      <div class=e91_102><span  class="e91_103">Logo</span></div>
    </div>
  </div>
<form action="" method="post">
                                <div class="ideareg"><label for="ideaname"><span class="ideareg1">Title</span>
                                <div >
                              <input type="text" class="ideareg2" id="ideaname" name="ideaname" value="<?php if (isset($_GET['IdeasID'])) {echo $Title;} ?>" placeholder="" required>
                                    </label>

                                </div>
                                </div>
                                <div class="ideareg3"><label for="author"><span class="ideareg4">Author</span>
                              <div>
                                <input type="text" class="ideareg5" placeholder="" id="author" name="author" value="<?php if (isset($_GET['IdeasID'])) {echo $AuthorName;} ?>" required>
                                    
                                    </label>

                                </div>
                                </div>
                                <div class="ideareg6"><label for="abstract"><span class="ideareg7">Abstract</span>
                              <div>
                                    <textarea class="ideareg8" placeholder="" id="abstract" name="abstract" required><?php if (isset($_GET['IdeasID'])) {echo $Abstract;} ?></textarea>
                                    </label>
                                </div>
                                </div>
                                <div class="ideareg9"><label for="publishdate"><span class="ideareg10">Publish Date</span>
                              <div>
                                    <input type="date" class="ideareg11" name="publishdate" id="publishdate" value="<?php if (isset($_GET['IdeasID'])) {echo $PublishDate;} ?>" required>

                            </div>
                                    </label>
                                </div>
                                
                                <div class="ideareg12"><label for="expirydate"><span class="ideareg13">Expiry Date</span>
                              <div>
                                    <input type="date" class="ideareg14" name="expirydate" id="expirydate" value="<?php if (isset($_GET['IdeasID'])) {echo $ExpiryDate;} ?>" required>

                            </div>
                                    </label>
                                </div>

                                <div class="ideareg18"><label for="content"><span class="ideareg19">Content</span>
<div>
                                 <textarea class="ideareg20" name="content" id="content" required><?php if (isset($_GET['IdeasID'])) {echo $Content;} ?></textarea>
                                </div>
                                   </label>
                                </div>

                                <div class="ideareg42"><label for="product_type"><span class="ideareg43">Product Type</span>

                                <?php

                                $select = "SELECT * FROM investment_products";
                                $run1 = mysql_query($select);
                                $count= mysql_num_rows($run1);
                                if($count>0)
                                {
                                ?>
                                
                                <select class="ideareg44" name="product_type" id="product_type">
                                <?php
                                
                                for($i=0; $i<$count; $i++)
                                {
                                  $row=mysql_fetch_array($run1);
                                  $ProductName1 = $row['Product_Name'];
                                  $ProductType1 = $row['Product_Type'];
                                  $Status1 = $row['Status'];
                                  $Selectproduct1 = $ProductType1. " (" .$ProductName1. ")";
                                if (isset($_GET['IdeasID']))
                                {
                                if($Selectproduct1==$Selectproduct)
                                {
                                ?>
                                  <option selected ="$Selectproduct" value="<?php echo $Selectproduct1; ?>"><?php if($Status1 == "Avaliable") { echo $Selectproduct1;} ?></option>
                    
                                <?php
                                }
                                ?>
                                <option value="<?php echo $Selectproduct1; ?>"><?php if($Status1 == "Avaliable") { echo $Selectproduct1;} ?></option>
                                <?php
                                }
                                else
                                {
                                ?>
                                  <option value="<?php echo $Selectproduct1; ?>"><?php if($Status1 == "Avaliable") { echo $Selectproduct1;} ?></option>
                                <?php
                                }
                                }
                                }
                                else
                                {
                                ?>
                                <select class="ideareg44" name="product_type" id="product_type">
                                <option value="No Product Types avaliable">No Product Types avaliable</option>
                                <?php
                                }
                                ?>
                </select>
                                    </label>

                                </div>

                                <div class="ideareg21"><label for="riskrating"><span class="ideareg22">Risk Rating</span>
                                
                                <select class="ideareg23" name="riskrating" id="riskrating">
                                <?php
                                if (isset($_GET['IdeasID']))
                                {
                                  if($RiskRating=="1")
                                  {
                                    echo '<option selected value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                  else if($RiskRating=="2")
                                  {
                                    echo '<option value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option selected value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                  else if($RiskRating=="3")
                                  {
                                    echo '<option value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option selected value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                  else if($RiskRating=="4")
                                  {
                                    echo '<option value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option selected value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                  else if($RiskRating=="5")
                                  {
                                    echo '<option value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option selected value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                  else
                                  {
                                    echo '<option value="1">1 - Suitable for very conservative investors</option>';
                                    echo '<option value="2">2 - Suitable for conservative investors</option>';
                                    echo '<option value="3">3 - Suitable for moderate investors</option>';
                                    echo '<option value="4">4 - Suitable for aggressive investors</option>';
                                    echo '<option value="5">5 - Suitable for very aggressive investors</option>';
                                  }

                                }
                                else
                                {
                                ?>
                    <option value="1">1 - Suitable for very conservative investors</option>
                    <option value="2">2 - Suitable for conservative investors</option>
                    <option value="3">3 - Suitable for moderate investors</option>
                    <option value="4">4 - Suitable for aggressive investors</option>
                    <option value="5">5 - Suitable for very aggressive investors</option>
                    <?php
                    }
                    ?>
                </select>
                                    </label>

                                </div>

                                <div class="ideareg24"><label for="instrument"><span class="ideareg25">Instruments</span>
                        
                              <input type="text" class="ideareg26" id="instrument" name="instrument" value="<?php if (isset($_GET['IdeasID'])) {echo $Instruments;} ?>" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg27"><label for="currency"><span class="ideareg28">Currency</span>
                        
                              <input type="text" class="ideareg29" id="currency" name="currency" value="<?php if (isset($_GET['IdeasID'])) {echo $Currency;} ?>" placeholder="" required>
                                    </label>

                                </div>


                                <div class="ideareg30"><label for="majorsector"><span class="ideareg31">Major Sector</span>
                        
                              <input type="text" class="ideareg32" id="majorsector" name="majorsector" value="<?php if (isset($_GET['IdeasID'])) {echo $MajorSector;} ?>" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg33"><label for="minorsector"><span class="ideareg34">Minor Sector</span>
                        
                              <input type="text" class="ideareg35" id="minorsector" name="minorsector" value="<?php if (isset($_GET['IdeasID'])) {echo $MinorSector;} ?>" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg36"><label for="region"><span class="ideareg37">Region</span>
                        
                              <input type="text" class="ideareg38" id="region" name="region" value="<?php if (isset($_GET['IdeasID'])) {echo $Region;} ?>" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg39"><label for="country"><span class="ideareg40">Country</span>
                        
                              <input type="text" class="ideareg41" id="country" name="country" value="<?php if (isset($_GET['IdeasID'])) {echo $Country;} ?>"placeholder="" required>
                                    </label>

                                </div>
                            </div>

                            <?php

                            if(isset($_GET['IdeasID']))
                            {
                              echo '<button class="idearegbutton" type= "submit" id="ideaupdate" name="ideaupdate" formmethod="post"><span class="idearegbutton1" ><font size="4">Update Idea</font></span></button>';
                            }

                            else
                            {
                              echo '<button class="idearegbutton" type= "submit" id="idearegister" name="idearegister" formmethod="post"><span class="idearegbutton1" >Add Idea</span></button>';
                            }

                            ?>

                            </form>
<a href="Idea Edit.php">
<button class="ideaeditbutton"><span class="ideaeditbutton1" >Edit Idea</span></button>
</a>

<script src="js/jquery-2.1.4.js"></script>
<script src="js/RemoveEmptyOptions.js"></script>
 
          </body>
          </html>