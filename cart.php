<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
    
        }
    </style>
</head>
<?php
include_once('cafe.css')
?>
<?php
include_once('config.php')
?>
<body>
<?php 


$msg ='PLEASE SELECT ITEM';

if(isset($_POST["add_to_cart"])):  
    if(isset($_SESSION["shopping_cart"])):  
         $item_array_id = array_column($_SESSION["shopping_cart"], "ItemID");  
         if(!in_array($_GET["ItemID"], $item_array_id)):             
              $count = count($_SESSION["shopping_cart"]);  
              $item_array = array(  
                   'ItemID'=>$_GET["ItemID"],  
                   'ProductName'=>$_POST["hidden_name"],  
                   'ProductPrice'=>$_POST["hidden_price"],  
                   'Quantity'=>$_POST["Quantity"]
              );  
              $_SESSION["shopping_cart"][$count] = $item_array;
              $msg = 'PRODUCT ADDED';    
         else:  
              $msg = 'PRODUCT ALREADY EXISTS';

         endif;  
    else:  
         $item_array = array(  
              'ItemID'=>$_GET["id"],  
              'ProductName'=>$_POST["hidden_name"],  
              'ProductPrice'=>$_POST["hidden_price"],  
              'Quantity'=>$_POST["Quantity"]  
         );  
         $_SESSION["shopping_cart"][0] = $item_array;  
    endif;
endif;  

if(isset($_GET["action"])): 
    if($_GET["action"] == "delete"):          
         foreach($_SESSION["shopping_cart"] as $keys => $values):              
              if($values["ItemID"] == $_GET["ItemID"]):                  
                   unset($_SESSION["shopping_cart"][$keys]);  
                   $msg = 'PRODUCT REMOVED';  
              endif; 
         endforeach;  
    endif;
endif; 
   ?>
</BODY>
</HTML>
