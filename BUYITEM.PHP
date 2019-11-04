  <!DOCTYPE html>
<html>
<title>SELECTING ITEMS </title>
<body>

 <?php
include_once ('header.php');
include_once ('sp-conection.php');
 while($row=$quer->fetch())
 {
	echo '<h5>'.$row['ProductName'].'</h5>';
	echo '<h5>'.$row['ProductName'].'</h5>';
	echo '<h5>'.$row['ProductName'].'</h5>';	 
 }

 ?>

</body>
</html>
  
  