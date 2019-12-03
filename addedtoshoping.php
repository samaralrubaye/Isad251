<?php
include_once('config.php');
include_once ('sp-conection.php');
session_start();
try
{
	$pdo=getconect();
	#<!--excute the stored procedure-->
	
	#--<!--call stored procedure-->
	
	



	$page_title='CART addition';
	
if(isset($_GET['addedtoshoping']));
var_dump($_GET);
	$ItemID=$_GET['addedtoshoping'];
$quer='select*from items where ItemID=ItemID';

 
 
$STATMENT=$pdo->prepare($quer);
$STATMENT->execute();
$r =$STATMENT->fetchAll(pdo::FETCH_ASSOC);
foreach($r as $row){

 echo '<p> A'.$row["ProductName"].
   'has been added to your cart</p>';
	 
	 
  
} 

if(isset($_session['cart'][$ItemID]))
{
	#$_SESSION['cart'][$ItemID]['stock']++;
	#ECHO'<P> Another'.$row["ProductName"].
	#'HAS been added to your Card</p>';
#}
#else
#{
#	$_SESSION['cart'][$ItemID]=array('stock'=>1,$row['ProductCost']);
#echo '<p> A'.$row["ProductName"].
  # 'has been added to your cart</p>';
#}
 }
#echo'<a herf="cart.php">view cart</a>';
} catch (PDOException $err)
{
	echo 'Error:'.$err->getMessage();
}
 

include_once('footer.php')
?>