<?php
include_once('cafe.css');
session_start();
require_once('config.php');
include_once('header.php');


try
{
	$pdo=getconect();
	#<!--excute the stored procedure-->
	
	#--<!--call stored procedure-->
	
	

$page_title='Card' ;
#include_once('header.php');
if ($_SERVER['REQUEST_METHOD']== 'POST')
{ 
	foreach($_post['qty']as $ItemID=>$Item_qty)
	{
		$ItemID=(INT)$ItemID;
		$qty=(int)Item_qty;
		if (qty==0)
		{unset($_SESSION['cart'][$ItemID]);}
	elseif($qty>0)
	{$_session['cart'][$ItemID]['ProductCost']=$sqy;}
	}
} 
	
	if(!empty($_SESSION['cart']))
	{
		
	$quer="select*from shop where ItemID in (";
	foreach($_SESSION['cart']  as $ItemID=>$value)
	{$quer.=$ItemID.',';}
	#$quer=substr($quer,0,-1).')ORDER BY ItemID ASC';
	
	$sth = $pdo->prepare('call spsales (?,?,?)');
	$quantity = 4;
	$ProductCost = 2.99;
	$orderID = 5;
     $sth->bindValue(1, $quantity, PDO::PARAM_INT);
      $sth->bindValue(2, $ProductCost, PDO::PARAM_STR);
         $sth->bindValue(3, $orderID, PDO::PARAM_INT);
       $sth->execute();
		 
		ECHO'<form action="cart.php" methode ="post"><table>
        <tr><th colspan="5">Items in your  cart</th	></tr><tr>';
		 while($row=$sth->fetch())
		 {
			 #calculate the sub-total and grand total
			 
			 
			 require_once('sales.php');
			
			 # disply row-->
			 
			 echo"<tr><td>{$row['ProductName']}</td>
			 <td>input type=\"text\" size=\"3\"
			 
			 name=\"qty[{$row['ItemID']}]\"
			 value=\"{$_SESSION['cart'][$row['ItemID']]['stock']}\"></td>
			 
			 <td>@{$row['ProductCost']}=</td>
			 <td>".number_format($subtotal,2)."</td></tr>";
		 }
		 echo'<tr><td colspan="5">
		 total='.number_format($total,2).'</td></tr>
		 </table>
		 <input type="submit" value="update my cart">
		</ format>';
	}
	 }
		catch (PDOException $err)
{
	echo 'Error:'.$err->getMessage();
}	 
	
		?>