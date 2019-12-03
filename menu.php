  <!DOCTYPE html>
<html>
<title>SELECTING ITEMS </title>
 <?php
 include_once('cafe.css');?>
<?php include_once ('header.php');?>
<?php include_once ('sp-conection.php');?>
<body>


<div class=col align="centre">
<h1>the menu</h1><br>
</div>
<?php while($row=$quer->fetch())
 {
	 
	 
?>






<div class="w3-container" id="menu">


	<H5>
	<?php echo $row['ProductName']?></h5>;
	<img src="<?php echo $row['image']?> "class="img">
	
	<?php> $ItemID=$row['ItemID']?>
		<?php echo $row['desicription']?></h5>;
		<p> Quantity</p>
		<form action="addedtoshoping.php" method="GET" id="addedtoshopping">
                <select align=right>
				    <option value="1">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <!-- href="addedtoshoping.php?$ItemID'"-->  <div class="w3-col s3">
      <!--<a href="addedtoshoping.php" class="w3-button w3-block w3-black">add to bascket</a>-->
				</form>
 <?php }?>

<?php

include_once('footer.php');
?>

</body>
</html>
  
  