<?php

include_once('../../public/header.php');
include_once ('../model/DbContext.php');
include_once('../model/requestItems.php');

if(!isset($db)) {
   $db = new DbContext();
}
 if(isset($_POST['submit'])) {
    $requestItems = new requestItems( $_POST('$ItemID'),$_POST['ProductCost'], $_POST['ProductName'], $_POST['Type'], $_POST['decicription'], $_POST['image']);
    $success = $db->getItems($requestItems);
}
?>

<!DOCTYPE html>
<html lang="en">

<title>SELECTING ITEMS </title>
<style></style>
<body>
<form>

<div class=col align="centre">
<h1>the menu</h1><br>
</div>


<div class="w3-container" id="menu">
    <?php
//$r=select *from users
    $products = $db->allProducts();
foreach($products as $row)
    {

        echo '<td><strong>'. $row['ProductName'].'</strong><br>'.'<br><img width="100" src="../../assets/images/'.$row['image'].'"><br>£'.$row['ProductCost'].'
    <br><a href="addedtoshoping.php?ItemID='.$row['ItemID'].'">Add to cart</a><br> </td>';}

	
   // echo '</tr><table></table>';
include_once('../../public/footer.php');
?>

</body>
</html>
  
  