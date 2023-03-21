<?php

require('connect.php');

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

    if($Product_type == $Selectproduct)
    {

      $insert = "INSERT INTO investment_ideas(Title,Author,Abstract,Published_date,Expiry_date,Content,Risk_Rating,Instruments,Currency,Major_Sector,Minor_Sector,Region,Country,ProductID)
      VALUES ('$Title','$AuthorName','$Abstract','$PublishDate','$ExpiryDate','$Content','$RiskRating','$Instruments','$Currency','$MajorSector','$MinorSector','$Region','$Country', '$ProductID')";
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
?>
<html lang="en">
          <head>
            <meta charset="utf-8">
          
            <title>Idea registration</title>
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
  <div class="e91_87"></div><span  class="e91_88">Register Idea</span>
  <div class=e91_92>
    <div class="e91_93"></div>
    <div class=e91_94>
      <div class="e91_95"></div><span  class="e91_96">Home</span>
      <div class=e91_97><span  class="e91_98">Recommender</span></div><span  class="e91_99">Evaluate Ideas</span><div class=naviIdeaBar><a href="Idea registration.php"><span  class="naviIdeaBlack">Register Ideas</span></a></div><a href="Product registration.php"><span  class="naviProduct">Register Products</span></a><span  class="e91_100">Settings</span><span  class="e91_101">Messages</span>
      <div class=e91_102><span  class="e91_103">Logo</span></div>
    </div>
  </div>
<form action="Idea registration.php" method="post">
                                <div class="ideareg"><label for="ideaname"><span class="ideareg1">Title</span>
                                <div >
                              <input type="text" class="ideareg2" id="ideaname" name="ideaname" placeholder="" required>
                                    </label>

                                </div>
                                </div>
                                <div class="ideareg3"><label for="author"><span class="ideareg4">Author</span>
                              <div>
                                <input type="text" class="ideareg5" placeholder="" id="author" name="author" required>
                                    
                                    </label>

                                </div>
                                </div>
                                <div class="ideareg6"><label for="abstract"><span class="ideareg7">Abstract</span>
                              <div>
                                    <textarea class="ideareg8" placeholder="" id="abstract" name="abstract" required></textarea>
                                    </label>
                                </div>
                                </div>
                                <div class="ideareg9"><label for="publishdate"><span class="ideareg10">Publish Date</span>
                              <div>
                                    <input type="date" class="ideareg11" name="publishdate" id="publishdate" required>

                            </div>
                                    </label>
                                </div>
                                
                                <div class="ideareg12"><label for="expirydate"><span class="ideareg13">Expiry Date</span>
                              <div>
                                    <input type="date" class="ideareg14" name="expirydate" id="expirydate" required>

                            </div>
                                    </label>
                                </div>

                                <div class="ideareg18"><label for="content"><span class="ideareg19">Content</span>
<div>
                                 <textarea class="ideareg20" name="content" id="content" required></textarea>
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
                                ?>
                                  <option value="<?php echo $Selectproduct1; ?>"><?php if($Status1 == "Avaliable") { echo $Selectproduct1;} ?></option>
                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                                  <script src="js/RemoveEmptyOptions.js"></script>
                    
                                <?php
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
                    <option value="1">1 - Suitable for very conservative investors</option>
                    <option value="2">2 - Suitable for conservative investors</option>
                    <option value="3">3 - Suitable for moderate investors</option>
                    <option value="4">4 - Suitable for aggressive investors</option>
                    <option value="5">5 - Suitable for very aggressive investors</option>
                </select>
                                    </label>

                                </div>

                                <div class="ideareg24"><label for="instrument"><span class="ideareg25">Instruments</span>
                        
                              <input type="text" class="ideareg26" id="instrument" name="instrument" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg27"><label for="currency"><span class="ideareg28">Currency</span>
                        
                              <input type="text" class="ideareg29" id="currency" name="currency" placeholder="" required>
                                    </label>

                                </div>


                                <div class="ideareg30"><label for="majorsector"><span class="ideareg31">Major Sector</span>
                        
                              <input type="text" class="ideareg32" id="majorsector" name="majorsector" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg33"><label for="minorsector"><span class="ideareg34">Minor Sector</span>
                        
                              <input type="text" class="ideareg35" id="minorsector" name="minorsector" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg36"><label for="region"><span class="ideareg37">Region</span>
                        
                              <input type="text" class="ideareg38" id="region" name="region" placeholder="" required>
                                    </label>

                                </div>

                                <div class="ideareg39"><label for="country"><span class="ideareg40">Country</span>
                        
                              <input type="text" class="ideareg41" id="country" name="country" placeholder="" required>
                                    </label>

                                </div>
                            </div>

<button class="idearegbutton" type= "submit" id="idearegister" name="idearegister" formmethod="post"><span class="idearegbutton1" >Add Idea</span></button>
                            </form>
 
          </body>
          </html>
